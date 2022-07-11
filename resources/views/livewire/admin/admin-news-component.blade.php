<div>
    <div class="card">
        <div class="card-header">
            Liste des actualités
        </div>
        <div class="card-body">
            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addNewsModal">
                Ajouter une actualité
            </button>
            @if ($news->count() > 0)
                <div class="table-responsive">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Résumé</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr class="text-truncate">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->news_date }}</td>
                                    <td>{{ $new->abstract }}</td>
                                    <td>{{ $new->description }}</td>
                                    <td>
                                        @foreach ($new->images as $image)
                                            <img width="80" height="80" src="{{ asset('storage') . '/' . $image->image }}" alt="news_image">
                                        @endforeach
                                    </td>
                                    <td>
                                        <i class="feature-icon-sm ti-pencil-alt mx-1" data-toggle="modal" data-target="#"></i>
                                        <i class="feature-icon-sm-danger ti-trash mx-1" onclick="if(confirm('Voulez-vous vraiment retiré cette actualité ?')) Livewire.emit('deleteNews', {{ $new->id }})" ></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
            @endif
            <div class="wrap-pagination-info">
                {{ $news->links() }}
            </div>
        </div>
    </div>
    {{-- Modal to add news --}}
    <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h6>Ajouter une actualité </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form wire:submit.prevent="save">

                        <div class="form-row w-100">
                            <div class="form-group col-12">
                                @error('createNews.title') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input required type="text" class="form-control form-control-sm" placeholder="Titre" autocomplete="off" wire:model.lazy="createNews.title">
                            </div>
                        </div>
                        <div class="form-row w-100">
                            <div class="form-group col-12">
                                @error('createNews.abstract') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input required  class="form-control form-control-sm" placeholder="Date" autocomplete="off" wire:model.lazy="createNews.news_date" id="datepicker" onchange="Livewire.emit('getDate', this.value)">
                            </div>
                        </div>
                        <div class="form-row w-100">
                            <div class="form-group col-12">
                                @error('createNews.abstract') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input required type="text" class="form-control form-control-sm" placeholder="Résumé" autocomplete="off" wire:model.lazy="createNews.abstract">
                            </div>
                        </div>
                        <div class="form-row w-100">
                            <div class="form-group col-12">
                                @error('createNews.description') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <textarea required class="form-control form-control-sm" rows="4" cols="10" placeholder="Description" autocomplete="off" wire:model.lazy="createNews.description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1 font-weight-normal font-italic " wire:loading wire:target="createNews.images">Chargement des fichiers...</div>
                            @error('createNews.images.*') <span class="error font-italic text-danger">{{ $message }}</span> <br>@enderror
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="images" required wire:model="createNews.images" multiple>
                                <label class="custom-file-label" for="images">Ajouter une ou plusieurs images...</label>
                            </div>
                        </div>

                        {{-- @if (isset($createNews['images']))
                            <div class="mb-2">
                                <p class="font-weight-bold">
                                    Prévisualisation :
                                </p>
                                @foreach($createNews['images'] as $images)
                                    <img src="{{ $images->temporaryUrl() }}">
                                @endforeach

                            </div>
                        @endif --}}

                        <button type="submit" class="btn btn-primary btn-sm">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal to add news --}}

</div>
