<?php session_start(); ob_start(); 
include './PHP/connect.php';
include './PHP/process.php';
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/Cashing.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/myScript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Thanh Toán</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo-text">
                <a href="">
                    <h3>DREAM STORE</h3>
                </a>
            </div>
            <div class="header-link">
                <div class="search-form">
                    <form action="">
                        <input type="text" placeholder="Nhập nội dung cần tìm" class="input-search">
                        <span class="search-icon">
                            <button type="submit"><i class="fa fa-fw fa-search fa-2x"></i></button>
                        </span>
                    </form>
                </div>
                <div class="product-cart">
                    <a href="Giohang.html"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <hr noshade size="1" />
    </header>
    <!-- end header -->
    <div class="clear_float"></div>
    <div class="container">
         <!-- nav -->
         <div class="nav-main">
            <ul>
            	<?php $url = $ip.'/chungloai'; 
					  $data = file_get_contents($url);
					  $wizards = json_decode($data, true);
					  foreach ($wizards as $wizard){?>
                        <li>
                            <a href="Search.php?idCL=<?php echo $wizard['idCL'] ?>">
								<?php echo  $wizard['TenCL'] ?></a> 
                        </li>
                <?php } ?>
            </ul>
        </div>
        <!-- end nav -->

        <!-- FORM -->
         <form action="<?php echo $ip ?>/themdonhang" method="post">
            <div class="title_form">
                <p class="title">THANH TOÁN</p>
                <p class="title_sub"> PERSONAL INFORMATION AND PAYMENT</p>
                <br />
            </div>
            <div class="cashing_form">
                <div class="input_form">
                   
                        <p>
                            <input type="text" name="TenKH" id="TenKH" class="text_box"
                                placeholder="Họ Tên"  />
                        </p>
                        <p>
                            <input type="text" name="DiaChi" id="DiaChi" class="text_box"
                                placeholder="Địa chỉ" />
                        </p>
                        <p>
                            <input type="number" name="SDT" id="SDT" class="text_box"
                                placeholder="Số điện thoại" />
                        </p>
                        <p>
                            <input type="email" name="Email" id="Email" class="text_box" placeholder="Email" />
                        </p>
                        <p>
                            <input type="text" name="MoTa" id="MoTa" class="text_box" placeholder="Size" />
                        </p>
                        <p class="title">THÔNG TIN BỔ SUNG</p>
                        <p class="note">Ghi chú đơn hàng (tùy chọn)</p>
                        <?php 
								date('Y-m-d');
								$ngaydat = date_create(date('Y-m-d'));
								date_modify($ngaydat, "+11 days");
								$ngaygiao = date_format($ngaydat, "Y-m-d");
						?>
                        <p>
                            <input type="text" name="text_note" id="text_note" />
                           
                            <input type="hidden" name="SoLuong" id="SoLuong" value="<?php echo $_SESSION['giohang'] ?>" />
                            
                        <input type="hidden" name="ThoiGianDat" id="ThoiGianDat" value="<?php echo date('Y-m-d') ?>"/>
                        <input type="hidden" name="ThoiGianGiao" id="ThoiGianGiao" value="<?php echo $ngaygiao ?>"/>
                        
                        </p>
                </div>
            </div>

            <div class="order">
                <p class="title">ĐƠN HÀNG CỦA BẠN</p>
                <?php $truyxuat = new dulieu ;
					if ($_SESSION['giohang']>0){ ?>
                <table class="table_order">
                    <tr>
                        <th class="name_product">Sản phẩm</th>
                        <th class="number_product">Số lượng</th>
                        <th class="price_product">Tổng cộng</th>
                    </tr>
                    <?php for ($i=1; $i<= $_SESSION['giohang'] ; $i++ ) {?>
                    <tr>
                        <td><input type="hidden" name="id_SP" value="<?php echo $_SESSION['idSP'.$i] ?>" />
						
						<?php echo $_SESSION['TenSP'.$i] ?></td>
                        <td class="number_product"><?php echo $_SESSION['soluong'.$i] ?></td>
                        <td class="price_product"><?php $truyxuat->price($_SESSION['Total'.$i]) ;
								echo  $truyxuat->price ?> ₫</td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" class="money_title">TỔNG TIỀN</td>
                        <td class="price_product"> <?php 
						$truyxuat->price($_SESSION['Tongtien']) ;
								echo  $truyxuat->price ?> ₫</td>
                    </tr>
                </table>
                	<input type="hidden" name="ThanhTien" value="<?php echo $_SESSION['Tongtien'] ?>"/>
                    
                    <input type="submit" name="btn_Dathang" id="btn_Dathang" value="Đặt hàng" />
                <?php } else{ ?>
                	<h1> Bạn chưa có đơn hàng nào trong giỏ hàng.</h1>
                    <?php } ?>
               
            </div>

        </form>
        <div class="clear_fix"></div>

    </div>

    <div class="clear">&nbsp;</div>
    <?php include './footer.php' ?>


</body>

</html>