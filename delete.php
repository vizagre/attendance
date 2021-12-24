<?php 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(isset($_GET['$id'])){

        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    } else {

        $id = $_GET['id'];

        $isSuccess = $crud->deleteAttendee($id);

        if($isSuccess){
            header("Location: viewrecords.php");
        } else {
            include 'includes/errormessage.php';
        }
    }

?>