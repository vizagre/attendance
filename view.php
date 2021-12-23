<?php 
    $title = 'View Record';    
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';

    } else {

        $id = $_GET['id'];
        $result = $crud->getAttendeeDetail($id); 
?>

<div class="card" style="width: 30rem;">
    <div class="card-body">
        <h4 class="card-title">
            <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
        </h4>
        
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?>
        </h6>

        <br/>
        <p class="card-text">
            Date of birth: <?php echo $result['dateofbirth']; ?>
        </p>

        <p class="card-text">
            Email adress: <?php echo $result['emailaddress']; ?>
        </p>

        <p class="card-text">
            Contact Number: <?php echo $result['contactnumber']; ?>
        </p>

    </div>
</div>

<?php } ?>  

<?php require_once 'includes/footer.php'; ?>