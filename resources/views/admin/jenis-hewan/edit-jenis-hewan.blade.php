@extends('admin.layout')


@section('judul','Update Jenis Hewan')
@section('content')


<div class="container">
    <div class="row" style="padding: 20px">
       
        <div class="col-md-8">
            <form action="{{ route('jenishewan.update', $data->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_jenis_hewan">Update Nama Jenis Hewan</label>
                    <input type="text" name="nama_jenis_hewan" id="nama_jenis_hewan" class="form-control" value="{{$data->nama_jenis_hewan}}">
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <button class="btn btn-primary" type="submit"> Simpan </button>
                    <a href="{{route('jenishewan.index')}}" class="btn btn-info" style="margin-left: 10px"> Kembali </a>
                </div>
            </form>
        </div>
       
    </div>
</div>


@endsection
{{-- 

{!! Form::model($data,['url'=>'admin/jenishewan/update',$data->id]) !!}
{!! Form::hidden('id') !!}
    <div class="form-group">
        {!! Form::label('nama_jenis_hewan', 'Nama Jenis Hewan', ['class' => 'h5']) !!} 
        {!! Form::text('nama_jenis_hewan',$data->nama_jenis_hewan, ['class' => 'form-control']) !!} <br>
    </div>
    <div class="form-group">
        {!! Form::label('slug_jenis_hewan', 'Slug', ['class' => 'h5']) !!} 
        {!! Form::text('slug_jenis_hewan',$data->slug_jenis_hewan, ['class' => 'form-control']) !!} <br>
    </div>
        {!! Form::submit('Edit Data', ['class' => 'btn btn-primary'] ,) !!}
{!! Form::close() !!} --}}