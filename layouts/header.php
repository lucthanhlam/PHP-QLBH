<!DOCTYPE html>
<html>
    <head>
        <title>Hưng Lan Shop : Quần Áo Việt</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Hung Lan</a><b>Shop quần áo uy tín hàng đầu VN </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li>Xin Chào : <?php echo $_SESSION['name_user']; ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài Khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="">Thông Tin</a></li>
                                                    <li><a href="gio-hang.php">Giỏ Hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i> Thoát</a></li>
                                                </ul>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng Nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng Ký</a>
                                            </li>
                                        <?php endif ?> 
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option value="">  Nhập từ khóa  </option>               
                                            <?php foreach ($category as $item) :?>
                                                    <option> 
                                                    <a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                                    </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" nhập từ khóa " class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                <img src="<?php echo base_url() ?>public/frontend/images/logo-default2.png" >
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0398444395</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> Giỏ Hàng </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                           <!--  <ul>
                                <li>
                                    <a href="">Máy tính  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Máy giặt  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Đồ điện  <span class="badge pull-right">14</span></a>
                                </li>
                                <li>
                                    <a href=""> Thiết bị văn phòng  <span class="badge pull-right">14</span> </a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                            <ul>
                                <?php foreach ($category as $item) :?>
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            <ul>
                                <?php foreach ($productNew as $item) :?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads()?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"><?php echo $item['name']; ?></p >
                                                <?php if ($item['sale'] > 0) :?>
                                                    <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b><br>
                                                    <b class="name">Sale: <?php echo $item['sale'] ?> %</b><br>
                                                <?php else : ?>
                                                    <b class="price"><?php echo formatPrice($item['price']) ?></b><br>
                                                <?php endif ?> 
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm Hot </h3>
                          <ul>
                                <?php foreach ($productNew as $item) :?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads()?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"><?php echo $item['name']; ?></p >
                                                <?php if ($item['sale'] > 0) :?>
                                                    <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b><br>
                                                    <b class="name">Sale: <?php echo $item['sale'] ?> %</b><br>
                                                <?php else : ?>
                                                    <b class="price"><?php echo formatPrice($item['price']) ?></b><br>
                                                <?php endif ?> 
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                    </div>