<?php session_start();
    $_SESSION['Volunteer'] = NULL ;
    $_SESSION['Secretary'] = NULL;
    $_SESSION['adminAccess'] = false;
    require_once("functions.php")
?>
<!doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <!-- Bootstrap library and Jquery-->
        <link rel = "stylesheet "href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet "href="css/basicStyle.css">
        <script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"> </script>
    </head>
    <body>
        <div class = "login">
            <h3 class="staffTitle">Welcome</h3> 
            <form action = "adminInitial.php" method ="post">
                <nav class ="staffLogin">
                    <input type ="text" class="logintext" placeholder="Username" value=""/><br><br>
                    <input type ="text" class="logintext"  placeholder="Password" value=""/><br><br>
                    <input class = "vlt" name = "login" type ="submit" value = "Volunteer" /><br><br>
                    <input class = "sec" name = "login" type = "submit" value = "Secretary"/>
                </nav>
            </form>
        </div>
    </body>
    <footer>
        <p class ="copyright">
            &copy; <?php echo date('Y');?> CopyRight
        </p>
    </footer>
</html>
