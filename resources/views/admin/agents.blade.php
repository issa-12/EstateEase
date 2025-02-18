@extends('admin.layout.sidebar')
@section('content')
    <h2 class="mb-4">Agents</h2>
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
            @foreach ($agents as $agent)
                <tr id="agent-{{ $agent->id }}">
                    <td>{{ $agent->id }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->posts->count() }}</td>
                    <td>
                        <form method="post" action="{{route('delete.user.admin', $agent->id)}}">
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