@extends('frontend.layout-front-end')

@section('judul','Temukan teman baru anda')
@include('frontend.partials-front-end.header-front-end')

@section('content')

<form class="form-inline my-2 my-lg-0 mr-4 pull-right" action="{{route('hewan-siapa.searchAdopsi')}}" method="get" >
    @csrf
    <input class="form-control mr-sm-2" type="search" name="pencarian" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
  <div class="container-fluid"> <br> <br>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-2 rounded" id="sidebar-box">
            <section id=sidebar>
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
            </section>
        </div>
        
        <div class="col-md-9">
            <div class="product-hewan-list">
                <div class="container">
                    <div class="row">
                    @foreach ($result as $data)
                        <div class="col-md-4 post">
                            <a href="{{route('hewan-siapa.showAdopsi',$data->id)}}">
                                <div class="post-pet">
                                    <img src="{{asset('storage/post/adopsi/'.$data->nama_post_adopsi.'-'.$data->image_post_adps)}}"  class="post-image" alt="">
                                    <div class="identitas-hewan" id="identitas-hewan">
                                            <h4 class="m-0 ml-3 mt-2 font-weight-bold" style="letter-spacing: 0.5">{{$data->nama_post_adopsi}}</h4>
                                            <h4 class="ml-3 font-weight-bold" style="letter-spacing: 0.5">{{$data->nama_ras_hewan}}</h4>
                                       
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                {{$listAdopsi->links()}}
            </div>
        </div>
        
    </div>
    
</div>



@endsection