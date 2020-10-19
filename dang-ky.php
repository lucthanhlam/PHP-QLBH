<?php  

	require_once __DIR__. "/autoload/autoload.php";
      if(isset($_SESSION['name_id']))
      {
            echo "<script>alert('Bạn đã đăng nhập thành công , không thể đăng ký tài khoản!');location.href='index.php'</script>";
      } 
	$data = 
	[
		'name' => postInput("name"),
		'email' => postInput("email"),
		'password' => postInput("password"),
		'address' => postInput("address"),
		'phone' => postInput("phone")
	];

	$error = [];
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if($data['name'] == '')
		{
			$error['name'] = " Tên không được để trống";
		}
		if($data['email'] == '')
		{
			$error['email'] = " Email không được để trống";
		}
            else
            {
                  $is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
                  if($is_check != NULL)
                  {
                        $error['email'] = "Email đã tồn tại , mời bạn nhập email khác !";
                  }
            }
		if($data['password'] == '')
		{
			$error['password'] = " Password không được để trống";
		}
		else
		{
			$data['password'] = MD5(postInput("password"));
		}
		if($data['address'] == '')
		{
			$error['address'] = " Địa chỉ không được để trống";
		}
		if($data['phone'] == '')
		{
			$error['phone'] = " Số Điện thoại không được để trống";
		}

		if(empty($error))
		{
			$id_insert = $db->insert("users",$data);
			if($id_insert >0)
			{
				$_SESSION['success'] = " Đăng ký thành công! Mời bạn Đăng Nhập";
				header("location:dang-nhap.php");
			}
			else
			{
				echo "Đăng ký không thành công";
			}
		}
	}


?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Đăng ký thành viên </a> </h3>           
             		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Tên Thành Viên</lavel>
             	            <div >
             	            	<input type="text" class="form-control" placeholder="Họ và Tên" name="name" value="<?php echo $data['name'] ?>">
             	            	<?php if(isset($error['name'])) :?>
             	            		<p class="text-danger"><?php echo $error['name'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Email</lavel>
             	            <div>
             	            	<input type="email" class="form-control" placeholder="exam@gmail.com" name="email" value="<?php echo $data['email'] ?>">
             	            	<?php if(isset($error['email'])) :?>
             	            		<p class="text-danger"><?php echo $error['email'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Mật Khẩu</lavel>
             	            <div>
             	            	<input type="password" class="form-control" placeholder="********" name="password" value="<?php echo $data['password'] ?>">
             	            	<?php if(isset($error['password'])) :?>
             	            		<p class="text-danger"><?php echo $error['password'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Số Điện Thoại</lavel>
             	            <div>
             	            	<input type="number" class="form-control" placeholder="0123456789" name="phone" value="<?php echo $data['phone'] ?>">
             	            	<?php if(isset($error['phone'])) :?>
             	            		<p class="text-danger"><?php echo $error['phone'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	         <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Địa Chỉ</lavel>
             	            <div>
             	            	<input type="text" class="form-control" placeholder="Số Nhà - Tỉnh - Thành Phố" name="address" value="<?php echo $data['address'] ?>">
             	            	<?php if(isset($error['address'])) :?>
             	            		<p class="text-danger"><?php echo $error['address'] ?></p>
             	            	<?php endif ?>
             	            </div>          	            
             	        </div>
             	        <button type="submit" class="btn btn-succsess col-md-2 col-md-offset-2" style="margin-bottom: 20px">Đăng Ký</button>
             	    </form>             
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    