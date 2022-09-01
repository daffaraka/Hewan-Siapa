@extends('frontend.layout-front-end')

@section('judul','Buat kiriman pemacakan anda')
@include('frontend.partials-front-end.header-front-end')

@section('content')



<form action="{{route('hewan-siapa.storePemacakan')}}" method="POST" enctype="multipart/form-data" class="col-md-12" >
    @csrf
    <div class="container" style="padding: 10px">
        @include('admin.flash.flash') 
        <div class="row" style="padding: 20px;box-shadow: grey 0 0 3px; border-radius:5px;">
            
            <div class="col-md-5" style="margin-top:30px;">
                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                alt="preview image" style="height:250px; max-width:400px; max-height: 250px; display:block; margin:15px auto; padding: 10px; box-shadow : grey 1px 1px 2px">

                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('image_post_pm') is-invalid @enderror" name="image_post_pm" id="image_post_pm" >
                      <label class="custom-file-label"></label>
                    </div>
                </div>                                  
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_post_pemacakan"> Judul Postingan Pemacakan</label>
                    <input type="text" name="nama_post_pemacakan" id="nama_post_pemacakan" class="form-control @error('nama_post_pemacakan') is-invalid @enderror" >
                    <small class="form-text"><label class="badge badge-dark m-0"> *Isi sesuai keinginan anda</label> </small>
                    <small class="form-text"><label class="badge badge-dark m-0"> *Gunakan kata-kata spesifik untuk mempermudah pencari pemacakan memilih anda</label> </small>

                    @error('nama_post_pemacakan')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_hewan_id">Jenis Hewan</label>
                    <select name="jenis_hewan_id" id="jenis_hewan_id" selected="true" class="jenis_hewan form-control @error('jenis_hewan_id') is-invalid @enderror" >
                        <option value="">Pilih Jenis Hewan</option>
                        @foreach ($jenisHewan as $data)
                         <option value="{{$data->id}}" type="text">{{$data->nama_jenis_hewan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-5">
                    <label for="ras_hewan_id">Ras Hewan</label>
                    <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control @error('ras_hewan_id') is-invalid @enderror" placeholder="" >
                        <option value="" selected disabled>Tentukan Jenis Hewan Terlebih dahulu</option>
                        <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control"></select>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="size-hewan">Ukuran Hewan</label>
                        <select name="size-hewan" id="size-hewan" selected="true" class="jenis_hewan form-control @error('size-hewan') is-invalid @enderror" >
                            <option value="" hidden>Ukuran</option>
                            @foreach (App\Models\Product\Pemacakan::sizeHewan() as $size)
                              <option value="{{$size}}" type="text">{{$size}}</option>
                            @endforeach
    
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="color">Warna Hewan</label>
                        <select name="color" id="color" selected="true" class="jenis_hewan form-control @error('color') is-invalid @enderror" >
                            <option value="" hidden>Warna</option>
                            @foreach (App\Models\Product\Pemacakan::warnaHewan() as $warna)
                              <option value="{{$warna}}" type="text">{{$warna}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="umur-hewan-pm">Umur Hewan</label>
                        <select name="umur-hewan-pm" id="umur-hewan-pm" selected="true" class="jenis_hewan form-control @error('umur-hewan-pm') is-invalid @enderror" >
                            <option value="" hidden>Umur</option>
                            @foreach (App\Models\Product\Pemacakan::umurHewan() as $umur)
                              <option value="{{$umur}}" type="text">{{$umur}}</option>
                            @endforeach
    
                        </select>
                    </div>
                </div>
                


                <div class="form-group">
                    <label for="deskripsi_post_pm"> Deskripsi Post</label>
                    <textarea type="text" name="deskripsi_post_pm" id="deskripsi_post_pm" cols="30" rows="3" class="form-control @error('deskripsi_post_pm') is-invalid @enderror"></textarea>
                    <small class="form-text"><label class="badge badge-dark m-0"> *Deskripsikan secara detail bagaimana keinginan anda</label> </small>
                    <small class="form-text"><label class="badge badge-dark m-0"> *Semakin detail keinginan anda, maka semakin baik</label> </small>

                    @error('deskripsi_post_pm')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi_post_pm"> Lokasi </label>
                    <input type="text" name="lokasi_post_pm" id="lokasi_post_pm" class="form-control @error('lokasi_post_pm') is-invalid @enderror" placeholder="" >
                    <small class="form-text"><label class="badge badge-dark m-0"> *Tentukan lokasi dimana ketika anda mengirim kiriman pemacakan ini</label> </small>

                    @error('lokasi_post_pm')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi_post_pm"> Kontak Anda </label>
                    <input type="text" name="kontak_pemacakan" id="kontak_pemacakan" class="form-control @error('kontak_pemacakan') is-invalid @enderror" placeholder="" value="+62">
                    <small class="form-text"><label class="badge badge-dark m-0"> *Tentukan lokasi dimana ketika anda mengirim kiriman pemacakan ini</label> </small>

                    @error('kontak_pemacakan')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="syarat_pemacakan">Syarat Memacakkan dengan hewan Saya </label>
                    <textarea type="text" name="syarat_pemacakan" id="syarat_pemacakan" cols="30" rows="3" class="form-control @error('syarat_pemacakan') is-invalid @enderror" placeholder="" > </textarea>
                    <small class="form-text"><label class="badge badge-dark m-0"> *Sebutkan syarat untuk memacakkan dengan peliharaan anda</label> </small>
                    <small class="form-text"><label class="badge badge-dark m-0"> *Contoh : saya ingin Kucing Ras Persia, Sehat, Pertemuan dirumah saya dll</label> </small>
                    @error('syarat_pemacakan')
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