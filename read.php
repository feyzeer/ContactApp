<?php
session_start();
require_once 'includes.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./css/contact.css" rel="stylesheet">
  <link href="/index.js" rel="stylesheet">
  <title>Contact.List</title>
</head>

<body>
  <div style="height: 10vh;">
    <div class="container-fluid d-flex " style="align-items:center;   justify-content: space-between; background-color:#9FB4FF; height:10vh; position:relative">
      <a href="contact.php">
        <h3 class=" btn " style="font-size:35px !important; color:#F7F7F7;">ContactApp</h3>
      </a>
      <a href="read.php">
        <div class="contactlist">
          <h3 class=" btn " style="font-size:35px !important; color:#F7F7F7;">ContactList</h3>
          <img class="btn" src="https://img.icons8.com/dotty/80/000000/phone-book.png" width="">
        </div>
      </a>

      <a class="btn " name="logout" style="color: #F7F7F7; font-size:25px !important;" href="sign.php">LogOut</a>
    </div>
  </div>
  <table class="table table-dark mt-5">
    <thead>
      <tr>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Adresse</th>
        <th scope="col">Phonenumber</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $user_id = $_SESSION['user_session'];
      $user =  $crud->Show($user_id); ?>
      <?php
      if (!empty($user)) {
      ?>
        <?php
        foreach ($user as $key => $val) : ?>
          <tr>
            <th><?= $val['Name'] ?></th>
            <td><?= $val['Email'] ?></td>
            <td><?= $val['Adresse'] ?></td>
            <td><?= $val['Phone'] ?></td>
            <td> <a href="update.php?id=<?= $val['idc'] ?>&req=edit" class="btn btn-outline-info">Edit</a></td>
            <td> <a href="actions.php?id=<?= $val['idc'] ?>&req=delete" class="btn btn-outline-danger">Delete</a></td>
          </tr>
      <?php endforeach;
      } ?>
    </tbody>
  </table>