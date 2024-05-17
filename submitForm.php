<?php

session_start();
include 'dbconfig.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$address = $_POST['address'];
$address2 = $_POST['address'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$cardName = $_POST['cardName'];
$cardNumber = $_POST['cardNumber'];
$expiration = $_POST['expiration'];
$cvv = $_POST['cvv'];

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['userName'] = $userName;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['address2'] = $address2;
$_SESSION['country'] = $country;
$_SESSION['state'] = $state;
$_SESSION['zip'] = $zip;
$_SESSION['cardName'] = $cardName;
$_SESSION['cardNumber'] = $cardNumber;
$_SESSION['expiration'] = $expiration;
$_SESSION['cvv'] = $cvv;

$sql = "INSERT INTO member (firstname, lastname, username, email, address, address2, country, state, zip, name_on_card, card_number, expiration, cvv) VALUES ('$firstName', '$lastName', '$userName', '$email', '$address', '$address2', '$country', '$state', '$zip', '$cardName', '$cardNumber', '$expiration', '$cvv')";

if($conn->query($sql) === TRUE){
    header("Location: upsell1/upsell.php");
    exit();
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>