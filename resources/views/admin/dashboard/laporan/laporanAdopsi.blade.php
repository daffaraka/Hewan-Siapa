@extends('admin.layout')

@section('judul','Laporan')
@section('content')

<div class="container p-5">
    <div class="row p-3">
        <div class="col-md-12 mb-3">
            <h2 class="text-dark text-center">Laporan Adopsi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-dark m-3 ml-1 pull-right" href="{{ route('laporan.exportAdopsi') }}">Export Excel </a>
        </div>
        <div class="col-md-12">
            <table class="table bg-light rounded">
                <thead>
                    <tr class="table-primary">
                        <th> Nama Post </th>
                        <th> Owner Post </th>
                        <th> Pengaju Adopsi </th>
                        <th> Identitas Hewan </th>
                        <th> Waktu Transaksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanAdopsi as $data)
                    <tr>
                        <td>{{$data->LTA_nama_post}}</td>
                        <td>{{$data->LTA_nama_owner_post}}</td>
                        <td>{{$data->LTA_nama_pengaju}}</td>
                        <td> <label class="badge badge-success">{{$data->LTA_jenis_hewan}} </label> - 
                             <label class="badge badge-info"> {{$data->LTA_ras_hewan}}</label> </td>
                        <td>{{$data->created_at}}</td>
                    </tr>
                       
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection