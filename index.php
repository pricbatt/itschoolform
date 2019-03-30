<?php
    $servername = "localhost";
    $username = "mfu";
    $password = "Mfuworkshop@2019";
    $dbname = "mfuworkshop";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    $sql = "SELECT * FROM Student";
    $result = $conn->query($sql);
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
    <div class="container">
        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> รายชื่อนักศึกษา</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <colgroup>
                    <col class="col-xs-1">
                    <col class="col-xs-7">
                    <col class="col-xs-2">
                </colgroup>
                <thead> 
                    <tr> 
                        <th>ลำดับ</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th style="text-align: center;">
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> เพิ่มข้อมูลใหม่</button>
                        </th>
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
                        <td><?=$row["Firstname"]?> <?=$row["Lastname"]?></td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> แก้ไข</button>
                            <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบข้อมูล</button>
                        </td>
                    </tr>
                    <?php
                        $index++; 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>