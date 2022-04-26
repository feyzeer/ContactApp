<?php
require_once 'includes.php';


// Class Contact -> CRUD :

class Contact
{
    private $db;
    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }


    public function Show($user_id)
    {
        $sql = "SELECT * FROM `contact` WHERE id = $user_id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }



    public function ADD($Name, $Email, $Phone, $Adresse, $id)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO contact(id, Name,Email,Phone,Adresse) 
            VALUES(:id, :Name, :Email, :Phone, :Adresse)");
            $stmt->bindParam(":Name", $Name);
            $stmt->bindParam(":Email", $Email);
            $stmt->bindParam(":Phone", $Phone);
            $stmt->bindParam(":Adresse", $Adresse);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserId($user_id)
    {

        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = $user_id");
        $stmt->execute(array(":id_user" => $user_id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getID($id_contact)
    {
        $stmt = $this->db->prepare("SELECT * FROM contact WHERE idc =:id_contact");
        $stmt->execute(array(":id_contact" => $id_contact));
        $idContact = $stmt->fetch(PDO::FETCH_ASSOC);
        return $idContact;
    }
    public function update($Name, $Email, $Phone, $Adresse, $id, $idc)
    {
        try {
            $stmt = $this->db->prepare("UPDATE contact SET Name=:Name,Email=:Email,Phone=:Phone,Adresse=:Adresse
                             WHERE idc= :idc AND id = :id");
            $stmt->bindParam(":Name", $Name);
            $stmt->bindParam(":Email", $Email);
            $stmt->bindParam(":Phone", $Phone);
            $stmt->bindParam(":Adresse", $Adresse);
            $stmt->bindParam(":idc", $idc);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public $idc;
    public function setidc($id)
    {

        $this->idc = $id;
    }

    
    public function Delete()
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM contact WHERE idc=?");
            $stmt->execute([$this->idc]);
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }


}
$crud = new CONTACT($db_conn);
