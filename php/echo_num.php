<?php 
  //  header("Content-Type: text/html; charset=utf8");

    /*if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作*/

    $department=$_POST['department'];//post获取表单里的department
    $date=$_POST['date'];
    include('connect.php');//链接数据库
     $sql = "select * from restaurant where department = '$department' and date='$date'";
     $result = mysqli_query($con,$sql);//执行sql
     $a=mysqli_fetch_array($result);
     $num=$a['num'];
     $none=0;
         $rows=mysqli_num_rows($result);//返回一个数值
         if($rows){//0 false 1 true
             echo  $num;
            /* echo "
             <script>
                     setTimeout(function(){window.location.href='register.html';},1000);
             </script>
             ";*/
         }
         else {
             echo  $none;
         }
//mysql_close($con);//关闭数据库
?>