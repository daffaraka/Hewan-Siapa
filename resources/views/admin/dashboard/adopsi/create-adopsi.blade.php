@extends('admin.layout')

@section('judul','Buat Post Adopsi Baru')

@section('content')

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  --}}

    @include('admin.flash.flash')      
            
                <form action="{{route('adopsi.store')}}" method="POST" enctype="multipart/form-data" class="col-md-12" >
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
                                  
                                    @error('deskripsi_post_pm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="lokasi_post_pm"> Lokasi </label>
                                    <input type="text" name="lokasi_post_pm" id="lokasi_post_pm" class="form-control @error('lokasi_post_pm') is-invalid @enderror" placeholder="" >

                                    
                                    @error('lokasi_post_pm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="syarat_pemacakan">Syarat Memacakkan dengan hewan Saya </label>
                                    <textarea type="text" name="syarat_pemacakan" id="syarat_pemacakan" cols="30" rows="3" class="form-control @error('syarat_pemacakan') is-invalid @enderror" placeholder="" > </textarea>
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
 
                <script type="text/javascript">
                      
                     // Show image sebelum upload 
                    $(document).ready(function (e) {
                    
                    
                        $('#image_post_pm').change(function(){
                                    
                            let reader = new FileReader();
                        
                            reader.onload = (e) => { 
                        
                            $('#preview-image-before-upload').attr('src', e.target.result); 
                            }
                        
                            reader.readAsDataURL(this.files[0]); 
                        
                        });
                    
                    });

                    
                 

                $(document).on('change','.jenis_hewan',function(){
                    // console.log("hmm its change");

                    var jenis_hewan_ID=$(this).val();
                    
                    // console.log(cat_id);
                    var div=$(this).parent().parent();

                    var op=" ";

                    $.ajax({
                        type:'get',
                        url:'create/findRasHewan',
                        data:{'id':jenis_hewan_ID},
                        success:function(data){
                            //console.log('success');

                            //console.log(data);

                            //console.log(data.length);
                            op+='<option value="0" selected disabled>Pilih Ras Hewan</option>';
                            for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nama_ras_hewan+'</option>';
                        }

                        div.find('.ras_hewan').html(" ");
                        div.find('.ras_hewan').append(op);
                        },
                        error:function(){

                        }
                    });
                });

                 
                </script>
              
@endsection