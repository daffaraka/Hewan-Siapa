@extends('frontend.layout-front-end')
@include('frontend.partials-front-end.header-front-end')

@section('judul','Profil')

@section('content')


    <div class="container" style="font-family: Montserrat">
        @include('admin.flash.flash')
        <div class="row">
           
            <div class="col-md-3 col-xl-4">
                @include('frontend.profile.partials.sidebar-profile')
            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right p-1">
                                            <a class="dropdown-item" href="{{route('hewan-siapa.createPemacakan')}}">Buat baru</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Kiriman pemacakan anda</h5>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <div class="list-group">
                                        @if(count($pemacakan) == 0 )
                                            <div class="w-100 text-center">
                                            <h5 class="m-5">Anda belum mengirim kiriman pemacakan.</h5>
                                            </div>

                                        @else
                                            @foreach ($pemacakan as $data)
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{asset('storage/post/pemacakan/'.$data->nama_post_pemacakan.'-'.$data->image_post_pm)}}"
                                                        class="w-100 mt-2 mb-2 ml-2 rounded"></a>
                                                    </div>

                                                    @if ($data->status_pm =! 'aktif' )
                                                        <div class="col mt-2 p-0 bg-info">
                                                            <a href="#" class="list-group-item list-group-item-action">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">{{$data->nama_post_pemacakan}}</h5>
                                                                    <small>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>

                                                              <h1>Tidak Aktif</h1>
                                                            </a>
                                                        </div>
                                                    @else

                                                        <div class="col mt-2 mb-2 mr-2 rounded">
                                                            <a href="{{route('hewan-siapa.showPemacakan',$data->id)}}" class="list-group-item list-group-item-action">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">{{$data->nama_post_pemacakan}}</h5>
                                                                <small>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>
                                                                <p class="mb-1">{{$data->status_pm}}</p>
                                                                <p class="mb-1">{{$data->nama_jenis_hewan}}</p>
                                                                <p class="mb-1">{{$data->nama_ras_hewan}}</p>
                                                            </a>
                                                            <a href ={{route('hewan-siapa.showPemacakan',$data->id)}} class="btn btn-outline-primary mt-2">Show </a>
                                                            <a href ={{route('hewan-siapa.editPemacakan',$data->id)}} class="btn btn-outline-info mt-2">Edit </a>
                                                            <a href="{{route('hewan-siapa.deletePemacakan',$data->id) }}" class="btn btn-outline-danger mt-2">Hapus </a>
                                                        </div>
                                                    @endif  
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection