@extends('layouts.application')
@section('halaman', 'jadwalKonseling')
@section('menu', 'jadwalKonseling')
@section('content')

<link rel="stylesheet" id="stylesheet" href="https://tailboard.tailwinddashboard.com/src/css/style.css">

<div x-data="{ open: false }" class="overflow-hidden">


    <div class="mx-auto p-0 md:p-2">
        <!-- row -->
        <div class="flex flex-wrap flex-row">
            <div class="flex-shrink max-w-full px-3 md:px-4 w-full">
                <p class="text-lg font-bold my-3">Calendar</p>
            </div>

            <div class="flex-shrink max-w-full px-3 md:px-4 w-full mb-6">
                <div class="p-6 bg-white dark:bg-slate-900 rounded shadow-lg shadow-cyan-100/10 dark:shadow-cyan-700/10">
                    <div class="flex flex-col md:flex-row justify-center md:justify-between mb-6">
                        <div class="self-center">
                            <div x-data="{ open: false }">
                                <div class="flex">
                                    <button @click="open = true" type="button" class="py-2 px-4 inline-block text-center mb-3 rounded leading-5 text-slate-100 bg-cyan-500 border border-cyan-500 hover:text-white hover:bg-cyan-600 hover:ring-0 hover:border-cyan-600 focus:bg-cyan-600 focus:border-cyan-600 focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 mr-1 bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                        Add Schedule
                                    </button>
                                </div>

                                <div x-show="open" tabindex="0" class="z-50 overflow-auto inset-0 w-full h-full fixed py-6" style="display:none">
                                    <div class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;" x-show="open" x-transition:enter="transition duration-500" x-transition:enter-start="transform opacity-0 -translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition -translate-y-4" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 -translate-y-4">
                                        <div class="bg-white dark:bg-slate-800 rounded shadow-lg border dark:border-slate-700 flex flex-col overflow-hidden">
                                            <button @click="open = false" class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                            <!-- modal title -->
                                            <div class="px-6 py-3 text-xl border-b dark:text-slate-300 dark:border-slate-700 font-bold">Create Schedule</div>
                                            <!-- modal content -->
                                            <form action="#">
                                                <div class="p-6 flex-grow">
                                                    <div class="mb-6">
                                                        <label for="exampleInput1" class="inline-block mb-2">Title</label>
                                                        <input type="text" class="w-full leading-5 relative text-sm py-2 px-4 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" id="exampleInput1">
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="rangetime" class="inline-block mb-2">Start and End date</label>
                                                        <div id="rangetime" class="flex flex-col justify-center md:flex-row md:justify-between">
                                                            <input id="startDate" class="startDate w-full leading-5 relative text-sm py-2 px-4 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" type="text" name="start">
                                                            <span class="px-4 text-center">to</span>
                                                            <input id="endDate" class="endDate w-full leading-5 relative text-sm py-2 px-4 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" type="text" name="end">
                                                        </div>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label class="flex items-center">
                                                            <input type="checkbox" name="checked-demo" value="1" class="form-checkbox text-cyan-500 h-5 w-5 border border-slate-300 dark:border-slate-700 dark:focus:border-slate-600 dark:bg-slate-700 rounded focus:outline-none mr-2">
                                                            <span>All Day</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="exampleLink" class="inline-block mb-2">With Link</label>
                                                        <input type="text" class="w-full leading-5 relative text-sm py-2 px-4 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" id="exampleLink" placeholder="https://">
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="exampleTextarea1" class="inline-block mb-2">Description</label>
                                                        <textarea class="w-full leading-5 relative py-3 px-5 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" id="exampleTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <select class="inline-block w-full leading-5 relative py-2 pl-3 pr-8 rounded text-slate-800 bg-white border border-slate-300 overflow-x-auto focus:outline-none focus:border-slate-400 focus:ring-0 select-caret appearance-none dark:text-slate-300 dark:bg-slate-700 dark:border-slate-700 dark:focus:border-slate-600" aria-label="Default select example">
                                                        <option selected>Label</option>
                                                        <option value="1">Important</option>
                                                        <option value="2">Business</option>
                                                        <option value="3">Personal</option>
                                                    </select>
                                                </div>
                                                <div class="px-6 py-3 border-t dark:border-slate-700 flex justify-end">
                                                    <button @click="open = false" type="button" class="mr-2 py-2 px-4 inline-block text-center mb-3 rounded leading-5 text-slate-100 bg-pink-500 border border-pink-500 hover:text-white hover:bg-pink-600 hover:ring-0 hover:border-pink-600 focus:bg-pink-600 focus:border-pink-600 focus:outline-none focus:ring-0">Close</Button>
                                                    <button type="submit" class="py-2 px-4 inline-block text-center mb-3 rounded leading-5 text-slate-100 bg-cyan-500 border border-cyan-500 hover:text-white hover:bg-cyan-600 hover:ring-0 hover:border-cyan-600 focus:bg-cyan-600 focus:border-cyan-600 focus:outline-none focus:ring-0">Save</Button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                </div>
                            </div>
                        </div>
                        <div class="self-center">
                            <h2 class="text-lg font-semibold">Schedule Calendar</h2>
                        </div>
                    </div>
                    <div class="relative custom-calendar">
                        <div id="calendar"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- Vendor -->
<script src="https://tailboard.tailwinddashboard.com/vendors/fullcalendar/main.min.js"></script>

<!-- Configuration -->
<script>
    (function() {
        "use strict";

        /**
         * ------------------------------------------------------------------------
         *  Move the demo script to the footer before </body>
         *  and edit the script for dynamic data needs.
         * ------------------------------------------------------------------------
         */

        // Chart Color
        const text_cyan_500 = '#06b6d4';
        const text_pink_500 = '#ec4899';
        const text_yellow_500 = '#eab308';
        const text_green_500 = '#22c55e';
        const text_blue_500 = '#7dd3fc';
        const text_gray_500 = '#64748b';

        // Convert HEX TO RGBA
        function hexToRGBA(hex, opacity) {
            if (hex != null) {
                return 'rgba(' + (hex = hex.replace('#', '')).match(new RegExp('(.{' + hex.length / 3 + '})', 'g')).map(function(l) {
                    return parseInt(hex.length % 2 ? l + l : l, 16)
                }).concat(isFinite(opacity) ? opacity : 1).join(',') + ')';
            }
        }


        const myCalendar = function() {
            // Calendar Event
            const fullcalendars = document.getElementById('calendar');
            if (fullcalendars != null) {
                document.addEventListener('DOMContentLoaded', function() {
                    const calendarEl = document.getElementById('calendar');
                    const date = new Date();
                    const month = new Date();
                    const dates = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
                    const yearmonth = month.getFullYear().toString() + '-' + (month.getMonth() + 1).toString().padStart(2, 0) + '-';
                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        initialDate: dates,
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        events: [{
                                title: 'All Day Event',
                                start: yearmonth + '01',
                                backgroundColor: text_pink_500,
                                borderColor: text_pink_500
                            },
                            {
                                title: 'Long Event',
                                start: yearmonth + '03',
                                end: yearmonth + '06'
                            },
                            {
                                groupId: '999',
                                title: 'Repeating Event',
                                start: yearmonth + '09T16:00:00',
                                backgroundColor: text_green_500,
                                borderColor: text_green_500
                            },
                            {
                                groupId: '999',
                                title: 'Repeating Event',
                                start: yearmonth + '16T16:00:00',
                                backgroundColor: text_gray_500,
                                borderColor: text_gray_500
                            },
                            {
                                title: 'Conference',
                                start: '11',
                                end: yearmonth + '13'
                            },
                            {
                                title: 'Meeting',
                                start: yearmonth + '12T10:30:00',
                                end: yearmonth + '12T12:30:00',
                                backgroundColor: text_pink_500,
                                borderColor: text_pink_500
                            },
                            {
                                title: 'Lunch',
                                start: yearmonth + '12T12:00:00'
                            },
                            {
                                title: 'Meeting',
                                start: yearmonth + '12T14:30:00',
                                backgroundColor: text_pink_500,
                                borderColor: text_pink_500
                            },
                            {
                                title: 'Birthday Party',
                                start: yearmonth + '20T07:00:00'
                            },
                            {
                                title: 'Evant with link',
                                url: 'http://google.com/',
                                start: yearmonth + '28',
                                backgroundColor: text_green_500,
                                borderColor: text_green_500
                            }
                        ],
                        eventColor: text_cyan_500
                    });
                    calendar.render();

                });
            }
        }

        myCalendar();

    })();
</script>
<script src="{{ asset('assets/scripts2.js') }}"></script>
@livewireScripts

@endsection
