<div class="container my-4">
    <div class="shadow rounded">
        <div class="card w-100 bg-light border-warning ">
            <div class="card-body">
              <h5 class="card-title text-center">Bienvenue sur mon portail  <br> - <br> L’environnement numérique d’études de l’Université Laval </h5>
              <ul class="mt-4">
                <li class="text-body  py-1">
                    L'admission est la première étape de votre parcours aux universités.
                    Pour déposer une demande d’admission et en effectuer le suivi, rendez-vous à la section <span class="font-italic font-weight-bold"> Admission</span> du menu <span class="font-italic font-weight-bold"> Etudes</span>
                </li>
                <br>
                <li class="text-body py-1">
                    Les différents services et informations de monPortail – inscription aux cours, sites de cours et commande de documents officiels, notamment – vous seront rendus accessibles en fonction de votre cheminement d’études
                </li>
            </ul>
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="{{ route('studies.admission') }}" class="btn btn-primary btn-sm my-3">Mes demandes</a>
            </div>

            </div>
        </div>

        <x-slot name="footer">
        </x-slot>

    </div>
</div>
