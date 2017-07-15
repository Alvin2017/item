<?php
  //1:连接数据库
	//2:设置编码
	$conn = mysqli_connect('127.0.0.1','root','','jd');
	$sql = "SET NAMES UTF8";
	mysqli_query($conn,$sql);
	//3:创建sql!!!!!! 17:45---17:55
   //3.1:获取用户分页参数 1 2 3
	 $pageNo = 1;
	 //3.2:判断如果没有参数则显示第 1 页
	 if(empty($_REQUEST['pageNo'])===false){
		  $pageNo = $_REQUEST['pageNo'];
	 }
   $pageNo = ($pageNo-1)*3;
   //3.3:修改sql limit
	 $sql = "SELECT * FROM t_product limit $pageNo,3";
	//4:发送sql
	$result = mysqli_query($conn,$sql);
	//5:获取返回的结果
	echo "<table border='1' width='80%'>";
	echo "<tr><td>编号</td><td>名称</td><td>价格</td><td>图片</td></tr>";
	while(true){
	  $row = mysqli_fetch_assoc($result);
		if($row===null){
		  break;
		}
		echo "<tr>";
		echo "<td>$row[id]</td>";
		echo "<td>$row[name]</td>";
		echo "<td>$row[price]</td>";
		echo "<td><img src='$row[pic]'/></td>";
		echo "</tr>";
	}
  //3.4  一共三页
  echo "<tr>";
	echo "<td></td><td></td><td></td>";
	echo "<td>";
	echo "<a href='product_list2.php?pageNo=1'>1<a>&nbsp;&nbsp;";
	echo "<a href='product_list2.php?pageNo=2'>2<a>&nbsp;&nbsp;";
	echo "<a href='product_list2.php?pageNo=3'>3<a>";
	echo "</td>";
	echo  "</tr>";
  echo "</table>";
?>