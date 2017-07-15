<?php
header("content-type:application/json;charset=utf-8");
$conn=mysqli_connect('127.0.0.1','root','','liuyan');
$sql="SET NAMES UTF8";
mysqli_query($conn,$sql);

  $pageNo = 1;
	if(!empty($_REQUEST['pageNo'])){
     $pageNo = $_REQUEST['pageNo'];
	}
  $p = ($pageNo-1)*3;
	//$p 起始记录行号
  //3.2 计算总页数
	 //1:计算总行数
	    //1.1:创建sql
			$sql = "SELECT count(id) FROM ban";
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
	$sql = "SELECT * FROM ban order by id desc limit $p,3";
	$result = mysqli_query($conn,$sql);
	//5:获取返回的结果
	$output=[];
	while(($row=mysqli_fetch_assoc($result))!=null){
		$output[]=$row;
	};
	$output[]=$page;
	echo json_encode($output);

?>