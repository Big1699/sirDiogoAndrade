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
    $schoolname = isset($_POST['schoolname']) ? $_POST['schoolname'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $coursename = isset($_POST['coursename']) ? $_POST['coursename'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $filename = isset($_POST['filename']) ? $_POST['filename'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO education (schoolname,date,coursename,location,filename) VALUES (?,?,?,?,?)');
    $stmt->execute([$schoolname, $date, $coursename,$location,$filename]);
    // Output message
    $msg = 'Created Successfully!';
    header("location: ./read.php");
}
?>


<div class="content update">
	<h2>Create Education</h2>
    <form action="create.php" method="post">
        <label for="schoolname">schoolname</label>
        <input type="text" name="schoolname" placeholder="tech" id="schoolname">
        <label for="date">Date</label>
        <input type="text" name="date" placeholder="2020-2022" id="date">
        <label for="coursename">coursename</label>
        <input type="text" name="coursename" placeholder="bosh" id="coursename">
        <label for="location">Location</label>
        <input type="text" name="location" placeholder="Braga" id="location">
        <label for="coursename">Filename</label>
        <input type="text" name="filename" placeholder="c://file" id="filename">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

