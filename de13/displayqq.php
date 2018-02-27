<?php 
	$conn=mysqli_connect("localhost","root","root","On_Thi");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không thể kết nối csdl").mysqli_error($conn);
	}
	if(isset($_POST["ok"])){
		$manv=$_POST["manv"];
		$hoten=$_POST["hoten"];
		$gioitinh=$_POST["gioitinh"];
		$nam=$_POST["nam"];
		$quequan=$_POST["quequan"];
		if($manv==""){
			echo "<script> alert('Bạn chưa nhập mã nhân viên'); </script>";
		}
		else if($hoten==""){
			echo "<script> alert('Bạn chưa nhập tên nhân viên'); </script>";

		}
		else if($hoten==""){
			echo "<script> alert('Bạn chưa nhập tên nhân viên'); </script>";

		}
		else if($quequan==""){
			echo "<script> alert('Bạn chưa nhập quê nhân viên'); </script>";

		}
		else if($nam==""){
			echo "<script> alert('Bạn chưa nhập năm tuyển dụng nhân viên'); </script>";
		}
		else{
			$sql="INSERT INTO nhanvien (manv,hoten,gioitinh,quequan,namtuyendung)
					VALUES('{$manv}','{$hoten}','{$gioitinh}','{$quequan}','{$nam}')
			";
			$query=mysqli_query($conn,$sql);
			if($query){
				echo "<script> alert('Thêm nhân viên thành công'); </script>";

			}else{
				echo "Them that bai".mysqli_error($conn);
			}
		}
	}
 ?>
	

<!DOCTYPE html>
<html>
<head>
	<title>Trang thêm nhân viên mới</title>
	<meta charset="utf-8">
	<style>
		*{
			margin:0;padding:0;font-family:roboto,arial,"Time New Roman";
		}
		body{
			width:90%;
			margin:auto;
			background:white;
			margin-top:50px;

			box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.1);
		}
		.header{
			width:100%;
			height:80px;
			background:#0098Db;
			line-height:80px;
			text-align:center;
			color:white;
			font-weight:Bold;
			font-size:30px;
		}
		.bottom{
			width:100%;
			height:80px;
			background:#191919;
			line-height:80px;
			text-align:center;
			color:white;
			font-weight:Bold;
			font-size:30px;
			margin-top:20px;
		}
		.main{
			width:100%;
			height:300px;
			overflow:scroll;
		}
		.b{
			width:15%;
			height:40px;

		}
		.main-left{
			width:35%;
			float:left;
			margin-top:10px;
		}
		.main-right{
			width:64%;
			float:left;
			margin-left:10px;
			height:450px;
			overflow:scroll;
		}
		input[type="text"]{
			width:98%;
			float:right;
			padding-left:5px;
			height:40px;
			border:1px solid #ddd;
			border-radius:1.5em;
			margin-top:10px;
		}

		input[type="number"]{
			width:98%;
			float:right;
			padding-left:5px;
			height:40px;
			border:1px solid #ddd;
			border-radius:1.5em;
			margin-top:10px;
		}
		label{
			width:100%;
			height:30px;
			line-height:30px;
		}
		input[type="radio"]{
			width:5%;
		}
		button{
			width:30%;
			height:40px;
			line-height:40px;
			background:#0098db;
			color:white;
			border:none;
			font-weight:bold;
			margin-top:15px;
			margin-left:10px;
			border-radius:1.5em;
			cursor:pointer;
		}
		table,thead,tr,td,th,tbody{
			border:1px solid #0098db;
			border-collapse: collapse;
			text-align:center;
		}
		table{
			width:100%;
			margin-top:20px;
		}
		thead{
			background:#0098db;
			height:70px;
			text-align:center;
			line-height:50px;
			color:white;
			clear:;
		}

		h1{
			font-size:20px;
			height:40px;
			line-height:40px;
			text-align:center;
			margin:10px 0 10px 0;
			background:#ddd;
			color:#0098db;
		}
		a{
			text-decoration:none;
			color:#0098db;
		}
	</style>
</head>
<body>
	<div class="header">Quản lý cầu thủ</div>

	<div class="main">
		<h1> Danh sách cầu thủ quê bắt đầu chữ 'Hà' </h1>
			<table>

				<thead>
					<th>Stt</th>
					<th>Mã cầu thủ</th>
					<th>Họ tên</th>
					<th>Năm sinh</th>
					<th>Quê quán</th>
					<th>Số điện thoại</th>
				</thead>

				<tbody>
				<?php 
					$sql="SELECT * FROM cauthu WHERE quequan like 'Hà%'";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['mact']; ?></td>
						<td><?php echo $row['hoten']; ?></td>
						<td><?php echo $row['namsinh']; ?></td>
						<td><?php echo $row['quequan']; ?></td>
						<td><?php echo $row['sdt']; ?></td>

					</tr>
				<?php endwhile; ?>
				</tbody>
		
			</table>
			<br>
			
	</div>
	<center><a href="designqq.php">Về quản lý</a></center>
	<div class="bottom">
		Copyright &copy; Tuyển Giảng &trade; 
	</div>
</body>
</html>