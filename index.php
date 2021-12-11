<?php 
    $title = 'index';    
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="sucess.php">
        <div class="form-group">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="form-group">
            <label for="dob" class="form-label">Date of birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>

        <div class="form-group">
            <label for="specialty" class="form-label">Area of expertise</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'];?></option>
                <?php }?>
            </select>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email"
            aria-describedby="emailhelp" >
            <small id="emailhelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone"
            aria-describedby="phonehelp" >
            <small id="phonehelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php require_once 'includes/footer.php'; ?>