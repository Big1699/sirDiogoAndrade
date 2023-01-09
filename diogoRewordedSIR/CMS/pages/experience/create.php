<?php

require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty

if (isset($_POST['uploadBtn']) == 'Create') {
    $existemDadosPOST = true;
    extract($_POST);
    $dados=array($jobname,$date,$companyname,$location);

        $fileTmpPath = $_FILES['filename']['tmp_name'];
        $fileName = $_FILES['filename']['name'];
        $fileSize = $_FILES['filename']['size'];
        $fileType = $_FILES['filename']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/sirDiogoAndrade/diogoRewordedSIR/img/';
            $uploadFileDir = '../../../img/';
            //$uploadFileDir = '../../uplink/uplouded_files';
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
            $stmt = $pdo->prepare('INSERT INTO experience (jobname,date,companyname,location,filename) VALUES (?, ?, ?, ?,?)');

              $stmt->bindParam(1, $dados[0], PDO::PARAM_STR);
              $stmt->bindParam(2, $dados[1]);
              $stmt->bindParam(3, $dados[2], PDO::PARAM_STR);
              $stmt->bindParam(4, $dados[3], PDO::PARAM_STR);
              $stmt->bindParam(5, $newFileName);
              $stmt->execute();
              header("location: ./read.php");

            }
            else
            {
                echo "error";
                header("location: ./read.php");
            }
            }
        }
?>


<div class="content update">
	<h2>Create Experience</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">

        <label for="jobname">JobName</label>
        <input type="text" name="jobname" placeholder="tech" id="jobname">

        <label for="date">Date</label>
        <input type="text" name="date" placeholder="2020-2022" id="date">

        <label for="companyname">CompanyName</label>
        <input type="text" name="companyname" placeholder="bosh" id="companyname">

        <label for="location">Location</label>
        <input type="text" name="location" placeholder="Braga" id="location">

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

