<div>
    @if ($selectedCustomer == null)
    <p>Choose customer from the list.</p>
  @else
    <p>Choose vehicle from the list.</p>
  @endif
  <div class="mt-12">
    <div>
      @if ($selectedCustomer == null)
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Identity Number</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
              <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ substr($customer->phone, 0, 4) }} -
                  {{ substr($customer->phone, 4, 4) }} - {{ substr($customer->phone, 8, 4) }}</td>
                  <td>
                  <button class="btn btn-primary"
                    wire:click="selectCustomer('{{ $customer->id }}')">Select</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="grid grid-cols-4 gap-14">
          
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Manufacture</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vehicles as $vehicle)
                  <tr class="border-b-2">
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->capacity }}</td>
                    <td>{{ $vehicle->manufacture }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>Rp. {{ number_format($vehicle->price, 0, '.', ',') }}</td>
                    <td>
                      @if (!in_array($vehicle->id, $selectedVehicle))
                        <button class="btn btn-primary"
                          wire:click="addVehicle('{{ $vehicle->id }}')">Select</button>
                      @else
                        <button class="btn btn-danger"
                          wire:click="removeVehicle('{{ $vehicle->id }}')">Remove</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          
          <div>
            <p>Identity Number: {{ $selectedCustomer->id }}</p>
            <p>Name: {{ $selectedCustomer->name }}</p>
            <p>Address: {{ $selectedCustomer->address }}</p>
            <p>Phone: {{ $selectedCustomer->phone }}</p>
          </div>
        </div>
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-primary" wire:click="clear">Back</button>
          <button class="btn btn-primary" wire:click="makeOrder">Make
            Order</button>
        </div>
      @endif
    </div>
  </div>
</div>
