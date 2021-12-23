<?php 
    $title = 'Edit Record';    
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';

    } else {
        $results = $crud->getSpecialties();

        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetail($id); 

?>

    <h1 class="text-center">Edit record # <?php echo $id ?></h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value= "<?php echo $attendee['attendee_id']?> "/>

        <div class="form-group">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value= "<?php echo $attendee['firstname']?>" id="firstname" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value= "<?php echo $attendee['lastname']?>" id="lastname" name="lastname">
        </div>

        <div class="form-group">
            <label for="dob" class="form-label">Date of birth</label>
            <input type="text" class="form-control" value= "<?php echo $attendee['dateofbirth']?>" id="dob" name="dob">
        </div>

        <div class="form-group">
            <label for="specialty" class="form-label">Area of expertise</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == 
                        $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name'];?>
                    </option>
                <?php }?>
            </select>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value= "<?php echo $attendee['emailaddress']?>" id="email" name="email"
            aria-describedby="emailhelp" >
            <small id="emailhelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value= "<?php echo $attendee['contactnumber']?>" id="phone" name="phone"
            aria-describedby="phonehelp" >
            <small id="phonehelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save changes</button>
    </form>

</div>

<?php } ?>  

<?php require_once 'includes/footer.php'; ?>