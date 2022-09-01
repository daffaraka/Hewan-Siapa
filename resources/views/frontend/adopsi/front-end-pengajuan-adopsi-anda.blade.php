@extends('frontend.layout-front-end')

@section('judul','Temukan teman baru yaaaa')
@include('frontend.partials-front-end.header-front-end')

@section('content')
<div class="container">
    @include('admin.flash.flash')

    <div class="card">
        <form action="{{route ('hewan-siapa.ajukan-adopsi',$adopsi->id) }}" method="POST" enctype="multipart/form-data">
            <div class="row m-0">
                <aside class="col-sm-5">
                    <article class="gallery-wrap p-0"> 
                    <div class="img-big-wrap p-3 text-dark">
                        <div class="p-2"> 
                           
                            <img src="{{asset('storage/post/adopsi/'.$adopsi->nama_post_adopsi.'-'.$adopsi->image_post_adps)}}"
                             class="mb-5 rounded shadow w-100 h-auto" id="TA_gambar">
                            </a>
                             
                             <h3 class="title mb-3"> <label class="badge badge-dark p-3">{{$adopsi->nama_post_adopsi}}</label> </h3>
                             <dt>Pemilik</dt>
                             <dd>  {{$adopsi->owner_adopsi_name}} </dd>
                             <dl class="item-property">
                             <dt>Description</dt>
                             <dd><p>{{$adopsi->deskripsi_post_adps}}</p></dd>
                             </dl>
                             <dl class="param param-feature">
                             <dt>Ras</dt>
                             <dd>{{$adopsi->nama_ras_hewan}}</dd>
                             </dl>  <!-- item-property-hor .// -->
                             <dl class="param param-feature">
                             <dt>Color</dt>
                             <dd>{{$adopsi->color}}</dd>
                             </dl>  <!-- item-property-hor .// -->
                             <dl class="param param-feature">
                             <dt>Lokasi</dt>
                             <dd>Klaten Selatan</dd>
                             </dl>  <!-- item-property-hor .// -->
                        </div>
                    </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7 text-light bg-dark rounded-right">
                    <article class="card-body pt-4">
                            @csrf
                            <div class="form-group">
                                <label> <h4>Nama Anda</h4> </label>
                                <input type="text" class="form-control font-weight-bolder font-size-20" name="nama_pengaju" id="nama_pengaju" placeholder="Nama anda" value="{{Auth::user()->name}}">
                                <small id="emailHelp" class="form-text">*Isi sesuai nama anda , contoh : Budi</small>
                            </div>
                            <div class="form-group">
                                <label><h4>Alamat</h4></label>
                                <input type="text" class="form-control" name="TA_alamat_pengaju" id="TA_alamat_pengaju" placeholder="Klaten Selatan,Wedi,Karanganom dll">
                                <small id="emailHelp" class="form-text">*Isi alamat anda, contoh : Klaten Selatan</small>
                            </div>
                            <div class="form-group">
                                <label><h4>Kontak yang bisa dihubungi</h4></label>
                                <input type="text" class="form-control" name="TA_contact_pengaju" id="TA_contact_pengaju" placeholder="0812 3456 789 atau email" value="+62">
                                <small id="emailHelp" class="form-text">*Isi dengan kontak yang bisa dihubungi oleh pemilik</small>
                                <small id="emailHelp" class="form-text m-0">*Diperbolehkan mengisi dengan sosial media</small>

                            </div>
                            <div class="form-group">
                                <label><h4>Alasan Memilih Dia</h4></label>
                                <textarea type="text" class="form-control" name="TA_alasan_memilih" id="TA_alasan_memilih"> </textarea>
                                <small class="form-text">*Jelaskan mengapa anda ingin mengadopsi dia</small>

                            </div>
                              <div class="form-group mt-5">
                                  <div class="row">
                                    <button class="col-md-9 btn btn-block btn-lg btn-outline-light mr-3" onclick="alert" type="submit">Kirim Permintaan</button>
                                    <a href="{{route('hewan-siapa.showAdopsi',$adopsi->id)}}" class="btn btn-lg btn-warning"> Kembali</a>
                                  </div>
                              </div>
                        <hr>
                  </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </form>
    </div>
</div>



@endsection