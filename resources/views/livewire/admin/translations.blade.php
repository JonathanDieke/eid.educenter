<div class="m-4">
    <div class="card">
        <div class="card-header">
            Liste des demandes de traductions
        </div>
        <div class="card-body">
            @if (count($translations) > 0)
                <div class="table-responsive ">
                    <table class="table "> 
                        <thead class="thead-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Documents</th>
                                <th scope="col">Commentaires</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($translations as $translation)
                                @if($translation->user->role != "admin")
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <a href="{{ route('admin.user.info', $translation->user->id) }}">{{ $translation->user->name }}</a>
                                        </td>
                                        <td>{{ $translation->original_file }}</td>
                                        <td>{{ $translation->comment }}</td>
                                        <td>
                                            <i class="feature-icon-sm ti-pencil-alt mx-1"  data-placement="top" title="Ajouter la traduction" data-toggle="modal" data-target="#"></i>
                                        </td>
                                    </tr>

                                @endif
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
