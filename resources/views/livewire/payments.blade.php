<div class="px-4" x-data="{ filters: false }">
    <style>
        #paymentsBox::-webkit-scrollbar {
            display: none;
        }
        #paymentsBox {
            -ms-overflow-style: none; 
            scrollbar-width: none;  
        }
    </style>
    <div class="border-2 border-slate-100 rounded p-2">
        <div class="flex">
            <p>Filtry</p>
            <div class="ml-auto" @click="filters = ! filters">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" :class="filters ? 'rotate-180' : ''" class="w-6 h-6 transition-all">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex font-bold"  x-show="filters" x-transition>
            <div class="w-1/3 mr-2">
                <input type="text" placeholder="Imię i nazwisko" class="border-b-2 border-slate-200 focus:border-blue-300 outline-none" wire:model="driverNameFilter">
            </div>
            <div class="w-1/3 mr-2">
                <input type="text" placeholder="Numer rejestracyjny" class="border-b-2 border-slate-200 focus:border-blue-300 outline-none" wire:model="carRegistrationFilter">
            </div>
            <div class="w-1/3">
                <input type="date" class="border-b-2 border-slate-200 focus:border-blue-300 outline-none" wire:model="refuelingDateFilter">
            </div>
        </div>
    </div>
    <div class="max-h-[calc(100vh-121px)]" id="paymentsBox" style="overflow:scroll;" >
    @foreach ($payments as $date => $dateGroup)
        <div class="text-2xl font-bold text-blue-600 mx-2">{{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}</div>
        <hr class="m-2">
        @foreach ($dateGroup as $payment)
            <a href="{{ route('payment', ['payment' => $payment]) }}" class="rounded bg-slate-100 p-2 mx-2 my-4 shadow-md flex hover:bg-slate-200 hover:shadow-lg transition-all">
                <div class="w-1/3">
                    {{ $payment->driver_name }}
                </div>
                <div class="w-1/3">
                    {{ $payment->car_registration}}
                </div>
                <div class="w-1/3">
                    {{ $payment->price}}&nbsp;{{ $payment->currency }}
                </div>
                @if($payment->payed_by_dkv)
                <div class="my-auto rounded-full bg-blue-600 h-2 w-2 animate-ping">
                </div>
                @endif
            </a>
        @endforeach
    @endforeach
    </div>
</div>
