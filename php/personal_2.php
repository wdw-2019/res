<?php 
  //  header("Content-Type: text/html; charset=utf8");

    /*if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作*/

     $date=$_POST['date'];//post获取表单里的department
     include('connect.php');//链接数据库
     $sql = "select * from restaurant where date = '$date' ";
     $sum="select sum(num) from restaurant where date = '$date' ";
     $result = mysqli_query($con,$sql);//执行sql
     $res_1= mysqli_query($con,$sum);//执行sql
     $rows=mysqli_affected_rows($con);//获取行数
     $colums=mysqli_num_fields($result);//获取列数
     $rows_1=mysqli_num_rows($result);//返回一个数值
    // echo "test数据库的"."$table_name"."表的所有用户数据如下：<br/>";
     //echo "共计".$rows."行 ".$colums."列<br/>";
    $field=["部门名称","订餐数量","日期"];
    if($rows_1){
     echo "<table border='1' style='border-collapse:collapse;'><tr>";
     for($i=0; $i < $colums-2; $i++){
         $field_name=$field[$i];
         echo "<th>$field_name</th>";
     }
     echo "</tr>";
    while($row=mysqli_fetch_row($result)){
         echo "<tr>";
         for($i=1; $i<$colums-1; $i++){
             echo "<td>$row[$i]</td>";
         }
         echo "</tr>";
     }
     echo "<tr>"; echo "</tr>";
     echo "</table>";
     $result_1=mysqli_fetch_array($res_1);
     $a=$result_1[0];
     echo "<font color='red'>总计：</font>";
     echo "<font color='red'>$a</font>";
    }
    else{
        echo "<font color='red'>今日暂无部门订餐！</font>";
    }
//mysql_close($con);//关闭数据库
?>