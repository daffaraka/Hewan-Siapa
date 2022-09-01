@extends('admin.layout')

@section('judul','Pengadopsian')

@section('content')

    <style>
        td {
            font-size: 14px;
            font-weight: 500;
            text-shadow:grey 0px 0px 0px; 
        }
    </style>

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

                    <form type="GET" action="{{route('adopsi.search')}}">
                        <input type="text" name="pencarian" class="form-control" id="pencarian" style="float: right; width:250px; margin-left:5px;" placeholder="Masukkan kata kunci">
                        <button type="submit" class="btn btn-primary mb-1" style="float: right;">Cari</button>    
                    </form>
                    
                   <a button type="button" class="btn btn-primary" style="margin-bottom: 10px; " href="{{route('adopsi.create')}}"> Buat Adopsi</a> <div class="col-md-12">
                       
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
                            @foreach ($hasilPencarian as $pencarian)
                                <tr>
                                    <td> <img class="card-img-top" src=" {{asset('storage/post/adopsi/'.$pencarian->nama_post_adopsi.'-'.$pencarian->image_post_adps)}}"
                                         style="height: 100px; max-width:100px; border-radius:50%; object-fit:cover; object-position:center;"> </td>
                                    <td>{{$pencarian->nama_post_adopsi}}</td>
                                    <td>Admin</td>
                                    <td>{{$pencarian->nama_jenis_hewan}} -- {{$pencarian->nama_ras_hewan}}</td>
                                    <td>{{$pencarian->lokasi_post_adps}}</td>
                                    <td>{{$pencarian->created_at}}</td>
                                    <td> 
                                        <a href="{{ route('adopsi.edit',['id' => $pencarian->id]) }}" class="btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('adopsi.delete',['id' => $pencarian->id]) }}" class="btn-sm btn-danger">Delete</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $pencarian->links() }} --}}
                </div>
            </div>

            <div class="col-md-1">

            </div>
        </div>
    </div>
    


@endsection