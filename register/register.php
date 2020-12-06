<?php include '../view/header.php'; ?>
<main>
    <h1>Instructor's registration html form </h1>

    <form action="../register/index.php" method="post" id="register_form">
        
        <label>Id:</label> <input type="input" name="id"> <br>
        
        <label>Name:</label> <input type="input" name="name"> <br>

        <label>Gender:</label> <input type="input" name="gender"> <br>
        
        <label>Birth Date:</label> <input type="input" name="birth_date"> <br>
        
        <label>Address:</label> <input type="input" name="address"> <br>
        
        <label>Email:</label> <input type="input" name="email"> <br>
           
        <label>Password:</label> <input type="input" name="password"> <br>
        

        <input type="hidden" name="action" value="register_form">
        <input id="submit" type="submit" value="Register"><br><br><br><br>

    </form>
</main>
<?php include '../view/footer.php'; ?>
