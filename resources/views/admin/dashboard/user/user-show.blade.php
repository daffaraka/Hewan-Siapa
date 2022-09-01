@extends('admin.layout')


@section('content')
<div class="container" style="font-family: Montserrat;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center mt-5">
                <h2> Show User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary ml-5" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    
    <div class="row p-5 bg-dark text-light m-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                Name:
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               Email:
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                Roles:
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection