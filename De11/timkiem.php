<!DOCTYPE html>
 <html>
 	<head>
		<title>Tìm kiếm sinh viên</title>
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
			input[type="search"]{
				width:50%;
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
				border-radius:1.5em;
				margin:10px 0 10px 0;
			}
			table,thead,tbody,tr,td{
				border:1px solid green;
				border-collapse:collapse;
				text-align:center;

			}
			table{
				width:100%;
				margin:10px 0 10px 0;
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
 		<h1>Tìm kiếm sinh viên mới</h1>
 		<form method="GET" action="timkiem.php">
 			<center>
 				<input type="search" placeholder="Nhập Gioi tinh" name="search">
				<button type="submit" name="ok" value="search">Tìm kiếm</button>		
 			</center>
 		</form>
 		<div class="blog-main">
						<?php
							if(isset($_GET["ok"])){
									$gioitinh=addslashes($_GET["search"]);
									$sql="SELECT * FROM qlsv WHERE gioitinh like '%$gioitinh%'";
									$conn=mysqli_connect("localhost","root","root","On_Thi");
									$query=mysqli_query($conn,$sql);
									$num = mysqli_num_rows($query);
									if($num>0 && $gioitinh!=""){
										echo "<div class='title'>Danh sách sinh viên</div>
							 				<div class='tim-kiem'>
												<a href='designstudent.php'>Về trang quản lý</a>
							 				</div>";
										echo "<table>
											<thead>
												<th>STT</th>
												<th>MÃ SINH VIÊN</th>
												<th>HỌ TÊN</th>
												<th>QUÊ QUÁN</th>
												<th>GIÓI TÍNH</th>
											</thead>
										<tbody>";
										while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
											echo "<tr>";
											echo "<td>{$row['id']}</td>";
											echo "<td>{$row['masv']}</td>";
											echo "<td>{$row['hoten']}</td>";
											echo "<td>{$row['quequan']}</td>";
											echo "<td>{$row['gioitinh']}</td>";
											echo "</tr>";
										}
										echo "</tbody></table>";
									}else{
										echo "<script> alert('Khong tim thay'); </script>";

									}
								
								
							}
						 ?>
							
						 
 				
 			</div>
 		<div style="clear:left"></div>
 		<h1> Nguyen tuyen giang</h1>

 		</div>

 	</body>
 </html>
