
<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "formula-1-database");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link,"SELECT * FROM teams  ");

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Public Page (Teams Table) </h1>
<form style ="background-image: url('C:/xampp/htdocs/kimi.jpeg');">
</form>

<body style="background-color : purple">
<table class="table">
            <thead>
                <tr class="success">
                    <th>name</th>
                    <th>engine_supplier</th>
                    <th>sponsors</th>
          <th>tid</th>
                </tr>
            </thead>
            <tbody>

        <?php
        $row_number=count($myarr);

        for($i=0;$i<$row_number;$i++)
        {
          $tid=$myarr[$i]['tid'];
          $name=$myarr[$i]['name'];
        echo "<tr>";
          echo "<td>".$name .  "</td>";
          echo "<td>". $myarr[$i]['engine_supplier'].  "</td>";
          echo"<td> " .$myarr[ $i]['sponsors'].  "</td>";
          echo "<td>" .$tid.  "</td>";
          
          
        echo "</tr>";
        }

        ?>
        </tbody>




</table>

</html>
