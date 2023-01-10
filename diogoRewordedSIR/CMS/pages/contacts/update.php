<?php
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the language id exists, for example update.php?id=1 will get the language with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $social = isset($_POST['social']) ? $_POST['social'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $socialref = isset($_POST['socialref']) ? $_POST['socialref'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE contacts SET phone = ?, email=?,social=?,location=?,socialref=? WHERE id = ?');
        $stmt->execute([$phone,$email,$social,$location,$socialref, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header("Location: read.php");
    }
    // Get the language from the languages table
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content update">
	<h2>Update contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
    <label> phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo $contact['phone']?>">
    <label> email</label>
    <input type="text" id="email" name="email" value="<?php echo $contact['email']?>">
    <label> social</label>
    <input type="text" id="social" name="social" value="<?php echo $contact['social']?>">
    <label> location</label>
    <input type="text" id="location" name="location" value="<?php echo $contact['location']?>">
    <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
