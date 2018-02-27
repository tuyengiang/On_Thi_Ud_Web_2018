<?php 
	$conn=mysqli_connect("localhost","root","root","On_Thi");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không thể kết nối csdl").mysqli_error($conn);
	}
	if(isset($_POST["ok"])){
		$mact=$_POST["mact"];
		$hoten=$_POST["hoten"];
		$sdt=$_POST["sdt"];
		$nam=$_POST["namsinh"];
		$quequan=$_POST["quequan"];
		if($mact==""){
			echo "<script> alert('Bạn chưa nhập mã cầu thủ'); </script>";
		}
		else if($hoten==""){
			echo "<script> alert('Bạn chưa nhập tên cầu thủ''); </script>";

		}
		else if($nam==""){
			echo "<script> alert('Bạn chưa nhập năm sinh'); </script>";
		}
		
		else if($quequan==""){
			echo "<script> alert('Bạn chưa nhập quê cầu thủ); </script>";

		}
		else if($sdt==""){
			echo "<script> alert('Bạn chưa nhập số điện thoại'); </script>";
		}
		else{
			$sql="INSERT INTO cauthu (mact,hoten,namsinh,quequan,sdt)
					VALUES('{$mact}','{$hoten}','{$nam}','{$quequan}','{$sdt}')
			";
			$query=mysqli_query($conn,$sql);
			if($query){
				echo "<script> alert('Thêm cầu thủ thành công'); </script>";

			}else{
				echo "Them that bai".mysqli_error($conn);
			}
		}
	}
 ?>
	

<!DOCTYPE html>
<html>
<head>
	<title>Trang thêm cầu thủ mới</title>
	<meta charset="utf-8">
	<style>
		*{
			margin:0;padding:0;font-family:roboto,arial,"Time New Roman";
		}
		body{
			width:90%;
			margin:auto;
			background:white;
			margin-top:100px;
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
			height:180px;
			overflow:scroll;
			margin-top:10px;
		}
		input[type="text"]{
			width:98%;
			padding-left:5px;
			height:23px;
			border:1px solid #ddd;
		}

		input[type="number"]{
			width:98%;
			padding-left:5px;
			height:30px;
			border:1px solid #ddd;
		}
		input[type="radio"]{
			width:5%;
		}
		button{
			width:30%;
			height:20px;
			line-height:20px;
			background:#0098db;
			color:white;
			border:none;
			font-weight:bold;
			cursor:pointer;
		}
		table,thead,tr,td,th,tbody{
			border:1px solid #0098db;
			border-collapse: collapse;
		}
		table{
			width:100%;
			margin-top:20px;
		}
		thead{
			background:#0098db;
			height:40px;
			text-align:center;
			line-height:40px;
			color:white;
			clear:;
		}

		
	</style>
</head>
<body>
	<div class="header">Quản lý cầu thủ</div>

	<div class="main">
		<div class="main-left">
			<form method="post">
				<table>
					<tr>
						<td>Mã cầu thủ</td>
						<td><input type="text" name="mact" placeholder="Nhập mã cầu thủ"></td>

					</tr>
					<tr>
						<td>Tên cầu thủ</td>
						<td><input type="text" name="hoten" placeholder="Nhập tên cầu thủ"></td>

					</tr>
					<tr>
						<td> Năm sinh 
						</td>
						<td> 
							<select name="namsinh">
								<?php 
									for($i=1970;$i<DATE('Y');$i++):
								 ?>
									<option value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
								<?php endfor; ?>
							</select>

							Quê quán
							<select name="quequan">
								<option value="Hà nội">Hà nội</option>
								<option value="Nam định">Nam định</option>
								<option value="Hải phòng">Hải phòng</option>
								<option value="Thanh hóa">Thanh hóa</option>
								<option value="Bắc ninh">Bắc ninh</option>
							</select>
						</td>

					</tr>
					<tr>
						<td>Sô điện thoại</td>
						<td><input type="number" name="sdt" placeholder="Nhập số điện thoại"></td>

					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" name="ok">Thêm nhân viên</button>
							<button type="submit">Nhập lại</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<center><a href="displayqq.php">Danh sách</a></center>
		</div>

		<div class="main-right">
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
					$sql="SELECT * FROM cauthu";
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


		</div>
		<div style="clear:left;"></div>
	</div>
	<div class="bottom">
		Copyright &copy; Tuyển Giảng &trade; 
	</div>
</body>
</html>