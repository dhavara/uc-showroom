@extends('layouts.app')
@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissable custom-warning-box" style="margin: 15px;">{{ $error }}
    </div>
@endforeach
@endif

<form class="form-floating" action="{{ route('customers.update', $customer->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-outline mb-4">
        <label for="id">Identity Number</label>
        <input type="number" name="id" id="id" pattern="\d*" maxlength="16" class="form-control"  value="{{ old('id', $customer->id) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control"  value="{{ old('name', $customer->name) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control"  value="{{ old('address', $customer->address) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" pattern="\d*" minlength="9" maxlength="12" class="form-control"  value="{{ old('phone', $customer->phone) }}" required/>
    </div>

  <!-- Submit button -->
  <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>

@endsection
