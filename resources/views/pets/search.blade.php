@forelse ($pets as $pet)
    <tr>
        <th>{{ $pet->name }}</th>
        <th>{{ $pet->type }}</th>
        <th>{{ $pet->breed }}</th>
        <th>{{ $pet->size }}</th>
        <th>
            <button class="btn btn-primary btn-user btn-block edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                id='{{ $pet->id }}'>Editar</button>
            <button class="btn btn-danger btn-user btn-block delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                id='{{ $pet->id }}'>Eliminar</button>
        </th>
    </tr>
@empty
    <h1> No encontro registros para criterio de busqueda </h1>
@endforelse
