<x-app-layout>
        <a href="{{ route('dashboard') }}" class="absolute left-4 top-4 rounded-full p-2 hover:bg-slate-200 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
        <form class="my-12 mx-24 grow border-2 border-slate-200 rounded shadow-md py-4 px-8" method="POST" action="{{ route('create_payment') }}">
            @csrf
            <p class="text-2xl text-slate-700" >Dodaj płatność</p>
            <hr class="mr-4">
            <table class="flex mt-6">
                <tbody class="w-full">
                    <tr class="flex mb-6">
                        <td class="text-slate-700 font-bold w-2/5">
                            Imię i nazwisko kierowcy:
                        </td>
                        <td class="w-3/5 mr-4 flex">
                            <input type="text" name="driver_name" placeholder="Jan Nowak" class="text-center flex w-full border-b-2 border-slate-200 @error('driver_name') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="text-slate-700 font-bold w-2/5">
                            Numer rejestracyjny auta: 
                        </td>
                        <td class="w-3/5 mr-4">
                            <input type="text" name="car_registration" placeholder="AB12345" class="text-center flex w-full border-b-2 border-slate-200 @error('car_registration') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="text-slate-700 font-bold w-2/5">
                            Data tankowania: 
                        </td>
                        <td class="w-3/5 mr-4">
                            <input type="date" name="refueling_date" class="text-center flex w-full border-b-2 border-slate-200 @error('refueling_date') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="text-slate-700 w-1/2 inline-flex font-bold mr-4">
                            Kwota:
                            <input type="string" name="price" placeholder="123.45" class="text-center mx-auto border-b-2 border-slate-200 @error('price') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                        </td>
                        <td class="text-slate-700 w-1/2 inline-flex font-bold">
                            Waluta: 
                            <select name="currency" class="mx-auto bg-white border-2 cursor-pointer rounded border-slate-200 @error('currency') border-red-500 bg-red-300 @enderror px-4 transition-all ">
                                <option value="PLN" default>PLN</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="text-slate-700 font-bold w-2/5">
                            Ilość paliwa: 
                        </td>
                        <td class="w-3/5 mr-4 flex">
                            <input type="text" name="fuel_quantity" placeholder="12.34" class="text-center flex w-full border-b-2 border-slate-200 @error('fuel_quantity') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                            <span class="ml-2 text-slate-500">l</span>
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="text-slate-700 font-bold w-2/5">
                            Przebieg auta:
                        </td>
                        <td class="w-3/5 mr-4 flex">
                            <input type="text" name="car_course" placeholder="123456" class="text-center flex w-full border-b-2 border-slate-200 @error('car_course') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all "/>
                            <span class="ml-2 text-slate-500">km</span>
                        </td>
                    </tr>
                    <tr class="flex mb-8" x-data="{ checked: false }">
                        <td class="text-slate-700 w-1/2 inline-flex font-bold">
                            Płatność kartą DKV:
                            <input type="checkbox" @click="checked = !checked" name="payed_by_dkv" value="true" class="w-6 h-6 ml-4 color-blue-200 @error('payed_by_dkv') border-red-500 bg-red-300 @enderror cursor-pointer">
                        </td>
                        <td x-show="checked" class="text-slate-700 w-1/2 flex font-bold">
                            Numer karty DKV:
                            <input type="text" name="dkv_number" placeholder="1234" class="text-center mx-auto flex border-b-2 border-slate-200 @error('dkv_number') border-red-500 bg-red-300 @enderror outline-none focus:border-blue-200  transition-all ">
                        </td>
                    </tr>
                    <tr class="flex mb-6">
                        <td class="flex grow ">
                            <input type="submit" class="flex grow bg-blue-500 hover:bg-blue-600 cursor-pointer transition-all text-white font-bold text-4xl py-2 rounded-sm" value="Dodaj płatność">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
</x-app-layout>