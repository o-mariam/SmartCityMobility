$(document).on('click','#showData',function(e){
  openProfile();
  e.preventDefault();
  $.ajax({    
    type: "GET",
    url: "backend-script.php",             
    dataType: "html",                  
    success: function(data){                    
        $("#table-container").html(data); 
         
    }
  });
});

  
function closeForm() {
  document.getElementById("UploadForm").style.display = "none";
} 

//function closeMap() {
  //document.getElementById("map").style.display = "none";
//} 
  
function openProfile() {
  closeForm();
  document.getElementById("map").style.display = "none";
  document.getElementById("mapData").style.display = "none";
  document.getElementById("Profilenfo").style.display = "block";
}