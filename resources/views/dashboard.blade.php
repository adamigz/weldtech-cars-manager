<x-app-layout>
    <div class="lg:w-1/2 lg:border-r-2 lg:border-slate-200 relative">
        <div class="text-3xl ml-4 my-4 text-slate-700 font-bold tracking-wide">
            <h1>Płatności</h1>
        </div>
        <hr class="mx-4 my-2">
        @livewire('payments')
        <a href="{{ route('createPayment') }}" class="absolute bottom-4 right-4 rounded-full bg-blue-600 inline-flex hover:bg-blue-500 p-4 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>              
        </a>
    </div>
    <div class="lg:w-1/2 relative">
        <div class="text-3xl ml-4 my-4 text-slate-700 font-bold tracking-wide">
            <h1>Tymczasowy właściciel pojazdu</h1>
        </div>
        <hr class="mx-4 my-2">
        @livewire('car-driver')
        <a href="{{ route('createCarDriver') }}" class="absolute bottom-4 right-4 rounded-full bg-blue-600 inline-flex hover:bg-blue-500 p-4 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>              
        </a>
    </div>
</x-app-layout>
