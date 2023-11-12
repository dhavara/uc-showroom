<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderForm extends Component {
    public $customers;
    public $vehicles;
    public $selectedCustomer = null;
    public $selectedVehicle = [];
    public $totalPrice = 0;
    public $isDataEmpty = true;

    public function mount($customers, $vehicles) {
        $this->customers = $customers;
        $this->vehicles = $vehicles;
    }

    public function selectCustomer($customerId) {
        $this->selectedCustomer = User::find($customerId);
    }

    public function addVehicle($vehicleId) {
        array_push($this->selectedVehicle, $vehicleId);
        $vehicle = $this->vehicles->where('id', $vehicleId)->first();
        $this->totalPrice += $vehicle->price;
        $this->isDataEmpty = false;
    }

    public function removeVehicle($vehicleId) {
        $index = array_search($vehicleId, $this->selectedVehicle);
        unset($this->selectedVehicle[$index]);
        $vehicle = $this->vehicles->where('id', $vehicleId)->first();
        $this->totalPrice -= $vehicle->price;
        if (count($this->selectedVehicle) == 0) {
            $this->isDataEmpty = true;
        }
    }

    public function clear() {
        $this->selectedCustomer = null;
        $this->selectedVehicle = [];
        $this->totalPrice = 0;
    }

    public function makeOrder() {
        if (!$this->isDataEmpty) {
            $order = new Order();
            $order->user_id = $this->selectedCustomer->id;
            $order->save();

            foreach ($this->selectedVehicle as $vehicleId) {
                $order->vehicles()->attach($vehicleId);
            }

            $this->clear();
            return redirect()->route('orders.index')->with('success', 'Order created successfully!');
        } else {
            return redirect()->route('orders.create')->with('error', 'Please select at least one vehicle!');
        }
    }

    public function render() {
        return view('livewire.order-form');
    }
}
