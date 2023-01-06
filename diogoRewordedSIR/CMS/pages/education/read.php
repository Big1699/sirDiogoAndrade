<?php
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 20;

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM education ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of languages, this is so we can determine whether there should be a next and previous button
$num_educations = $pdo->query('SELECT COUNT(*) FROM education')->fetchColumn();
?>


<div class="content read">
<?php
require_once "../../navbars/navbaradmin.php";
?>
	<h2>education</h2>
    <button onclick="window.location.href='./create.php'" class="create-language btn btn-primary m-3">Create education</button>
	<table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>schoolname</th>
                <th>Date</th>
                <th>coursename</th>
                <th>Location</th>
                <th>Filename</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educations as $education): ?>
            <tr>
                <td><?=$education['id']?></td>
                <td><?=$education['schoolname']?></td>
                <td><?=$education['date']?></td>
                <td><?=$education['coursename']?></td>
                <td><?=$education['location']?></td>
                <td><?=$education['filename']?></td>
                <td class="actions">
                <?php echo "<a href=\"update.php?id={$education['id']}\" class=\"edit\"><button type='button' class='btn btn-primary m-4'>Edit</button></a>"?>
                <?php echo "<a href=\"delete.php?id={$education['id']}\" class=\"trash\"><button type='button' class='btn btn-primary m-4'>Delete</button> </a>"?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_educations): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>
<script src="https://use.fontawesome.com/62e43a72a9.js%22%3E"></script>