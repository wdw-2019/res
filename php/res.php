<?php 
     $date=$_POST['date'];//post获取表单里的department
     include('connect.php');//链接数据库
     $sql = "select * from evaluate where date = '$date' ";
     $avg="select avg(grade) from evaluate where date = '$date' ";
     $result = mysqli_query($con,$sql);//执行sql
     $res_1= mysqli_query($con,$avg);//执行sql
     $rows=mysqli_affected_rows($con);//获取行数
     $colums=mysqli_num_fields($result);//获取列数
     $rows_1=mysqli_num_rows($result);//返回一个数值
    // echo "test数据库的"."$table_name"."表的所有用户数据如下：<br/>";
     //echo "共计".$rows."行 ".$colums."列<br/>";
    $field=["序号","评分","意见","日期"];
    if($rows_1){
        echo "<table border='1' style='border-collapse:collapse;'><tr>";
        for($i=0; $i < $colums; $i++){
            $field_name=$field[$i];
            echo "<th style='white-space:nowrap;'>$field_name</th>";
        }
        echo "</tr>";
        $j=1;
       while($row=mysqli_fetch_row($result)){
            echo "<tr>";       
               echo "<td>$j</td>";         
            for($i=1; $i<$colums; $i++){
                if($i==2){
                echo "<td style='word-break:break-all; word-wrap:break-all;'>$row[$i]</td>";
                }
                else{
                   echo "<td style='white-space:nowrap;'>$row[$i]</td>";
                }
            }     
            echo "</tr>";
            $j++;
        
       }
        echo "</table>";
        echo "<br>";
        $result_1=mysqli_fetch_array($res_1);
        $a=$result_1[0];
        echo "<font color='red'>综合评分：</font>";
        echo "<font color='red'>$a</font>";
       }
     else{
        echo "<font color='red'>本日无数据！</font>";
     }
?>