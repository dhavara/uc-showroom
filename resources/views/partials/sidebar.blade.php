<div class="w-96 border-r-2 h-screen bg-gray fixed left-0 top-0 z-50">
  <div class="mx-6 mb-4">
    <div class="py-8 mb-6">
      <h1 class="font-bold">UC-Showroom</h1>
    </div>
    <div>
      <div class="flex flex-col gap-4">
        <div class="flex gap-3 items-center py-2.5 px-3.5 rounded-lg {{ request()->routeIs('home') ? 'bg-gray-100 text-blue-600' : '' }}">
          <i data-feather="home"></i>
          <a class="text-xl font-medium no-underline" href="{{ route('home') }}">Dashboard</a>
        </div>
        <div
          class="flex gap-3 items-center py-2.5 px-3.5 rounded-lg {{ request()->routeIs('orders.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <i data-feather="shopping-cart"></i>
          <a class="text-xl font-medium no-underline" href="{{ route('orders.index') }}">Order</a>
        </div>
        <div class="flex gap-3 items-center py-2.5 px-3.5 rounded-lg {{ request()->routeIs('customers.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <i data-feather="user"></i>
          <a class="text-xl font-medium no-underline" href="{{ route('customers.index') }}">Customer</a>
        </div>
        <div class="flex gap-3 items-center py-2.5 px-3.5 rounded-lg {{ request()->routeIs('vehicles.*') ? 'bg-gray-100 text-blue-600' : '' }}">
          <i data-feather="box"></i>
          <a class="text-xl font-medium no-underline" href="{{ route('vehicles.index') }}">Vehicle</a>
        </div>
      </div>
    </div>
  </div>
</div>
