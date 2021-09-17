<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('export') }}" class="btn btn-outline-info shadow">Exportar usuarios</a>
                </div>
            </div>
            <hr class="mt-4 mb-4" />
            <div class="col-md-6">
                <table class="table table-hover shadow-lg">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>

</body>

</html>
