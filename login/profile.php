<?php include '../view/header.php'; ?>
<main>
    <h2> Name : <?php echo $instructor->get_name(); ?> </h2>
    
    <form action="../login/" method="post" id="logout_form">
        <input type="hidden" name="action" value="logout_form">
        <input id="right-submit" type="submit" value="Logout">
    </form>
    
    <br> <br>
        <a class="link" href="../login/getinfo.php">Personal Details</a> <br> <br>
        <a class="link" href="../login/getcourse.php">Course Details</a> <br> <br>
    <br> <br>
</main>
<?php include '../view/footer.php'; ?>
