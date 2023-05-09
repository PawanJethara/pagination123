<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "pagination";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }

$perPage = 5;
if (isset($_POST["page"])) { 
    $page  = $_POST["page"]; 
} else { 
    $page=1; 
};  

$startFrom = ($page-1) * $perPage;  
$sqlQuery = "SELECT id, Name, Age, Address, Skill, Designation
    FROM pagination1 ORDER BY id ASC LIMIT $startFrom, $perPage";  
$result = mysqli_query($conn, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
    $paginationHtml.='<tr>';  
    $paginationHtml.='<td>'.$row["id"].'</td>';
    $paginationHtml.='<td>'.$row["Name"].'</td>';
    $paginationHtml.='<td>'.$row["Age"].'</td>'; 
    $paginationHtml.='<td>'.$row["Address"].'</td>';
    $paginationHtml.='<td>'.$row["Skill"].'</td>';
    $paginationHtml.='<td>'.$row["Designation"].'</td>'; 
    $paginationHtml.='</tr>';  
} 
$jsonData = array(
    "html"  => $paginationHtml,  
);
echo json_encode($jsonData); 
?>