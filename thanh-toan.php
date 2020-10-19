<?php  

	require_once __DIR__. "/autoload/autoload.php"; 
	$user = $db->fetchID("users",intval($_SESSION['name_id']));

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$data = 
		[
			'amount' => $_SESSION['tongtien'],
			'users_id' => $_SESSION['name_id'],
			'note' => postInput("note")
		];

		$idtransaction = $db ->insert("transaction",$data);
		if($idtransaction >0)
		{
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				$data2 = 
				[
					'transaction_id' =>$idtransaction,
					'product_id'     =>$key,
					'sl'             =>$value['sl'],
					'price'          =>$value['price']
				];
				$id_insert = $db->insert("orders",$data2);
			}
			unset($_SESSION['cart']);
			unset($_SESSION['total']);
			
			$_SESSION['success'] = "Lưu thông tin đơn hàng thành công !";
			header("location:thong-bao.php");
		}
	}
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Thanh toán đơn hàng</a> </h3> 
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Tên Thành Viên</lavel>
             	            <div >
             	            	<input type="text" readonly="" class="form-control" placeholder="Họ và Tên" name="name" value="<?php echo $user['name'] ?>">
             	            	
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Email</lavel>
             	            <div>
             	            	<input type="email" readonly="" class="form-control" placeholder="exam@gmail.com" name="email" value="<?php echo $user['email'] ?>">
             	            	
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Số Điện Thoại</lavel>
             	            <div>
             	            	<input type="number" readonly="" class="form-control" placeholder="0123456789" name="phone" value="<?php echo $user['phone'] ?>">
             	            	
             	            </div>          	            
             	        </div>
             	         <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Địa Chỉ</lavel>
             	            <div>
             	            	<input type="text" readonly="" class="form-control" placeholder="Số Nhà - Tỉnh - Thành Phố" name="address" value="<?php echo $user['address'] ?>">
             	            	
             	            </div>          	            
             	        </div>
             	         <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Số Tiền</lavel>
             	            <div>
             	            	<input type="text" readonly="" class="form-control" placeholder="" name="address" value="<?php echo formatPrice($_SESSION['total']) ?>">
             	            	
             	            </div>          	            
             	        </div>
             	        <div class="form-group">
             	            <label class="col-md-5 col-md-offset-1">Ghi Chú</lavel>
             	            <div>
             	            	<input type="text" class="form-control" placeholder="Giao hàng tận nơi" name="address" value="">
             	            	
             	            </div>          	            
             	        </div>
             	        <button type="submit" class="btn btn-succsess col-md-2 col-md-offset-2" style="margin-bottom: 20px">Xác Nhận</button>
             	    </form>          
             <!-- Noi Dung -->               
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    