<?php include '../view/header.php'; ?>
<main>
    <h1>Login Page </h1>
    <form action="../login/" method="post" id="show_form">
        <input type="hidden" name="action" value="show_form">
        
        <label>Email:</label> <input type="input" name="email"> <br><br>
        
        <label>Password:</label> <input type="input" name="passwd"> <br> <br>

        <input id="submit"  type="submit" value="Login">
        <br>
    </form>
</main>
<?php include '../view/footer.php'; ?>
