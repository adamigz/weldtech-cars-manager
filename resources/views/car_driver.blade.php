<x-app-layout>
    <a href="{{ route('dashboard') }}" class="absolute left-4 top-4 rounded-full p-2 hover:bg-slate-200 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div x-data="{ open: false }" class="flex flex-col rounded shadow-md lg:bg-slate-200 p-4 text-lg lg:m-16 grow">
        <div class="text-3xl flex mb-6 text-slate-700 font-bold tracking-wide">
            <div>Tymczasowy właściciel #{{ $car_driver->id }}</div> 
            <div class="ml-auto text-sm my-auto text-slate-500">Dodano: {{ \Carbon\Carbon::parse($car_driver->created_at)->format('d.m.Y H:i') }}</div>
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 grid gap-2">
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Imię i nazwisko kierowcy:
                    <span class="text-blue-600 font-bold ml-2">{{ $car_driver->driver_name }}</span>
                </div>
                <div class="text-center p-2 mb-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Numer rejestracyjny auta:
                    <span class="text-blue-600 font-bold ml-2">{{ $car_driver->car_registration }}</span>
                </div>
            </div>
            <div class="w-1/2 grid gap-2">
                <div class="text-center p-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Karta DKV:
                    <span class="text-blue-600 font-bold ml-2">{{ $car_driver->dkv_number }}</span>
                </div>
                <div class="text-center p-2 mb-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                    Poprzedni właściciel:
                    <span class="text-blue-600 font-bold ml-2">{{ $car_driver->previous_owner }}</span>
                </div>
            </div>
        </div>
        <div class="text-2xl font-bold text-slate-700 tracking-wide">
            Posiadanie auta:
        </div>
        <div class="grid grid-cols-2 mb-4">
            <div class="text-center p-2 mb-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                Od:
                <span class="text-blue-600 font-bold ml-2">{{ \Carbon\Carbon::parse($car_driver->from)->format('d.m.Y H:i') }}</span>
            </div>
            <div class="text-center p-2 mb-2 hover:bg-slate-300 hover:shadow-lg rounded transition-all">
                Do:
                <span class="text-blue-600 font-bold ml-2">
                @if ($car_driver->from != $car_driver->to)
                    {{ \Carbon\Carbon::parse($car_driver->to)->format('d.m.Y H:i') }}
                @else
                    Nie ustawiono
                @endif
                </span>
            </div>
        </div>
        <a href="{{ route('update_carDriver', ['carDriver' => $car_driver]) }}" class="mb-2 flex bg-green-600 text-center py-2 rounded hover:bg-green-500 text-white text-2xl font-bold transition-all">
            <span class="mx-auto">Edytuj</span>
        </a>
        @if ($car_driver->from == $car_driver->to)
        <div class="flex bg-blue-600 text-center py-2 rounded hover:bg-blue-500 text-white text-2xl font-bold transition-all" @click="open = !open">
            <span class="mx-auto">Zakończ posiadanie auta</span>
        </div>
        @endif
        <div x-show="open" class="flex m-4 rounded bg-slate-100 shadow-md">
            <form method="POST" action="" class="mx-auto my-4 grid">
                @csrf
                <div class="flex mb-2">
                    <span class="font-bold text-slate-700">Data i czas zakończenia posiadania auta:</span>
                    <input type="datetime-local" name="to" class="text-center ml-4 bg-slate-100 border-b-2 border-slate-200  outline-none focus:border-blue-200  transition-all ">
                </div>
                <div class="flex">
                    <input type="submit" class="mx-auto bg-blue-600 font-bold text-center px-8 py-2 text-white rounded hover:bg-blue-500 transition-all" value="Zakończ">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>