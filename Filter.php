<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/Search.css"> 
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tìm kiếm</title>
</head>

<body>
    <!-- header -->
    <?php include "./header.php" ?>
    <!-- end header -->

    <div class="container">
        <!-- nav -->
        <div class="nav-main">
            <ul>
            	<?php
				 include "./PHP/connect.php";
				 include "./PHP/process.php";
				 				 
				 $truyxuat = new dulieu;
				 $truyxuat->connect($ip,"chungloai");
				 $truyxuat->getdulieu();
				 $chungloaiArr = $truyxuat->result;
				 
					  foreach ($chungloaiArr as $chungloai)
					   {
					    ?>
                <li>
                    <a href="Search.php?idCL=<?php echo $chungloai['idCL'] ?>"><?php echo  $chungloai['TenCL'] ?></a>
                    
                </li>
                <?php } ?>
                
            </ul>
        </div>
        <!-- end nav -->
		<?php
				 $truyxuat = new dulieu;
				 $truyxuat->connect($ip,"sanpham");
				 $truyxuat->getdulieu();
				 $sanpham = $truyxuat->result;
				 
				 $sanphamArr = array();
				 $key =$_GET['search'];
				 
				 for($i=0; $i<count($sanpham) ; $i++){
				 	if(similar_text($key,$sanpham[$i]['TenSP'])> strlen($key)-1){
						array_push($sanphamArr,$sanpham[$i]);
						}
				 }
				 
         ?>
        <!-- SEARCH -->
        <?php
				$sd=8;
				$tsp = count($sanphamArr);
				$tst=ceil($tsp/$sd);
				if(isset($_GET['page'])) $page=$_GET['page'];
				else $page=1;
				$vitri=($page-1)*$sd;
			?>
        <div class="best-seller">
            <div class="content-element">
                <p class="title"><?php echo "Từ khóa : ".$_GET['search'] ?></p>
                <small>Có <?php echo $tsp ?> sản phẩm được tìm thấy</small><br />
                <span class="dash"></span>
            </div>
            <div class="row">
            
            <?php for($i=$vitri ; $i<$vitri+$sd ; $i++){
				 if( $i==$tsp)
				  break ;
				    else {?>
                <div class="column-item">
                    <a href="chitiet.php?idsp=<?php echo $sanphamArr[$i]['idSP'] ?>" class="column-image"><img src="<?php echo  $ipPlus.$sanphamArr[$i]['UrlHinh']; ?>" alt=""></a>
                    <ul>
                        <li>
                            <a href="" class="product-name"><?php echo  $sanphamArr[$i]['TenSP']; ?></a>
                            <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                <span class="hover-add">THÊM VÀO GIỎ</span>
                            </a>
                        </li>
                        <li>
                            <span class="product-terms">
                                <a href=""></a>
                            </span>
                        </li>
                        <li><span class="product-cost"><?php $truyxuat->price($sanphamArr[$i]['Gia']) ;
										echo  $truyxuat->price  ?> đ</span></li>
                    </ul>
                </div>
               <?php } } ?>
            </div>
        </div>
        <!-- end sale-off -->
         <div class="breakpage">
        <div class="breakpage_container">
            <a href="?page=<?php if( $page==1 ) echo $page; else echo $page-1?>&search=<?php echo $_GET['search']?>">PREVIOUS</a>
           	<?php 
			for($i=1;$i<=$tst;$i++){
				if($page==$i) echo "<a href='' class='choosed' >".$i."</a> ";
				else {?>
				   <a href="?page=<?php echo $i ?>&search=<?php echo $_GET['search']?>"><?php echo $i;?></a>
			<?php }} ?>
            <a href="?page=<?php if( $page==$tst ) echo $page; else echo $page+1 ?>&search=<?php echo $_GET['search']?>">&nbsp;NEXT &nbsp;</a>
            
	</div>
        </div>
    </div>
    <!-- footer -->
    <?php include "footer.php" ?>
    <!-- end footer -->
</body>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>

</html>