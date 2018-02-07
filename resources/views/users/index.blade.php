@extends('layouts.app')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
@endsection
@section('content')
<div class="row" style="margin-top: 20px">
    <div class="col-lg-12 margin-tb">
        <div class="title">
            <h2 style="text-align: center;">Laravel Dashboard</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group pull-right">
            <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
<table class="table table-bordered">

    <tr>

        <th>ID</th>
        <th>Name</th>

        <th>Email</th>
        <th>Role</th>

        <th width="100px">Action</th>

    </tr>

    @foreach($users as $user)

        <tr>
            <td>{{ $user->id }}</td>
            <td><a href="" class="update" data-name="name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter name">{{ $user->name }}</a></td>

            <td><a href="" class="update" data-name="email" data-type="email" data-pk="{{ $user->id }}" data-title="Enter email">{{ $user->email }}</a></td>

            <td><a href="" class="update" data-name="role" data-type="text" data-pk="{{ $user->id }}" data-title="Enter role">{{ $user->role }}</a></td>

            <td>{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}</td>

        </tr>

    @endforeach        

</table>
{{ $users->links() }}
@endsection
@section('scripts')
<script type="text/javascript">

$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$('.update').editable({

       url: '/update-user',

       type: 'text',

       pk: 1,

       name: 'name',

       title: 'Enter name',
        error: function (response) {
            
            var jsonResponse = JSON.parse(response.responseText);

            return jsonResponse['errors']['value'][0];
        }

});

</script>
@endsection

