<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateOrderForm extends Component {
    public $order = null;
    public $vehicles = null;
    public $selectedVehicle = [];
    public $totalPrice = 0;

    public function mount($order, $vehicles) {
        $this->order = $order;
        $this->vehicles = $vehicles;
        $order->vehicles->map(function ($vehicle) {
            array_push($this->selectedVehicle, $vehicle->id);
            $this->totalPrice += $vehicle->price;
        });
    }

    public function addVehicle($vehicleId) {
        array_push($this->selectedVehicle, $vehicleId);
        $vehicle = $this->vehicles->where('id', $vehicleId)->first();
        $this->totalPrice += $vehicle->price;
    }

    public function removeVehicle($vehicleId) {
        $index = array_search($vehicleId, $this->selectedVehicle);
        unset($this->selectedVehicle[$index]);
        $vehicle = $this->vehicles->where('id', $vehicleId)->first();
        $this->totalPrice -= $vehicle->price;
    }

    public function updateOrder() {
        $this->order->vehicles()->detach();
        foreach ($this->selectedVehicle as $vehicleId) {
            $this->order->vehicles()->attach($vehicleId);
        }
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function render() {
        return view('livewire.update-order-form');
    }
}
