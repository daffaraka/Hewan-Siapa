@extends('frontend.layout-front-end')

@section('judul','Beranda')
@include('frontend.partials-front-end.header-front-end')

@section('content')
<div class="card p-5 bg-gray">

    <div class="card-body">

        @foreach ($result as $data)

            @if ($data )
                
            @endif
            <p>{{$data->nama_post_adopsi}}</p>
            <img class="card-img-top" src=" {{asset('storage/post/adopsi/'.$data->nama_post_adopsi.'-'.$data->image_post_adps)}}"
                                         style="height: 100px; max-width:100px; object-fit:cover; object-position:center;">
        @endforeach

    </div>
</div>

@endsection