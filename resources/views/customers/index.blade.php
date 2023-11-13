@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Create Customer</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Identity Number</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <th>{{ $customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-primary" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
