@extends('admin.layout')

@section('judul','Pemacakan')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 

<div class="container">
    <h3 style="color: black; font-family:sans-serif; text-align:center; margin-top:20px; margin-bottom:30px;"> Pengadopsian </h3>
    <div class="row">
       
       <div class="col-md-1">

       </div>

        <div class="col-md-10" style="padding: 20px; s">
            @include('admin.flash.flash')
             <table class="table"style="background-color: white; box-shadow:grey 1px 1px 2px;">

                <form type="GET" action="#">
                    <input type="text" name="pencarian" class="form-control" id="pencarian" style="float: right; width:250px; margin-left:5px;" placeholder="Masukkan kata kunci">
                    <button type="submit" class="btn btn-primary mb-1" style="float: right;">Cari</button>    
                </form>
                
               <a button type="button" class="btn btn-primary" style="margin-bottom: 10px; " href="{{route('pemacakan.create')}}"> Buat Pemacakan</a> <div class="col-md-12">
                   
                    <tbody>
                        <thead>
                            <tr>
                                <th> Thumbnail </th>
                                <th> Post Title</th>
                                <th> Owner</th>
                                <th> Identitas Hewan </th>
                                <th> Lokasi</th>
                                <th> Tanggal di Buat</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        @foreach ($pemacakan as $listPemacakan)
                            <tr>
                                <td> <img class="card-img-top" src=" {{asset('storage/post/pemacakan/'.$listPemacakan->nama_post_pemacakan.'-'.$listPemacakan->image_post_pm)}}"
                                     style="height: 100px; max-width:100px; border-radius:50%; object-fit:cover; object-position:center;"> </td>
                                <td>{{$listPemacakan->nama_post_adopsi}}</td>
                                <td>Admin</td>
                                <td>{{$listPemacakan->nama_jenis_hewan}} -- {{$listPemacakan->nama_ras_hewan}}</td>
                                <td>{{$listPemacakan->lokasi_post_adps}}</td>
                                <td>{{$listPemacakan->created_at}}</td>
                                <td> 
                                    <a href="{{ route('pemacakan.edit',$listPemacakan->id) }}" class="btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('pemacakan.destroy',$listPemacakan->id) }}" class="btn-sm btn-danger">Delete</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pemacakan->links() }}
            </div>
        </div>

        <div class="col-md-1">

        </div>
    </div>
</div>

@endsection