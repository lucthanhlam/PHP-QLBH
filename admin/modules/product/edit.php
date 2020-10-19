<?php 
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if (empty($EditProduct)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
        
    }
    $category = $db->fetchAll("category");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" =>  postInput("category_id"),
            "price" => postInput("price"),
            "number" => postInput("number"),
            "content" => postInput("content"),
            "sale" => postInput("sale")
        ];

        $error =[];
        // neu de trong thi thong bao
        if(postInput('name')=='')
        {
            $error['name'] = "Mời bạn nhập đầy đủ danh mục";
        }
        if(postInput('category_id')=='')
        {
            $error['category_id'] = "Mời bạn chọn tên danh mục sản phẩm";
        }
        if(postInput('price')=='')
        {
            $error['price'] = "Mời bạn nhập giá sản phẩm";
        }
        if(postInput('content')=='')
        {
            $error['content'] = "Mời bạn nhập nội dung sản phẩm";
        }
         if(postInput('number')=='')
        {
            $error['number'] = "Mời bạn nhập nội dung sản phẩm";
        }
        if(! isset($_FILES['thunbar']))
        {
            $error['thunbar'] = "Mời bạn chọn hình ảnh";
        }
        //neu error rỗng = không có lỗi thì ...
 
           
        if(empty($error))
        {
           if(isset($_FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if($file_erro == 0)
                {
                    $part= ROOT ."product/";
                    $data['thunbar'] = $file_name;
                }
            }
            
            $update = $db->update("product",$data,array("id"=>$id));
            if($update > 0 )
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Cập nhật sản phẩm thành công";
                redirectAdmin("product");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật sản phẩm không thành công";
                redirectAdmin("product");
            }
        }
    }


 ?>
<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm Mới Sản Phẩm
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Sản Phẩm</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm Mới
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!--Thong bao loi -->
                            <?php  require_once __DIR__. "/../../../parials/notification.php";?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="" method="POST" enctype="multipart/form-data"s>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control" name="category_id">
                                        <option value=""> - Mời bạn chọn danh mục sản phẩm - </option>
                                        <?php foreach($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>" <?php echo $EditProduct['category_id'] == $item['id'] ? "selected = 'selected'": ''  ?>><?php echo $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(isset($error['category_id'])): ?>
                                        <p class="text-danger"><?php echo $error['category_id'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên sản phẩm" name="name" value="<?php echo $EditProduct['name'] ?>">
                                    <?php if(isset($error['name'])): ?>
                                        <p class="text-danger"><?php echo $error['name'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="8.000.000" name="price" value="<?php echo $EditProduct['price'] ?>">
                                    <?php if(isset($error['price'])): ?>
                                        <p class="text-danger"><?php echo $error['price'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1.000" name="number" value="<?php echo $EditProduct['number'] ?>">
                                    <?php if(isset($error['number'])): ?>
                                        <p class="text-danger"><?php echo $error['number'] ?></p>       
                                    <?php endif ?>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Khuyễn mại</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="10 %" name="sale" value="<?php echo $EditProduct['sale'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thunbar">
                                     <?php if(isset($error['thunbar'])): ?>
                                        <p class="text-danger"><?php echo $error['thunbar'] ?></p>       
                                    <?php endif ?>
                                    <img src="<?php echo uploads() ?>product/<?php echo $EditProduct['thunbar'] ?>" width="100px" height="100px">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea class="form-control" name="content" cols="30" rows="10"><?php 
                                    echo $EditProduct['content'] ?></textarea>
                                    <?php if(isset($error['content'])): ?>
                                        <p class="text-danger"><?php echo $error['content'] ?></p>       
                                    <?php endif ?>
                                </div>
                                

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>