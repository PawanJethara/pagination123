<!DOCTYPE html>
<html>
<head>
    <title>php mysql jquery ajax pagination - Tutsmake</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="simple-bootstrap-paginator.js"></script>
    <script src="simple-bootstrap-paginator.min.js"></script>
</head>
<body>
<div class="container">   
    <?php
    $servername='localhost'; 
    $username='root';
    $password='';
    $dbname = "pagination";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        } 
        $perPage = 3;
        $sqlQuery = "SELECT * FROM pagination1";
        $result = mysqli_query($conn, $sqlQuery);
        $totalRecords = mysqli_num_rows($result);
        $totalPages = ceil($totalRecords/$perPage);
    ?>
    <div class="row">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Skills</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody id="content">     
            </tbody>
        </table>   
        <div id="pagination"></div>    
        <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">    
    </div>    
</div>
<script>
    $(document).ready(function(){
    var totalPage = parseInt($('#totalPages').val());   
    var page = $('#pagination').simplePaginator({
        totalPages: totalPage,
        maxButtonsVisible: 5,
        currentPage: 1,
        nextLabel: 'Next',
        prevLabel: 'Prev',
        firstLabel: 'First',
        lastLabel: 'Last',
        clickCurrentPage: true,
        pageChange: function(page) {            
            $("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
            $.ajax({
                url:"read.php",
                method:"POST",
                dataType: "json",       
                data:{page: page},
                success:function(responseData){
                    $('#content').html(responseData.html);
                }
            });
        }
    });
});
</script>
</body>
</html>