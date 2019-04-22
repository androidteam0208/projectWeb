<!DOCTYPE html>
<?php include "./PHP/connect.php" ;
	  include "./PHP/process.php" ;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Trang Chủ</title>
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
				$truyxuat = new dulieu;
				$truyxuat->connect($ip,"chungloai");
				$truyxuat->getdulieu();
				$chungloaiArr = $truyxuat->result;
					  foreach ($chungloaiArr as $chungloai){?>
                <li>
                    <a href="Search.php?idCL=<?php echo $chungloai['idCL'] ?>"><?php echo  $chungloai['TenCL'] ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- end nav -->

        <!-- slideshow-container -->
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/slide-1.jpg">
            </div>

            <div class="mySlides fade">
                <img src="images/slide-2.jpg">
            </div>

            <div class="mySlides fade">
                <img src="images/slide-4.jpg">
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <!-- end sldeshow-container -->

        <!-- hàng mới về -->
        <div class="hang-moi-ve">
            <?php 
				$truyxuat = new dulieu;
				$truyxuat->connect($ip,"moinhat");
				$truyxuat->getdulieu();
				$spmoinhatArr = $truyxuat->result;
		 ?>
            <div class="content-element">
                <p class="title">Hàng mới về</p>
                <small>Những sản phẩm mới</small><br />
                <span class="dash"></span>
            </div>
            <div class="row">
                <?php for ($i=0 ; $i<12 ; $i++){ ?>
                <div class="column-item">
                    <a href=" chitiet.php?idsp=<?php echo $spmoinhatArr[$i]['idSP'] ?>" class="column-image">
                        <img src="<?php echo  $ipPlus.$spmoinhatArr[$i]['UrlHinh']?>" alt="">
                    </a>
                    <ul>
                        <li>
                            <a href="chitiet.php?idsp=<?php echo $spmoinhatArr[$i]['idSP'] ?>" class="product-name">
                                <?php echo  $spmoinhatArr[$i]['TenSP']; ?>
                            </a>
                            <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                <span class="hover-add">THÊM VÀO GIỎ</span>
                            </a>
                        </li>
                        <li>
                            <span class="product-terms">
                                <a href="Search.php?idCL=<?php echo $spmoinhatArr[$i]['id_CL'] ?>">
                                    <?php echo  $chungloaiArr[$spmoinhatArr[$i]['id_CL']-1]['TenCL'] ?></a>
                            </span>
                        </li>
                        <li>
                            <span class="product-cost">
                                <?php
										$truyxuat->price($spmoinhatArr[$i]['Gia']) ;
										echo  $truyxuat->price ?> đ
                            </span>
                        </li>
                    </ul>
                </div>
                <?php } ?>

            </div>
        </div>
        <!-- end hàng mới về -->

        <!-- best-seller -->
        <div class="best-seller">
            <div class="content-element">
                <p class="title">best-seller</p>
                <small>các sản phẩm bán chạy</small><br />
                <span class="dash"></span>
            </div>
            <div class="row">

                <?php 
				$truyxuat = new dulieu;
				$truyxuat->connect($ip,"bestseller");
				$truyxuat->getdulieu();
				$bestsellerArr = $truyxuat->result;
				for ($i=0 ; $i<8 ; $i++){ ?>
                <div class="column-item">
                    <a href="<?php echo "./chitiet.php?idsp=".$bestsellerArr[$i]['idSP']; ?>" class="column-image">
                        <img src="<?php echo  $ipPlus.$bestsellerArr[$i]['UrlHinh']?>" alt=""></a>
                    <ul>
                        <li>
                            <a href="<?php echo "./chitiet.php?idsp=".$bestsellerArr[$i]['idSP']; ?>"
                                class="product-name">
                                <?php echo  $bestsellerArr[$i]['TenSP']; ?></a>
                            <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                <span class="hover-add">THÊM VÀO GIỎ</span>
                            </a>
                        </li>
                        <li>
                            <span class="product-terms">
                                <a href=""><?php echo  $chungloaiArr[$bestsellerArr[$i]['id_CL']-1]['TenCL'] ?></a>
                            </span>
                        </li>
                        <li><span class="product-cost">

                                <?php $truyxuat->price($bestsellerArr[$i]['Gia']) ;
										echo  $truyxuat->price  ?> đ</span></li>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- end best-seller -->

        <!-- sale-off -->
        <div class="best-seller">
            <div class="content-element">
                <p class="title">Best for Sale</p>
                <small>các sản phẩm tốt</small><br />
                <span class="dash"></span>
            </div>
            <div class="row">
                <?php 
					 
				$truyxuat = new dulieu;
				$truyxuat->connect($ip,"sanpham");
				$truyxuat->getdulieu();
				$sanphamArr = $truyxuat->result;
		
				for ($i=0 ; $i<4 ; $i++){ ?>
                <div class="column-item">
                    <a href="<?php echo "./chitiet.php?idsp=".$sanphamArr[$i]['idSP']; ?>" class="column-image"><img
                            src="<?php echo  $ipPlus.$sanphamArr[$i]['UrlHinh']?>" alt=""></a>
                    <ul>
                        <li>
                            <a href="<?php echo "./chitiet.php?idsp=".$sanphamArr[$i]['idSP']; ?>"
                                class="product-name"><?php echo  $sanphamArr[$i]['TenSP']; ?></a>
                            <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                <span class="hover-add">THÊM VÀO GIỎ</span>
                            </a>
                        </li>
                        <li>
                            <span class="product-terms">
                                <a href=""><?php echo  $chungloaiArr[$sanphamArr[$i]['id_CL']-1]['TenCL'] ?></a>
                            </span>
                        </li>
                        <li><span class="product-cost"><?php $truyxuat->price($sanphamArr[$i]['Gia']) ;
										echo  $truyxuat->price  ?> đ</span></li>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- end sale-off -->
    </div>

    <!-- footer -->
    <?php include "./footer.php" ?>
    <!-- end footer -->
    <!-- Code injected by live-server -->
    <script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>

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
<!-- <script src="./js/myScript.js"></script> -->

</html>