<?php
include '../../main/DB/DB.php';
$sql="SELECT * FROM leaveapplication";
$result=$conn->query($sql);
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $status='';

if(isset($_POST['accpet']))
{
   $status='Accpet';
   $application_id=intval($_POST['accpet']);
   $asql="UPDATE leaveapplication SET action='$status' WHERE ID='$application_id'";
   $aresult=$conn->query($asql);
}
elseif(isset($_POST['decline']))
{
    $status='Decline';
    $application_id=intval($_POST['decline']);
    $dsql="UPDATE leaveapplication SET action='$status' WHERE ID='$application_id'";
    $dresult=$conn->query($dsql);
    
}
header("Location:".$_SERVER['PHP_SELF']);
    exit();

}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>aiub clone</title>
        <link rel="stylesheet"  href="../css/aiub.css">
    </head>
    <body>
        <center>
        <h2>
             <label  style="color: rgb(13, 101, 202); font-family:Arial, Helvetica, sans-serif;  font-size: 25px;"> Manage leave Application</label><br>
             <label  style="color: rgb(22, 22, 22); ">************************************************</label>
        </h2>
    <form method="post">
        <div>
            <table class="table" style="color:black;font-size:20px;width:1500px;">
                <tr class="tablerow">
                    <td class="tableheading">ID</td>
                    <td class="tableheading">fullname</td>
                    <td class="tableheading">username</td>
                    <td class="tableheading">application</td>
                    <td class="tableheading">action</td> 
                    <td class="tableheading">status</td> 
                </tr>

                <?php
                 if(mysqli_num_rows($result)>0)
                 {
                    while($row=$result->fetch_assoc())
                    {
                        echo "<tr class='tablerow'>";
                        echo "<td class='tableheading'>".$row['ID']."</td>";
                        echo "<td class='tableheading'>".$row['fullname']."</td>";
                        echo "<td class='tableheading'>".$row['username']."</td>";
                        echo "<td class='tableheading'>".$row['application']."</td>";
                        echo "<td class='tableheading' >
                        <form method='post'><button type='submit' name='accpet' value='".$row['ID']."'style='width:60px;height:20px;padding:1px;border:none;'>accpet</button></form><br>
                        <form method='post'><button type='submit' name='decline' value='".$row['ID']."' style='width:60px;height:20px;padding:1px;border:none'>decline</button></form></td>";
                       echo "<td class='tableheading'>".$row['action']."</td>";
                        echo "</tr>";
                    }
                 }
                ?>
            </table>
            
        </div>
     </form>
        </center>
    
   
    </body>
</html>