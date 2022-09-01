@extends('frontend.layout-front-end')

@section('judul','Show product')
    @include('frontend.partials-front-end.header-front-end')

    @section('content')
    @include('admin.flash.flash')
    <div class="container">
     
        <div class="row">
            <div class="card col-12 mt-5">
                <div class="row bg-dark">
                    <aside class="col-md-5 border-right">
                        <article class="gallery-wrap"> 
                        <div class="img-big-wrap p-3">
                            <div> 
                                <a href="#">
                                <img src="{{asset('storage/post/pemacakan/'. $pemacakan->nama_post_pemacakan.'-'. $pemacakan->image_post_pm)}}"
                                 class="auto m-0 w-100 h-auto rounded d-block"></a>
                            </div>
                        </div> <!-- slider-product.// -->
                        {{-- <div class="img-small-wrap">
                            <div class="item-gallery w-auto"> <img src="/image/handdraw/Adult dog-1.jpeg"> </div>
                            <div class="item-gallery w-auto"> <img src="/image/handdraw/Adult dog-1.jpeg"> </div>
                            <div class="item-gallery w-auto"> <img src="/image/handdraw/Adult dog-1.jpeg"> </div>
                            <div class="item-gallery w-auto"> <img src="/image/handdraw/Adult dog-1.jpeg"> </div>
                        </div> <!-- slider-nav.// --> --}}
                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <aside class="col-md-7 text-dark w-100 bg-light">
                        <article class="card-body pt-3">
                            <div class="container m-0 p-0">
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <h3 class="title mb-3">{{ $pemacakan->nama_post_pemacakan}}</h3>
                                        <dl class="item-property">
                                            <h4>oleh : {{ $pemacakan->owner_pemacakan_name}}</h4>
                                            <dt>Description</dt>
                                            <dd><p>{{ $pemacakan->deskripsi_post_pm}}</p></dd>
                                            </dl>
                                       
                                    </div>
                                    <div class="col-md-12 p-0">
                                        <dl class="param param-feature">
                                        <dt>Ras</dt>
                                        <dd>{{ $pemacakan->nama_ras_hewan}}</dd>
                                        </dl> 
                                    </div>
                                    <div class="col-md-12 p-0 ">
                                        <dl class="param param-feature">
                                            <dt>Color</dt>
                                            <dd>{{ $pemacakan->color}}</dd>
                                        </dl> 
                                    </div>
                                   <div class="col-md-12 p-0">
                                    <dl class="param param-feature">
                                        <dt>Syarat</dt>
                                        <dd>{{ $pemacakan->syarat_pemacakan}}</dd>
                                        </dl> 
                                    <dl class="param param-feature">
                                   </div>
                                  
                                </div>
                                <dl class="param param-feature">
                                    <dt>Kontak saya </dt>
                                    <dd  class="mt-2"> <a class="btn-lg btn-info " href="https://api.whatsapp.com/send?phone={{$pemacakan->kontak_pemacakan}}"><i class="fa fa-whatsapp"></i> {{ $pemacakan->kontak_pemacakan}} </a> </dd>
                                    </dl> 
                                <dl class="param param-feature">
                            </div>

                            <hr>
                            
                            <dt>Lokasi</dt>
                            <a class="btn btn-outline-info mt-2 mb-2 pull-right" 
                                     href="https://www.google.co.id/maps/place/7%C2%B043'29.1%22S+110%C2%B034'03.8%22E/@-7.7249649,110.5681962,17.25z/data=!4m6!3m5!1s0x2e7a44f549d61065:0x78072fa87845347e!7e2!8m2!3d-7.7247477!4d110.5677313"> <i class="fa fa-map-marker"></i> Buka Di Google Maps</a>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3324.5761594541045!2d110.5681962329812!3d-7.724964856862691!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a44f549d61065%3A0x78072fa87845347e!2zN8KwNDMnMjkuMSJTIDExMMKwMzQnMDMuOCJF!5e0!3m2!1sid!2sid!4v1626762062601!5m2!1sid!2sid"
                                    width="100%" height="300" class="rounded" allowfullscreen="" loading="lazy">
                                </iframe>
                            </dl>  

                        
                            <hr>
                            

                            <a href="{{route('hewan-siapa.form-pengajuan-Pemacakan', $pemacakan->id)}}" class="btn btn-lg btn-outline-dark text-uppercase adoptConfirm"> <i class="fa fa-heart-o" aria-hidden="true"></i> Ajukan Pemacakan </a>  
                            <a href="#" class="btn btn-lg btn-warning text-uppercase"> <i class="fa fa-question-circle" aria-hidden="true"></i> Faq</a>
                        </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
        </div>
    </div>
    
  
<br><br><br>

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    function confirmDelete(item_id) {
        swal({
             title: 'Apakah Anda Yakin?',
              text: "Anda Tidak Akan Dapat Mengembalikannya!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
        })
            .then((willDelete) => {
                if (willDelete) {
                    $('#'+item_id).submit();
                } else {
                    swal("Cancelled Successfully");
                }
            });
    }
</script>
@endsection
