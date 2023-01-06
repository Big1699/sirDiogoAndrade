<?php

require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $level = isset($_POST['level']) ? $_POST['level'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO skillslanguages (name,level,type) VALUES (?, ?,?)');
    $stmt->execute([$name, $level, $type]);
    // Output message
    $msg = 'Created Successfully!';
    header("location: ./read.php");
}
?>


<div class="content update">
	<h2>Create language</h2>
    <form action="create.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Portuguese" id="name">
        <label for="level">Level</label>
        <input type="number" name="level" type="number" min="0" max="100" placeholder="Very good!" id="level">
        <select name="type"class="form-select form-control form-control-lg">
            <option>Select:</option>
            <option value=0>Skill</option>
            <option value=1>Language</option> 
        </select>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

