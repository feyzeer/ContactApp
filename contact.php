<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="css/contact.css" rel="stylesheet">
  <link href="/index.js" rel="stylesheet">
  <title>Contact.App</title>
</head>

<body style="height: 100vh;">
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
  <div style="height: 90vh;">
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
  </div>
</body>


</html>