<div class=" mx-auto justify-center max-w-lg border-t-4 border-blue-600 bg-white shadow-lg rounded-lg mb-4">
    <div class=" text-center mb-2"> 
        <span class="text-lg font-semibold capitalize">{{ $ticket->compagnie()->sigle }} </span>
        <span class=" text-lg capitalize italic ">({{ $ticket->compagnie()->name }})</span>
    </div>
    <div class="  my-2 flex mx-auto justify-center ">
        <img src="{{ asset('image/image.jpg') }}" alt="" class=" rounded" >
    </div>
    
    <hr >
    <div class=" text-center my-3">
        <span class=" text-2xl font-bold font-sans capitalize">{{ $ticket->numero }}</span>
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
                <td class="flex justify-end font-semibold capitalize">Heure Arriver : </td>
                <td class="pl-3"> {{ $ticket->heureArriver() }}</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Distance : </td>
                <td class="pl-3"> {{ $ticket->distance() }} Km</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">Prix : </td>
                <td class="pl-3 font-semibold"> {{ $ticket->prix() }} F CFA</td>
            </tr>
            <tr>
                <td class="flex justify-end font-semibold capitalize">status : </td>
                @if ($ticket->statut->name =="Reserver" or $ticket->statut->name =="Pause")
                    <td class="pl-3 font-semibold text-blue-600"> {{ $ticket->statut->name }}</td>
 
                @else
                    @if ($ticket->statut->name =="Valider")
                        <td class="pl-3 font-semibold text-green-600"> {{ $ticket->statut->name }}</td>
                    @else
                        @if ($ticket->statut->name =="Desactiver")
                            <td class="pl-3 font-semibold text-red-600"> {{ $ticket->statut->name }}</td>
                        @endif
                    @endif
                @endif

            </tr>
            
            
        </table>
        
    </div>


    
        <form action="#" method="post">
            <div class="flex  justify-end  ">
                <x-checkbox name="condition" />
                <a href="#" class="text-blue-500">J'accepte les conditions</a>
            </div>
            <div class="flex  justify-end  ">
                @csrf
                <button class=" mx-2 my-4 px-4 py-2 border bg-blue-600 text-white capitalize rounded-lg font-semibold" type="submit">Achéter</button>
            </div>
        </form>
  

</div>
