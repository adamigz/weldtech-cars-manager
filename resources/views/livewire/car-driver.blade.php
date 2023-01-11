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
            <div class="w-1/2 mr-2">
                <input type="text" placeholder="Imię i nazwisko" class="border-b-2 border-slate-200 focus:border-blue-300 outline-none" wire:model='driverNameFilter'>
            </div>
            <div class="w-1/2 mr-2">
                <input type="text" placeholder="Numer rejestracyjny" class="border-b-2 border-slate-200 focus:border-blue-300 outline-none" wire:model='carRegistrationFilter'>
            </div>
        </div>
    </div>
    <div class="max-h-[calc(100vh-121px)]" style="overflow:scroll;" >
    @foreach ($cars as $registration_number => $group)
        <div class="text-2xl font-bold text-blue-600 mx-2">{{ $registration_number }}</div>
        <hr class="m-2">
        @foreach ($group as $carDriver)
            <a href="{{ route('carDriver', ['car_driver' => $carDriver]) }}" class="rounded bg-slate-100 p-2 mx-2 my-4 shadow-md flex hover:bg-slate-200 hover:shadow-lg transition-all">
                <div class="w-1/3">
                    {{ $carDriver->driver_name }}
                </div>
                <div class="w-1/3">
                    {{ \Carbon\Carbon::parse($carDriver->from)->format('d.m.Y H:i') }}
                </div>
                <div class="w-1/3">
                    @if ($carDriver->from == $carDriver->to)
                    <span class="text-slate-400">Nie zdano..</span>
                    @else
                    {{ \Carbon\Carbon::parse($carDriver->to)->format('d.m.Y H:i') }}
                    @endif
                </div>
                @if ($carDriver->from == $carDriver->to)
                <div class="my-auto bg-green-600 h-2 w-2 rounded-full animate-ping">
                </div>
                @endif
            </a>
        @endforeach
    @endforeach
    </div>
</div>
