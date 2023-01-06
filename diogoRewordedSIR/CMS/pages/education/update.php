<?php
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $schoolname = isset($_POST['schoolname']) ? $_POST['schoolname'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $coursename = isset($_POST['coursename']) ? $_POST['coursename'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $filename = isset($_POST['filename']) ? $_POST['filename'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE education SET schoolname = ?, date = ?, coursename = ?,location = ? ,filename = ? WHERE id = ?');
        $stmt->execute([$schoolname, $date, $coursename,$location,$filename, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM education WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $education = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$education) {
        exit('education doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content update">
	<h2>Update education #<?=$education['id']?></h2>
    <form action="update.php?id=<?=$education['id']?>" method="post">
    <label> schoolname</label>
    <input type="text" id="schoolname" name="schoolname" value="<?php echo $education['schoolname']?>">
    <label> date</label>
    <input type="text" id="date" name="date" value="<?php echo $education['date']?>">
    <label> coursename</label>
    <input type="text" id="coursename" name="coursename" value="<?php echo $education['coursename']?>">
    <label> location</label>
    <input type="text" id="location" name="location" value="<?php echo $education['location']?>">
    <label> filename</label>
    <input type="text" id="filename" name="filename" value="<?php echo $education['filename']?>">
    <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
