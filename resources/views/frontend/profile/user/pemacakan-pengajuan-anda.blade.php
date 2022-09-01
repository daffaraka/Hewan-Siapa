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
                                <h3 class="card-title mb-0 font-weight-bold" style="letter-spacing:0.1">Pengajuan pemacakan  anda</h3>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <div class="list-group">
                                        @if(count($statusPengajuan) == 0)
                                        <div class=" w-100 text-center">
                                            <h5 class="m-5"> <label class="badge-info p-2 rounded">Anda belum mengirimkan permintaan pemacakan.</label> </h5>
                                        </div>

                                        @else

                                            @foreach ($statusPengajuan as $data)
                                                @if($data->TM_konfirmasi == 'belum_dikonfirmasi')
                                                    <div class="row mb-1 mt-1">
                                                        <div class="col m-3">
                                                            {{-- <a href="{{route('profile.detailPengajuanAnda',$data->id)}}" class="list-group-item list-group-item-action"> --}}
                                                                <div class="d-flex w-100 justify-content-between mt-2">
                                                                <h5 class="mb-1">{{$data->TM_nama_post}}</h5>
                                                                <small>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>
                                                                <p class="mb-1"> <label class="badge-warning rounded p-2 mt-2 mb-2">Belum dikonfirmasi</label> </p>
                                                                <h6 class="m-0">Anda telah mengajukan permintaan adopsi terhadap postingan milik <b>{{$data->TM_nama_owner_post}} </b>. <br> </h6>
                                                                <h6>Silahkan menunggu konfirmasi.</h6>
                                                            {{-- </a> --}}
                                                        </div>
                                                    </div>

                                                @elseif ($data->TM_konfirmasi == 'diterima')
                                                    <div class="row pl-3 pr-3 mb-1 mt-1">
                                                        <div class="col text-dark p-3">
                                                            {{-- <a href="{{route('profile.detailPengajuanAnda',$data->id)}}" class="list-group-item list-group-item-action"> --}}
                                                                <div class="d-flex w-100 justify-content-between mt-2">
                                                                <h4 class="mb-1">{{$data->TM_nama_post}}</h4>
                                                                <small>{{$data->updated_at->diffForHumans()}}</small>
                                                                </div>
                                                                <p class="mb-1"> <label class="badge-primary rounded p-2 mt-2 mb-2">Diterima </label></p>
                                                                <h6 class="m-0">Anda telah mengajukan permintaan adopsi terhadap postingan milik <b>{{$data->TM_nama_owner_post}} </b>  . <br> </h6>
                                                                <h6>Owner telah setuju dengan permintaan anda. <br> Silahkan hubungi kontak  : <a class="btn btn-info p-1" href=""> <i class="fa fa-whatsapp"></i> {{$data->TM_contact_pengaju}}</a> </h6>
                                                            {{-- </a> --}}
                                                        </div>
                                                    </div>
                                                @elseif($data->TM_konfirmasi == 'ditolak')
                                                    <div class="row pl-3 pr-3 mb-1 mt-1">
                                                        <div class="col mb-1 mt-1 bg-light">
                                                            {{-- <a href="{{route('profile.detailPengajuanAnda',$data->id)}}" class="list-group-item list-group-item-action"> --}}
                                                                <div class="d-flex w-100 justify-content-between mt-2">
                                                                <h4 class="mb-1">{{$data->TM_nama_post}}</h4>
                                                                <small clas>{{$data->created_at->diffForHumans()}}</small>
                                                                </div>
                                                                <p class="mb-1"> <label class="badge-danger rounded p-2 mt-2 mb-2">Ditolak </label></p>
                                                                <h6 class="m-0">Anda telah mengajukan permintaan adopsi terhadap postingan milik <b>{{$data->TM_nama_owner_post}} </b>. <br> </h6>
                                                                <h6>Owner telah menolak pengajuan pemacakan anda. Silahkan mencari alternatif lain.</h6>
                                                            {{-- </a> --}}
                                                        </div>
                                                    </div>
                                                @endif
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