<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD client liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>Ajouter client</h1>
                <hr>

                <?php if (session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo session('status'); ?>
                    </div>
                <?php endif; ?>

                <ul>
                    <?php foreach ($errors->all() as $error): ?>
                    <li class="alert alert-danger"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>


                <form action="/ajouter/traitement" method="POST" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="FName" class="form-label">First name</label>
                        <input type="text" class="form-control" id="FName" name="FName">
                    </div>
                    <div class="form-group">
                        <label for="LName" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="LName" name="LName">
                    </div>
                    <div class="form-group">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <br><br>
                    <a href="/client" class="btn btn-danger">revenir</a>
                </form>

                
            </div>

        </div>
    </div> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
