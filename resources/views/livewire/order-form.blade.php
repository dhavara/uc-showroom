<div>
  @if (session()->has('error'))
    @include('components.error-notification', ['message' => session('error')])
  @endif
  @if ($selectedCustomer == null)
    <p>Choose customer from the list.</p>
  @else
    <p>Choose vehicle from the list.</p>
  @endif
  <div class="mt-12">
    <div>
      @if ($selectedCustomer == null)
        <table class="w-full">
          <thead class="border-b-2">
            <tr>
              <th class="w-1/12 text-left font-medium pb-4"></th>
              <th class="w-1/6 text-left font-medium pb-4">ID Card</th>
              <th class="w-1/6 text-left font-medium pb-4">Name</th>
              <th class="w-1/6 text-left font-medium pb-4">Address</th>
              <th class="w-1/6 text-left font-medium pb-4">Phone</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
              <tr class="border-b-2">
                <td class="py-4 text-center">
                  <button class="bg-blue-600 py-1.5 px-3 text-white font-semibold rounded"
                    wire:click="selectCustomer('{{ $customer->id }}')">Select</button>
                </td>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ substr($customer->phone, 0, 4) }} -
                  {{ substr($customer->phone, 4, 4) }} - {{ substr($customer->phone, 8, 4) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="grid grid-cols-4 gap-12">
          <div class="mt-8 col-span-3">
            <table class="w-full">
              <thead class="border-b-2">
                <tr>
                  <th class="w-1/12 text-left font-medium pb-4"></th>
                  <th class="w-1/12 text-left font-medium pb-4">Model</th>
                  <th class="w-1/12 text-left font-medium pb-4">Year</th>
                  <th class="w-1/12 text-left font-medium pb-4">Passenger Capacity</th>
                  <th class="w-1/12 text-left font-medium pb-4">Manufacture</th>
                  <th class="w-1/12 text-left font-medium pb-4">Type</th>
                  <th class="w-1/12 text-left font-medium pb-4">Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vehicles as $vehicle)
                  <tr class="border-b-2">
                    <td class="py-4 text-center">
                      @if (!in_array($vehicle->id, $selectedVehicle))
                        <button class="bg-blue-600 py-1.5 px-3 text-white font-semibold rounded"
                          wire:click="addVehicle('{{ $vehicle->id }}')">Select</button>
                      @else
                        <button class="bg-red-600 py-1.5 px-3 text-white font-semibold rounded"
                          wire:click="removeVehicle('{{ $vehicle->id }}')">Remove</button>
                      @endif
                    </td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->capacity }}</td>
                    <td>{{ $vehicle->manufacture }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>Rp. {{ number_format($vehicle->price, 0, '.', ',') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="p-5 rounded-lg border-2">
            <p class="font-semibold text-xl mb-6">Order Summary</p>
            <p>ID Card: {{ $selectedCustomer->id }}</p>
            <p>Name: {{ $selectedCustomer->name }}</p>
            <p>Address: {{ $selectedCustomer->address }}</p>
            <p>Phone: {{ $selectedCustomer->phone }}</p>
            <hr class="my-8" />
            <div class="flex justify-between items-center">
              <p class="font-semibold">Total</p>
              <p>Rp. {{ number_format($totalPrice, 0, '.', ',') }}</p>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-end mt-8 gap-8">
          <button wire:click="clear">Back</button>
          <button class="bg-blue-600 font-semibold text-white py-2 px-3 rounded-md border-0" wire:click="makeOrder">Make
            Order</button>
        </div>
      @endif
    </div>
  </div>
</div>
