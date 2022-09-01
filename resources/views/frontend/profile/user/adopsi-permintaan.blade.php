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
                                <h5 class="card-title mb-0">Permintaan masuk</h5>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <div class="list-group">
                                        @if(count($permintaanAdopsi) == 0)
                                        <div class="">
                                            <h5 class="m-5 text-center">Tidak ada data</h5>
                                        </div>

                                        @else

                                            @foreach ($permintaanAdopsi as $data)
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{route('profile.konfirmasiAdopsi',$data->id)}}" class="list-group-item list-group-item-action">
                                                            <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">Kiriman :  {{$data->TA_nama_post}}</h5>
                                                            <small>{{$data->created_at->diffForHumans()}}</small>
                                                            </div>
                                                            <hr>
                                                            <p class="mb-1">{{$data->status_adopsi}}</p>
                                                            <h6>Seorang pengguna bernama <label class="badge badge-info">{{$data->TA_nama_pengaju}} </label> mengajukan permintaan mengadopsi</h6>
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
    </div>
    
@endsection