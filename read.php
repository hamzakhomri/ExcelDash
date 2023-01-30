<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js" integrity="sha256-JDVyLQRqvRSTL/6WaPud93JXpfEdW11zwjqhoNgkGXc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./BarcodeScanner.js"></script>
    <title>Document</title>
</head>
<body>
    
<form action="">

<div style="background-color:aquamarine">
  <br><button id="btn-open-barcode-scanner">Open Barcode Scanner</button>
         <div id="result"></div>
         <div id="barcode-scanner" style="display: none; border: 1px solid gray;">
           <div style="background-color: #ccc; padding: 6px;">
             <strong name="title">Barode Scanner</strong>
             <span name="close" title="Close" style="cursor: pointer; font-weight: bold; float: right;">&times;</span>
           </div>
           <div style="text-align: right; padding: 8px;">
             <span style="cursor: pointer; color: blue;" name="btn-file" onclick="barcodeScanner.startFile(this)">Switch to File scan</span>
             <span style="cursor: pointer; color: blue;" name="btn-webcam" onclick="barcodeScanner.startWebcam(this)">Switch to Webcam scan</span>
           </div>
           <div name="pane-file" style="padding: 8px 12px 24px 12px;">
             <label>Select a Barcode image:</label>
             <input type="file" name="file" accept="image/png,image/jpg,image/jpeg,image/gif" style="padding: 8px 0px;" onchange="barcodeScanner.scanFile(this)">
           </div>
           <div name="pane-webcam" style="display: none;">
             <video name="video" autoplay></video>
             <canvas name="canvas" style="display: none;"></canvas>
           </div>
           <div>
             <span name="lbl-processing" style="background: navy; color: white; padding: 4px; min-width:100%; font-weight: bold; display: none;">Processing ...</span>
           </div>
           <div>
             <button name="close" style="width: 100%;">&times; Close</button>
           </div>
</div>


 <input type="text" id="myInput" onkeyup="myFunction()" onchange="onchange(this)"  placeholder="Search for names.." title="Type in a name">
 <table  class="table" id="myTable"></table>
 <span style="cursor: pointer; color: blue;" name="btn-webcam" onclick="barcodeScanner.startWebcam(this)">Switch to Webcam scan</span>
 
</div>
</form>
    <script >
      //=============READ FILE EXCEL===============================

let table = document.querySelector(".table");
(
    async() => {
        let workbook = XLSX.read(await (await fetch("./uploads/test2.xls")).arrayBuffer());
         //let workbook = XLSX.read(await (await fetch("./uploads/test3.xls")).arrayBuffer());
        console.log(workbook);
        let worksheet = workbook.SheetNames;
        worksheet.forEach(name => {
            let html = XLSX.utils.sheet_to_html(workbook.Sheets[name]);
            if(name == "Feuille 1"){
                table.innerHTML += `${html}`;
                
            }
        })
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
function myFunction() {
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
</body>
</html>