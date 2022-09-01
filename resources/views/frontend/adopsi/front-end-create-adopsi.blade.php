@extends('frontend.layout-front-end')

@section('judul','Buat post anda')
@include('frontend.partials-front-end.header-front-end')

@section('content')

@include('admin.flash.flash') 

<form action="{{route('hewan-siapa.storeAdopsi')}}" method="POST" enctype="multipart/form-data" class="col-md-12" >
    @csrf
    <div class="container" style="padding: 10px">
        <div class="row" style="padding: 20px;box-shadow: grey 0 0 3px; border-radius:5px;">
            
            <div class="col-md-5" style="margin-top:30px;">
                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                alt="preview image" style="height:250px; max-width:400px; max-height: 250px; display:block; margin:15px auto; padding: 10px; box-shadow : grey 1px 1px 2px">

                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('nama_post_adopsi') is-invalid @enderror" name="image_post_adps" id="image_post_adps" >
                      <label class="custom-file-label"></label>
                    </div>
                </div>                                  
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_post_adopsi"> Judul Postingan</label>
                    <input type="text" name="nama_post_adopsi" id="nama_post_adopsi" class="form-control @error('nama_post_adopsi') is-invalid @enderror" >
                    @error('nama_post_adopsi')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_hewan_id">Jenis Hewan</label>
                    <select name="jenis_hewan_id" id="jenis_hewan_id" selected="true" class="jenis_hewan form-control @error('jenis_hewan_id') is-invalid @enderror" >
                        <option value="">Pilih Kategori</option>
                        @foreach ($jenisHewan as $data)
                         <option value="{{$data->id}}" type="text">{{$data->nama_jenis_hewan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ras_hewan_id">Ras Hewan</label>
                    <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control @error('ras_hewan_id') is-invalid @enderror" placeholder="" >
                        <option value="" selected disabled>Tentukan Jenis Hewan Terlebih dahulu</option>
                        <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control"> </select>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="size-hewan">Ukuran Hewan</label>
                        <select name="size_hewan" id="size_hewan" selected="true" class="jenis_hewan form-control @error('size-hewan') is-invalid @enderror" >
                            <option value="" hidden>Ukuran</option>
                            @foreach (App\Models\Product\Adopsi::sizeHewan() as $size)
                              <option value="{{$size}}" type="text">{{$size}}</option>
                            @endforeach
    
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="color">Warna Hewan</label>
                        <select name="color" id="color" selected="true" class="jenis_hewan form-control @error('color') is-invalid @enderror" >
                            <option value="" hidden>Warna</option>
                            @foreach (App\Models\Product\Adopsi::warnaHewan() as $warna)
                              <option value="{{$warna}}" type="text">{{$warna}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="umur-hewan">Umur Hewan</label>
                        <select name="umur-hewan" id="umur-hewan" selected="true" class="jenis_hewan form-control @error('umur-hewan') is-invalid @enderror" >
                            <option value="" hidden>Umur</option>
                            @foreach (App\Models\Product\Adopsi::umurHewan() as $umur)
                              <option value="{{$umur}}" type="text">{{$umur}}</option>
                            @endforeach
    
                        </select>
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="deskripsi_post"> Deskripsi Post</label>
                    <textarea type="text" name="deskripsi_post_adps" id="deskripsi_post_adps" cols="30" rows="5" class="form-control @error('deskripsi_post_adps') is-invalid @enderror"></textarea>
                    @error('deskripsi_post_adps')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi_post_adps"> Lokasi </label>
                    <input type="text" name="lokasi_post_adps" id="lokasi_post_adps" class="form-control @error('lokasi_post_adps') is-invalid @enderror" placeholder="" >
                    @error('lokasi_post_adps')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi_post_adps"> Kontak Anda </label>
                    <input type="text" name="kontak_adopsi" id="kontak_adopsi" class="form-control @error('kontak_adopsi') is-invalid @enderror" placeholder="" value="+62">
                    
                    @error('lokasi_post_adps')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="syarat_adopsi">Syarat Mengadopsi </label>
                    <input type="text" name="syarat_adopsi" id="syarat_adopsi" class="form-control @error('syarat_adopsi') is-invalid @enderror" placeholder="" >
                    @error('syarat_adopsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
             
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{route('hewan-siapa.index')}}" style="margin-left: 20px;">Kembali </a>

            </div>
        </div>
    </div>
        
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@endsection