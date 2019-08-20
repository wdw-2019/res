<?PHP
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
    exit("错误执行");
}//检测是否有submit操作 

include('connect.php');//链接数据库
$grade =(float)$_POST['grade'];
$eva=$_POST['eva'];
$date = $_POST['date'];//post获得日期
$q="insert into evaluate(grade,eva,date) values ('$grade','$eva','$date')";//向数据库插入表单传来的值的sql
$reslut=mysqli_query($con,$q);//执行sql
if (!$reslut){
    die('Error: ' . mysql_error());////如果sql执行失败输出错误
 }else{
            echo "<script>
            alert('提交成功！');
            </script>";//成功输出注册成功
            echo "
            <script>
                  setTimeout(function(){window.location.replace('../html/evaluate.html');},100);
            </script>";
        }
?>
   
