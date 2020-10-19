<?php 
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("category",$id);
    if (empty($EditCategory)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
        
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name"))
          
        ];

        $error =[];
        // neu de trong thi thong bao
        if(postInput('name')=='')
        {
            $error['name'] = "Mời bạn nhập đầy đủ danh mục";
        }
        
        //neu error rỗng = không có lỗi thì ...
 
           
        if(empty($error))
        {
            if($EditCategory['name'] != $data['name'])
            {
                $isset = $db->fetchOne("category"," name = '".$data['name']."' ");
                if(count($isset) > 0 )
                {
                    $_SESSION['error'] = "Tên danh mục đã tồn tại";
                }
                else
                {
                    $id_update = $db -> update("category",$data,array("id"=>$id));
                    if($id_update >0 ){
                        $_SESSION['success'] = "Cập nhật thành công" ;
                        redirectAdmin("category");
                    }
                    else
                    {
                        $_SESSION['error'] = "Dữ liệu không thay đổi" ;
                        redirectAdmin("category");
                    }
                }   
            }
            else
            {
                $id_update = $db -> update("category",$data,array("id"=>$id));
                if($id_update >0 ){
                     $_SESSION['success'] = "Cập nhật thành công" ;
                     redirectAdmin("category");
                }
                else
                {
                    $_SESSION['error'] = "Dữ liệu không thay đổi" ;
                    redirectAdmin("category");
                }
            }
            
        }
    }
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm Mới Danh Mục
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Danh Mục</a>
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
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Danh Mục" name="name" value="<?php echo $EditCategory['name'] ?>">
                                
                                    <?php if(isset($error['name'])): ?>
                                        <p class="text-danger"><?php echo $error['name'] ?></p>       
                                    <?php endif ?>
                                </div>
                        
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>