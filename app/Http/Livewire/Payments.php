<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Carbon\Carbon;

class Payments extends Component
{
    public $driverNameFilter='';
    public $carRegistrationFilter='';
    public $refuelingDateFilter='';

    public function getPayments()
    {
        if ($this->driverNameFilter != '') {
            return Payment::where('driver_name', 'LIKE', '%'.$this->driverNameFilter.'%')->orderBy('refueling_date', 'desc')->get()->groupBy('refueling_date');
        } 
        if ($this->carRegistrationFilter != '') {
            return Payment::where('car_registration', 'LIKE', '%'.$this->carRegistrationFilter.'%')->orderBy('refueling_date', 'desc')->get()->groupBy('refueling_date');
        } 
        if ($this->refuelingDateFilter != '') {
            return Payment::where('refueling_date', '=', Carbon::parse($this->refuelingDateFilter)->format('Y-m-d'))->orderBy('refueling_date', 'desc')->get()->groupBy('refueling_date');
        }
        return Payment::orderBy('refueling_date', 'desc')->get   ()->groupBy('refueling_date');
    }

    public function render()
    {
        return view('livewire.payments', [
            'payments' => $this->getPayments()
        ]);
    }
}
