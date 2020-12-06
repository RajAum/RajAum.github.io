<?php include '../view/header.php'; ?>
<main>
    
    <h2> Profile Information  :  <?php echo $instructor->get_name(); ?> </h2>
    
    <label>Id : </label>
    <p><?php echo $instructor->get_id(); ?></p> 
    <br>
    
    <label>Gender: </label>
    <p><?php echo $instructor ->get_gender();?></p>
    <br>

    <label>Email: </label>
    <p><?php echo $instructor->get_email(); ?></p>
    <br>

    <label>Password: </label>
    <p><?php echo $instructor->get_password(); ?></p>
    <br>
    
    <label>Address: </label>
    <p><?php echo $instructor->get_address(); ?></p>
    <br>
    

</main>
<?php include '../view/footer.php'; ?>
