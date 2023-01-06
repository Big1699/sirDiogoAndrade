<?php
require "../../db/connection.php";

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 20;

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM experience ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of languages, this is so we can determine whether there should be a next and previous button
$num_experiences = $pdo->query('SELECT COUNT(*) FROM experience')->fetchColumn();
?>


<div class="content read">
<?php
require_once "../../navbars/navbaradmin.php";
?>
	<h2>Experience</h2>
    <button onclick="window.location.href='./create.php'" class="create-language btn btn-primary m-3">Create Experience</button>
	<table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Jobname</th>
                <th>Date</th>
                <th>CompanyName</th>
                <th>Location</th>
                <th>Filename</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($experiences as $experience): ?>
            <tr>
                <td><?=$experience['id']?></td>
                <td><?=$experience['jobname']?></td>
                <td><?=$experience['date']?></td>
                <td><?=$experience['companyname']?></td>
                <td><?=$experience['location']?></td>
                <td><?=$experience['filename']?></td>
                <td class="actions">
                <?php echo "<a href=\"update.php?id={$experience['id']}\" class=\"edit\"><button type='button' class='btn btn-primary m-4'>Edit</button></a>"?>
                <?php echo "<a href=\"delete.php?id={$experience['id']}\" class=\"trash\"><button type='button' class='btn btn-primary m-4'>Delete</button> </a>"?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_experiences): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>
<script src="https://use.fontawesome.com/62e43a72a9.js%22%3E"></script>