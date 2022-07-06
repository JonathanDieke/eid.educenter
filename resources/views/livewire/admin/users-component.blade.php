<div>
    <div class="card">
        <div class="card-header">
            Liste des utilisateurs
        </div>
        <div class="card-body">
           <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                     @foreach ($users as $user)
                         <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('admin.user.info', compact('user')) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->countryR->name }}</td>
                            <td>{{ $user->cityR->name }}</td>
                             {{-- <td>
                                 <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#"></i>
                                 <i class="feature-icon-sm-danger ti-trash mx-1" onclick="if(confirm('Voulez-vous vraiment retiré cet utilisateur ?')) Livewire.emit('deleteUser', {{ $user->id }})" ></i>
                             </td> --}}
                         </tr>
                     @endforeach
                </tbody>
            </table>
            <div class="wrap-pagination-info">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>
