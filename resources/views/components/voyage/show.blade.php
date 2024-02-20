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
                    <td class="px-2 ">STAF</td>
                </tr>
            </table>

            <form action="" method="post">
                @csrf
                <div class="flex mx-auto justify-end my-2">
                    <div class="">
                        <input type="checkbox" name="condition" id="condition">
                        <span class="ml-2">
                            <a href="#" class="text-blue-600">J'accept les conditions</a>
                        </span>
                    </div>
                </div>

                <div class="flex mx-auto justify-end my-4">
                    <x-btn-primary>Reserver</x-btn-primary>
                </div>

            </form>

        </div>
        <div>

        </div>
    </div>
</div>