@props(['ticket','QRCode'])

<div class=" mx-auto justify-center sm:max-w-sm md:max-w-lg max-w-3xl w-full border-t-4 border-blue-600 bg-white shadow-lg rounded-lg mb-4">
    <div class=" text-center mb-2"> 
        <span class="text-lg font-semibold capitalize">{{ $ticket->compagnie()->sigle }} </span>
        <span class=" text-lg capitalize italic ">({{ $ticket->compagnie()->name }})</span>
    </div>
    <div class="  my-2 flex mx-auto justify-center ">
        <img src="{{ asset('image/image.jpg') }}" alt="" class=" rounded" >
    </div>
    <hr >
    <div class=" text-center my-3">
        <span class=" text-3xl font-bold font-sans capitalize">{{ $ticket->numero_tk }}</span>
    </div>

    <div class=" flex mx-auto justify-center">
        <table>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Depart : </td>
                <td class="pl-3"> {{ $ticket->depart()->name }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Heure depart : </td>
                <td class="pl-3"> {{ $ticket->heureDepart() }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Destination : </td>
                <td class="pl-3"> {{ $ticket->destination()->name }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Numero Chaise : </td>
                <td class="pl-3"> {{ $ticket->numero_chaise }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Heure Convocation : </td>
                <td class="pl-3 font-semibold"> {{ (new Carbon\Carbon($ticket->date.' '.$ticket->heureDepart()))->subMinutes(30)->format("Y/m/d h:i") }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Distance : </td>
                <td class="pl-3"> {{ $ticket->distance() }} Km</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Prix : </td>
                <td class="pl-3 font-semibold"> {{ $ticket?->prix() }} F CFA</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">status : </td>
                @if ($ticket->statut->name =="Reserver" or $ticket->statut->name =="Pause")
                    <td class="pl-3 font-semibold text-blue-600"> {{ $ticket->statut->name }}</td>
 
                @else
                    @if ($ticket->statut_id == 5)
                        <td class="pl-3 font-semibold " style="color: rgb(5, 240, 44)"> {{ $ticket->statut->name }}</td>
                    @else
                        @if ($ticket->statut->name =="Desactiver")
                            <td class="pl-3 font-semibold text-red-600"> {{ $ticket->statut->name }}</td>
                        @endif
                    @endif
                @endif

            </tr>           
        </table>
    </div>
    <div class=" flex mx-auto justify-center my-4">
        <img src="{{ asset($ticket->QRUrl) }}" alt="QR Code" class=" w-56">
    </div>
    <hr>
    <div class=" text-blue-700 flex justify-center my-4">
        <a href="{{ asset($ticket->pdfUrl) }}" download="true">Telechareger le Ticket (Pdf)</a>
    </div>
    <div class=" text-blue-700 flex justify-center ">
        <a href="#" >Recevoir par email</a>
    </div>


</div>

