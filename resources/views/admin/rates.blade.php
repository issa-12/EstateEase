@extends('admin.layout.sidebar')
@section('content')
<table class="table table-bordered">
<thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>user id</th>
        <th>Rate</th>
        <th>Comment</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($rates as $rate)
        <tr id="rate-{{ $rate->id }}">
            <td>{{ $rate->id }}</td>
            <td>{{ $rate->user_id }}</td>
            <td>{{ $rate->rate }}</td>
            <td>{{ $rate->Comment }}</td>
            <td>
                <form method="post" action="{{route('delete.rate.admin',$rate->id)}}">
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