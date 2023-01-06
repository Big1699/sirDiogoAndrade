<?php
  session_start();

  require('../../db/connection.php');
  $pdo = pdo_connect_mysql();
  # podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
  $INSTRUCAO = $pdo->prepare('SELECT * from users WHERE id != :id');
  $INSTRUCAO->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
  $INSTRUCAO->execute();
  # definir o fetch mode
  $INSTRUCAO->setFetchMode(PDO::FETCH_ASSOC);
  $username = $_SESSION["username"];


  #criar utilizador 
  $usernamenew = $passwordnew = $rolenew = $confirm_password = "";
$username_err = $password_err = $role_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please fill username.";
    } 
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Wrong username pattern!";
    } 
    else{
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Username already exists!";
                } 
                else{
                    $usernamenew = trim($_POST["username"]);
                }
            } 
            else{
                echo "Ups! Try again please.";
            }

            unset($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Pelase fill password.";     
    } 
    elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password need to be at least 6 chareters.";
    } 
    else{
        $passwordnew = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please fill confirm password.";     
    }
    else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($passwordnew != $confirm_password)){
            $confirm_password_err = "Passwords missmatch!";
        }
    }
    if(empty(trim($_POST["role"]))){
      $role_err = "Please fill role.";
    } else{
        $rolenew = trim($_POST["role"]);
    }
    
    if(empty($username_err) && empty($password_err)&& empty($role_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password,:role)";
         
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":role", $param_role, PDO::PARAM_STR);
            $param_username = $usernamenew;
            $param_role = $rolenew;
            $param_password = password_hash($passwordnew, PASSWORD_DEFAULT); // Creates a password hash
            
            if($stmt->execute()){
                header("location: welcome.php");
            } 
            else{
                echo "Ups! Try again please.";
            }

            unset($stmt);
        }
    }
    
    unset($pdo);
}
  ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="../../Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<script src="../../sir.js"></script>
<?php require_once "../../navbars/navbaradmin.php"; ?>

<main class="container">
    <h1>Listar Utilizadores</h1>

    <a href="create.php">
        <button type="button" class="btn btn-primary m-4">Create User</button> </a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>

        <?php

        while($row = $INSTRUCAO->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<th scope=\"row\">{$row['id']}</th>";
            echo "<td>{$row['username']}</td>";
            echo ($row['role'] == 0) ? "<td>Manager</td>" : "<td>Administrador</td>";
            echo "<td><a href=\"update.php?id={$row['id']}\" class=\"edit\"><button type='button' class='btn btn-primary m-4'>Edit</button></a>";
            echo "<a href=\"delete.php?id={$row['id']}\" class=\"trash\"><button type='button' class='btn btn-primary m-4'>Delete</button> </a> </td>";
            echo "</tr>";
        }

        ?>

        </tbody>
    </table>
</main>

</body>
</html>

<script src="https://use.fontawesome.com/62e43a72a9.js%22%3E"></script>