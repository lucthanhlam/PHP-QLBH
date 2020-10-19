<?php  

	require_once __DIR__. "/autoload/autoload.php"; 

	$data = 
	[
		'email' => postInput("email"),
		'password' => postInput("password")
	];

	$error= [];
	if (isset($_SESSION['name_user']))
	{
		echo "<script>alert('Bạn Đã Đăng Nhập!');location.href='index.php'</script>";
	}
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if($data['email'] == '')
		{
			$error['email'] = " Email không được để trống";
		}
		if($data['password'] == '')
		{
			$error['password'] = " Mật khẩu không được để trống";
		}

		if(empty($error))
		{
			$is_check = $db->fetchOne("users"," email = '".$data['email']."' AND password = '".MD5($data['password'])."' ");
			if($is_check != NULL)
			{
				$_SESSION['name_user'] = $is_check['name'];
				$_SESSION['name_id'] =$is_check['id'];
				echo "<script>alert('Đăng Nhập Thành Công!');location.href='index.php'</script>";
			}
			else
			{
				$_SESSION['error'] = "Đăng nhập thất bại";
			}
		}
	}
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Đăng Nhập</a> </h3>    
				<?php if(isset($_SESSION['success'])): ?>
                	<div class="alert alert-success" role="alert">
				  		<strong>Thành Công! </strong><?php echo $_SESSION['success'] ; unset($_SESSION['success'])?>
					</div>
				<?php endif ?> 
				
				<?php if(isset($_SESSION['error'])): ?>
                	<div class="alert alert-danger" role="alert">
				  		<strong>Lỗi! </strong><?php echo $_SESSION['error'] ; unset($_SESSION['error'])?>
					</div>
				<?php endif ?>      
             	<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Email</lavel>
             	            <div>
             	            	<input type="email" class="form-control" placeholder="exam@gmail.com" name="email">
             	            	<?php if(isset($error['email'])) :?>
             	            		<p class="text-danger"><?php echo $error['email'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Mật Khẩu</lavel>
             	            <div>
             	            	<input type="password" class="form-control" placeholder="********" name="password">
             	            	<?php if(isset($error['password'])) :?>
             	            		<p class="text-danger"><?php echo $error['password'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <button type="submit" class="btn btn-succsess col-md-2 col-md-offset-2" style="margin-bottom: 20px">Đăng Nhập</button>
             	    </form>                   
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    