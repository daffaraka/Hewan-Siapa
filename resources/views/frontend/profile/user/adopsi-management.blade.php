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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('hewan-siapa.createAdopsi')}}">Buat baru</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Kiriman adopsi anda</h5>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <div class="list-group">
                                        @if(count($adopsi) == 0)
                                        <div class="w-100 text-center">
                                            <h5 class="m-5">Tidak ada data</h5>
                                        </div>

                                        @else

                                            @foreach ($adopsi as $data)
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{asset('storage/post/adopsi/'.$data->nama_post_adopsi.'-'.$data->image_post_adps)}}"
                                                        class="w-100 mt-2 mb-2 ml-2 rounded"></a>
                                                    </div>

                                                    @if ($data->status_adopsi != 'aktif')
                                                        <div class="col mt-2 p-0 bg-info">
                                                            <a href="#" class="list-group-item list-group-item-action">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">{{$data->nama_post_adopsi}}</h5>
                                                                    <small>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>

                                                              <h1>Tidak Aktif</h1>
                                                            </a>
                                                        </div>
                                                    @else

                                                        <div class="col mt-2 mb-2">
                                                            <a href="#" class="list-group-item list-group-item-action">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                <h4 class="mb-1">{{$data->nama_post_adopsi}}</h4>
                                                                <small>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>
                                                                <p class="mb-1">{{$data->nama_jenis_hewan}}</p>
                                                                <p class="mb-1">{{$data->nama_ras_hewan}}</p>
                                                                
                                                            </a>
                                                            <label class="btn btn-outline-info p-2 mt-1 rounded">
                                                               <h4 class="m-0">
                                                                <a class="text-dark" href="https://api.whatsapp.com/send?phone={{$data->kontak_adopsi}}">
                                                                    <i class="fa fa-whatsapp"> </i> {{$data->kontak_adopsi}}</a>
                                                               </h4>
                                                               
                                                            </label>
                                                            <br>
                                                            <a href="{{route('hewan-siapa.showAdopsi',$data->id)}}" class="btn btn-outline-primary mt-2">Show </a>
                                                            <a href="{{route('hewan-siapa.editAdopsi',$data->id)}}" class="btn btn-outline-info mt-2">Edit </a>
                                                            <a href="{{route('hewan-siapa.deleteAdopsi',$data->id)}}" id="delete-adopsi" class="btn btn-outline-danger mt-2">Hapus </a>
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

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
           $(document).on('click', '.btn', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                        title: "Are you sure!",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                    },
                    function() {
                        $.ajax({
                            type: "GET",
                            data: {id:id},
                            url: "{{url('/hewan-siapa/deleteAdopsi')}}" + id,
                            success: function (data) {
                                        //
                                }         
                        });
                });
            });
        </script>

@endsection