<?php 
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditAdmin = $db->fetchID("admin",$id);
    if (empty($EditAdmin)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
        
    }

    /** lay ra danh muc sp*/
        

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $data = 
        [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "phone" =>  postInput("phone"),
            "password" => MD5(postInput("password")),
            "address" => postInput("address"),
            "level" => postInput("level"), 
        ];

        $error =[];
        // neu de trong thi thong bao
        if(postInput('name')=='')
        {
            $error['name'] = "Mời bạn nhập đầy đủ danh mục";
        }
        if(postInput('email')=='')
        {
            $error['email'] = "Mời bạn nhập Email";
        }
        else
        {
            if(postInput('email') != $EditAdmin['email'])
            {
               $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
                if($is_check != NULL)
                {
                    $error['email'] = "Email đã tồn tại";
                } 
            }     
        }
        if(postInput('phone')=='')
        {
            $error['phone'] = "Mời bạn nhập số điện thoại";
        }
        
        if(postInput('address')=='')
        {
            $error['address'] = "Mời bạn nhập địa chỉ";
        }
        if(postInput('password')!=NULL && postInput('re_password')!=NULL)
        {
            if(postInput('password')!= postInput('re_password'))
            {
                $error['password'] = "Mật khẩu không khớp , mời bạn nhập lại mật khẩu";
            }
            else
            {
                $data['password'] = MD5(postInput("password"));
            }
        }
        //neu error rỗng = không có lỗi thì ...
        if(empty($error))
        {
           
            $id_update = $db->update("admin",$data,array("id"=>$id));
            if($id_update >0)
            {   
                $_SESSION['success'] = "Cập nhật thành công";
                 redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật không thành công";
            }
        }
    }
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm Mới ADMIN
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng Điều Khiển</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Admin</a>
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
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data"s>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và Tên</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ và Tên" name="name" value="<?php echo $EditAdmin['name'] ?>">
                                    <?php if(isset($error['name'])): ?>
                                        <p class="text-danger"><?php echo $error['name'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exam@gmail.com" name="email" value="<?php echo $EditAdmin['email'] ?>">
                                    <?php if(isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0123456789" name="phone" value="<?php echo $EditAdmin['phone'] ?>">
                                    <?php if(isset($error['phone'])): ?>
                                        <p class="text-danger"><?php echo $error['phone'] ?></p>       
                                    <?php endif ?>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********" name="password">
                                    <?php if(isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Config Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********" name="re_password" >
                                    <?php if(isset($error['re_password'])): ?>
                                        <p class="text-danger"><?php echo $error['re_password'] ?></p>       
                                    <?php endif ?>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số 198 đường ABC - TP.Hà Nội" name="address" value="<?php echo $EditAdmin['address'] ?>">
                                    <?php if(isset($error['address'])): ?>
                                        <p class="text-danger"><?php echo $error['address'] ?></p>       
                                    <?php endif ?>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Level</label>
                                   <select class="form-control" name="level">
                                        <option value="1" <?php echo isset($EditAdmin['level']) && $EditAdmin['level'] == 1 ? "selected = 'selected'" : '' ?>>Cộng Tác Viên</option>
                                        <option value="2" <?php echo isset($EditAdmin['level']) && $EditAdmin['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>
                                   </select>
                                    <?php if(isset($error['level'])): ?>
                                        <p class="text-danger"><?php echo $error['level'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>