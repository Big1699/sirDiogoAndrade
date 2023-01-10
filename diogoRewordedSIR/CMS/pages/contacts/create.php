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
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $social = isset($_POST['social']) ? $_POST['social'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $socialref = isset($_POST['socialref']) ? $_POST['socialref'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO contacts (phone,email,social,location,socialref) VALUES (?,?,?,?,?)');
    $stmt->execute([$phone,$email,$social,$location,$socialref]);
    // Output message
    $msg = 'Created Successfully!';
    header("location: ./read.php");
}
?>


<div class="content update">
	<h2>Create Contacts</h2>
    <form action="create.php" method="post">
        <label for="phone">phone</label>
        <input type="text" name="phone" placeholder="c://file" id="phone">
        <label for="email">email</label>
        <input type="text" name="email" placeholder="email" id="email">
        <label for="social">social</label>
        <input type="text" name="social" placeholder="social" id="social">
        <label for="location">location</label>
        <input type="text" name="location" placeholder="location" id="location">
        <label for="socialref">socialref</label>
        <input type="text" name="socialref" placeholder="socialref" id="socialref">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

