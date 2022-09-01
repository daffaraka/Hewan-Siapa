@extends('admin.layout')

@section('judul','Dashboard Hewan Siapa')
@section('content')

<div class="container">
    <div class="row p-5">
        <div class="col-md-3">
            <div class="counter-box bg-dark text-light rounded p-3"> <i class="fa fa-thumbs-o-up"></i> <span class="counter">2147</span>
                <p>Happy Customers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box bg-dark text-light rounded p-3"> <i class="fa fa-group"></i> <span class="counter">3275</span>
                <p>Registered Members</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box bg-dark text-light rounded p-3"> <i class="fa fa-shopping-cart"></i> <span class="counter">289</span>
                <p>Available Products</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box bg-dark text-light rounded p-3> <i class="fa fa-user"></i> <span class="counter">1563</span>
                <p>Saved Trees</p>
            </div>
        </div>
      
    </div>
</div>

    

@endsection
