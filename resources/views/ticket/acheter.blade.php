<x-layout>
   
    <div class="flex justify-center">
        <div class=" bg-white rounded-lg shadow-xl border border-gray-300 max-w-lg ">
            <div class="m-4">
                Pour payer le ticket de N° <span class="font-semibold">{{ $ticket->numero }}</span> du voyage  <span class=" font-semibold ">{{ $ticket->depart()->name }} - {{ $ticket->destination()->name }}</span> ({{ $ticket->heureDepart() }}) 
                au prix de <span>{{ $ticket->prix() }} F CFA</span> a la compagnie <span class="font-semibold">{{ $ticket->compagnie()->sigle }}</span>
                <br>
                

                <form method="post" class="mt-4">
                    @csrf
                    <x-input label="Numero" name="numero" type="tel" />
                    <x-input label="Code OTP" name="otp" type="tel" />
                    <x-btn-primary type="submit" class="mt-4">Payer</x-btn-primary>

                </form>
                
                
                
            </div>
        </div>
    </div>
    
</x-layout>

