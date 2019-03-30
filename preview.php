<?php
ini_set('display_errors', 'On');
require 'connection_database.php';
$Id = $_GET["id"];
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/temps','mode' => 'utf-8']);
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'thsarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'thsarabun'
]);
ob_start();
$sql = "SELECT * FROM Student WHERE Id = $Id ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<style>
table{
    width: 100%;
    border-collapse: collapse;
    font-family: thsarabun;
    font-size: 20pt;
}
#tbfoot{
    margin-top:250px;
}

#tbfoot2{
    /*border: 1px solid red;*/
    padding: 10px;
    text-align:center;
}
</style>
<table style="width:100%;" id="sign">
    <tr>
        <td><img src="documents/doc1.png" /></td>
    </tr>
</table>
<table style="width:100%;" id="tbfoot">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <table id="tbfoot2">
                <tr>
                    <td>คำสั่ง / ความเห็น</td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" <?php if($row["Approved"]==1) { echo "checked='checked'"; } ?> > อนุมัติ
                        <input type="checkbox" <?php if($row["Approved"]==0) { echo "checked='checked'"; } ?> > ไม่อนุมัติ
                    </td>
                </tr>
                <tr>
                    <td><?=$row["Comment"]?></td>
                </tr>
                <tr>
                    <td><img src="<?=$row["Signature"]?>" width="150" alt=""></td>
                </tr>
                <tr>
                    <td>(<?=$row["Firstname"]?> <?=$row["Lastname"]?>)</td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($html);
$mpdf->Output();
?>