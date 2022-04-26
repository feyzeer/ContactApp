<?php
session_start();
require_once 'includes.php';

$user_id = $_SESSION['user_session'];
$crud = new Contact($db_conn);
if(isset($_GET['id']))
{
 $id = $_GET['id'];
 extract($crud->getID($id)); 
}

if (isset($_GET['req']) && $_GET['req'] == 'edit') {
    try {
        //$id = (int)$_GET['id'];
        /*if (isset($id)) {
            //echo $id;
            $contact->setidc($id);*/
            if(isset($_POST['btn-update']) && isset($_GET['id'])){
                
                $id      = $_GET['id'];
                $Name    = $_POST['Name'];
                $Email   = $_POST['Email'];
                $Phone   = $_POST['Phone'];
                $Adresse = $_POST['Adresse'];
                $user_id = $_SESSION['user_session'];
                if($crud->update($Name, $Email, $Phone, $Adresse, $user_id,$id)){
                    header('location: read.php');
 
                    }else{
                        echo"error";
                    }
            }


        //}
            // if ($contact->Delete()) header("Location:read.php");

            
        
    } catch (Exception $th) {
        echo $th->getMessage();
    }
};




/*$popup = `
<div class="container mx-auto mt-4 rounded-pill">
<div class="row">
  <div class="col-md-4 rounded-pill">
    <div class="card text-center d-flex align-items-center" style="width: 18rem;">
      <img src="./imgs//téléchargement.png" class="card-img-top rounded-circle" alt="..." height="300px">
      <div class="card-body">
        <h5 class="card-title">Contact Infos</h5>
        <form action="add.php" method="post">
          <div class="form-group">
            <label for="fullname validationCustom01"> entrer votre nom complet</label>
            <input class="rounded bg-clr" type="text" placeholder="nomComplet" name="Name">
          </div>


          <div class="form-group">
            <label for="email">entrer votre email</label>
            <input type="text" placeholder="email" name="Email">
          </div>


          <div class="form-group">
            <label for="adresse">entrer votre adresse</label>
            <input type="text" placeholder="Adresse" name="Adresse">
          </div>


          <div class="form-group">
            <label for="numero de tel">entrer votre numero de tel </label>
            <input type="number" placeholder="GSM" name="Phone">
          </div>



          <a href="#" class="btn mr-2"><i class="fas fa-link"></i> Visit Site</a>
          <div class="btns">
            <button name="Add" type="submit" class="btn btn-outline-success">Add Contact</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="svgs m-0">
    <img src="./imgs/Long distance relationship-amico.svg" alt="" style="height: 90vh;">
  </div>
</div>
</div>
`;*/


//     // echo "we are here";
//     // die;
//     if (isset($id)) {
//         $contact->setidc($id);
//         echo `
//             $id
//         `;
//     }
// }
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
    <?php
    include 'nav.php';
    ?>
<div style="height: 90vh;">
    <div class="container mx-auto mt-4 rounded-pill">
      <div class="row">
        <div class="col-md-4 rounded-pill">
          <div class="card text-center d-flex align-items-center" style="width: 18rem;">
            <img src="./imgs//téléchargement.png" class="card-img-top rounded-circle" alt="..." height="300px">
            <div class="card-body">
              <h5 class="card-title">UPDATE YOUR CONTACT HERE</h5>
              <form action="" method="post">
                <div class="form-group">
                  <label for="fullname validationCustom01"> entrer votre nouveau nom complet</label>
                  <input class="rounded bg-clr" type="text" name="Name" value="<?php if(isset($Name))  echo $Name;    ?>">
                </div>


                <div class="form-group">
                  <label for="email">entrer votre nouveau email</label>
                  <input type="text"  name="Email" value="<?php if(isset($Email)) echo $Email; ?>">
                </div>


                <div class="form-group">
                  <label for="adresse">entrer votre nouvelle adresse</label>
                  <input type="text"  name="Adresse" value="<?php if(isset($Adresse)) echo $Adresse; ?>">
                </div>


                <div class="form-group">
                  <label for="numero de tel">entrer votre  numero de tel </label>
                  <input type="number" name="Phone" value="<?php if(isset($Phone )) echo $Phone;  ?>">
                </div>



                <a href="#" class="btn mr-2"><i class="fas fa-link"></i> Visit Site</a>
                <div class="btns">
                <input type="hidden" name ="id" value="<?= isset( $id) ?  $id: "" ?>">
                  <button name="btn-update" type="submit" class="btn btn-outline-success">UPDATE Contact</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="svgs m-0">
          <img src="./imgs/Long distance relationship-amico.svg" alt="" style="height: 90vh;">
        </div>
      </div>
    </div>
</body>


