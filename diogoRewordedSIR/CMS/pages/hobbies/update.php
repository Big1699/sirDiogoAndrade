<?php
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $filename = isset($_POST['filename']) ? $_POST['filename'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE hobbies SET filename = ?, description=? WHERE id = ?');
        $stmt->execute([$filename,$description, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM hobbies WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$project) {
        exit('project doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content update">
	<h2>Update project #<?=$project['id']?></h2>
    <form action="update.php?id=<?=$project['id']?>" method="post">
    <label> filename</label>
    <input type="text" id="filename" name="filename" value="<?php echo $project['filename']?>">
    <label> description</label>
    <input type="text" id="description" name="description" value="<?php echo $project['description']?>">
    <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
