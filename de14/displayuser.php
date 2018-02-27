<?php 
	$conn=mysqli_connect("localhost","root","root","On_Thi");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không thể kết lỗi csdl").mysqli_error($conn);
	}

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$user=$_POST["username"];
		$password=md5($_POST["password"]);

		if($user==""){
			$message1="Bạn chưa nhập tên đăng nhập !!!";
		}
		else if($password==""){
			$message2="Bạn chưa nhập mật khẩu !!!";
		}
		else {
			$sql="INSERT INTO user (username,password)
				VALUES('{$user}','{$password}')
			";
			$query=mysqli_query($conn,$sql);
			if($query){
				echo "<script> alert('Thêm tài khoản thành công'); </script>";
			}else{
				//echo "<script> alert('Thêm tài khoản thất bại'); </script>";
				echo "Them that bai".mysqli_error($conn);
			}
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
		<title>Trang quản lý tài khoản</title>
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
				background:#0808BB;
				color:white;
			}
			h4{
				color:green;
				margin-top:5px;
			}
			.blog-main{
				width:100%;
				margin:10px 0 10px 0;
			}
			.blog-main-left{
				width:40%;
				float:left;
			}
			.blog-main-right{
				width:58%;
				float:left;
				margin:0 0 10px 5px;
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
			input[type="password"]{
				width:98%;
				height:40px;
				border:1px solid #ddd;
				border-radius:1.5em;
				padding-left:10px;
				margin-top:10px;
			}
			button{
				width:25%;
				height:40px;
				line-height:40px;
				color:white;
				background:#0808BB;
				font-size:15px;
				font-weight:bold;
				border:none;
				cursor:pointer;
				margin:10px 0 10px 0;
				border-radius:1.5em;
			}
			table,thead,tbody,tr,td{
				border:1px solid #0808BB;
				border-collapse:collapse;
				text-align:center;
			}
			table{
				width:100%;
				margin-top:10px;
				overflow:scroll;
			}
			thead{
				height:60px;
				line-height:60px;
				background:#0808BB;
				color:white;
				text-align:center;
			}
			tr:nth-child(even){
				background:#ddd;
			}
			a{
				text-decoration: none;
				color:white;
			}
			.btn{
				width:80%;
				height:40px;
				line-height:40px;
				color:white;
				background:#0808BB;
				font-size:13px;
				border:none;
				cursor:pointer;
			}
		</style>
 	</head>
 	<body>
 		<h1>Thêm tài khoản mới mới</h1>
 		<div class="blog-main">
 			<div class="blog-main-left">
 				<form method="post">
					<label><h4>Tên tài khoản</h4>
						<?php 
							if(!empty($message1)){
								echo "<h3>".$message1."</h3>";
							}
						 ?>
						<input type="text" placeholder="Nhập tên tài khoản" name="username">
					</label>
					<label><h4>Nhập mật khẩu</h4>
						<?php 
							if(!empty($message2)){
								echo "<h3>".$message2."</h3>";
							}
						 ?>
						<input type="password" placeholder="Nhập mật khẩu" name="password">
					</label>
					<br>
					<center>
						<button type="submit">Thêm tài khoản</button>
						<button type="reset">Nhập lại</button>
					</center>
 				</form>
 			</div>
 			<div class="blog-main-right">
 				<table>
					<thead>
						<th>STT</th>
						<th>Tên tài khoản</th>
						<th>Mật khẩu</th>
						<th>Tùy Chọn</th>
					</thead>
					<tbody>
						<?php 
							$sql="SELECT * FROM user";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
						 ?>
							<tr>
								<td><?php echo $row["id"]; ?></td>
								<td><?php echo $row["username"]; ?></td>
								<td><?php echo md5($row["password"],false); ?></td>
								<td><a href="changepass.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn">Đổi mật khẩu</button></a></td>
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
