<?php
// sessione:
// session_start();
// var_dump($_SESSION);

//? input lunghezza password:
$password_length = intval($_GET['password-length']);
//// var_dump($password_length);

//? variabili:
$alpha = 'abcdefghijklmnopqrstuvwxyz';
$num = '0123456789';
$simbol= '@!?#$';

//? array alfanumerico:
$alpha_num_array = genAlphaNumArray($alpha, $num, $simbol);
//// var_dump($alpha_num_array);

//? password generata:
$password = genPassword($password_length, $alpha_num_array);
echo $password;


//* funzione principale per generare password:
function genPassword($length, $characters) {

    $length_char = count($characters);
    $random_password = '';

    for($i=0; $i<$length; $i++) {
        $character = '';
        $character .= $characters[rand(0, $length_char - 1)];
        // creo maiuscole random:
        if (!is_numeric($character) && rand(0, 1) === 1) {
            $character = strtoupper($character);
        }
        $random_password .= $character;
    }

    return $random_password;
};

//* funzione per creare array di lettere, numeri e simboli:
function genAlphaNumArray($alpha, $num, $simbol) {
    $list = [];
    // ciclo lettere, numeri e simboli:
    for ($i=0; $i < strlen($alpha) ; $i++) { 
       $list[] = $alpha[$i]; 
    };
    for ($i=0; $i < strlen($num) ; $i++) { 
       $list[] = $num[$i]; 
    };
    for ($i=0; $i < strlen($simbol) ; $i++) { 
       $list[] = $simbol[$i]; 
    };
    return $list;
};


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
    <header>
        <h1 class="text-center p-3">Password Generator</h1>
    </header>
    <main>
        <!-- form per inviare password -->
        <div class="container">
            <form action="index.php" method="GET">
                <div class="mb-3 col-5 my-5">
                    <label for="password-length" class="form-label">Stabilisci lunghezza password</label>
                    <input type="number" class="form-control" id="password-length" name="password-length" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Enter the length of the password to be generated</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </main>

    <footer class="text-center p-3">
        ©byHYONS™
    </footer>

</body>

</html>