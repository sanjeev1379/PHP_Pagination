<?php
$conn=mysqli_connect("localhost","root","","paging");
//mysql_select_db("paging");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Pagination Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div style="text-align:center;">
 <h3>Pagination Using Php</h3>
 <hr />
 </div>


<?php 
 include("pagination/function.php");
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 5; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "table1 order by name asc"; //you have to pass your query over here

		$res=mysqli_query($conn,"select * from {$statement} LIMIT {$startpoint} , {$limit}");
		while($row=mysqli_fetch_array($res))
		{
		echo $row["name"];

		echo "<br>";
		}
		

?>

<?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>

</body>
</html>
