@extends('layouts.app')
@section('titleModule', 'Usuarios')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo eletrónico</th>
                            <th>Rol</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo eletrónico</th>
                            <th>Rol</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
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
                                    <button class="btn btn-primary btn-user btn-block edit" data-bs-toggle="modal" data-bs-target="#modalEdit" id='{{$user->id}}'>Editar</button>
                                    <button class="btn btn-danger btn-user btn-block" data-bs-toggle="modal" data-bs-target="#modalEdit">Eliminar</button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Crear--}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}" class="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombres">
                            </div>
                            <div class="col-sm-6">
                                <input name="lastname" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="document" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Documento">
                            </div>
                            <div class="col-sm-6">
                                <input name="address" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="phone" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Número de contacto">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña">
                            </div>
                            <div class="col-sm-6">
                                <input name="password_confirmation" type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repita la contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="role" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Role">
                            <select name="role" class="form-control">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
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
                    <form method="PUT" action="{{url('users/'.$user->id)}}" class="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="nameEdit" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombres">
                            </div>
                            <div class="col-sm-6">
                                <input name="lastnameEdit" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="emailEdit" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="documentEdit" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Documento">
                            </div>
                            <div class="col-sm-6">
                                <input name="addressEdit" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="phoneEdit" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Número de contacto">
                        </div>
                        <div class="form-group">
                            <select name="roleEdit" class="form-control">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
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


    <script>
        $(document).on('click','.edit', function(){
            var userId = $(this).attr('id');
            
            $.get('users/'+userId+'/edit', {}, function(data){
                var user = data.user
                $('input[name="nameEdit"]').val(user.name);
                $('input[name="lastnameEdit"]').val(user.lastname);
                $('input[name="documentEdit"]').val(user.document);
                $('input[name="addressEdit"]').val(user.address);
                $('input[name="phoneEdit"]').val(user.phone);
                $('input[name="emailEdit"]').val(user.email);
                $('select[name="roleEdit"]').val(user.role);

            })
        })
    </script>
@endsection
