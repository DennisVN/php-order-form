<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// We are going to use session variables so we need to enable sessions
session_start();

// Storing session data (sensitive stuff)
$_SESSION["email"] = ($_POST['email']);
$_SESSION["street"] = ($_POST['street']);
$_SESSION["streetnumber"] = ($_POST['streetnumber']);
$_SESSION["zipcode"] = ($_POST['zipcode']);

// Use this function when you need to need an overview of these variables // FEEDBACK: TYPO
function whatIsHappening() 
{
    echo '<pre>';
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    echo '</pre>';
}
whatIsHappening();

// TODO: provide some products (you may overwrite the example)
$products = 
[
    ['name' => 'Minecraft Platinum Trophy', 'price' => 999],
    ['name' => 'DOOM (2016) Platinum Trophy', 'price' => 999],
    ['name' => 'Dukem Nukem FOREVER Platinum Trophy', 'price' => 999],
];

$totalValue = 0;

function validate()
{
    // This function will send a list of invalid fields back
    $errors = [];

    if (empty($_POST['email'])) {
        $errors[] = 'email';
    }
    if (empty($_POST['street'])) {
        $errors[] = 'street';
    }
    if (empty($_POST['streetnumber'])) {
        $errors[] = 'streetnumber';
    }
    if (empty($_POST['zipcode'])) {
        $errors[] = 'zipcode';
    }
    if (empty($_POST['products'])) {
        $errors[] = 'products';
    }

    return $errors;
}

function handleForm($products)
{   
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        $message = '';
        foreach ($invalidFields as $invalidField) {
            $message .= "please provide your {$invalidField}.";
            $message .= '<br>';

        }

        return [
            'errors' => true, 
            'message' => $message 
        ]; 

    } else {
        $productNumbers= array_keys($_POST['products']);
        $productNames = [];
        setcookie ('TestCookie', implode($productNames), time() + (60 * 60 * 24 * 30));
        echo $_COOKIE["TestCookie"];
        foreach ($productNumbers as $productNumber) {
            $productNames[] = $products[$productNumber]['name'];
        }
        $message = 'You picked the following trophies : <br> ' . implode (',',$productNames);
        $message .= '<br>';
        $message .= 'Your email address : ' . $_POST['email'];
        $message .= '<br>';
        $message .= 'Your address : ' . $_POST['street'] . ' ' . $_POST['streetnumber'] . ', ' . $_POST['zipcode'] . ' ' . $_POST['city'];
        return [
            'errors' => false, 
            'message' => $message
        ];
        echo 'name';
    }

}

// TODO: replace this if by an actual check
$formSubmitted =  !empty($_POST);
$result = [];
if ($formSubmitted) {
    $result = handleForm($products);
}

require 'form-view.php';
