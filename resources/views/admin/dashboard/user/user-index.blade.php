@extends('admin.layout')

@section('judul','User Management')

@section('content')
          <div class="container bg-light p-5">
            <div class="row">
              <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-dark text-center">Users Management</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success mb-2 mt-2" href="{{ route('user.create') }}"> Create New User</a>
                </div>
              </div>
             </div>


            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif


            <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
                  <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
            </table>


            {!! $data->render() !!}


          </div>
@endsection