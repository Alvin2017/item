<?php
  //1:连接数据库
	//2:设置编码
	$conn = mysqli_connect('127.0.0.1','root','','jd');
	$sql = "SET NAMES UTF8";
	mysqli_query($conn,$sql);
	//3:创建sql
	//3.1 创建sql分页查询语句
  $pageNo = 1;
	if(!empty($_REQUEST['pageNo'])){
     $pageNo = $_REQUEST['pageNo'];
	}
  $p = ($pageNo-1)*3;
	//$p 起始记录行号
	//!!!!!!!!!!!!!!!!!!!!!!!!
  //3.2 计算总页数
	 //1:计算总行数
	    //1.1:创建sql
			$sql = "SELECT count(id) FROM t_product";
			//1.2:发送sql
			$result = mysqli_query($conn,$sql);
			//1.3:抓取
			$row = mysqli_fetch_row($result);
      $count = $row[0];
	 //2:计算总页数
	    //2.1:计算   9 % 3 == 0    9/3==3
			//           10 % 3 != 0   10/3+1=4
			$page = 1;
			if($count % 3 == 0){
				$page = intval($count/3);
			}else{
			  $page = intval(($count/3)+1);
			}
	//4:发送sql
	$sql = "SELECT * FROM t_product limit $p,3";
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
	//!!!!!!!!!!!!!!!!
	for($i=1;$i<=$page;$i++){
		echo "<a href='product_list3.php?pageNo=$i'>$i</a>&nbsp;";
	}
	echo "</td>";
	echo  "</tr>";
  echo "</table>";
?>