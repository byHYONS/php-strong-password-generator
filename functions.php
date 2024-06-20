<?php

if (isset($_GET['password-length'])) {
    $password_length = intval($_GET['password-length']) ? $_GET['password-length'] : 8;
    $password = generatePassword($password_length);
    header("Location: index.php?password=" . urlencode($password));
    exit();
}

// Funzione principale per generare password
function generatePassword($password_length)
{
    // Variabili
    $alpha = 'abcdefghijklmnopqrstuvwxyz';
    $num = '0123456789';
    $simbol = '@!?#$';

    // Array alfanumerico
    $alpha_num_array = genAlphaNumArray($alpha, $num, $simbol);

    // Password generata
    return genPassword($password_length, $alpha_num_array);
}

// Funzione per creare la password
function genPassword($length, $characters)
{
    $length_char = count($characters);
    $random_password = '';

    for ($i = 0; $i < $length; $i++) {
        $character = $characters[rand(0, $length_char - 1)];
        // Creo maiuscole random
        if (!is_numeric($character) && rand(0, 1) === 1) {
            $character = strtoupper($character);
        }
        $random_password .= $character;
    }

    return $random_password;
}

// Funzione per creare array di lettere, numeri e simboli
function genAlphaNumArray($alpha, $num, $simbol)
{
    $list = [];
    // Ciclo lettere
    for ($i = 0; $i < strlen($alpha); $i++) {
        $list[] = $alpha[$i];
    }
    // Ciclo numeri
    for ($i = 0; $i < strlen($num); $i++) {
        $list[] = $num[$i];
    }
    // Ciclo simboli
    for ($i = 0; $i < strlen($simbol); $i++) {
        $list[] = $simbol[$i];
    }
    return $list;
}
