
<?php
session_start();
require_once 'includes.php';

$user_id = $_SESSION['user_session'];
$contact = new Contact($db_conn);

if (isset($_GET['req']) and $_GET['req'] == 'delete') {

    try {

        if (isset($_GET['id'])) {
            echo "we are here";

            $contact->setidc($_GET['id']);
            if ($contact->Delete()) header("Location:read.php");
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }
}




