<?php
include '../../main/DB/DB.php';


$sql="SELECT * FROM registration";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>aiub clone</title>
        <link rel="stylesheet"  href="../css/aiub.css">
        <style>
            body
                {
                    background-image:url("../../main/image/admin all user.jpg");
                    background-size:cover;
                    background-position:center;
                    background-repeat:no-repeat;
                }
        </style>
    </head>
    <body>
        <center>
        <h2>
             <label  style="color: rgb(13, 101, 202); font-family:Arial, Helvetica, sans-serif;  font-size: 25px;">VIEW ALL USER</label><br>
             <label  style="color: rgb(22, 22, 22); ">************************************************</label>
        </h2>
<div>
        <table class="table" style="font-size:18px;">
                
                <tr class="tablerow">
                    <td class="tableheading">ID</td>
                    <td class="tableheading">Name</td>
                    <td class="tableheading">Userid</td>
                    <td class="tableheading">role</td>
                    <td class="tableheading">dept.</td>
                    <td class="tableheading">email</td>
                </tr>
                <?php
                if(mysqli_num_rows($result)>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        echo "<tr class='tablerow'>";
                        echo"<td class='tableheading'>".$row['ID']."</td>";
                        echo "<td class='tableheading'>".$row['fullname']."</td>";
                        echo "<td class='tableheading'>".$row['username']."</td>";
                        echo "<td class='tableheading'>".$row['role']."</td>";
                        echo "<td class='tableheading'>".$row['department']."</td>";
                        echo "<td class='tableheading'>".$row['email']."</td>";
                        echo "</tr>";
                    }
                }
                else
                {
                    echo "<tr><td colspan='5'>no record found</td></tr>";
                }
                
                ?>
       </table>

            </div>
         </center>
       <!-- <button  onclick="document.location.href='Aiub .html'" id="back" >Back</button> -->
    </body>
</html>