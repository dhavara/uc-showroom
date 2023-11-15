@extends('layouts.app')
@section('content')
@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissable custom-warning-box" style="margin: 15px;">{{ $error }}
            </div>
        @endforeach
    @endif
<form class="form-floating" action="{{ route('vehicles.store') }}" method="POST">
    @csrf
    <div class="form-outline mb-4">
        <label for="model">Model</label>
        <input type="text" name="model" id="model" class="form-control" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" minlength="4" maxlength="4" class="form-control" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="capacity">Passenger</label>
        <input type="number" name="capacity" id="capacity" minlength="2" maxlength="2" class="form-control" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="manufacture">Manufacture</label>
        <input type="text" name="manufacture" id="manufacture" class="form-control" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" maxlength="12" class="form-control" required/>
    </div>

    <livewire:vehicle-type-radio vehicle="" />
  <!-- Submit button -->
  <a href="{{ route('vehicles.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>

@endsection
