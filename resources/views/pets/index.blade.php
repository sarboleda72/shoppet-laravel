@extends('layouts.app')
@section('titleModule', 'Usuarios')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de mascotas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Tipo</th>
                            <th>Raza</th>
                            <th>Tamaño</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombres</th>
                            <th>Tipo</th>
                            <th>Raza</th>
                            <th>Tamaño</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody class="insert">
                        @foreach ($pets as $pet)
                            <tr>
                                <th>{{ $pet->name }}</th>
                                <th>{{ $pet->type }}</th>
                                <th>{{ $pet->breed }}</th>
                                <th>{{ $pet->size }}</th>
                                <th>
                                    <button class="btn btn-primary btn-user btn-block edit" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit" id='{{ $pet->id }}'>Editar</button>
                                    <button class="btn btn-danger btn-user btn-block delete" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" id='{{ $pet->id }}'>Eliminar</button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Crear --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear mascota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pets.store') }}" class="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input name="type" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Tipo">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="breed" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Raza">
                        </div>
                        <div class="form-group">
                            <input name="size" type="text" class="form-control form-control-user"
                                id="exampleFirstName" placeholder="Tamaño">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-circle btn-sm" data-bs-dismiss="modal">
                                <i class="fas fa-trash"></i></button>
                            <button type="submit" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal editar --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdit" action="{{ route('pets.update', $pet->id) }}" class="user">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-user" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input name="type" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Tipo">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="breed" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Raza">
                        </div>
                        <div class="form-group">
                            <input name="size" type="text" class="form-control form-control-user"
                                id="exampleFirstName" placeholder="Tamaño">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-circle btn-sm" data-bs-dismiss="modal">
                                <i class="fas fa-trash"></i></button>
                            <button type="submit" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Eliminar --}}
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formDelete" action="{{ url('pets/' . $pet->id) }}" class="user">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <label for="">¿Realmente quiere eliminarlo?</label>
                        </div>
                        <div class="form-group">
                            <label for="">Este acción no tiene retroceso.</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-icon-split" data-bs-dismiss="modal">
                                <span class="text">Cacelar</span>

                                <button type="submit" name="id" class="btn btn-success btn-icon-split">

                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Confirrmar</span>

                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Jquery para el modal de editar
        $(document).on('click', '.edit', function() {
            var userId = $(this).attr('id');

            $.get('pets/' + userId + '/edit', {}, function(data) {
                var user = data.pet
                $('input[name="id"]').val(userId);
                $('input[name="name"]').val(user.name);
                $('input[name="type"]').val(user.type);
                $('input[name="breed"]').val(user.breed);
                $('input[name="size"]').val(user.size);
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var userId = form.find('input[name="id"]').val();
            var url = "/pets/" + userId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize()
            }).always(function(response) {
                console.log("Actualizacion exitosa:", response);
                $('#modalEdit').modal('hide');
                location.reload();
            });
        });

        // Jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var userId = $(this).attr('id');
            $('button[name="id"]').val(userId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var userId = form.find('button[name="id"]').val();
            var url = "/pets/" + userId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()
            }).always(function(response) {
                console.log("Eliminación exitosa:", response);
                $('#modalDelete').modal('hide');
                location.reload();
            });
        });

        // Jquery para buscar un registro
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('pets/search', {
                    q: $query,
                    _token: $token
                },
                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })
    </script>
@endsection
