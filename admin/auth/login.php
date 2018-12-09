<?php
	session_start();
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/templates/admin/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<?php
				if(isset($_POST['submit'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$queryLogin = "SELECT * FROM users
									WHERE username = '{$username}' AND password = '{$password}'";
					$resultLogin = $mysqli->query($queryLogin);
					$arLogin = mysqli_fetch_assoc($resultLogin);
					/// die là dừng ko chạy dòng tiếp theo
					if($arLogin) {
						$_SESSION['userinfo'] = $arLogin;
						header("location:/admin/");
					} else {
						echo "<h3> Sai tên đăng nhập hoặc mật khẩu </h3>";
					}
				}
			?>
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-26">
						Login
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" class="login100-form-btn" value="Login" name="submit" />
								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<?php
	ob_end_flush();
?>
