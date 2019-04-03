<?php
    require 'connection_database.php';
    $sql = "SELECT * FROM Student ORDER BY id DESC ";
    $result = $conn->query($sql);
?><?php
header('Content-Type: text/html; charset=utf-8');

  session_start();
  if($_SESSION['UserID'] == "")
  {
    header('Location: index.php');
   // header("Refresh:0; url=index.php");
    exit();}
  // }if($_SESSION["Status"] == "1")
  //       {
  //       header("location:welcome1.php");
  //         exit();
  //       }
       


  
  require 'connection_database.php';

  $strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
  mysqli_query($conn,"SET NAMES utf8");
  $objQuery = mysqli_query($conn,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
     <!-- Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">

    <div class="container">
        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> เอกสารรอการจ่ายงานนะจ๊ะ</h1><?php echo $objResult["name"];?> <hr>
        <div><a href="add.php" class="btn btn-danger">เพิ่มข้อมูลใหม่</a></div><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <colgroup>
                    <col class="col-xs-1">
                    <col class="col-xs-4">
                    <col class="col-xs-5">
                </colgroup>
                <thead> 
                    <tr> 
                        <th>ลำดับ</th>
                        <th>เลขที่เอกสาร</th>
                        <th>ชื่อ</th>
                        <th>วันที่</th>
                        <th style="text-align: center;">อนุมัติ
                            <!-- <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> เพิ่มข้อมูลใหม่</button> -->
                        </th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $index = 1;
                        while($row = $result->fetch_assoc())
                        { 
                    ?>
                    <tr>
                        <td><?=$index?></td>
                        <td><?=$row["docname"]?></td>
                        <td><?=$row["Firstname"]?> <?=$row["Lastname"]?></td>
                        <th><?=$row["created"]?></th>
                        <td style="text-align: center;">
                            <a href="edit.php?id=<?=$row["Id"]?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> อนุมัติ
                            </a>
                            <!-- <a onclick="return confirm('คุณต้องการลบข้อมูล <?=$row["Firstname"]?> <?=$row["Lastname"]?> ใช่หรือไม่?');" href="index.php?id=<?=$row["Id"]?>&mode=delete" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบข้อมูล
                            </a> -->
                        </td>
                        <td><a href="preview.php?id=<?=$row["Id"]?>" target="_blank" class="btn btn-primary">PDF</a></td>
                    </tr>
                    <?php
                        $index++; 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>