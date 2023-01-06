<?php 
    session_start();
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];
?>
    <!DOCTYPE html>
<html>
<body>

<?php 
if($role == 1)
require_once "../../navbars/navbaradmin.php";
else
require_once "../../navbars/navbaruser.php";
?>
<h1> Hello <?php echo $username ?></h1>
<p>My first paragraph.</p>
</body>
</html>