@extends('frontend.layout-front-end')

@section('judul','Temukan teman baru yaaaa')
@include('frontend.partials-front-end.header-front-end')

@section('content')
<div class="container">
    @include('admin.flash.flash')

    <div class="card" style="font-family: Montserrat;">
            <div class="row m-0">
                <aside class="col-sm-5">
                    <article class="gallery-wrap p-0"> 
                    <div class="img-big-wrap p-3 text-dark">
                        <div class="p-2"> 
                           
                            <img src="{{asset('storage/post/pemacakan/'. $pemacakan->nama_post_pemacakan.'-'. $pemacakan->image_post_pm)}}"
                             class="mb-5 rounded shadow w-100 h-auto" id="TA_gambar">
                            </a>
                             
                             <h3 class="title mb-3"> <label class="badge badge-dark p-3">{{ $pemacakan->nama_post_pemacakan}}</label> </h3>
                             <dl class="item-property">
                             <dt>Description</dt>
                             <dd><p>{{ $pemacakan->deskripsi_post_pm}}</p></dd>
                             </dl>
                             <dl class="param param-feature">
                             <dt>Ras</dt>
                             <dd>{{ $pemacakan->nama_ras_hewan}}</dd>
                             </dl>  <!-- item-property-hor .// -->
                             <dl class="param param-feature">
                             <dt>Color</dt>
                             <dd>{{ $pemacakan->color}}</dd>
                             </dl>  <!-- item-property-hor .// -->
                             <dl class="param param-feature">
                                <dt>Lokasi</dt>
                                <dd>{{$pemacakan->lokasi_post_pm}}</dd>
                             </dl>  <!-- item-property-hor .// -->
                             <dl class="param param-feature">
                                <dt>Kontak Pengirim</dt>
                                <dd  class="mt-2"> <a class="btn-lg btn-info " href="https://api.whatsapp.com/send?phone={{$pemacakan->kontak_pemacakan}}"><i class="fa fa-whatsapp"></i> {{ $pemacakan->kontak_pemacakan}} </a> </dd>
                            </dl>  <!-- item-property-hor .// -->
                        </div>
                    </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>

                <aside class="col-sm-7 text-light bg-dark rounded-right">
                    <article class="card-body">
                    <form action="{{route('hewan-siapa.ajukan-Pemacakan',$pemacakan->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 p-0">
                                <label> <h4>Foto Hewan anda</h4> </label>
                                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                alt="preview image" style="height:250px; max-width:400px; max-height: 250px; display:block; margin:15px auto; padding: 10px;">
                
                                <div class="input-group mb-3">
                                    
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input @error('TM_gambar') is-invalid @enderror" name="TM_gambar" id="TM_gambar" >
                                      <label class="custom-file-label"></label>
                                    </div>
                                </div>                                  
                            </div>

                            <div class="form-group">
                                <label for="jenis_hewan_id"> <h4>Jenis Hewan</h4> </label>
                                <select name="jenis_hewan_id" id="jenis_hewan_id" selected="true" class="jenis_hewan form-control @error('jenis_hewan_id') is-invalid @enderror" >
                                    <option value="">Pilih Jenis Hewan</option>
                                    @foreach ($jenisHewan as $data)
                                     <option value="{{$data->id}}" type="text">{{$data->nama_jenis_hewan}}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div class="form-group mb-5">
                                <label for="ras_hewan_id"><h4>Ras Hewan</h4></label>
                                <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control @error('ras_hewan_id') is-invalid @enderror" placeholder="" >
                                    <option value="" selected disabled>Tentukan Jenis Hewan Terlebih dahulu</option>
                                    <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control"></select>
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label> <h4>Nama Anda</h4> </label>
                                <input type="text" class="form-control font-weight-bolder font-size-20" name="TM_nama_pengaju" id="TM_nama_pengaju" placeholder="Nama anda" value="{{Auth::user()->name}}" disabled>
                                <small id="emailHelp" class="form-text">*Isi sesuai nama anda , contoh : Budi</small>
                            </div>
                            <div class="form-group">
                                <label><h4>Alamat</h4></label>
                                <input type="text" class="form-control" name="TM_alamat_pengaju" id="TM_alamat_pengaju" placeholder="Klaten Selatan,Wedi,Karanganom dll">
                                <small id="emailHelp" class="form-text">*Isi alamat anda, contoh : Klaten Selatan</small>
                            </div>
                            <div class="form-group">
                                <label><h4>Kontak yang bisa dihubungi</h4></label>
                                <input type="text" class="form-control" name="TM_contact_pengaju" id="TM_contact_pengaju" placeholder="0812 3456 789 atau email" value="+62"> 
                                <small id="emailHelp" class="form-text">*Isi dengan kontak yang bisa dihubungi oleh pemilik</small>
                                <small id="emailHelp" class="form-text m-0">*Diperbolehkan mengisi dengan sosial media</small>

                            </div>
                            <div class="form-group">
                                <label><h4>Alasan Memilih Dia</h4></label>
                                <textarea type="text" class="form-control" name="TM_alasan_memilih" id="TM_alasan_memilih"> </textarea>
                                <small class="form-text">*Jelaskan mengapa anda ingin mengadopsi dia</small>

                            </div>

                              <div class="form-group mt-5">
                                  <div class="row">
                                    <button class="col-md-9 btn btn-block btn-lg btn-outline-light mr-3" onclick="alert" type="submit">Kirim Permintaan</button>
                                    <a href="{{route('hewan-siapa.showAdopsi', $pemacakan->id)}}" class="btn btn-lg btn-warning"> Kembali</a>
                                  </div>
                              </div>
                            <hr>
                            {{--
                            <a href="{{route('hewan-siapa.form-pengajuan-adopsi', $pemacakan->id)}}" class="btn btn-lg btn-outline-light text-uppercase"> <i class="fa fa-heart-o" aria-hidden="true"></i> Adopt now </a>
                            <a href="{{route('hewan-siapa.edit', $pemacakan->id)}}" class="btn btn-lg btn-primary text-uppercase"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit </a>
                            <a href="#" class="btn btn-lg btn-warning text-uppercase"> <i class="fa fa-question-circle" aria-hidden="true"></i> Faq</a> --}}
                    </form>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
    </div>
</div>



@endsection