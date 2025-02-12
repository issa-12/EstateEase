@extends('admin.layout.sidebar')
@section('content')
<h2 class="mb-4">Requests to become an agents</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Request ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Posts Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr id="request-{{ $request->id }}">
            <td>{{ $request->id }}</td>
            <td>{{ $request->user_id }}</td>
            <td>{{ $request->user->name }}</td>
            <td>{{ $request->user->email }}</td>
            <td>{{ $request->user->posts->count() }}</td>
            <td>
                <form method="post" action="{{route('manage.request.admin',$request->id)}}">
                    @csrf
                    <input type="submit" value="☑️ Approve" name="approve" class="btn btn-group-vertical btn-sm">
                    <input type="submit" value="❌ Denied" name="denied" class="btn btn-group-vertical btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection