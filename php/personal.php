<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 

    include('connect.php');//链接数据库
    $num = $_POST['num'];//post获得订餐数量
    $department=$_POST['department'];
    $date = $_POST['date'];//post获得日期
    if ($department && $num && $date){//如果都不为空
       // $sql = "select * from restaurant where department = '$department' ";
        $sql_1="select * from restaurant where department = '$department' and date='$date'";
       // $result = mysqli_query($con,$sql);//执行sql
        $result_1=mysqli_query($con,$sql_1);//执行sql
       // $rows=mysqli_num_rows($result);//返回一个数值
        $rows_1=mysqli_num_rows($result_1);//返回一个数值
        if($rows_1){//0 false 1 true
            $q="UPDATE restaurant
            SET num='$num' 
            WHERE department='$department' AND date='$date'";
            $reslut=mysqli_query($con,$q);//执行sql
            if (!$reslut){
                die('Error: ' . mysql_error());//如果sql执行失败输出错误
            }else{
                echo "<script>
                alert('提交成功！');
                </script>";//成功输出注册成功
                echo "
                <script>
                      setTimeout(function(){window.location.href='/html/personal.html';},100);
                </script>";
            }
        }
        else {
            $q="insert into restaurant (department,num,date) values ('$department','$num','$date')";
            $reslut=mysqli_query($con,$q);//执行sql
            if (!$reslut){
                die('Error: ' . mysql_error());//如果sql执行失败输出错误
            }else{
                echo "<script>
                alert('提交成功！');
                </script>";//成功输出注册成功
                echo "
                <script>
                      setTimeout(function(){window.location.href='/html/personal.html';},100);
                </script>";
            }
           
        }
        

}else{//如果用户名或密码有空
           echo "<script>
           alert('表单填写不完整！');
           </script>";
           echo "
                 <script>
                       setTimeout(function(){window.location.href='/html/personal.html';},100);
                 </script>";

                   //如果错误使用js 1秒后跳转到登录页面重试;
}

    mysql_close($con);//关闭数据库
?>