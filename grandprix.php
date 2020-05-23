
<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "formula-1-database");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link,"SELECT * FROM grandprix  ");

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Public Page (Grandprix Table) </h1>


<body style="background-color : white">
<table class="table">
            <thead>
                <tr class="success">
                    <th>location</th>
                    <th>track</th>
                    <th>gid</th>
          
                </tr>
            </thead>
            <tbody>

        <?php
        $row_number=count($myarr);

        for($i=0;$i<$row_number;$i++)
        {
          $gid=$myarr[$i]['gid'];
          $location=$myarr[$i]['location'];
        echo "<tr>";
          echo "<td>".$location .  "</td>";
          echo "<td>". $myarr[$i]['track'].  "</td>";
          echo"<td> " .$myarr[ $i]['gid'].  "</td>";
          
          
          
        echo "</tr>";
        }

        ?>
        </tbody>




</table>

</html>
