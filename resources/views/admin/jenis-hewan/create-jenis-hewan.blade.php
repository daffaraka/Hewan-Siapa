@extends('admin.layout')

@section('judul','Buat List Jenis Hewan')

@section('content')


<div class="container">

    <div class="row">
       
        <div class="col-md-5" style="padding:30px">

            @include('admin.flash.flash')
            
            {!! Form::open(['route' => 'jenishewan.store'])  !!}
            {!! Form::token() !!}
            <div class="form-group">
                {!! Form::label('nama_jenis_hewan', 'Nama Jenis Hewan', ['class' => 'h5']) !!} 
                {!! Form::text('nama_jenis_hewan','', ['class' => 'form-control']) !!}
            </div>
                {!! Form::submit('Submit', ['class' => 'btn btn-primary'] ,) !!}
                <a class="btn btn-info" href="{{route('jenishewan.index')}}">Kembali</a>
            {!! Form::close() !!}
         
        </div>
    </div>
</div>
  
@endsection