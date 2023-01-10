<?php

require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (isset($_POST['uploadBtn']) == 'Criar') {
    $existemDadosPOST = true;
    extract($_POST);
    $dados=array($projectname,$description,$ref1);

        $fileTmpPath = $_FILES['filename']['tmp_name'];
        $fileName = $_FILES['filename']['name'];
        $fileSize = $_FILES['filename']['size'];
        $fileType = $_FILES['filename']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            //$uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/sirDiogoAndrade/diogoRewordedSIR/img/';
            $uploadFileDir = '../../../img/';
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
            $stmt = $pdo->prepare('INSERT INTO projects (projectname,description,ref1,filename) VALUES (?, ?, ?, ?)');

              $stmt->bindParam(1, $dados[0] , PDO::PARAM_STR);
              $stmt->bindParam(2, $dados[1] , PDO::PARAM_STR);
              $stmt->bindParam(3, $dados[2] , PDO::PARAM_STR);
              $stmt->bindParam(4, $newFileName);
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
	<h2>Create Project</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
    <span class="file-name">Filename:</span>
        <label for="filename">
          <input type="file" id="filename" name="filename">
        </label>
        <label for="projectname">projectname</label>
        <input type="text" name="projectname" placeholder="projectname" id="projectname">
        <label for="description">description</label>
        <input type="text" name="description" placeholder="description" id="description">
        <label for="ref1">First Link</label>
        <input type="text" name="ref1" placeholder="ref1" id="ref1">
        <input type="submit" name="uploadBtn" value="Criar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

