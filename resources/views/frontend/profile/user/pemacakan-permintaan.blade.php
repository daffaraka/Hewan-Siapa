@extends('frontend.layout-front-end')
@include('frontend.partials-front-end.header-front-end')

@section('judul','Profil')

@section('content')
@include('admin.flash.flash')

    <div class="container" style="font-family: Montserrat">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Permintaan pemacakan hewan anda</h5>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <div class="list-group">
                                        @if(count($permintaanPemacakan) == 0)
                                        <div class="w-100 text-center">
                                            <h5 class="m-5">Belum terdapat permintaan pemacakan </h5>
                                        </div>

                                        @else

                                            @foreach ($permintaanPemacakan as $data)
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{asset('storage/post/pemacakan/pengajuan/'.$data->TM_gambar)}}"
                                                        class="w-100 mt-2 mb-2 ml-2 rounded"></a>
                                                    </div>


                                                        <div class="col mt-2 mb-2">
                                                            
                                                                <a href="{{route('profile.konfirmasiPemacakan',$data->id)}}" class="list-group-item list-group-item-action">
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">{{$data->TM_nama_post}}</h5>
                                                                    <small>{{$data->created_at->diffForHumans()}}</small>
                                                                    </div>
                                                                    <p class="mb-1">{{$data->status_adopsi}}</p>
                                                                    <p class="mb-1">{{$data->TM_jenis_hewan_pengaju}}</p>
                                                                    <p class="mb-1">{{$data->TM_ras_hewan_pengaju}}</p>
                                                                     <p> Pengirim ajuan permintaan : <label class="btn btn-outline-info p-1 pl-2 pr-2 rounded"> {{$data->TM_nama_pengaju}}</label></p> 
                                                                </a>

                                                         
                                                        </div>
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