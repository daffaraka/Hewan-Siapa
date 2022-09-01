@extends('admin.layout')

@section('judul','Ras Hewan')


@section('content')
<div class="container">
    <div class="row" style="padding: 30px">
       
        <div class="col-md-12">
            @include('admin.flash.flash')     
        </div>
        <div class="col-md-4" style="box-shadow: grey 0 0 3px; border-radius:5px; margin-top:70px; ">
          
            <h4 style="margin-top:10px; text-align: center; color : black;">Tambah ras hewan baru</h4>
            <form action="{{route('rashewan.store')}}" method="post" style="margin-top: 15px">
                @csrf
               

                {{-- Input untuk golongan jenis hewan dengan select option --}}
                <div class="form-group">
                    <label for="jenis_hewan_id"> <h5>Golongan Jenis Hewan </h5></label>
                    <select type="text" name="jenis_hewan_id" id="jenis_hewan_id" class="form-control"> 
                        <option value="" hidden>Choose Animal</option>
                            @foreach ($jenisHewan as $data)
                                <option value="{{$data->id}}">{{$data->nama_jenis_hewan }}</option>
                            @endforeach
                    </select>
                </div>

                 {{-- Input untuk nama hewan --}}
                 <div class="form-group">
                    <label for="nama_ras_hewan"> <h5 class=""> Nama Ras Hewan </h5></label>
                    <input type="text" name="nama_ras_hewan" id="nama_ras_hewan" class="form-control"> 
                </div>

                {{-- Tombol untuk save --}}
                <div class="form-group">
                    <button class="btn btn-primary btn-md">
                        <i class="fa fa-send"></i> Save
                    </button>
                </div>
            </form>
        </div>

        <div class="col-md-1">

        </div>

        <div class="col-md-7" style="box-shadow: grey 0 0 3px; border-radius:5px; margin-top:70px;" >
            <table class="table"style="background-color: white; box-shadow: grey 0 0 3px; border-radius:5px;">
                <div class="table-heading">
                    <h4 style="color: black; text-align:center; margin-top:10px; margin-bottom:10px">Data Ras Hewan </h4> 

                    {{-- Pencarian --}}
                    <form type="GET" action="{{route('rashewan.search')}}">
                        <input type="text" name="pencarian" class="form-control w-50 d-inline" id="pencarian" placeholder="Masukkan kata kunci">
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>    
                    </form>
                 
                    
                    <select name="filter" id="" class="form-control" style="width: 100px; float: right; margin-bottom:10px;">
                        {{-- Filter --}}
                        <option value="">Filter</option>
                        <option value="">Nama a-z</option>
                        <option value="">Nama z-a</option>
                    </select>
                </div>  
                <tbody>
                    {{--  Tabel --}}
                    <thead>
                        <tr style="background-color: #a0a9b3">
                            {{-- Nama Kolom --}}
                            <th>Ras Hewan</th>
                            <th>Jenis Hewan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($RasHewan as $data)
                        <tr> 
                            {{-- Data --}}
                            <td>{{$data->nama_ras_hewan}}</td>
                            <td>{{$data->parent_ras_jenis_hewan}}</td>
                            <td>
                                <a href="rashewan/{{$data->id}}/edit" class="btn btn-success">Edit</a>
                                <a href="{{ route('rashewan.delete',['id' => $data->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $RasHewan->links() }}
        </div>
    </div>
</div>




@endsection