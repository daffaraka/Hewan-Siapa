@extends('frontend.layout-front-end')

@section('judul','Beranda')
@include('frontend.partials-front-end.header-front-end')

@include('frontend.partials-front-end.banner')

@section('content')
    <div class="content-caption mt-5">
        <div class="caption">
            <p>This is our friend who are looking for new friend and home</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">

            @if (count($getRandomAdopsi)==null)
                <div class="col-md-12">
                    <h1>Tidak Ada Data</h1>
                </div>
            @else
                @foreach ($getRandomAdopsi as $random)
                <div class="col-md-3 post">
                    <a href="{{route('hewan-siapa.showAdopsi',$random->id)}}">
                        <div class="post-pet">
                            <img src="{{asset('storage/post/adopsi/'.$random->nama_post_adopsi.'-'.$random->image_post_adps)}}"  class="post-image" alt="">
                            <h3 class="m-3 text-center font-weight-bold" style="letter-spacing: 0.5">{{ $random->nama_post_adopsi}}</h3>
                        </div>
                    </a>
                </div>
            
                @endforeach
            @endif

           
        
            <div class="col-md-3 post">
                <a href="{{route('hewan-siapa.listAdopsi')}}">
                    <div class="post-pet bg-dark">
                        <div class="card h-100 bg-transparent text-light">
                            <h4 class="text-center h-100 mt-5">Ada lebih dari puluhan calon peliharaan yang bisa kamu adopsi! </h4>
                        </div>
                    </div>
                </a>
            </div>

            
        </div>
    </div>

    <div class="container mt-5">
        <div class="row banner-box">
            <div class="col-md-4 banner-content">
                <img src="{{asset('assets/img/front-end/Freepik/cat-in-love.jpg')}}" alt="" class="banner-image w-75 mx-auto d-block">
            </div>
            <div class="col-md-8 text-box">
                <h2 class="text-box-header">Temukan Pasangan Hewan Anda</h2>
                <p>Tidak perlu khawatir lagi untuk menemukan pasangan untuk hewan anda. Hewan Siapa menyediakan fitur untuk mencari pasangan untuk hewan anda. Pastikan anda mempunyai hewan peliharan terlebih dahulu.</p> 
                <a href="{{route('hewan-siapa.listPemacakan')}}">
                <div class="btn btn-outline-info btn-lg"> <i class="fa fa-heart-o"></i> Match your pet</div>
                </a>
            </div>
        </div>  
    </div>

    {{-- <style>
        #map-canvas{
	        	width: 350px;
		        height: 250px;
                display:block;
                margin:50px auto;
        	}
    </style>
 
        <div class="container">
            <div class="col mt-4">
                <h1>Add Vendor, Location</h1>
                {{Form::open(array('url'=>'/vendor/add', 'files'=>true))}}
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control input-sm" name="title">
                    </div>

                    <div class="form-group">
                        <label for="">Map</label>
                        <input type="text" id="searchmap">
                        <div id="map-canvas"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Lat</label>
                        <input type="text" class="form-control input-sm" name="lat" id="lat">
                    </div>

                    <div class="form-group">
                        <label for="">Lng</label>
                        <input type="text" class="form-control input-sm" name="lng" id="lng">
                    </div>

                    <button class="btn btn-sm btn-danger">Save</button>
                {{Form::close()}}
            </div>

        </div>

      
    --}}


    @section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script >
		Swal.fire({
		  icon: 'success',
		  title: 'Hewan Siapa',
          text: 'Temukan calon hewan anda disini',
		  showConfirmButton: true,
		  timer: 5000,

		})
    </script>
    
    {{-- <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat: -7.6744381,
                lng: 110.4828239
            },
            zoom:15
        });
        var marker = new google.maps.Marker({
            position: {
                lat: -7.7235068,
                lng: 110.5676775
            },
            map: map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                  bounds.extend(place.geometry.location);
                  marker.setPosition(place.geometry.location); //set marker position new...
              }
              map.fitBounds(bounds);
              map.setZoom(15);
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script> --}}


@endsection