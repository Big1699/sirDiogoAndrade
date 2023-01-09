<?php
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the text id exists, for example update.php?id=1 will get the text with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $filename = isset($_POST['filename']) ? $_POST['filename'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE aboutme SET description = ?, filename = ? WHERE id = ?');
        $stmt->execute([$description, $filename, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the text from the texts table
    $stmt = $pdo->prepare('SELECT * FROM aboutme WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $text = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$text) {
        exit('Text doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>


<div class="content update">
	<h2>Update text #<?=$text['id']?></h2>
    <form action="update.php?id=<?=$text['id']?>" method="post">

        <label for="description">Name</label>
        <input type="text" name="description" placeholder="Description" value="<?=$text['description']?>" id="description">
        <span class="file-name">Filename:</span>
        <label for="filename">
          <input type="file" id="filename" name="filename">
        </label>
        <input type="submit" name="uploadBtn" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
