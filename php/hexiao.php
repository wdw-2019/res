<?php 
     $date=$_POST['date'];
     $date1=$_POST['date1'];
     $hexiao=$_POST['hexiao'];
     include('connect.php');//链接数据库
     $rows=mysqli_affected_rows($con);//获取行数
     if($hexiao=="全部"){
     $sql = "select * from restaurant where date between '$date' and '$date1' order by date";
     $avg="select sum(num) from restaurant where date between  '$date' and '$date1' order by date";
     $result = mysqli_query($con,$sql);//执行sql
     $res_1= mysqli_query($con,$avg);//执行sql
     $colums=mysqli_num_fields($result);//获取列数
     $rows_1=mysqli_num_rows($result);//返回一个数值
    if($rows_1){
     $field=[" 部门名称 "," 订餐数量 "," 日期 "," 核销情况 "];
     echo "<table border='1' style='border-collapse:collapse;'><tr>";
     for($i=0; $i < $colums-1; $i++){
         $field_name=$field[$i];
         echo "<th>$field_name</th>";
     }
     echo "</tr>";
    while($row=mysqli_fetch_row($result)){
        echo "<tr>";
                for($i=1; $i<$colums; $i++){
                    if($i==$colums-1){
                        if($row[$i]=="未核销"){
                    echo "<td><font color='red'>$row[$i]</font></td>";
                        }
                        else{
                            echo "<td><font color='green'>$row[$i]</font></td>";
                        }
                    }
                    else{
                        echo "<td>$row[$i]</td>";
                    }
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
        echo "<font color='red'>暂无数据！</font>";
     }
     }
     else {
        $sql = "select * from restaurant where date between '$date' and '$date1' and hexiao='$hexiao'";
        $avg="select sum(num) from restaurant where date between  '$date' and '$date1' and hexiao='$hexiao'";
        $result = mysqli_query($con,$sql);//执行sql
        $res_1= mysqli_query($con,$avg);//执行sql
        $colums=mysqli_num_fields($result);//获取列数
        $rows_1=mysqli_num_rows($result);//返回一个数值
   
        if($rows_1){
            $field=[" 部门名称 "," 订餐数量 "," 日期 "," 核销情况 "];
            echo "<table><tr>";
            for($i=0; $i < $colums-1; $i++){
                $field_name=$field[$i];
                echo "<th>$field_name</th>";
            }
            echo "</tr>";
           while($row=mysqli_fetch_row($result)){
                echo "<tr>";
                for($i=1; $i<$colums; $i++){
                    if($i==$colums-1){
                        if($row[$i]=="未核销"){
                    echo "<td><font color='red'>$row[$i]</font></td>";
                        }
                        else{
                            echo "<td><font color='green'>$row[$i]</font></td>";
                        }
                    }
                    else{
                        echo "<td>$row[$i]</td>";
                    }
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
                echo "<font color='red'>暂无数据！</font>";
            }
     }
    
?>
