<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD client liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>CRUD IN LARAVEL 10</h1>
                    <a href="/ajouter" class="btn btn-primary">Ajouter un client</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>FName</th>
                                <th>LName</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->FName}}</td>
                                <td>{{$client->LName}}</td>
                                <td>{{$client->Email}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>

        </div>
    </div> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
