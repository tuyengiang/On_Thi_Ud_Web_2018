<?php 
	$conn=mysqli_connect("localhost","root","root","On_Thi");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không thể kết lỗi csdl").mysqli_error($conn);
	}

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$masv=$_POST["masv"];
		$tensv=$_POST["tensv"];
		$quequan=$_POST["quequan"];
		$gioitinh=$_POST["gioitinh"];

		if($masv==""){
			$message1="Bạn chưa nhập mã sinh viên !!!";
		}
		else if($tensv==""){
			$message2="Bạn chưa nhập tên sinh viên !!!";
		}
		else if($quequan==""){
			$message3="Bạn chưa nhập quê quán sinh viên !!!";
		}
		else {
			$sql="INSERT INTO qlsv (masv,hoten,quequan,gioitinh)
				VALUES('{$masv}','{$tensv}','{$quequan}',N'{$gioitinh}')
			";
			$query=mysqli_query($conn,$sql);
			if($query){
				echo "<script> alert('Thêm sinh viên thành công'); </script>";
			}else{
				//echo "<script> alert('Thêm sinh viên thát bại'); </script>";
				echo "Them that bai".mysqli_error($conn);

			}
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
		<title>Trang quản lý sinh viên</title>
		<meta charset="utf-8"/>
		<style type="text/css">
			*{
				margin:0;padding:0;
				font-family:roboto,arial;
			}
			body{
				width:90%;
				margin:auto;
				margin-top:10px;
				margin-bottom:10px;
				box-shadow:2px 2px 2px 2px rgba(0,0,0,0.1);
			}
			h1{
				width:100%;
				height:100px;
				line-height:100px;
				text-align:center;
				background:#ff3333;
				color:white;
			}
			h4{
				color:green;
				margin-top:5px;
			}
			.blog-main{
				width:100%;
				margin-top:10px;
			}
			.blog-main-left{
				width:40%;
				float:left;
			}
			.blog-main-right{
				width:58%;
				float:left;
				margin-left:5px;
			}
			.title{
				width:100%;
				height:40px;
				line-height:40px;
				text-align:center;
				background:green;
				color:white;
			}
			form{
				width:95%;
				margin:auto;
			}
			input[type="text"]{
				width:98%;
				height:40px;
				border:1px solid #ddd;
				border-radius:1.5em;
				padding-left:10px;
				margin-top:10px;
			}
			input[type="radio"]{
				width:5%;
				margin-top:10px;
			}
			button{
				width:25%;
				height:40px;
				line-height:40px;
				color:white;
				background:green;
				font-size:15px;
				font-weight:bold;
				border:none;
				margin:10px 0 10px 0;
			}
			table,thead,tbody,tr,td{
				border:1px solid green;
				border-collapse:collapse;
				text-align:center;
			}
			table{
				width:100%;
				margin-top:10px;
			}
			thead{
				height:60px;
				line-height:60px;
				background:green;
				color:white;
				text-align:center;
			}
			a{
				text-decoration: none;
				color:white;
			}
			.tim-kiem{
				display:block;
				width:30%;
				height:40px;
				line-height:40px;
				float:right;
				margin:10px 10px 10px 0;
				text-align:center;
				background:blue;
				color:white;
			}
		</style>
 	</head>
 	<body>
 		<h1>Thêm sinh viên mới</h1>
 		<div class="blog-main">
 			<div class="blog-main-left">
 				<div class="title">Nhập thông tin sinh viên</div>
 				<form method="post">
					<label><h4>Nhập mã sinh viên</h4>
						<?php 
							if(!empty($message1)){
								echo "<h3>".$message1."</h3>";
							}
						 ?>
						<input type="text" placeholder="Nhập mã sinh viên" name="masv">
					</label>
					<label><h4>Nhập tên sinh viên</h4>
						<?php 
							if(!empty($message2)){
								echo "<h3>".$message2."</h3>";
							}
						 ?>
						<input type="text" placeholder="Nhập tên sinh viên" name="tensv">
					</label>
					<label><h4>Nhập quê quán sinh viên</h4>
						<?php 
							if(!empty($message3)){
								echo "<h3>".$message3."</h3>";
							}
						 ?>
						<input type="text" placeholder="Nhập quê quán sinh viên" name="quequan">
					</label>
					<label><h4>Giới tính</h4>
						<input type="radio" name="gioitinh" value="Nam"> Nam
						<input type="radio" name="gioitinh" value="Nữ"> Nữ
					</label><br>
					<center>
						<button type="submit">Thêm sinh viên</button>
						<button type="reset">Nhập lại</button>
					</center>
 				</form>
 			</div>
 			<div class="blog-main-right">
 				<div class="title">Danh sách sinh viên</div>
 				<div class="tim-kiem">
					<a href="timkiem.php">Tìm kiếm sinh viên</a>
 				</div>
 				<table>
					<thead>
						<th>STT</th>
						<th>MÃ SINH VIÊN</th>
						<th>HỌ TÊN</th>
						<th>QUÊ QUÁN</th>
						<th>GIÓI TÍNH</th>
					</thead>
					<tbody>
						<?php 
							$sql="SELECT * FROM qlsv";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
						 ?>
							<tr>
								<td><?php echo $row["id"]; ?></td>
								<td><?php echo $row["masv"]; ?></td>
								<td><?php echo $row["hoten"]; ?></td>
								<td><?php echo $row["quequan"]; ?></td>
								<td><?php echo $row["gioitinh"];?></td>

							</tr>
						 <?php 
						 	endwhile;
						  ?>
					</tbody>
 				</table>
 			</div>
 		<div style="clear:left"></div>

 		</div>

 	</body>
 </html>
