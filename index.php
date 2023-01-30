<!DOCTYPE html>
<html lang="en">

<head>
    <title>sprint admin</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/index1.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js" integrity="sha256-JDVyLQRqvRSTL/6WaPud93JXpfEdW11zwjqhoNgkGXc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./Scripts/BarcodeScanner.js"></script>
    
    <style>
        
    </style>
</head>

<body onload="myFunction()">
  
    <div class="left_sidebar">  <div class="left_sidebar_global">
        <div class="lsb_top">
            <a href="#" class="iconBx_m" id="logo">
                <i class="fab fa-accusoft"></i>
            </a>
            <a href="#charts_stories" class="iconBx_m">
                <i class="fas fa-th-large"></i>
            </a>
            <a href="#" class="iconBx_m">
                <i class="fas fa-plus"></i>
            </a>
            <a href="#" class="iconBx_m">
                <i class="fas fa-chart-line"></i>
            </a>
            <a href="#" class="iconBx_m">
                <i class="fas fa-comment-dots"></i>
            </a>
            <a href="#" class="iconBx_m">
                <i class="fas fa-users"></i>
            </a>
        </div>
        <div class="lsb_bottom">
            <a href="#" class="iconBx_m">
                <i class="fas fa-bell"></i>
            </a>
            <a href="#" class="iconBx_m">
                <i class="fas fa-cog"></i>
            </a>
        </div>
    </div>
    </div>
    <div class="main_container">
        <div class="mc_header">
            <div class="nav_arrows">
                <div class="iconBx_m arrow">
                </div>
                <div class="iconBx_m arrow toggle">
                    <i class="fas fa-bars menu" id="bar_menu"></i>
                    <i class="fas fa-times close"></i>
                </div>
            </div>

        </div>

        <!-- <div class="sprint_overview">
            <div class="title">
                <h1>Sprint overview</h1>
                <a href="#" class="btn">last sprint</a>
            </div>
            <div class="sprint_overview_cards">
                <div class="sprint_overview_card">
                    <i class="fas fa-tachometer-alt icon_l"></i>
                    <p>Team velocity</p>
                    <h5>53</h5>
                </div>
                <div class="sprint_overview_card">
                    <i class="fas fa-user icon_l"></i>
                    <p>Team members</p>
                    <h5>11</h5>
                </div>
                <div class="sprint_overview_card">
                    <i class="fas fa-suitcase icon_l"></i>
                    <p>Task delivered</p>
                    <h5>22</h5>
                </div>
                <div class="sprint_overview_card">
                    <i class="fas fa-search icon_l"></i>
                    <p>Spikes delivered</p>
                    <h5>24</h5>
                </div>
                <div class="sprint_overview_card">
                    <i class="fas fa-globe-americas icon_l"></i>
                    <p>News events</p>
                    <h5>17</h5>
                </div>
            </div>
        </div> -->




         <!-- ===================== UPLOAD FILE EXCEL  ===================== -->
        <div class="team_members_container">
            <div class="title" >
                <h1>Ajouter une fichier excel</h1> 
                <a  class="btn" onclick="show_hide_add_file_excel()">+</a>
            </div>
            <div class="team_members" id="upload_file">
                <div class="team_member">
                    <div class="member_content">
                        <!-- <h2>ADD FILE EXCEL</h2> -->
                        <form method="POST" action="upload.php" enctype="multipart/form-data">
                            
                            <input type="file"   name="file" id="myFile" onchange="myFunction()"  require>
                             

                            <input type="text" name="a" id="InputFileName" placeholder="Insert a" value="" required hidden>
                            <input type="text" name="b" id="InputSizeeName" placeholder="Insert B" value="" required hidden>
                         
                                <input type="submit" value="Upload" class="submit" name="ok">
                       
                            
                        </form>    

                    </div>
                </div>

            </div>
        </div>
        <!-- ===================== END UPLOAD FILE EXCEL  ===================== -->




        <!-- ===================== DATA TABLE ===================== -->
        <div class="charts_stories" id="charts_stories">
            <!-- <div class="burnsown_chart_container">
                <h1>Burnsown chart</h1>
                <div class="burnsown_chart">
                    <canvas id="myChart" height="100"></canvas>
                </div>
            </div> -->

            <div class="sprint_stories_container" style="width: 100%;" >
                <div class="title">
                        <h1>Search</h1>
                        <a  class="fa fa-search" id="btn_search" onclick="show_hide_searching()"></a>
                    </div>
                    <div id="search_box">
                        <div class="Search_product">
                    
                            <div id="search_container_code_bare">
                                <button id="btn-open-barcode-scanner">Open Barcode Scanner</button>
                                <div id="result">
                                

                                </div>
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
                            </div>
                        </div>
                
                
                        <div class="search_container" id="search_container">
                            <input type="number" onkeyup="SearchByCodeBarre()" onclick="search_show_hide_table_product()" id="CodeBarre" name="code_barre" placeholder="Code Barre..">
                            <input type="text"   onkeyup="SearchBycodeName()" onclick="search_show_hide_table_product()" id="ProductName" name="lastname" placeholder="Your Product Name..">
                            <input type="submit" onclick="SearchByCodeBarre()" name="submit_search" value="Search">
                        </div>
                    </div>

                <div class="title">
                    <h1> Les Produits</h1>
                    <a  class="btn" onclick="show_hide_table_product()">+</a>
                </div>
                <div class="sprint_stories"id="data_table">
                    

                    <div class="sprint_stories_container">
                        
                        <table  class="table" id="myTable">
                            <th>ID</th> <th>Bar Code</th> <th>Price</th> <th>Date</th> <th>Descripton</th> <th> Image</th>
                        </table>
            
                    </div>
                </div>
            </div>
        </div>
          <!-- ===================== END DATA TABLE ===================== -->





    </div>
    <div class="right_sidebar">
        <div class="epics_container">
            <div class="title">
                <h1>Fichiers</h1>


                                <?php $files = scandir("uploads"); 
                $_num_files ="";
                $num_files= (int)$_num_files;
                $_num_files = count($files);

          
                ?>


                <a href="#" class="btn"> <?php     echo $_num_files-2 ." Files "; ?></a>


<?php           if($_num_files-2<=0){
                        echo '<script>alert("Aucune File Existe")</script>';
                    } ?>



            </div>

            <div class="epics">


            <?php
            $files = scandir("uploads"); 
            for ($a = 2; $a < count($files); $a++)
                { ?>
                    <div class="epic">
                        <div class="imgBx_s green">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="epic_info">
                            <h2> <?php echo $files[$a]; ?></h2>
                                <a class="operation" href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">Download</a><a> / </a>
                                <a class="operation" href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;"> Delete </a>
                        </div>
                       
                    </div>
             <?php } ?>

                <!-- <div class="epic">
                    <div class="imgBx_s red">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div class="epic_info">
                        <h2>Adding Item</h2>
                        <p>Development</p>
                    </div>
                    <i class="fas fa-ellipsis-h"></i>
                </div> -->


            </div>

        </div>
        <div class="project_statistic_container">
            <div class="title">
                <h1>Project statistic</h1>
            </div>
            <div class="project_statistics">
                <div class="project_statistic">
                    <h2>Project</h2>
                    <p>progress</p>
                    <div class="progress">
                        <div class="stat_progress_cover">
                            <div id="project"></div>
                        </div>
                        <h2>75%</h2>
                    </div>
                </div>
                <div class="project_statistic">
                    <h2>Business</h2>
                    <p>goals</p>
                    <div class="progress">
                        <div class="stat_progress_cover">
                            <div id="business"></div>
                        </div>
                        <h2>42%</h2>
                    </div>
                </div>
                <div class="project_statistic">
                    <h2>Budget</h2>
                    <p>used</p>
                    <div class="progress">
                        <div class="stat_progress_cover">
                            <div id="budget"></div>
                        </div>
                        <h2>40%</h2>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn project_details">project details</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

    <script>
        const leftSideBar = document.querySelector('.left_sidebar');
        const toggle = document.querySelector('.toggle');
        toggle.onclick = function() {
            leftSideBar.classList.toggle('active');
            toggle.classList.toggle('active');
        }
    </script>

<script >
      
     
    function search_show_hide_table_product() {
    
        var x1 = document.getElementById("data_table");
        if (x1.style.display === "none") {
        x1.style.display = "block";
        } 
  }
 
 function show_hide_table_product() {
    var x = document.getElementById("data_table");

    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  function show_hide_add_file_excel() {
    var x = document.getElementById("upload_file");

    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
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
                    if(name == "BarcodeData" || name=="Sheet1"){
                        table.innerHTML += `${html}`;
                
                        }
           
                  
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
               $("#CodeBarre").text(result);
               
               document.getElementById("CodeBarre").value=result;
               
             });
           });
//===================SEARCH ON THE TABLE=========================
  function SearchByCodeBarre() 
  {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("CodeBarre");
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

    function SearchBycodeName() 
  {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("ProductName");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
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



<script src="./Scripts/script.js"></script>
<script src="./Scripts/chart.js"></script>

</body>

</html>
