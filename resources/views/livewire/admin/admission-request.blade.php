<div class="m-4">
    <div class="card">
        <div class="card-header">
            Liste des demandes d'admission
        </div>
        <div class="card-body">
            @if (count($admissionRequests) > 0)
                <div class="table-responsive ">
                    <table class="table ">
                        <caption>Liste des demandes d'admissions</caption>
                        <thead class="thead-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Université</th>
                                <th scope="col">Session</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Cycle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admissionRequests as $admission_request)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('admin.user.info', $admission_request->user->id) }}">{{ $admission_request->user->name }}</a>
                                    </td>
                                    <td>{{ $admission_request->school->name }}</td>
                                    <td>{{ $admission_request->session }}</td>
                                    <td>{{ $admission_request->program->libel }}</td>
                                    <td>{{ $admission_request->cycle }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            @else
                <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
            @endif
        </div>
    </div>
</div>
