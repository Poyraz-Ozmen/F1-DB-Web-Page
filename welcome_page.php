
<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "formula-1-database");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link,"SELECT * FROM pilots  ");

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Sailors Example </h1>
<form style ="background-image: url('C:/xampp/htdocs/kimi.jpeg');">
</form>

<body style="background-color : red">
<table class="table">
            <thead>
                <tr class="success">
                    <th>pid</th>
                    <th>name</th>
                    <th>nation</th>
          <th>age</th>
                </tr>
            </thead>
            <tbody>

        <?php
        $row_number=count($myarr);

        for($i=0;$i<$row_number;$i++)
        {
          $pid=$myarr[$i]['pid'];
          $name=$myarr[$i]['name'];
        echo "<tr>";
          echo "<td>" .$pid.  "</td>";
          echo "<td>".$name .  "</td>";
          echo"<td> " .$myarr[ $i]['nation'].  "</td>";
          echo "<td>". $myarr[$i]['age'].  "</td>";
        echo "</tr>";
        }

        ?>
        </tbody>




</table>

</html>
