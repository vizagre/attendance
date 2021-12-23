<?php 
    require_once 'db/conn.php';

    if(isset($_GET['$id'])){

        echo 'Error!';
    } else {

        $id = $_GET['id'];

        $isSuccess = $crud->deleteAttendee($id);

        if($isSuccess){
            header("Location: viewrecords.php");
        } else {
            echo 'Error!';
        }
    }

?>