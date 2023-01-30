
function myFunction(){

  var x = document.getElementById("myFile");
  
  var FileName = "";
  var SizeName = "";

  if ('files' in x) {
    if (x.files.length == 0) {
      FileName = "";
      SizeName = "";
    } else {
      for (var i = 0; i < x.files.length; i++) {
        var file = x.files[i];
        if ('name' in file) {
          FileName +=  file.name ;
        }
        if ('size' in file) {
          SizeName +=  + file.size ;
        }

      }
    }
  } 
  else {
    if (x.value == "") {
      txt += "Select one or more files.";
    } else {
      txt += "The files property is not supported by your browser!";
      txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
    }
  }

  document.getElementById("InputFileName").value=FileName;
  document.getElementById("InputSizeeName").value=SizeName+" bytes";
  
}

