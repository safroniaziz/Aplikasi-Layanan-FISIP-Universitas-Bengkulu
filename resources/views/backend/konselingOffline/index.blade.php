@extends('layouts.application')
@section('halaman', 'Konseling Offline')
@section('menu', 'Konseling Offline')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($konselingOfflines as $index => $konselingOffline)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $konselingOffline->user->name }}</td>
                            <td>{{ $konselingOffline->deskripsi ? $konselingOffline->deskripsi : '-' }}</td>
                            <td>
                                {{ $konselingOffline->status }}
                            </td>
                            <td>{{ $konselingOffline->tanggal_dan_waktu_mulai ?  $konselingOffline->tanggal_dan_waktu_mulai  : '-'}}</td>
                            <td>{{ $konselingOffline->tanggal_dan_waktu_selesai ?  $konselingOffline->tanggal_dan_waktu_selesai  : '-'}}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            @if ($konselingOffline->status == "menunggu")
                                                <a onclick='verify("{{ $konselingOffline->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @else
                                                {{ $konselingOffline->status }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">
                                pendaftaran konseling offline masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @include('backend/konselingOffline/partials.modal_verifikasi')
            </table>
        </div>
    </div>
</div>
@endsection

@include('backend/konselingOffline.partials.js')