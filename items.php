

<!DOCTYPE html>
<html lang="en">
<body>
<head>
  <title>CoasterCreds</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div>

<div class="container-fluid bg-3 text-center">
	
  <a href="https://playground.eca.ed.ac.uk/~s1772368/coaster/test.html"> 
    <img src="ccbannersm.png" class="img-fluid" style="display:inline" alt="Coaster Creds"/>
  </a>

</div>

<div class="container-fluid bg-4">
   <br />
   <h2 align="center">Search All Coasters</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon"></span>
     <input type="text" name="search_text" id="search_text" placeholder="Search..." class="form-control" />
    </div>
   </div>
   <br />

<div id="result"></div>
</div>



	   
</div>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
	


</body>
</html>