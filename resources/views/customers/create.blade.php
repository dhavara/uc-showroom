@extends('layouts.app')
@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissable custom-warning-box" style="margin: 15px;">{{ $error }}
            </div>
        @endforeach
    @endif
    <form class="form-floating" action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-outline mb-4">
            <label for="id">Identity Number</label>
            <input type="number" name="id" id="id" pattern="\d*" maxlength="16" class="form-control" required />
        </div>

        <div class="form-outline mb-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required />
        </div>

        <div class="form-outline mb-4">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required />
        </div>

        <div class="form-outline mb-4">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" pattern="\d*" maxlength="12" class="form-control" required />
        </div>

        <!-- Submit button -->
        <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
    </form>
@endsection
