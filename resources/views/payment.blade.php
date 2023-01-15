<x-app-layout>
    <a href="{{ route('dashboard') }}" class="absolute left-4 top-4 rounded-full p-2 hover:bg-slate-200 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div class="flex flex-col rounded shadow-md lg:bg-slate-200 p-4 text-lg lg:m-16 grow">
        <div class="text-3xl flex mb-6 text-slate-700 font-bold tracking-wide">
            <div>Płatność #{{ $payment->id }}</div> 
            <div class="ml-auto text-sm my-auto text-slate-500">Dodano: {{ \Carbon\Carbon::parse($payment->created_at)->format('d.m.Y H:i') }}</div>
        </div>
        <div class="flex">
            <div class="w-1/2 grid gap-2">
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Imię i nazwisko kierowcy:
                    <span class="text-blue-600 font-bold ml-2">{{ $payment->driver_name }}</span>
                </div>
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Numer rejestracyjny auta:
                    <span class="text-blue-600 font-bold ml-2">{{ $payment->car_registration }}</span>
                </div>
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Data tankowania:
                    <span class="text-blue-600 font-bold ml-2">{{ \Carbon\Carbon::parse($payment->refueling_date)->format('d.m.Y') }}</span>
                </div>
            </div>
            <div class="w-1/2 grid gap-2">
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Kwota:
                    <span class="text-blue-600 font-bold ml-2">{{ $payment->price }} {{ $payment->currency }}</span>
                </div>
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Ilość paliwa:
                    <span class="text-blue-600 font-bold ml-2">{{ $payment->fuel_quantity }} l</span>
                </div>
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Przebieg podczas tankowania:
                    <span class="text-blue-600 font-bold ml-2">{{ $payment->car_course }} km</span>
                </div>
            </div>
        </div>
        <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
            Płacono kartą DKV:
            <span class="text-blue-600 font-bold ml-2 @if($payment->dkv_number) mr-8 @endif">{{ $payment->payed_by_dkv ? 'TAK' : 'NIE' }}</span>
            @if ($payment->dkv_number)
                Numer karty DKV:
                <span class="text-blue-600 font-bold ml-2">{{ $payment->dkv_number }}</span>
            @endif
        </div>
        <a href="{{ route('updatePayment', ['payment' => $payment]) }}" class="mb-2 flex bg-green-600 text-center py-2 rounded hover:bg-green-500 text-white text-2xl font-bold transition-all">
            <span class="mx-auto">Edytuj</span>
        </a>
    </div>
</x-app-layout>