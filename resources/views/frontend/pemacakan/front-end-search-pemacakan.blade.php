@extends('frontend.layout-front-end')

@section('judul','Buat post anda')
@include('frontend.partials-front-end.header-front-end')

@section('content')

<div class="container-fluid">
   
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9"> <h2 class="m-2 mb-5"> <label class="badge-dark p-1">Pasangkan hewan peliharaan anda dengan mereka</label> </h2></div>
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0 mr-3 pull-right" action="{{route('hewan-siapa.searchPemacakan')}}" method="get" >
                @csrf
                <input class="form-control mr-sm-2" type="search" name="pencarian" placeholder="Cari kiriman pemacakan" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="col"></div>
        <div class="col-md-2 rounded">
                <div>
                    <h5 class="category-list p-1 border-bottom text-center" >Jenis Hewan</h5>
                    <ul>
                        @foreach ($listJenisHewan as $listHewan)
                        <li><a href="#" class="text-dark">{{$listHewan->nama_jenis_hewan}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h5 class="category-list p-1 border-bottom text-center">Umur</h5>
                    <ul>
                        <li><a href="#" class="text-dark">Kitten</a></li>
                        <li><a href="#" class="text-dark">Adult</a></li>
                        <li><a href="#" class="text-dark">Tua</a></li>
                    </ul>
                </div>
        </div>
        <div class="col-md-9">
            <div class="product-hewan-list">
                <div class="container">
                    <div class="row">
                    @foreach ($result as $data)
                        <div class="col-md-4 post">
                            <a class="text-decoration-none" href="{{route('hewan-siapa.showPemacakan',$data->id)}}">
                                <div class="post-pet">
                                    <img src="{{asset('storage/post/pemacakan/'.$data->nama_post_pemacakan.'-'.$data->image_post_pm)}}"  class="post-image" alt="">
                                    <div class="identitas-hewan" id="identitas-hewan">
                                            <h5 class="m-2 font-weight-normal">{{$data->nama_post_pemacakan}}</h5>
                                            <h5 class="m-2 font-weight-normal">{{$data->nama_jenis_hewan}}</h5>
                                       
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                {{$listPemacakan->links()}}
            </div>
        </div>
        
    </div>
    
</div>

@endsection