@extends('admin.layout')

@section('judul', 'Daftar Jenis Hewan')

@section('content')
<div class="col-md-12" style="padding: 20px">
    @include('admin.flash.flash')
    <a button type="button" href="{{route('jenishewan.create')}}" class="btn btn-primary" style="margin-bottom: 10px; margin-left:15px;"> Buat Baru</a>
    <select name="filter" id="" class="form-control" style="width: 100px; float: right; margin-rigth:50px;">
        <option value="">Filter</option>
        <option value="">Nama a-z</option>
        <option value="">Nama z-a</option>
    </select>
    
    <div class="col-md-12">
        <table class="table"style="background-color: white">
            <tbody >
                <thead>
                    <tr>
                        <th>Jenis Hewan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                @foreach ($data as $d )
                
                <tr>
                    <td> {{$d->nama_jenis_hewan}} </td>
                    <td>
                        <a href="jenishewan/{{$d->id}}/edit" class="btn btn-success">Edit</a>
                        <a href="jenishewan/delete/{{$d->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                @endforeach
                
                
            </tbody>
            
        </table>
        {{ $data->links() }}
    </div>
   
</div>

@endsection