@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Capacity</th>
            <th scope="col">Manufacture</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
            <th>{{ $vehicle->id }}</th>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>{{ $vehicle->capacity }}</td>
            <td>{{ $vehicle->manufacture }}</td>
            <td>Rp. {{ number_format($vehicle->price, 0, '.', ',') }}</td>
            <td>{{ $vehicle->type }}</td>
            <td>
                <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-primary" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
