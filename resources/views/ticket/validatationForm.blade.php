
<x-admin.layout>
    
    <div class="flex justify-center">
        <div class="inline-flex items-center rounded-md shadow-sm mx-4">
            <button id="btn-valider"  data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-36 h-36">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  </span>
            </button>
        </div>
        <div class="inline-flex items-center rounded-md shadow-sm">
            <button id="btn-valider-2"  data-modal-target="authentication-modal-2" data-modal-toggle="authentication-modal-2" type="button" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-36 h-36">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>                      
                </span>
            </button>
        </div>
    </div>



    <!-- Modal Valider le Ticket -->
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class=" shadow-2xl hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex bg-green-400 items-center justify-between p-4 md:p-5 border-b rounded-t-lg dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        Verification de Ticket 
                    </h3>
                    <button type="button" class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                           <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form method="POST" class="space-y-4" action="{{ route('admin.ticket-validation.VerifierEtValider') }}">
                        @csrf
                        <div>
                            <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero</label>
                            <input type="tel" name="numero" id="numero" placeholder="70707070" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required />
                        </div>
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le Code</label>
                            <input type="tel" name="code" id="code" placeholder="123456" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>


                        <div class="flex justify-between ">
                            <button type="reset" data-modal-hide="authentication-modal" class="w-1/2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-2">Annuller</button>
                            <button type="submit" class="w-1/2 text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-2">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 


   



    <!-- Modal Voir le Ticket -->
    <!-- Main modal -->
    <div id="authentication-modal-2" tabindex="-1" aria-hidden="true" class=" shadow-2xl hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex bg-green-400 items-center justify-between p-4 md:p-5 border-b rounded-t-lg dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        Verification de Ticket 
                    </h3>
                    <button type="button" class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal-2">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                           <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form method="POST" class="space-y-4" action="{{ route('admin.ticket-validation.show') }}">
                        @csrf
                        <div>
                            <label for="choix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choix </label>
                            <select name="choix" id="choix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="numero">Numero Telephone</option>
                                <option value="numero_tk">Numero Ticket</option>
                                <option value="email">Adresse Mail</option>
                            </select>
                        </div>
                        <div>
                            <label id="label_champ" for="numero_tk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero du Ticket</label>
                            <input type="tel" name="numero_tk" id="numero" placeholder="70707070" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required />
                        </div>
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le Code</label>
                            <input type="tel" name="code" id="code" placeholder="123456" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>

                        <button type="reset" data-modal-hide="authentication-modal-2" class="w-1/2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Annuller</button>
                        <button type="submit" class="w-1/2 text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>

                    </form>
                </div>
            </div>
        </div>
    </div> 

<script>
    const choix =  document.querySelector('#choix')
    const champ =  document.querySelector('#numero')
    const label = document.querySelector('#label_champ')
    choix.addEventListener('change',()=>{
        switch (choix.value) {
            case "numero_tk":
                champ.setAttribute('name','numero_tk')
                champ.setAttribute('type','text')
                champ.setAttribute('placeholder','Tk12-3456-7890')
                label.value = "Numero du Ticket"
                break;
            case "numero":
                champ.setAttribute('name','numero')
                champ.setAttribute('type','tel')
                champ.setAttribute('placeholder','70707070')
                label.value = "Numero de Telephone"
                break; 
            case "email":
                champ.setAttribute('name','email')
                champ.setAttribute('type','email')
                champ.setAttribute('placeholder','travel@gmail.com')
                label.value = "Adresse mail"
                break;
        
            default:
                break;
        }
    })
</script>

</x-admin.layout>