<?php
include '../../main/DB/DB.php';

$salaryerr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$salary=$_POST['salary'];
$username=$_POST['username'];


$check="SELECT username FROM registration WHERE username='$username' LIMIT 1";
$result=$conn->query($check);
if($result->num_rows>0)
{
$row=$result->fetch_assoc();


if($salary <5000 || $salary > 200000)
{
    $salaryerr="entern a valid amount";
}
    else
    {
     $sql="INSERT INTO salary(username,salary) VALUES('$username','$salary')";
     if($conn->query($sql))
     {echo "<script>alert('salary stored');</script>";}
    }
}
}
$sql2="SELECT username FROM registration WHERE role='Teacher'";
$sql1="SELECT * FROM salary";
$show1=mysqli_query($conn,$sql1);
$show2=mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AIUB clone</title>
        <link rel="stylesheet"  href="../css/aiub.css">
    </head>
    <body>
        
       <center>
        <h2>
             <label  style="color: rgb(13, 101, 202); font-family:Arial, Helvetica, sans-serif;  font-size: 25px;"> Manage salary</label><br>
             <label  style="color: rgb(22, 22, 22); ">************************************************</label>
        </h2>
    <form method="post">
        <input type="number" name="salary" placeholder="input amount" >
        <span><?php echo $salaryerr; ?></span>
        <input type="text" name="username" placeholder="enter username">
        <button type="submit" name="enter"style="width:55px;height:40px;font-size:11px;border-radius:0px; color:red;">Enter</button>
    </form>

       <table class="table" style="font-size:18px;">
                
                <tr class="tablerow">
                    <td class="tableheading">ID</td>
                    <td class="tableheading">Userid</td>
                    <td class="tableheading">salary</td>
                </tr>

                <?php

                if(mysqli_num_rows($show1)>0)
                {
                    while($row=mysqli_fetch_assoc($show1))
                    {
                        echo "<tr class='tablerow'>";
                        echo"<td calss='tableheading'>".$row['ID']."</td>";
                        echo "<td calss='tableheading'>".$row['username']."</td>";
                        echo "<td calss='tableheading'>".$row['salary']."</td>";
                    }

                }
                ?>
        </table>
    </center>
        
        <table  class="table" style="width:100px;font-size:18px;align:left;">
                
                <tr class="tablerow">
                    <td class="tableheading">Available username</td>
               </tr>

                <?php
                if(mysqli_num_rows($show2)>0)
                {
                    while($row=mysqli_fetch_assoc($show2))
                    {
                        echo "<tr class='tablerow'>";
                        echo "<td calss='tableheading'>".$row['username']."</td>";
                        echo "</tr>";
                        
                    }

                }
                ?>
              </table>
       
        <!--<button  onclick="document.location.href='Aiub .html'" id="back">Back</button> -->
    </body>
</html>