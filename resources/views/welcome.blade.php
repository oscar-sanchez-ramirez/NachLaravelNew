<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Tiros API Rest</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="m-0 row justify-content-center">
            <div class="col-md-12 mt-5">
                <h1 class="text-center text-white">API Rest Tiros</h1>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="border border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto">
                    <div class="animate-pulse flex space-x-4">
                        <div class="rounded-full bg-blue-400 h-12 w-12"></div>
                        <div class="flex-1 space-y-4 py-1">
                            <div class="h-4 bg-blue-400 rounded w-3/4"></div>
                            <div class="space-y-2">
                                <div class="h-4 bg-blue-400 rounded"></div>
                                <div class="h-4 bg-blue-400 rounded w-5/6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <button class="btn btn-outline-primary mt-5" onclick="getAxios();">Axios</button>
                <button class="btn btn-outline-info mt-5" onclick="getFetch();">Fetch</button>
                <form action="javascript:void(0)" method="POST" id="myform">
                    <input class="form-control mt-2" type="text" name="name" id="IDname" placeholder="Nombre" style="display: block" required>
                    <input class="form-control mt-2" type="email" name="email" id="IDemail" placeholder="email@ejemplo.com" style="display: block" required>
                    <input type="password" name="password" value="12345678" style="display: none">
                    <input type="passowrd" class="form-control mt-2" name="password" id="IDpassword" placeholder="Contraseña">
                    <button type="submit" class="btn btn-outline-success mt-5" onclick="postUser();">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</body>

@include('scripts.getData_js');
</html>
