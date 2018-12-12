<?php
//fetch.php
$connect = mysqli_connect("localhost", "s1772368", "oIqBY95BUt", "s1772368");
ini_set('memory_limit', '-1');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT * FROM coasters WHERE tags LIKE '%".$search."%' LIMIT 5";
}
else
{
 $query = "SELECT * FROM coasters";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $counter = 0;
 $output .= '<div class="row" align="center">';
 
 while($row = mysqli_fetch_array($result))
 {
  $counter++;
  if (($counter % 4) == 0)
  {
	$output .= '</div>';
	$output .= '<div class="row" align="center">';
  }
  
  $output .= '
		<div class="col-sm-4 p-4">
			<div class="card">
			  <img class="card-img-top" src="'.$row["image"].'" alt="Card image">
			  <div class="card-body">
				<h3 class="card-title">'.$row["name"].'</h5>
				<h4 class="card-title">'.$row["manufacturer"].'</h5>
				<h5 class="card-title">'.$row["model"].'</h5>
				<h5 class="card-title">'.$row["type"].'</h5>
				
				<a href="" class="btn btn-dark btn-block">Credit me</a>
			  </div>
			</div>
		 </div>
		
  
  
   
  ';
 }
 
 $output .= '</div>';
 
 echo $output;
}
else
{
 echo 'No coasters found';
}

?>
</div>