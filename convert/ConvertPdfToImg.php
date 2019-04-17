<?php 

$pdfAbsolutePath = __DIR__."/save/output_short.pdf";

if (move_uploaded_file($_FILES['templateDoc']["tmp_name"], $pdfAbsolutePath)) {

  $img = new \Imagick();
  $img->setResolution(300, 300);
  $img->readImage($_SERVER['DOCUMENT_ROOT'] . '/test/index.pdf');
  $num_pages = $img->getNumberImages();
  $img->setImageCompressionQuality(100);
  
  for ($i = 0; $i < $num_pages; $i++) {
      $img->setIteratorIndex($i);
      $img->setImageFormat('jpeg');
      $img->writeImage(__DIR__."/save/img/".($i+1).'-'.rand().'.jpg');
  }
  
  $img->destroy();

echo "<script>
alert('All pages of PDF is converted to images');
window.history.go(-2);
</script>";
}else{
  echo "PDF doesn't have any pages";
  header('Location: index.php');

}

?> 
