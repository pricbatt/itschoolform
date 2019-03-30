<?php
    require 'connection_database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูล</title>
</head>
<body>
    <div class="container">
    <form>
        <div class="form-group">
            <label>ชื่อ</label>
            <input type="text" class="form-control" id="Firstname" placeholder="Firstname">
        </div>
        <div class="form-group">
            <label>นามสกุล</label>
            <input type="text" class="form-control" id="Lastname" placeholder="Lastname">
        </div>
        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            บันทึกข้อมูล
        </button>
    </form>
    </div>
</body>
</html>