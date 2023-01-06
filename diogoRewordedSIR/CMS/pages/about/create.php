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
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $filename = isset($_POST['filename']) ? $_POST['filename'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO aboutme (description,filename) VALUES (?, ?)');
    $stmt->execute([$description, $filename]);
    // Output message
    $msg = 'Created Successfully!';
    header("location: ./read.php");
}
?>


<div class="content update">
	<h2>Create text</h2>
    <form action="create.php" method="post">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Portuguese" id="description">
        <label for="filename">Filename</label>
        <input type="text" name="filename" type="number" placeholder="Very good!" id="filename">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

