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

                        <form action="{{route('profile.TerimaAdopsi',$konfirmasiPermintaan->id )}} )" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class="card-text">Seseorang telah mengirim permintaan untuk mengadopsi hewan anda ! </p> <br>
                            <p> Dengan detail data sebagai berikut : </p>

                            <table class="table">
                                <thead class="thead-dark">
                                    <th colspan="2" class="text-center">Informasi Pengajuan</th>
                                </thead>
                                <tr>
                                    <td>Nama Pengaju :  </td>
                                    <td>{{$konfirmasiPermintaan->TA_nama_pengaju}} </td>
                                </tr>
                                <tr>
                                    <td>Hewan anda :  </td>
                                    <td> {{$konfirmasiPermintaan->TA_nama_post}} </td>
                                </tr>
                                <tr>
                                    <td>Jenis Hewan : </td>
                                    <td>{{$konfirmasiPermintaan->TA_jenis_hewan}} </td>
                                </tr>
                                <tr>
                                    <td>Ras Hewan : </td>
                                    <td>{{$konfirmasiPermintaan->TA_ras_hewan}} </td>
                                </tr>
                                <tr>
                                    <td>Alasan : </td>
                                    <td>{{$konfirmasiPermintaan->TA_alasan_memilih}} </td>
                                </tr>
                                <tr>
                                    <td>Contact : </td>
                                    <td>{{$konfirmasiPermintaan->TA_contact_pengaju}} </td>
                                </tr>
                                
                            </table>
                        
                            <p>   
                             <br>
                                Beri dia konfirmasi dan segera bertemu dengan pemilik baru hewan anda.
                                
                                <br> <br>
                                Contact dia segera : 
                                <label class="btn btn-outline-info p-2 mt-1 rounded">
                                     <a class="text-dark font-weight-bold" href="https://api.whatsapp.com/send?phone={{$konfirmasiPermintaan->TA_contact_pengaju}}">
                                         <i class="fa fa-whatsapp"> </i> {{$konfirmasiPermintaan->TA_contact_pengaju}}</a>
                                    
                                 </label> <br>
                            
                                    <button type="submit" class="btn btn-lg btn-outline-info mt-4">Terima</button>
                                    <a href="{{route('profile.deletePermintaanAdopsi',$konfirmasiPermintaan->id)}}" class="btn btn-lg btn-outline-danger mt-4">Tolak</a>
                        </form>
                         
                            
                            </b> 
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection