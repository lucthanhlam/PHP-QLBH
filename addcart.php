<?php 
	require_once __DIR__. "/autoload/autoload.php";
    if( !isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn phải đăng nhập mới thực hiện được thao tác này!');location.href='index.php'</script>";
    } 
    // lay id sp
    $id = intval(getInput('id'));
    // lay thong tin chi tiet sp
    $product = $db->fetchID("product",$id);

    // kiem tra neu ton tai gio hang thi cap nhat lai gio hang

    // neu khong thi tao moi
    if(!isset($_SESSION['cart'][$id]))
    {
    	$_SESSION['cart'][$id]['name'] = $product['name'];
    	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
    	$_SESSION['cart'][$id]['sl'] = 1;
		$_SESSION['cart'][$id]['price'] = ((100-$product['sale'])*$product['price'])/100;

    }
    else
    {
        // cap nhat lai gio hang
    	$_SESSION['cart'][$id]['sl'] += 1;
    }

    echo "<script>alert('Thêm sản phẩm thành công!');location.href='gio-hang.php'</script>";

 ?>