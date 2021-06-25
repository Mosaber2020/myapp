<?php
require "dbcon.php";

$pid=$_POST["pid"];
$date=$_POST["date"];
$time=$_POST["time"];
$time2=$_POST["time2"];

#he didnt miss anthing
if($pid==""||$date==""||$time==""||$time2==""){
    echo'<script>alert( "empty field") </script>';
    require 'bookingform2.html';
}
// else if (!filter_var($date,FILTER_VALIDATE_DATE)){
//     echo'<script>alert( "empty field") </script>';
//     require 'bookingform.html';
// }
else{
    $sql="select * from p1 where time='$time'";
    $res=mysqli_query($con,$sql) or die (mysqli_error($con));

    $sql1="select * from p1 where time2='$time2'";
    $res1=mysqli_query($con,$sql1) or die (mysqli_error($con));

    $sql2="select * from p1 where date='$date'";
    $res2=mysqli_query($con,$sql2) or die (mysqli_error($con));
    
    if(mysqli_num_rows($res)>=1&&mysqli_num_rows($res1)>=1&&mysqli_num_rows($res2)>=1){
        echo'<script>alert( "time is taken") </script>';
    require 'bookingform2.html';

    }
    else{
        mysqli_query($con,"insert into p1(id,date,time,time2) values($pid,'$date','$time','$time2')");
        echo'<script>alert( "place is empty") </script>';
            require 'Home_page.html';

    }
}
mysqli_close($con);

?>