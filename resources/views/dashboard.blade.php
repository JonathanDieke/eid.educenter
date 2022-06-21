<x-auth-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <ul>
                        <li class="text-black">
                            L'admission est la première étape de votre parcours aux universités.
                            Pour déposer une demande d’admission et en effectuer le suivi, rendez-vous à la section <span class="font-italic"> Admission</span> du menu <span class="font-italic"> Etudes</span>
                        </li>
                        <br>
                        <li class="text-black">
                            Les différents services et informations de monPortail – inscription aux cours, sites de cours et commande de documents officiels, notamment – vous seront rendus accessibles en fonction de votre cheminement d’études
                        </li>
                    </ul>
                    <div class="grid justify-items-end my-8 mx-1">
                        <a href="{{ "#" }}" class=" rounded-full px-4 py-2 text font-semibold border hover:text-white hover:bg-yellow-400 ">Suivre mes demandes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
