<?php

require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_POST['uploadBtn']) == 'Criar') {
        $existemDadosPOST = true;
        extract($_POST);
        $dados=array($description);
    
            $fileTmpPath = $_FILES['filename']['tmp_name'];
            $fileName = $_FILES['filename']['name'];
            $fileSize = $_FILES['filename']['size'];
            $fileType = $_FILES['filename']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
    
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','jpeg');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/sirDiogoAndrade/diogoRewordedSIR/img/';
                //$uploadFileDir = '../../uplink/uplouded_files';
                $dest_path = $uploadFileDir . $newFileName;
    
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                $stmt = $pdo->prepare('INSERT INTO aboutme (description,filename) VALUES (?, ?)');
    
                  $stmt->bindParam(1, $dados[0] , PDO::PARAM_STR);
                  $stmt->bindParam(2, $newFileName);
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
	<h2>Create text</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Portuguese" id="description">
        <div class="upload-wrapper">
        <span class="file-name">Filename:</span>
        <label for="filename">
          <input type="file" id="filename" name="filename">
        </label>
      </div>
        <input type="submit" name="uploadBtn" value="Criar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

