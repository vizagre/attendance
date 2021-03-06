<?php 
    $title = 'Sucess';    
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob']; 
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess){
            SendEmail::SendMail($email, 'Welcome to IT Conference 2021', 'You have successfully registerted for this year\'s IT Conference');
            include 'includes/successmessage.php';
            
        } else {
            include 'includes/errormessage.php';
        }
    }

?>

    <div class="card" style="width: 26rem;">
        <div class="card-body">
            <h4 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
            </h4>
            
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name'];  ?>  
            </h6>

            <p class="card-text">
                Date of birth: <?php echo $_POST['dob']; ?>
            </p>

            <p class="card-text">
                Email adress: <?php echo $_POST['email']; ?>
            </p>

            <p class="card-text">
                Contact Number: <?php echo $_POST['phone']; ?>
            </p>

        </div>
    </div>


<?php require_once 'includes/footer.php'; ?>