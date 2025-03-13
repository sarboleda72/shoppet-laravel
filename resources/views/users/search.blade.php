@forelse ($users as $user)
    <tr>
        <th>{{ $user->name }}</th>
        <th>{{ $user->lastname }}</th>
        <th>{{ $user->document }}</th>
        <th>{{ $user->address }}</th>
        <th>{{ $user->phone }}</th>
        <th>{{ $user->email }}</th>
        <th>{{ $user->role }}</th>
        <th>{{ $user->photo }}</th>
        <th>
            <button class="btn btn-primary btn-user btn-block edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                id='{{ $user->id }}'>Editar</button>
            <button class="btn btn-danger btn-user btn-block delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                id='{{ $user->id }}'>Eliminar</button>
        </th>
    </tr>
@empty
    <h1> No encontro registros para criterio de busqueda </h1>
@endforelse
