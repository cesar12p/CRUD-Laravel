<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Styles -->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">

                        @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        - {{$error}} <br>
                        @endforeach
                        </div>
                        @endif

                        <form action="{{route('users.store')}}" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre.." value="{{old('name')}}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="email" class="form-control" placeholder="Email.." value="{{old('email')}}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password..">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea Eliminar...?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>