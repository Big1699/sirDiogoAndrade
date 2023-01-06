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
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $level = isset($_POST['level']) ? $_POST['level'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE skillslanguages SET name=?,level=?,type = ? WHERE id = ?');
        $stmt->execute([$name, $level, $type, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
        exit();
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM skillslanguages WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('Language or skill doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>


<div class="content update">
	<h2>Update skill/language #<?=$user['id']?></h2>
    <form action="update.php?id=<?=$user['id']?>" method="post">
        
        <label> Nome</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']?>">
        <label> Level</label>
        <input type="number" id="level" name="level" min=0 max=100 value="<?php echo $user['level']?>">
        <label for="name">Type</label>
        <select name="type" id="" required>
            <?php

            for($i = 0; $i < 2; $i++) {
                if($i == $user['type']) {
                    echo "<option value=$i selected>";
                } else {
                    echo "<option value=$i>";
                }
                echo ($i == 0) ? "Skill" : "Language";
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

