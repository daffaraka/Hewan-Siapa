@extends('frontend.layout-front-end')
@include('frontend.partials-front-end.header-front-end')

@include('admin.flash.flash');
@section('judul','Edit kiriman anda')
    <div class="container" style="font-family: Montserrat">
        <form action="{{route('hewan-siapa.updateAdopsi',$edit->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row m-5 shadow-lg rounded">
                <div class="col-md-5" style="margin-top:30px;">
                    <img id="preview-image-before-upload" src="{{asset('storage/post/adopsi/'.$edit->nama_post_adopsi.'-'.$edit->image_post_adps)}}"
                    alt="preview image" style="height:250px; max-width:400px; max-height: 250px; display:block; margin:15px auto; padding: 10px; box-shadow : grey 1px 1px 2px">

                    <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                        </div>

                        <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image_post_adps') is-invalid @enderror" name="image_post_adps" id="image_post_adps" >
                        <label class="custom-file-label"></label>
                        </div>
                    </div>                                  
                </div>

                <div class="col-md-6 mt-5">
                    <div class="form-group">
                        <label for="nama_post_adopsi"> Judul Postingan</label>
                        <input type="text" name="nama_post_adopsi" id="nama_post_adopsi" 
                        class="form-control @error('nama_post_adopsi') is-invalid @enderror" value="{{$edit->nama_post_adopsi}}">
                        <small class="form-text"><label class="badge badge-dark m-0"> *Isi sesuai keinginan anda</label> </small>
                        <small class="form-text"><label class="badge badge-dark m-0"> *Direkomendasikan dengan sedikit kata</label> </small>

                        @error('nama_post_adopsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_hewan_id">Jenis Hewan</label>
                        <select name="jenis_hewan_id"
                        id="jenis_hewan_id"
                        selected="true"
                        class="jenis_hewan form-control @error('jenis_hewan_id') is-invalid @enderror" >
                            <option value="">Pilih Jenis Hewan</option>
                            @foreach ($jenisHewan as $data)
                            <option value="{{$data->id}}" type="text">{{$data->nama_jenis_hewan}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
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
                        <textarea type="text" name="deskripsi_post_adps" id="deskripsi_post_adps" 
                        cols="30" rows="5" class="form-control @error('deskripsi_post_adps') is-invalid @enderror" >{{$edit->deskripsi_post_adps}}</textarea>
                        @error('deskripsi_post_adps')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_post_adps"> Kontak Anda </label>
                        <input type="text" name="kontak_adopsi" id="kontak_adopsi" class="form-control @error('kontak_adopsi') is-invalid @enderror" placeholder="" value="{{$edit->kontak_adopsi}}">
                       
                        @error('lokasi_post_adps')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </div>
    

                    <div class="form-group">
                        <label for="lokasi_post_adps"> Lokasi </label>
                        <input type="text" name="lokasi_post_adps" id="lokasi_post_adps" 
                        class="form-control @error('lokasi_post_adps') is-invalid @enderror" value="{{$edit->lokasi_post_adps}}" >
                        @error('lokasi_post_adps')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="syarat_adopsi">Syarat Mengadopsi </label>
                        <input type="text" name="syarat_adopsi" id="syarat_adopsi" class="form-control @error('syarat_adopsi')
                        is-invalid @enderror" value="{{$edit->syarat_adopsi}}">
                        @error('syarat_adopsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                

                    <button type="submit" class="btn btn-primary mb-5">Submit</button>

                </div>
            </div>
        </form>
    </div>


@section('content')
