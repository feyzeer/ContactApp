<?php
session_start();
include_once 'includes.php';

if (isset($_POST['Add'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Adresse = $_POST['Adresse'];
    $user_id = $_SESSION['user_session'];
    $crud->ADD($Name, $Email, $Phone, $Adresse, $user_id);
    header("location: contact.php");
}
