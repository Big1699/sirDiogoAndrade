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
        $projectname = isset($_POST['projectname']) ? $_POST['projectname'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE projects SET filename = ?, projectname=? ,description=? WHERE id = ?');
        $stmt->execute([$filename,$projectname,$description, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
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
    <span class="file-name">Filename:</span>
        <label for="filename">
          <input type="file" id="filename" name="filename">
        </label>
    <label> projectname</label>
    <input type="text" id="projectname" name="projectname" value="<?php echo $project['projectname']?>">
    <label> description</label>
    <input type="text" id="description" name="description" value="<?php echo $project['description']?>">
    <input type="submit" name="uploadBtn" value="Upload">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
