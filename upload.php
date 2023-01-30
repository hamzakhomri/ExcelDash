<?php
if(isset($_REQUEST['ok'])){
    $xml = new DOMDocument("1.0","UTF-8");
   $xml->load("a.xml");

   $rootTag=$xml->getElementsByTagName("document")->item(0);
   $dataTag=$xml->createElement("data");

   $aTag=$xml->createElement("a",$_REQUEST['a']);
   $bTag=$xml->createElement("b",$_REQUEST['b']);

   $dataTag->appendChild($aTag);
   $dataTag->appendChild($bTag);

   $rootTag->appendChild($dataTag);
   
   $xml->save("a.xml");

}
// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

// Redirecting back
//
  header("Location: "."index.php?UploadSuccés");
?>
