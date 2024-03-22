@props(['payer','QRCode'])

<div class=" mx-auto justify-center sm:max-w-sm md:max-w-lg max-w-2xl w-full border-t-4 border-blue-600 bg-white shadow-lg rounded-lg mb-4">
    <div class=" text-center mb-2"> 
        <span class="text-lg font-semibold capitalize">{{ $payer->ticket->compagnie()->sigle }} </span>
        <span class=" text-lg capitalize italic ">({{ $payer->ticket->compagnie()->name }})</span>
    </div>
    <div class="  my-2 flex mx-auto justify-center ">
        <img src="{{ asset('image/image.jpg') }}" alt="" class=" rounded" >
    </div>
    <hr >
    <div class=" text-center my-3">
        <span class=" text-3xl font-bold font-sans capitalize">{{ $payer->ticket->numero }}</span>
    </div>

    <div class=" flex mx-auto justify-center">
        <table>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Depart : </td>
                <td class="pl-3"> {{ $payer->ticket->depart()->name }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Heure depart : </td>
                <td class="pl-3"> {{ $payer->ticket->heureDepart() }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Destination : </td>
                <td class="pl-3"> {{ $payer->ticket->destination()->name }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Heure Arriver : </td>
                <td class="pl-3"> {{ $payer->ticket->heureArriver() }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Distance : </td>
                <td class="pl-3"> {{ $payer->ticket->distance() }} Km</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Prix : </td>
                <td class="pl-3 font-semibold"> {{ $payer->ticket?->prix() }} F CFA</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">status : </td>
                @if ($payer->ticket->statut->name =="Reserver" or $payer->ticket->statut->name =="Pause")
                    <td class="pl-3 font-semibold text-blue-600"> {{ $payer->ticket->statut->name }}</td>
 
                @else
                    @if ($payer->ticket->statut_id == 5)
                        <td class="pl-3 font-semibold " style="color: rgb(5, 240, 44)"> {{ $payer->ticket->statut->name }}</td>
                    @else
                        @if ($payer->ticket->statut->name =="Desactiver")
                            <td class="pl-3 font-semibold text-red-600"> {{ $payer->ticket->statut->name }}</td>
                        @endif
                    @endif
                @endif

            </tr>           
        </table>
    </div>
    <div class=" flex mx-auto justify-center my-4">
        <img src="{{ asset('images/faces/face1.jpg') }}" alt="QR Code" srcset="">
    </div>


</div>