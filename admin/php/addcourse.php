<?php
include  '../../main/DB/DB.php';


$sql="SELECT * FROM addcourse";
$result=$conn->query($sql);

$course=$sdate=$edate2=$time=$seat=$section="";
$courseerr=$timeerr=$date1err=$seaterr=$sectionerr="";
$successful=$error="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 $course=$_POST['course'];
 $sdate=$_POST['date1'];
 $edate=$_POST['date2'];
 $time=$_POST['time'];
 $seat=$_POST['seat'];
 $section=$_POST['section'];


 if(empty($course))
 {
    $courseerr="please enter the course name";
 }
 else
 {
    if(preg_match("/^[a-zA-z' ]*$/",$course))
    {
        $course=test_input($_POST['course']);
    }
 }

 if(empty($section))
 {
    $sectionerr="please enter the course name";
 }
 else
 {
    if(preg_match("/^[a-zA-z' ]{1}$/",$section))
    {
        $section=test_input($_POST['section']);
    }
 }


 if(empty($dates))
 {
    $date1err="please enter course time";
 }
 else
    {
        $date1=test_input($_POST['date1']);
    }

    if(empty($time))
    {$timeerr="please select course time";}
    else
    {
        $time=test_input($_POST['time']);
    }

    if(empty($seat))
    {
        $seaterr="enter student limti";
    }
    else
    {
        $seat=test_input($_POST['seat']);
    }
  

    if(!empty($course) && !empty($sdate) && !empty($time) && !empty($seat))
    {
        $sql="INSERT INTO addcourse(course,section,date1,date2,time,seat) VALUES('$course','$section','$sdate','$edate','$time','$seat')";
        if($conn->query($sql)===TRUE)
        {
            echo "<script>alert('course registered successfull');</script>";
            $course=$date1=$date2=$time=$seat="";
        }
        else
        {echo "<script>alert('try again, failed to register course');</script>";}
    }

}

function test_input($data)
{
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>

<html>
    <head>
        <title>aiub clone</title>
        <link rel="stylesheet"  href="../css/aiub.css">
             <style>
                body
                {
                    background-image:url("../../main/image/admin_addcourse.jpg");
                    background-size:cover;
                    background-position:center;
                    background-repeat:no-repeat;
                }
              input[type="text"]
              {
                width:250px;
                padding:5px;
                border:2px solid blue;
                font-size:16px;
              }
             </style>
    </head>
    <body>
        <center>
   
        <h2>
             <label  style="color: rgb(13, 101, 202); font-family:Arial, Helvetica, sans-serif;  font-size: 25px;">Add course</label><br>
             <label  style="color: rgb(22, 22, 22); ">************************************************</label>

        
        </h2>
        <br>
        <form method="post">
        <div  style="width:330px; height:500px; border:5px solid black;background-color:rgb(20,217,164);">
            <br>
            <br>
        Course Name<br><input type="text" id="course" name="course" >
        <span><?php echo $courseerr; ?></span><br><br>
         Scetion<br><input type ="text" name="section" id="section">
        <span><?php echo $sectionerr; ?></span>
         <br><br>
        <select id="date1" name="date1">
            <option value="saturday">saturday</option>
            <option value="sunday">sunday</otpion>
            <option value="monday">monday</otpion>
            <option value="tuesday">tuesday</otpion>
            <option value="wednesday">wednesday</otpion>
            <option value="thrusday">thrusday</otpion>
            <option value="friday">friday</otpion>
        </select><br><br>
         <select id="date2" name="date2">
            <option value="saturday">saturday</option>
            <option value="sunday">sunday</otpion>
            <option value="monday">monday</otpion>
            <option value="tuesday">tuesday</otpion>
            <option value="wednesday">wednesday</otpion>
            <option value="thrusday">thrusday</otpion>
            <option value="friday">friday</otpion>
        </select><br><br>
        Time<br><input type="text" name="time" id="time">
         <span><?php echo $timeerr; ?></span><br><br>
        seat<br><input type="number" id="seat" name="seat">
         <span><?php echo $seaterr; ?></span><br><br><br>
        <button type="submit" style="background-color:green;color:white;width:70px;height:50px" >add</button>
        </div>

        <table class="table"  style="font-size:18px;">
            <tr class="tablerow">
              <td class="tableheading">course</td>  
             <td class="tableheading">section</td>
             <td class="tableheading">Day 1</td>
             <td class="tableheading">Day 2</td>
              <td class="tableheading">time</td>
             <td class="tableheading">seat</td>

             <?php
             if(mysqli_num_rows($result)> 0)
             {
                while($row=$result->fetch_assoc())
                {
                   echo "<tr class='tablerow'>";
                   echo "<td class='tableheading'>".$row['course']."</td>";                   
                   echo "<td class='tableheading'>".$row['section']."</td>";
                   echo "<td class='tableheading'>".$row['date1']."</td>";
                  echo "<td class='tableheading'>".$row['date2']."</td>";
                  echo "<td class='tableheading'>".$row['time']."</td>";
                  echo "<td class='tableheading'>".$row['seat']."</td>";
                  echo"</tr>";
                }
             }
             ?>
        </table>




      </form>
      </center>
        <!--<button  onclick="document.location.href='Aiub .html'" id="back">Back</button>  -->
    </body>
</html>