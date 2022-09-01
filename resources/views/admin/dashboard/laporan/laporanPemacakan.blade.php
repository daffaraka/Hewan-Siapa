@extends('admin.layout')

@section('judul','Laporan')
@section('content')

<div class="container p-5">
    <div class="row p-3">
        <div class="col-md-12 mb-3">
            <h2 class="text-dark text-center">Laporan Pemacakan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-dark m-3 ml-1 pull-right" href="{{ route('laporan.exportPemacakan') }}">Export Excel </a>
        </div>
        <div class="col-md-12">
            <table class="table bg-light rounded">
                <thead>
                    <tr class="table-primary">
                        <th> Nama Post </th>
                        <th> Owner Post </th>
                        <th> Pengaju Pemacakan </th>
                        <th> Identitas Hewan </th>
                        <th> Waktu Transaksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanPemacakan as $data)
                    <tr>
                        <td>{{$data->LTP_nama_post}}</td>
                        <td>{{$data->LTP_nama_owner_post}}</td>
                        <td>{{$data->LTP_nama_pengaju_pemacakan}}</td>
                        <td> <label class="badge badge-success">{{$data->LTP_jenis_hewan_post}} </label> - 
                             <label class="badge badge-info"> {{$data->LTP_ras_hewan_post}}</label> </td>
                        <td>{{$data->created_at}}</td>
                    </tr>
                       
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection