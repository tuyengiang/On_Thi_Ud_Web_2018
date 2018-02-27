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
		h1{
			font-size:20px;
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

		
	</style>
</head>
<body>
	<div class="header">Quản lý nhân viên</div>

	<div class="main">
		<div class="main-left">
			<form method="post">
				<label><h4>Mã nhân viên</h4><input type="text" name="manv" placeholder="Nhập mã nhân viên"></label><br>
				<label><h4>Tên nhân viên</h4><input type="text" name="hoten" placeholder="Nhập tên nhân viên"></label><br>
				<label><h4>Giói tính</h4>
					<input type="radio" name="gioitinh" value="Nam">Nam
					<input type="radio" name="gioitinh" value="Nữ ">Nữ
				</label><br>
				<label> <h4>Quê quán</h4> <input type="text" name="quequan" placeholder="Nhập quê nhân viên"></label><br>
				<label> <h4>Năm tuyển dụng</h4><input type="number" name="nam" placeholder="Nhập năm nhân viên đưọc tuyển dụng"></label><br>
				<center>
					<button type="submit" name="ok">Thêm nhân viên</button>
					<button type="submit">Nhập lại</button>
				</center>


			</form>
		</div>

		<div class="main-right">
			<table>

				<thead>
					<th>Stt</th>
					<th>Mã nhân viên</th>
					<th>Họ tên</th>
					<th>Giới tính</th>
					<th>Quê quán</th>
					<th>Năm tuyển dụng</th>
				</thead>

				<tbody>
				<?php 
					$sql="SELECT * FROM nhanvien";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
				 ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['manv']; ?></td>
						<td><?php echo $row['hoten']; ?></td>
						<td><?php echo $row['gioitinh']; ?></td>
						<td><?php echo $row['quequan']; ?></td>
						<td><?php echo $row['namtuyendung']; ?></td>

					</tr>
				<?php endwhile; ?>
				</tbody>
		
			</table>

		</div>
		<div style="clear:left;"></div>
	</div>
	<div class="bottom">
		Copyright &copy; Tuyển Giảng &trade; 
	</div>
</body>
</html>