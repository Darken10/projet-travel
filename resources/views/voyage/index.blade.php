<x-layout>
   
    <div>
        <form method="post">
            @csrf
            <div  class=" columns-5 gap-2 ">
                <x-select2  name="compagnie" placeholder="Compagnie..." inputClass="mx-4" :value="request()->input('compagnie')"  class="gap-2 " />
                <x-input name="compagnie" placeholder="Compagnie..." inputClass="mx-4" :value="request()->input('compagnie')"  class="gap-2 "/>
                <x-input name="depart" placeholder="Depart..." inputClass="mx-4" :value="request()->input('depart')" class="ok"/>
                <x-input name="destination" placeholder="Destination..." inputClass="mx-4" :value="request()->input('destination')" class="ok"/>
                <x-input name="heure" type="time" placeholder="Heure..." inputClass="mx-4" :value="request()->input('heure')" class="ok"/>
                <x-btn-primary class="mx-4">Rechercher</x-btn-primary>
            </div>
            
        </form>
    </div>
    <div>
       
        <x-table-voyage :$voyages />
 
        
    </div>    
</x-layout>