
<div class=" flex mx-auto justify-center content-center">
    <div class=" block mt-40 mb-2  ">

        <div class="  mx-4 bg-white m-4 gap-2 shadow-xl py-4 max-w-xl  justify-center rounded-lg ">
            <div class="-mt-20 w-40 h-40 rounded-full flex justify-center align-middle mx-auto">
                <img class="  rounded-full" src="{{ asset('images/faces/face1.jpg') }}" >
                <div class="flex relative right-6 top-6">
                    <span class="flex w-6 h-6 bg-green-500 rounded-full absolute border-2 border-white "></span>
                </div>
            </div>
            <div class="flex justify-center mx-auto my-4 gap-2 font-bold text-2xl ">
                {{ request()->user()->name }}
            </div>
            <table class="flex mx-auto justify-center">
                <tr class=" size-8  ">
                    <td class=" flex mx-auto justify-end font-semibold  ">Numero : </td>
                    <td class=" pl-4 p-">70 87 28 51</td>
                </tr>
                <tr class=" size-8 ">
                    <td class=" flex mx-auto justify-end font-semibold  ">E-Mail : </td>
                    <td class=" pl-4 ">{{ request()->user()->email }}</td>
                </tr>
                <tr class="  size-8 ">
                    <td class=" flex mx-auto justify-end font-semibold ">Ville : </td>
                    <td class=" pl-4 ">Bobo (BF)</td>
                </tr>
                <tr class="  size-8 ">
                    <td class=" flex mx-auto justify-end font-semibold ">Adresse : </td>
                    <td class=" pl-4 ">bobo rue 17 135</td>
                </tr>
            </table>
        </div>
        
        
        <div class=" max-w-xl m-4">
            <div class=" columns-2 align-middle">
                <div class=" max-w-sm bg-white rounded-lg gap-2 p-4 py-3 border-l-4 border-blue-600 shadow-lg">
                    <span class="text-xl font-bold flex justify-center">Likes</span>
                    <span class="text-3xl font-extrabold flex justify-center align-middle">{{ count(request()->user()->likes) }}</span>
                </div>
                <div class=" max-w-sm bg-white rounded-lg   gap-2 p-4 py-3  border-l-4 border-green-600 shadow-lg">
                    <span class="text-xl font-bold flex justify-center">Commentaire</span>
                    <span class="text-3xl font-extrabold flex justify-center align-middle">{{ count(request()->user()->comments) }}</span>
            
                </div>
            </div>
            
            <div class=" w-full  bg-white rounded-lg my-2 p-4 py-3 gap-2 border-l-4 border-violet-800 shadow-lg">
                <span class="text-xl font-bold flex justify-center underline">Historique des voyage</span>
        
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Date</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Compagnie</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Depart</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Destination</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Heure</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Date Achat </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Prix</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Numero </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Statut</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">14/01/2024</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left ">STAF</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">Bobo</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">Bobo</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">14h 30</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">10/12/2023 11h 10</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">3 500 fcfa</div>
                                        </td>
                                        
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-center">Tk0010010</div>
                                        </td>
                                        
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">Valider</div>
                                        </td>
                                    </tr>
        
                            </tbody>
                        </table>
                    </div>
                </div>
        
            </div>
        </div>

    </div>
</div>