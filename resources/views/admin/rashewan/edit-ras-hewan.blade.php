@extends('admin.layout')

@section('judul','Update Ras Hewan')

@section('content')
<div class="container">
    <div class="row" style="padding: 20px">
       
        <div class="col-md-8">
            <form action="{{ route('rashewan.update', $rasHewan->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_jenis_hewan">Update Nama Ras Hewan</label>
                    <input type="text" name="nama_ras_hewan" id="nama_ras_hewan" class="form-control" value="{{$rasHewan->nama_ras_hewan}}">
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <button class="btn btn-primary" type="submit"> Simpan </button>
                    <a href="{{route('rashewan.index')}}" class="btn btn-secondary" style="margin-left: 10px"> Kembali </a>
                </div>
            </form>
        </div>
       
    </div>
</div>
@endsection