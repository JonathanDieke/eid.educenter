<div class="container my-4">
    <div >
        <section class="my-4 p-4 bg-gray">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Mes demandes </h2>
                </div>
            </div>
            <div class="">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <form action="#">
                        <div class="form-group">
                            <a href="#" class="btn btn-secondary btn-sm shadow mb-4 " data-toggle="modal" data-target="#createRequestModal">Créer une demande </a>
                            @if (count($admissionRequests) > 0)
                                <div class="table-responsive">
                                    <div class="text-center" wire:loading wire:target="deleteAdmissionRequest">
                                        <p class=" font-weight-bold font-italic">Actualisation des données...</p>
                                    </div>
                                    <table class="table text-center" >
                                        <caption>Liste de mes demandes d'admission</caption>
                                        <thead class="thead-warning">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Université</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Programme</th>
                                                <th scope="col">Cycle</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admissionRequests as $admission_request)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $admission_request->school->name }}</td>
                                                    <td>{{ $admission_request->session }}</td>
                                                    <td>{{ $admission_request->program->libel }}</td>
                                                    <td>{{ $admission_request->cycle }}</td>
                                                    <td class="text-center">
                                                        {{-- <i class="feature-icon-sm ti-plus mx-1" data-toggle="modal" data-target="#"></i>
                                                        <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#"></i> --}}
                                                        <i class="feature-icon-sm-danger ti-trash mx-1" wire:click="deleteAdmissionRequest({{ $admission_request->id }})"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                            @else
                                <p class="text-center font-weight-bold font-italic">
                                    Vous n'avez encore aucune demande. Créez-en une en cliquant sur le bouton "Créer une demande".
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal create admission request -->
    <div class="modal fade" id="createRequestModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h6>Créer une demande d'admission </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form  class="row" autocomplete="off" action="#">
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">

                            <div class="form-row w-100">
                                <div class="form-group col-12">
                                    @error('name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                    <select class="custom-select" wire:model="admission_request.school_id">
                                        <option  selected>Choisissez une université</option>
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->id }}" >{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row w-100">
                                <div class="form-group col-12">
                                    <select class="custom-select" wire:model="admission_request.program_id">
                                        <option  selected>Choisissez un programme</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id }}" >{{ $program->libel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row w-100">
                                <div class="form-group col-md-6">
                                    <select class="custom-select" wire:model="admission_request.session">
                                        <option  >Choisissez une session</option>
                                        <option value="autumn" >Automne</option>
                                        <option value="winter" >Hiver</option>
                                        <option value="summer" >Eté</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="custom-select" wire:model="admission_request.cycle">
                                        <option  >Choisissez un cycle</option>
                                        <option value="first" >Premier cycle</option>
                                        <option value="second" >Deuxième cycle</option>
                                        <option value="third" >Troisième cycle</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" wire:click="createAdmissionRequest">S'enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Acreate admission request -->

    <x-slot name="footer">
    </x-slot>
</div>
