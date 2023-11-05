<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\PendaftaranKonseling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardCalendar extends Component
{
    public $startDate;
    public $endDate;
    public $event;
    public $activeEvent;
    public $newType;

    public function mount()
    {
        $this->startDate = now()->startOfMonth();
        $this->endDate = now()->endOfMonth();
    }

    public function setEvent($event)
    {
        $our_event = PendaftaranKonseling::where('id', $event['id'])->firstOrFail();

        $this->activeEvent = $our_event;
    }

    public function eventReceive($data)
    {
        // Handle new events
        $event = PendaftaranKonseling::create([
            'user_id' => 1,
        ]);

        if (isset($data['extendedProps']['meta'])) {
            $event->meta = $data['extendedProps']['meta'];
            $event->save();
        }

        $this->clearCache();
        $this->emit('refreshCalendar');
    }

    public function eventDrop($event, $oldEvent)
    {
        // Modify existing events
        $dh_event = PendaftaranKonseling::find($event['id']);
        if ($dh_event->user_id != Auth::user()->id || $dh_event->created_by != Auth::user()->id) {
            abort(403);
        }

        $dh_event->start = $event['start'];
        $dh_event->save();

        $this->clearCache();
        $this->emit('refreshCalendar');
    }

    public function eventRemove($event)
    {
        $id = $event['id'];
        $our_event = PendaftaranKonseling::find($id);

        if ($our_event->created_by == Auth::user()->id) {
            $our_event->delete();
        } else {
            abort(403);
        }

        $this->reset('activeEvent');
    }

    public function getEvents()
    {
        $startDate = $this->startDate;
        $endDate = $this->endDate;

        // $events = Cache::remember('user-events-' . Auth::user()->id . '-' . base64_encode($startDate.$endDate), now()->addHour(), function() use ($startDate, $endDate){
        $events = [];

        // add other events
        $global_events = PendaftaranKonseling::query()
            ->where(function ($query) {
                return $query->where('user_id', Auth::user()->id)->orWhereNull('user_id');
            })
            ->whereDate('start', '>=', $startDate)
            ->where(function ($query) use ($endDate) {
                return $query->whereDate('end', '<=', $endDate)->orWhereNull('end');
            })
            ->get();

        foreach ($global_events as $global_event) {
            $event = [
                'id' => $global_event->id,
                'title' => $global_event->title,
                'start' => $global_event->start->startOfDay()->format('Y-m-d'),
                'end' => $global_event->end ? $global_event->end->addDay()->startOfDay()->format('Y-m-d') : null,
                'allDay' => $global_event->allDay,
                'editable' => $global_event->editable,
                'deletable' => $global_event->created_by == Auth::user()->id,
                'backgroundColor' => $global_event->backgroundColor,
                'extendedProps' => [
                    'type' => 'Event',
                    'content' => $global_event->content,
                    'notes' => $global_event->notes,
                    'editable' => $global_event->editable,
                ],
            ];

            $events[] = $event;
        }

        // return $events;
        // });

        return $events;
    }

    public function clearCache()
    {
        Cache::forget('user-events-' . Auth::user()->id . '-' . base64_encode($this->startDate . $this->endDate));
    }

    public function newEvent($type)
    {
        $this->reset('event');
        $this->newType = $type;

        $this->dispatchBrowserEvent('reloadModalJS');
    }

    public function save()
    {
        /** @var App\Models\User */
        $user = Auth::user();

        $title = '';

        if ($this->newType == 'rest') {
            $title = 'Rest';
        } elseif ($this->newType == 'ride') {
            $title = $this->event['riding_style'] . ' Ride';
        } else {
            $title = $this->event['title'];
        }


        $this->reset('event');
        $this->clearCache();
        $this->emit('refreshCalendar');
        $this->emitSelf('closeModal');
    }

    public function render()
    {
        return view('livewire.calendar', [
            'events' => [],
        ]);
    }
}
