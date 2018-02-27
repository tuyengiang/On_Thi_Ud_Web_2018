<?php 
	$conn=mysqli_connect("localhost","root","root","On_Thi");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Không thể kết lỗi csdl").mysqli_error($conn);
	}

	$id=$_GET['id'];
	$sql="SELECT * FROM user WHERE id='{$id}'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if(!isset($row)){
		echo "<script> alert('Tài khoản không tồn tại !!!'); </script>";
	}else{
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$user=$_POST["username"];
			$pass=md5($_POST["password"]);
			$pass1=md5($_POST["passwordnew"]);
			$pass2=md5($_POST["passwordnew1"]);
			if($user==""){
				echo "<script> alert('Bạn chưa nhập tên tài khoản !!!'); </script>";
			}
			else if($pass==""){
				echo "<script> alert('Bạn chưa nhập mật khẩu !!!'); </script>";
			}
			else if($pass1==""){
				echo "<script> alert('Bạn chưa nhập mật khẩu mới !!!'); </script>";
			}
			else if($pass2==""){
				echo "<script> alert('Mời nhập lại mật khẩu mới để xác nhận !!!'); </script>";
			}
			else{
				if($pass1==$pass2){
					if($user==$row["username"] && $pass==md5($_POST["password"])){
						$sql="UPDATE user SET password='{$pass1}' WHERE username='{$user}'";
						$query=mysqli_query($conn,$sql);
						if($query){
							echo "<script> alert('Đổi thành công !!!'); </script>";
						}else{
							echo "<script> alert('Đổi thất bại !!!'); </script>";
						}
					}else{
						echo "<script> alert('Tài khoản và mật khẩu không đúng!!!'); </script>";
					}
				}else{
					echo "<script> alert('Mật khẩu không khớp!!!'); </script>";
				}
			}

		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
		<title>Trang đổi mật khẩu</title>
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
 		<div class="blog-main" style="width:40%;margin:auto;margin-top:15px;">
 				
 				<form method="post">
					<label><h4>Tên tài khoản</h4>
						<?php 
							if(!empty($message1)){
								echo "<h3>".$message1."</h3>";
							}
						 ?>
						<input type="text" placeholder="Nhập tên tài khoản" name="username" value="<?php echo $row['username']; ?>" Readonly>
					</label>
					<label><h4>Nhập mật khẩu</h4>
						<?php 
							if(!empty($message2)){
								echo "<h3>".$message2."</h3>";
							}
						 ?>
						<input type="password" placeholder="Nhập mật khẩu" name="password">
					</label>
					<label><h4>Nhập mật khẩu mới</h4>
						
						<input type="password" placeholder="Nhập mật khẩu mới" name="passwordnew">
					</label>
					<label><h4>Nhập lại mật khẩu mới</h4>
						
						<input type="password" placeholder="Nhập lại mật khẩu" name="passwordnew1">
					</label>
					<br>
					<center>
						<button type="submit">Đổi mật khẩu</button>
						<a href="displayuser.php"><button type="reset">Về quản lý</button></a>
					</center>
 				</form>
 		<div style="clear:left"></div>

 		</div>

 	</body>
 </html>
