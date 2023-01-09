<?php
session_start();
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 20;

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM contacts ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of languages, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
?>


<div class="content read">
<?php
if ($_SESSION["role"] == 1) {
    require_once "../../navbars/navbaradmin.php";
  } else {
    require_once "../../navbars/navbaruser.php";
  }
?>
	<h2>Contacts</h2>
    <button onclick="window.location.href='./create.php'" class="create-contact btn btn-primary m-3">Create contacts</button>
	<table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Social</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['phone']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['social']?></td>
                <td><?=$contact['location']?></td>
                <td class="actions">
                <?php echo "<a href=\"update.php?id={$contact['id']}\" class=\"edit\"><button type='button' class='btn btn-primary m-4'>Edit</button></a>"?>
                <?php echo "<a href=\"delete.php?id={$contact['id']}\" class=\"trash\"><button type='button' class='btn btn-primary m-4'>Delete</button> </a>"?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>
<script src="https://use.fontawesome.com/62e43a72a9.js%22%3E"></script>