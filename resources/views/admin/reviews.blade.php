@extends('admin.layout.sidebar')
@section('content')
<table class="table table-bordered">
<thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>User id</th>
        <th>Review</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($reviews as $review)
        <tr id="review-{{ $review->id }}">
            <td>{{ $review->id }}</td>
            <td>{{ $review->user_id }}</td>
            <td>{{ $review->review }}</td>
            <td>
                <form method="post" action="{{route('delete.reviews.admin',$review->id)}}">
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