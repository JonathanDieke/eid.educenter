<div class="container my-4">
    <section class="bg-gray  p-4">
        <div class="container my-2">

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-title">Mes Traductions/Légalisations </h3>
                </div>
            </div>

            <a href="#" class="btn btn-secondary btn-sm shadow mb-4 " data-toggle="modal" data-target="#translationModal">Traduire un document </a>

            @if (count($translations) > 0)
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="thead-warning">
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Orignal</th>
                                <th>Date d'envoi</th>
                                <th>Traduction</th>
                                {{-- <th>Date de réception</th> --}}
                                <th>Commentaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($translations as $translation)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>
                                        <span class="badge badge-{{ $translation->status  == "pending" ? 'info' : ($translation->status == "success" ? "success" : "danger") }}">
                                            {{ $translation->status  == "pending" ? 'En cours' : ($translation->status == "success" ? "Terminé" : "Annulé") }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#" wire:click="export('{{ $translation->original_file }}')"> {{ explode("/", $translation->original_file)[1] }} </a>
                                    </td>
                                    <td> {{ $translation->created_at }}  </td>
                                    <td  > 
                                        @if ($translation->translated_file)
                                            <a href="#" wire:click="export('{{ $translation->translated_file }}')"> {{ explode("/", $translation->translated_file)[1] }}   </a>
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    {{-- <td> 25-06-2022  </td> --}}
                                    <td> {{ $translation->comment }}  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center font-weight-bold font-italic">Vous n'avez aucune traduction en cours</p>
            @endif

            <x-slot name="footer">
            </x-slot>

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
                                Les documents peuvent être uniquement de format <span class="font-italic">pdf avec une taille maximale de 1 MB</span>.
                            </div>
                            <form wire:submit.prevent="addTranslation">
                                @error('translation.original_file.*') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="mb-1 font-weight-normal font-italic " wire:loading wire:target="translation.original_file">Chargement des fichiers...</div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="original_file" required wire:model="translation.original_file" multiple>
                                        <label class="custom-file-label" for="original_file">Choisir un ou plusieurs fichiers...</label>
                                    </div>
                                </div>
                                @error('translation.comment') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="form-group">
                                    <input type="text"  class="form-control form-control-sm" id="" placeholder="Ajouter un commentaire" autocomplete="off" wire:model.lazy="translation.comment">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Create Translation request -->
        </div>
    </section>

</div>
