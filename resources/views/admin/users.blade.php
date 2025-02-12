@extends('admin.layout.sidebar')
@section('content')
<h2 class="mb-4">Users</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Posts Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr id="user-{{ $user->id }}">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->posts->count() }}</td>
            <td>
                <form method="post" action="{{route('delete.user.admin',$user->id)}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection