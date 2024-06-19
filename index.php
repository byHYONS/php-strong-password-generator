<?php
$password = isset($_GET['password']) ? $_GET['password'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
    <header>
        <h1 class="text-center p-3">Password Generator</h1>
    </header>
    <main>
        <div class="container">
            <?php if ($password) : ?>
                <h3 class="text-center">La password generata è:</h3>
                <div class="alert alert-info mt-5" role="alert">
                    <p class="text-center "><?php echo $password; ?></p>
                </div>
            <?php else : ?>
                <form action="functions.php" method="GET">
                    <div class="mb-3 col-5 my-5">
                        <label for="password-length" class="form-label">Stabilisci lunghezza password</label>
                        <input type="number" class="form-control" id="password-length" name="password-length" aria-describedby="passwordHelp">
                        <div id="passwordHelp" class="form-text">Enter the length of the password to be generated</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php endif; ?>
        </div>
    </main>

    <footer class="text-center p-3">
        ©byHYONS™
    </footer>
</body>

</html>