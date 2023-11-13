  <div class="mx-6 mb-4">
        <div class="{{ request()->routeIs('home') ? 'bg-gray-100 text-blue-600' : '' }}">
          <a href="{{ route('home') }}">Dashboard</a>
        </div>
        <div
          class="{{ request()->routeIs('orders.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <a href="{{ route('orders.index') }}">Order</a>
        </div>
        <div class="{{ request()->routeIs('customers.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <a href="{{ route('customers.index') }}">Customer</a>
        </div>
        <div class="{{ request()->routeIs('vehicles.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <a href="{{ route('vehicles.index') }}">Vehicle</a>
        </div>
  </div>

