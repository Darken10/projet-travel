<x-layout>
   
    <div class="flex justify-center">
        <div class=" bg-white rounded-lg shadow-xl border border-gray-300 max-w-lg ">
            <div class="m-4">

              
                <form method="post" class="mt-4" action="{{ route('ticket.payer',$ticket) }}">
                    @csrf
                    <x-input label="Numero" name="numero" type="tel" />
                    <x-input label="Code OTP" name="otp" type="tel" />
                    <x-btn-primary type="submit" class="mt-4">Payer</x-btn-primary>

                </form>
                
                
                
            </div>
        </div>
    </div>
    
</x-layout>

