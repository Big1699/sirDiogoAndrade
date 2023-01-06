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
    $jobname = isset($_POST['jobname']) ? $_POST['jobname'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $companyname = isset($_POST['companyname']) ? $_POST['companyname'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $filename = isset($_POST['filename']) ? $_POST['filename'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO experience (jobname,date,companyname,location,filename) VALUES (?,?,?,?,?)');
    $stmt->execute([$jobname, $date, $companyname,$location,$filename]);
    // Output message
    $msg = 'Created Successfully!';
    header("location: ./read.php");
}
?>


<div class="content update">
	<h2>Create Experience</h2>
    <form action="create.php" method="post">
        <label for="jobname">JobName</label>
        <input type="text" name="jobname" placeholder="tech" id="jobname">
        <label for="date">Date</label>
        <input type="text" name="date" placeholder="2020-2022" id="date">
        <label for="companyname">CompanyName</label>
        <input type="text" name="companyname" placeholder="bosh" id="companyname">
        <label for="location">Location</label>
        <input type="text" name="location" placeholder="Braga" id="location">
        <label for="companyname">Filename</label>
        <input type="text" name="filename" placeholder="c://file" id="filename">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

