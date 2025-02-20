<h1>Hi, 
    <?php 
        session_start();
        if(isset($_SESSION['fullname'])){
            echo $_SESSION['fullname'] . "Welcome To Masfo Digital Pro";
        } else {
            header("location: login.php");
        }
    ?>
</h1>