@extends('admin.layout')


@section('judul','Detail Role')

@section('content')
<div class="container p-5 text-dark" >
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center"> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-5" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    
    <div class="row shadow-lg rounded p-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection