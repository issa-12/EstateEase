@extends('admin.layout.sidebar')
@section('content')
    <h2 class="mb-4">properties</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Owner id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image name</th>
                <th>Address</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Price</th>
                <th>type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr id="property-{{ $property->id }}">
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->user_id }}</td>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->description }}</td>
                    <td>{{ $property->image }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->beds }}</td>
                    <td>{{ $property->baths }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->type }}</td>
                    <td>
                        <form method="post" action="{{route('delete.property.admin', $property->id)}}">
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