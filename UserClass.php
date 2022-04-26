
<?php

require_once 'includes.php';
class User{
    private $db;

    function __construct($db_conn){
        $this->db = $db_conn;
    }

    public function register($Name,$password ,$email){
        try{
           $stmt = $this->db->prepare("INSERT INTO user(Name, password,email) VALUES ('$Name','$password','$email')");
           $stmt->execute();
           return true;
        }
        catch(PDOException $e){
           die ($e->getMessage());
           return false;
        }
     }


        public function login($Name,$password)
{
   try
   {
       //check
      $stmt = $this->db->prepare("SELECT * FROM user WHERE Name=:Name AND password=:Pass");
      $stmt->bindParam(':Pass', $password);
      $stmt->bindParam(':Name', $Name);
      $stmt->execute();
      $userRow =$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount()>0){
          $_SESSION['user_session']=$userRow['id'];
          return true;
      }

      }
   catch(PDOException $e)
   {
       echo $e->getMessage();

   }
   return false;

}
}