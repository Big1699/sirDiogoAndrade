<?php

// 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ..\auth\login.php");
    exit;
}

require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE users SET role = ? WHERE id = ?');
        $stmt->execute([$role, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
        exit();
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('Language doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>


<div class="content update">
	<h2>Update user #<?=$user['id']?></h2>
    <form action="update.php?id=<?=$user['id']?>" method="post">
        
        <label for="name" value=<?php echo $user['username'] ?> >Username : <?php echo $user['username'] ?></label>
        
        <label for="name">Role</label>
        <select name="role" id="" required>
            <?php

            for($i = 0; $i < 2; $i++) {
                if($i == $user['role']) {
                    echo "<option value=$i selected>";
                } else {
                    echo "<option value=$i>";
                }
                echo ($i == 0) ? "Manager" : "Admin";
                echo "</option>";
            }

            ?>
        </select>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
