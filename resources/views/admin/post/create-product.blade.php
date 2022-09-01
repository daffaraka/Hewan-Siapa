@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                {!! Form::open() !!}
                {!! Form::token() !!}
                    {!! Form::label('nama_products', 'Nama Hewan', ['class' => 'h5']) !!} 
                    {!! Form::text('nama_products','', ['class' => 'form-control']) !!} <br>

                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'h5']) !!} 
                    {!! Form::select('jenis_kelamin','',['Jantan' => 'Jantan', 'Betina' => 'Betina'] ) !!} <br>

                    {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'h5']) !!} 
                    {!! Form::text('deskripsi','', ['class' => 'form-control']) !!} <br>
                
                    {!! Form::label('image', 'Photo', ['class' => 'h5']) !!} 
                    {!! Form::text('image','', ['class' => 'form-control']) !!} <br>

                    {!! Form::submit('Submit') !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection