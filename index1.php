<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js" integrity="sha256-JDVyLQRqvRSTL/6WaPud93JXpfEdW11zwjqhoNgkGXc=" crossorigin="anonymous"></script>
    <script src="./BarcodeScanner.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/index.css" /> 
    <title>Document</title>
</head>
<script>
    function Search_2() 
  {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
     }
    }
</script>

<script>

//  var excel = new ActiveXObject('Excel.Application');

// var excel_file = excel.Workbooks.Open("Book1.xlsx");
// var excel_sheet = excel.Worksheets(1);
// var rows = excel_sheet.UsedRange.Rows.Count;

// if (window.ActiveXObject) {
//     try {
//         var wordApp = new ActiveXObject ("Word.Application");
//         wordApp.Visible = true;
//         var doc = wordApp.Documents.Add ();
//         var sel = wordApp.Selection;
//         sel.TypeText("Text Content");
//     }
//     catch (e) {
//         alert (e.message);
//     }
// }
// else {
//     alert ("Your browser does not support this example.");
// }

</script>
<body onload="myFunction()">
<a href="https://www.youtube.com/watch?v=T3_-I_mPF-U"> SELECT INDEX ON TABLE AND SHOW IN INPUT</a>
<form method="POST" action="upload.php" enctype="multipart/form-data">



    <div>
        <input type="file" name="file" id="myFile" onchange="myFunction()"  require>
        <br><br>
        <input type="text" name="a" id="InputFileName" placeholder="Insert a" value="" required >
        <input type="text" name="b" id="InputSizeeName" placeholder="Insert B" value="" required >
        <input type="text" name="b" id="InputCountFile" placeholder="Insert B" value="" required >
        <input type="submit" value="Upload" name="ok">
        <br><br>
<br><br><br></form>



<?php $files = scandir("uploads"); 
$_num_files ="";
 $num_files= (int)$_num_files;
 $_num_files = count($files);
    echo $_num_files-2 ." Files ";

    if($_num_files-2<=0){
        echo '<script>alert("Aucune File Existe")</script>';
    }
   ?>
   <br><br>

<table id="files" style="width: 100%;">
    <th>File Name</th><th>Download</th><th>Delete</th>
    <?php
    $files = scandir("uploads"); 
    for ($a = 2; $a < count($files); $a++)
    { 
      echo("Hi :".$files[2]); ?>
  
  <tr id ="tr_files">
      <td id="td_files">
        <?php echo $files[$a]; ?>
      </td>
  
      <td id="td_files">
        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">Download</a>
      </td>
  
      <td id="td_files">
        <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;"> Delete </a>
      </td>
  
  </tr>
  <?php } ?>
</table>
<br></div>






<br><br>
 <input type="text" id="myInput" onkeyup="Search()" onchange="onchange(this)"  placeholder="Search for names.." title="Type in a name">
 <input type="button" value="Search ..." onclick="Search_2()">
 
 <table  class="table" id="myTable">
   <th>Code Bare</th>   <th>Name</th>   <th>Price</th>
 </table>

<br>

<?php $files = scandir("uploads"); for ($a = 2; $a < count($files); $a++) 
{
    echo "name file :".$files[$a]."<br>";
   
}?>

<script >
      //=============READ FILE EXCEL===============================

  let table = document.querySelector(".table");
  (  
  async() => 
  {   
      const data=<?php echo json_encode( scandir("uploads")); ?>;
      let workbook =[];  
          
      for(let j=2;j<data.length;j++)
        {  
                                                  
            workbook[j] = XLSX.read(await (await fetch("./uploads/"+data[j])).arrayBuffer());
                  
            let worksheet = workbook[j].SheetNames;
            worksheet.forEach(name => 
              {
                    let html = XLSX.utils.sheet_to_html(workbook[j].Sheets[name]);
                    table.innerHTML += `${html}`;
              })
          }
  }
  )() 
//==================END READ FILE EXCEL==========================
        
                  // create BarcodeScanner instance
                  window.barcodeScanner = new BarcodeScanner({ rootSelector: "#barcode-scanner", format:"ean_reader" });
           $(document).on("click", "#btn-open-barcode-scanner", function(e) {
             // open BarcodeScanner webcam scanner
             barcodeScanner.open((err, result) => {
               console.log("BarcodeScanner result:", err, result);
               // console.log("BarcodeScanner dataURL:", result.data);
               $("#result").text(result);
               
               document.getElementById("myInput").value=result;
               
             });
           });
//===================SEARCH ON THE TABLE=========================
  function Search() 
  {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
    }

  function onchange(input){
    console.log(input.value);
  }
  //=======================END SEARCH ON THE TABLE=======================
</script>



<script src="./script.js"></script>



</body>
</html>