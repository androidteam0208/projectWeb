<?php session_start(); ob_start(); 
include './PHP/connect.php';
include "./PHP/process.php" ;
$truyxuat = new dulieu;
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=0;
$_SESSION['Tongtien' ]=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết</title>

    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic">

    <link rel="stylesheet" href="./fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/Giohang.css" type="text/css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include "./header.php" ?>

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

        <p id="title">GIỎ HÀNG </p>
        <?php if($_SESSION['giohang']>0){ 
			//if(isset($_SESSION['Tongtien'])) unset($_SESSION['Tongtien']);
		?>
        <p id="title_sub"> YOU'VE GOT <?php echo $_SESSION['giohang'] ?> ITEMS IN THE CART</p> 
        <br />
        <table id="table_selected">
            <tr id="head_table">
                <th class="null">&nbsp;</th>
                <th class="product" colspan="2">Sản phẩm</th>
                <th class="number">Số lượng</th>
                <th class="sum">Tổng cộng</th>
            </tr>
            <?php 
				$url = $ip.'/sanpham/'; 
                $data = file_get_contents($url);
                $sanpham = json_decode($data);
				$tongtien=0;
				for ($i=1; $i<= $_SESSION['giohang'] ; $i++ ) { ?>
				<tr class="click">
					<td class="click">
						<a class="click_remove"></a>
					</td>
					<td class="product_image">
						<a href="">
							<img src="<?php echo $_SESSION['urlHinh'.$i] ?>" alt="">
						</a>
					</td>
					<td class="product_name">
						<span>
							<a href=""><?php echo $_SESSION['TenSP'.$i] ?></a>
						</span>
						<br />
						<p class="price_one"><?php $truyxuat->price($_SESSION['Gia'.$i]) ;
								echo  $truyxuat->price ?>₫</p>
					</td>
					<td>
                   
                    <div>
                        <input type="button" value="–" class="plusminus plus" id="button_down<?php echo $i ?>" >
                        <input type="number" step="1" min="0" max="" title="SL" size="3" inputmode="numeric" id="text_number<?php echo $i ?>" class="number_selected" value="<?php echo $_SESSION['soluong'.$i]  ?>"  name="numberProduct">
                        <input type="button" value="+" class="plusminus plus" id="button_increate<?php echo $i ?>" >
                        
                    </div>
                </td>
                 <!--TINH TIEN -->
				
				<?php 		
					$_SESSION['Tongtien' ] =  $_SESSION['Tongtien']  + $_SESSION['Total'.$i] ;
					  ?>
                <td class="price">
                     <?php $truyxuat->price($_SESSION['Total'.$i]) ;
								echo  $truyxuat->price  ?> ₫
                </td>
            </tr>
            <script>
						
						function clickDown(){
								var nhan = document.getElementById('text_number<?php echo $i ?>').value;
                                var so = parseInt(nhan);
								if(so==0){
									so=1;}
                                document.getElementById('text_number<?php echo $i ?>').value = so - 1;
								
								
							}
						function clickUp(){
								var nhan = document.getElementById('text_number<?php echo $i ?>').value;
                                var so = parseInt(nhan);
                                document.getElementById('text_number<?php echo $i ?>').value = so + 1;
								
							}
					
			</script>
            
            
            <?php } ?>

        </table>
        <div id="cash">

            <p>Thanh toán</p>
            <hr /> <br />
            <span>Tổng cộng : </span> <span class="sum_cash"><?php  $truyxuat->price ($_SESSION['Tongtien']) ;
								echo  $truyxuat->price  ?> ₫</span>
            <div class="cart-buttons">
                <div class="col">
                    <button type="submit" class="button_Cash" id="update-cart-first" >Update Cart</button>
                </div>

                <div class="col">
                    <button type="button" class="button_Cash" id="update-cart-secondary"><a href="./CreateOrder.php">Check
                            Out</a></button>
                </div>
            </div>


        </div>

    </div>
     
    <?php }
	else{
	echo "<p id='title_sub'> YOU HAVEN'T GOT ITEMS IN THE CART</p> ";
		} ?>
    <div class="clear">&nbsp;</div>
    
    <?php include "./footer.php" ?>
</body>

</html>