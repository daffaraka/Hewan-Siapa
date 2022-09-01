@extends('frontend.layout-front-end')
@include('frontend.partials-front-end.header-front-end')

@section('judul','Konfirmasi permintaan anda')

@section('content')


    
    <div class="container" style="font-family: Montserrat">
        @include('admin.flash.flash')
        <div class="row">
            <div class="col-md-3 col-xl-4">
                @include('frontend.profile.partials.sidebar-profile')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header bg-info text-light">Konfirmasi permintaan seseorang</h4>
                    <div class="card-body">

                            <p class="card-text">Seseorang telah mengirim permintaan untuk memacakkan hewan anda,dengan identitas : </p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                Hewan Peliharaan Pengaju 
                                            </div>
                                            <div class="card-body">
                                                <img src="{{asset('storage/post/pemacakan/pengajuan/'.$konfirmasiPermintaan->TM_gambar)}}"
                                                class="w-100 mt-2 mb-2 ml-2 rounded"></a>
                                            </div>
                                        </div>
                                     
                                  </div>
                                </div>
                            </div>
                         
                            <table class="table">
                                <thead class="thead-dark">
                                    <th colspan="2" class="text-center">Informasi Pengajuan</th>
                                </thead>
                                <tr>
                                    <td>Nama Pengaju :  </td>
                                    <td>{{$konfirmasiPermintaan->TM_nama_pengaju}} </td>
                                </tr>
                                <tr>
                                    <td>Hewan anda :  </td>
                                    <td> {{$konfirmasiPermintaan->TM_nama_post}} </td>
                                </tr>
                                <tr>
                                    <td>Jenis Hewan : </td>
                                    <td>{{$konfirmasiPermintaan->TM_jenis_hewan_post}} </td>
                                </tr>
                                <tr>
                                    <td>Ras Hewan : </td>
                                    <td>{{$konfirmasiPermintaan->TM_ras_hewan_post}} </td>
                                </tr>
                                <tr>
                                    <td>Alasan : </td>
                                    <td>{{$konfirmasiPermintaan->TM_alasan_memilih}} </td>
                                </tr>
                                <tr>
                                    <td>Contact : </td>
                                    <td>{{$konfirmasiPermintaan->TM_contact_pengaju}} </td>
                                </tr>

                                

                            </table>
                                 Contact dia segera : <a class="btn btn-outline-info p-2 mt-1 rounded" href="https://api.whatsapp.com/send?phone={{$konfirmasiPermintaan->TM_contact_pengaju}}"><i class="fa fa-whatsapp"> </i> {{$konfirmasiPermintaan->TM_contact_pengaju}}</a> <br>
                            
                                    <br>
                             <form action="{{route('profile.terimaPemacakan',$konfirmasiPermintaan->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-lg btn-outline-info mt-2">Terima</button>
                                <a href="{{route('profile.deletePermintaanPemacakan',$konfirmasiPermintaan->id)}}" class="btn btn-lg btn-outline-danger mt-2">Tolak</a>

                            </form>
                                

                            
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection