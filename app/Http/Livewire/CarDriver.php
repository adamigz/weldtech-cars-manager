<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarDriver as CD;

class CarDriver extends Component
{
    public $driverNameFilter = '';
    public $carRegistrationFilter = '';
    public $dkvNumberFilter = '';

    public function getCarDriver()
    {
        if ($this->driverNameFilter != '') {
            return CD::where('driver_name', 'LIKE', '%'.$this->driverNameFilter.'%')->orderBy('created_at', 'desc')->get()->groupBy('car_registration');
        }
        if ($this->carRegistrationFilter != '') {
            return CD::where('car_registration', 'LIKE', '%'.$this->carRegistrationFilter.'%')->orderBy('created_at', 'desc')->get()->groupBy('car_registration');
        }
        if ($this->dkvNumberFilter != '') {
            return CD::where('dkv_number', 'LIKE', '%'.$this->dkvNumberFilter.'%')->orderBy('created_at', 'desc')->get()->groupBy('car_registration');
        }
        return CD::orderBy('created_at', 'desc')->get()->groupBy('car_registration');
    }
    public function render()
    {
        return view('livewire.car-driver', [
            'cars' => $this->getCarDriver()
        ]);
    }
}
