@props(['ticket'])

@if ($ticket->statut->name == 'Reserver')
    <a href="{{ route('ticket.show',$ticket) }}" class=" z-10">
        <div class=" mt-4 flex bg-white border-l-4 border-blue-600 rounded-lg p-3 shadow-xl mx-4">
            <div class="mr-4">
                <img class=" h-full rounded-l-xl max-w-24" src="{{ asset('image/image.jpg') }}"   alt="" srcset="">
            </div>
            <div class="">
                <div>
                    <span class=" font-semibold">{{ $ticket->depart()->name }}- {{ $ticket->destination()->name }}</span>
                </div>
                <div>
                    <span class=" italic flex justify-center mx-auto text-sm">{{ $ticket->compagnie()->name }}</span>
                </div>
                <div>
                    <span class=" italic flex justify-center mx-auto text-sm">{{ $ticket->heureDepart() }}</span>
                </div>
                <div>
                    <span class="  flex justify-center mx-auto text-sm text-nowrap text-blue-600 font-semibold">Tk0010010 (Attente)</span>
                </div>
            </div>
            <span class=" relative w-6 h-6 bg-blue-600 rounded-b-full flex -top-3 border-t-2 border-blue-900  justify-center mx-auto text-gray-100 font-semibold">R</span>

        </div>
    </a>
@else
    @if ($ticket->statut->name == 'Valider')
        <a href="#">
            <div class=" mt-4 flex bg-white border-l-4 border-green-600 rounded-lg p-3 shadow-xl mx-4">
                <div class="mr-4">
                    <img class=" h-full rounded-l-xl max-w-24" src="{{ asset('image/image.jpg') }}"   alt="" srcset="">
                </div>
                <div class="">
                    <div>
                        <span class=" font-semibold">Bobo Dioulasso - Dedougou</span>
                    </div>
                    <div>
                        <span class=" italic flex justify-center mx-auto text-sm">TSR</span>
                    </div>
                    <div>
                        <span class=" italic flex justify-center mx-auto text-sm">14/12/2024 14h 00</span>
                    </div>
                    <div>
                        <span class="  flex justify-center mx-auto text-sm text-nowrap text-green-600 font-semibold">Tk0010010 (Valider)</span>
                    </div>
                    
                </div>
                <span class=" relative w-6 h-6 bg-green-600 rounded-b-full flex -top-3 border-t-2 border-green-900  justify-center mx-auto text-gray-100 font-semibold">V</span>

            </div>
        </a>
    @else
       <a href="#">
        <div class=" mt-4 flex bg-white border-l-4 border-red-600 rounded-lg p-3 shadow-xl mx-4">
            <div class="mr-4">
                <img class=" h-full rounded-l-xl max-w-24" src="{{ asset('image/image.jpg') }}"   alt="" srcset="">
            </div>
            <div class="">
                <div>
                    <span class=" font-semibold">Bobo Dioulasso- Dedougou</span>
                </div>
                <div>
                    <span class=" italic flex justify-center mx-auto text-sm">TSR</span>
                </div>
                <div>
                    <span class=" italic flex justify-center mx-auto text-sm">14/12/2024 14h 00</span>
                </div>
                <div>
                    <span class="  flex justify-center mx-auto text-sm text-nowrap text-red-600 font-semibold">Tk0010010 (Utiliser)</span>
                </div>
            </div>
            <span class=" relative w-6 h-6 bg-red-600 rounded-b-full flex -top-3 border-t-2 border-red-900  justify-center mx-auto text-gray-100 font-semibold">U</span>
        </div>
    </a>
    @endif
@endif









