
@php
    $date = Carbon\Carbon::today()->format('Y-m-d');
    $max = Carbon\Carbon::today()->add(1,'month')->format('Y-m-d');
@endphp
<div class=" max-w-md flex w-auto mx-auto justify-center bg-white shadow-xl border-t-4 border-violet-700 rounded-lg ">
    <div class="block">
        <div class="  ">
            <img class="w-full mx-4 "  src="{{ asset('image/image.jpg') }}" >
        </div>
        <div class="my-4">

            <table class="flex mx-auto justify-center ">
                <tr>
                    <td class=" px-2 font-semibold flex justify-end">Compagnie :</td>
                    <td class="px-2 ">{{ $voyage->compagnie->sigle }}</td>
                </tr>
                <tr>
                    <td class=" px-2 font-semibold flex justify-end">Depart :</td>
                    <td class="px-2 ">{{ $voyage->depart()->name }}</td>
                </tr>
                <tr>
                    <td class=" px-2 font-semibold flex justify-end">Destination :</td>
                    <td class="px-2 ">{{ $voyage->destination()->name }}</td>
                </tr>
                <tr>
                    <td class=" px-2 font-semibold flex justify-end">Heure de Depart :</td>
                    <td class="px-2 "> {{ $voyage->heureDepart() }}</td>
                </tr>
                <tr>
                    <td class=" px-2 font-semibold flex justify-end">Heure Arriver :</td>
                    <td class="px-2 ">{{ $voyage->heureArriver() }}</td>
                </tr>
            </table>

            <form action="" method="post" class=" mt-4 border-t-2 border-teal-600">
                @csrf
            
                <div class="mt-2">
                    <x-input label="La date du voyage" name="date" type="date" :value="$date" :min="$date" :$max />
                </div>
                <div class="mt-2 ">
                    <input type="checkbox" name="a_bagage" id="a_bagage" >
                    <span class="mx-3">
                        J'ai des Bagages
                    </span>
                </div><hr>
                <div class="flex mx-auto justify-end my-2">
                    <div class="">
                        <input type="checkbox" name="condition" id="condition">
                        <span class="ml-2">
                            <a href="#" class="text-blue-600">J'accept les conditions</a>
                        </span>
                    </div>
                </div>

                <div class="flex mx-auto justify-end my-4">
                    <x-btn-primary>Acheter</x-btn-primary>
                </div>

            </form>

        </div>
        <div>

        </div>
    </div>
</div>