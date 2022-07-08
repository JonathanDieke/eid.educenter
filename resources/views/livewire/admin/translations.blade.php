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
                                        <td> <a href="#" wire:click="export('{{ $translation->original_file }}')">{{ explode("/", $translation->original_file)[1] }} </a> </td>
                                        <td>{{ $translation->comment }}</td>
                                        <td>
                                            <i class="feature-icon-sm ti-pencil-alt mx-1"  data-placement="top" title="Ajouter la traduction" data-toggle="modal" data-target="#translationModal" wire:click="setCurrentFileID({{ $translation->id }})"></i>
                                            <i class="feature-icon-sm-danger ti-close mx-1"  data-placement="top" title="Rejeter" wire:click='abortTranslate({{ $translation->id }})'></i>
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

    <!-- Modal Create Translation request -->
    <div class="modal fade" id="translationModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h6>Traduire un document </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="alert alert-info ">
                        Les documents peuvent être uniquement de format. Ajouter un ou plusieurs fichiers dans le formulaire suivant.
                    </div>
                    <form wire:submit.prevent="addTranslation">
                        @error('translatedFile.*') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="mb-1 font-weight-normal font-italic " wire:loading wire:target="translatedFile">Chargement des fichiers...</div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="original_file" required wire:model="translatedFile">
                                <label class="custom-file-label" for="original_file">Choisir un ou plusieurs fichiers...</label>
                            </div>
                        </div>
                         
                        <button type="submit" class="btn btn-primary btn-sm">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Create Translation request -->
</div>
