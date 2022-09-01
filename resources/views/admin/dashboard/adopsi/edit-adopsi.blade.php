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
            
                <form action="{{route('adopsi.update',$adopsi->id)}}" method="POST" enctype="multipart/form-data" class="col-md-12" >
                    @csrf
                    <div class="container" style="padding: 10px">
                        <div class="row" style="padding: 20px;box-shadow: grey 0 0 3px; border-radius:5px;">
                            
                            <div class="col-md-5" style="margin-top:30px;">
                                <img id="preview-image-before-upload" src="{{asset('storage/post/adopsi/'.$adopsi->nama_post_adopsi.'-'.$adopsi->image_post_adps)}}"
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
                                    <input type="text" name="nama_post_adopsi" id="nama_post_adopsi" 
                                    class="form-control @error('nama_post_adopsi') is-invalid @enderror" value="{{$adopsi->nama_post_adopsi}}">
                                    @error('nama_post_adopsi')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_post_adopsi"> Jenis Post</label>
                                    <input type="text" name="jenis_post" id="jenis_post" class="form-control @error('jenis_post') is-invalid @enderror" value="{{$adopsi->jenis_post}}">
                                    @error('jenis_post')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi_post"> Deskripsi Post</label>
                                    <textarea type="text" name="deskripsi_post_adps" id="deskripsi_post_adps" 
                                    cols="30" rows="5" class="form-control @error('deskripsi_post_adps') is-invalid @enderror" >{{$adopsi->deskripsi_post_adps}}</textarea>
                                    @error('deskripsi_post_adps')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_post_adps"> Lokasi </label>
                                    <input type="text" name="lokasi_post_adps" id="lokasi_post_adps" 
                                    class="form-control @error('lokasi_post_adps') is-invalid @enderror" value="{{$adopsi->lokasi_post_adps}}" >
                                    @error('lokasi_post_adps')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>

                                <div class="form-group">
                                    <label for="syarat_adopsi">Syarat Mengadopsi </label>
                                    <input type="text" name="syarat_adopsi" id="syarat_adopsi" class="form-control @error('syarat_adopsi')
                                     is-invalid @enderror" value="{{$adopsi->syarat_adopsi}}">
                                    @error('syarat_adopsi')
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
                                        {{-- @foreach ($jenisHewan as $data)
                                        @if($data->ChildrenRasHewan))
                                            @foreach ($data->ChildrenRasHewan as $rasHewan )
                                            <option value="{{$rasHewan->id}}">{{$rasHewan->nama_ras_hewan}}</option>
                                            @endforeach
                                        @endif
                                     @endforeach --}}
                                        <select name="ras_hewan_id" id="ras_hewan_id" class="ras_hewan form-control"></select>
                                    </select>
                                </div>

                             
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </div>
                        
                </form>
      
           
   
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
                <script type="text/javascript">
                      
                     // Show image sebelum upload 
                    $(document).ready(function (e) {
                    
                    
                        $('#image_post_adps').change(function(){
                                    
                            let reader = new FileReader();
                        
                            reader.onload = (e) => { 
                        
                            $('#preview-image-before-upload').attr('src', e.target.result); 
                            }
                        
                            reader.readAsDataURL(this.files[0]); 
                        
                        });
                    
                    });


                    // Dynamic Dropdown

                    // jQuery(document).ready(function ()
                    // {
                    //         jQuery('select[name="jenis_hewan_id"]').on('change',function(){
                    //         var jenishewan_ID = jQuery(this).val();
                    //         if(jenishewan_ID)
                    //         {
                    //             jQuery.ajax({
                    //                 url : 'create/getJenisHewan/' +jenishewan_ID,
                    //                 type : "GET",
                    //                 data: {'id':id}
                    //                 dataType : "json",
                    //                 success:function(data)
                    //                 {
                    //                     console.log(data);
                    //                     jQuery('select[name="ras_hewan_id"]').empty();
                    //                     jQuery.each(data, function(key,value){
                    //                     $('select[name="ras_hewan_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    //                     });
                    //                 }
                    //             });
                    //         }
                    //         else
                    //         {
                    //             $('select[name="ras_hewan_id"]').empty();
                    //         }
                    //         });
                    // });

                    
                 

                        $(document).on('change','.jenis_hewan',function(){
                        // console.log("hmm its change");

                        var jenis_hewan_ID=$(this).val();
                        
                        // console.log(cat_id);
                        var div=$(this).parent().parent();

                        var op=" ";

                        $.ajax({
                            type:'get',
                            url:'edit/findRasHewanOnEdit',
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