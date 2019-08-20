<?PHP

include('connect.php');//链接数据库
$date=$_POST['date'];
$date1=$_POST['date1'];
$hexiao="已核销";
$q="UPDATE restaurant
SET hexiao='$hexiao' 
WHERE date between '$date' and '$date1' ";//向数据库插入表单传来的值的sql
$reslut=mysqli_query($con,$q);//执行sql
if (!$reslut){
    die('Error: ' . mysql_error());////如果sql执行失败输出错误
 }
 else{
            echo "提交成功！";
            
        }
?>
   