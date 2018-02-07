@extends('layouts.app')

@section('header')
    <title>Laravel 5.5 CRUD Application</title>
@section('content')

<div class="row" style="margin-top: 20px">
    <div class="col-lg-12 margin-tb">
        <div class="title">
            <h2 style="text-align: center;">Laravel Members CRUD</h2>
        </div>
    </div>
</div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <dir class="message-update"></dir>
    <form method="GET" action="{{ route('members.index') }}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Enter key search" value="{{ old('search') }}" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn btn-success btn-sm">Search</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('members.create') }}"> Create New Member</a>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First name</th>
            <th>Surname</th>
            <th>Email</th>
            <th width="100px">Action</th>
        </tr>
    @foreach ($members as $member)
    <tr>
        <td>{{ $member->id }}</td>
        <td contenteditable='true' onblur="edit_inline(this,{{ $member->id }},'first_name')">{{ $member->first_name}}</td>
        <td contenteditable='true' onblur="edit_inline(this,{{ $member->id }},'surname')">{{ $member->surname}}</td>
        <td contenteditable='true' onblur="edit_inline(this,{{ $member->id }},'email')">{{ $member->email}}</td>
        <td>
            <!-- <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a> -->
            {!! Form::open(['method' => 'DELETE','route' => ['members.destroy', $member->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {{ $members->links() }}
@endsection
@section('scripts')
<script type="text/javascript">
        function edit_inline(obj,id,colum) {
            var value = $(obj).text();
             $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : 'members/'+id,
                type : "PATCH",
                dataType:"json",
                data : {
                    id: id,
                    value:value,
                    colum:colum
                },
                success : function (result){
                    $(".message-update").css("background-color", "#dff0d8");
                    $(".message-update").css('color', '#3c763d');
                    $(".message-update").css('padding', '15px');
                    if($.isEmptyObject(result.error)){
                        $('.message-update').html(result.success);
                    }else{
                        $('.message-update').html(result.error);
                    }
                }
            });
        }
    </script>
@endsection
