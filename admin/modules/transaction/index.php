<?php 
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p =1;
    }

    $sql = "SELECT transaction.* , users.name as nameuser , users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id =  transaction.users_id ORDER BY ID DESC  ";
    $transaction = $db->fetchJone('transaction',$sql,$p,3,true);

    if(isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Danh Sách    Đơn Hàng
                                <a href="add.php" class="btn btn-success">Thêm mới</a>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>transaction">Bảng Điều Khiển</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Admin
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!--Thong bao loi -->
                            <?php  require_once __DIR__. "/../../../parials/notification.php";?>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ và Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; foreach ($transaction as $item) :?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $item['nameuser'] ?></td>
                                        <td><?php echo $item['phoneuser'] ?></td>
                                        <td>
                                            <?php if ($item['status'] == 0): ?>
                                                <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-danger">Chưa Xử Lý</a>
                                            <?php else: ?>
                                                <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-info">Đã Xử Lý</a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $stt++; endforeach ?>
                                </tbody>
                             </table>
                             <div class="pull-right">
                                 <nav aria-label="Page navigation example">
                                 <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for($i=1; $i<=$sotrang;$i++): ?>
                                        <?php 
                                            if(isset($_GET['page']))
                                            {
                                                $p=$_GET['page'];
                                            }
                                            else
                                            {
                                                $p=1;
                                            }
                                         ?>
                                         <li class="<?php echo($i==$p) ?'active' :'' ?>">
                                             <a href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
                                         </li>
                                    <?php endfor; ?>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                             </div>
                             
                        </div>
                       </div>
                    </div>
                       
<?php  require_once __DIR__. "/../../layouts/footer.php";?>