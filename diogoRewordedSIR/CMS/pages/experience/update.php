<?php
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $jobname = isset($_POST['jobname']) ? $_POST['jobname'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $companyname = isset($_POST['companyname']) ? $_POST['companyname'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $filename = isset($_POST['filename']) ? $_POST['filename'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE experience SET jobname = ?, date = ?, companyname = ?,location = ? ,filename = ? WHERE id = ?');
        $stmt->execute([$jobname, $date, $companyname,$location,$filename, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM experience WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $experince = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$experince) {
        exit('experince doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content update">
	<h2>Update experince #<?=$experince['id']?></h2>
    <form action="update.php?id=<?=$experince['id']?>" method="post">
    <label> jobname</label>
    <input type="text" id="jobname" name="jobname" value="<?php echo $experince['jobname']?>">
    <label> date</label>
    <input type="text" id="date" name="date" value="<?php echo $experince['date']?>">
    <label> companyname</label>
    <input type="text" id="companyname" name="companyname" value="<?php echo $experince['companyname']?>">
    <label> location</label>
    <input type="text" id="location" name="location" value="<?php echo $experince['location']?>">
    <span class="file-name">Filename:</span>
        <label for="filename">
          <input type="file" id="filename" name="filename">
        </label>
        <input type="submit" name="uploadBtn" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
