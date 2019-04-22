<div class="slideshow-container">
            <div class="mySlides fade">
                <img src="../images/slide-1.jpg">
            </div>

            <div class="mySlides fade">
                <img src="../images/slide-2.jpg">
            </div>

            <div class="mySlides fade">
                <img src="../images/slide-4.jpg">
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
			$url = $ip.'/moinhat'; 
			$data = file_get_contents($url);
			$wizards = json_decode($data, true);
		 ?>
            <div class="content-element">
                <p class="title">Hàng mới về</p>
                <small>những sản phẩm mới</small><br />
                <span class="dash"></span>
            </div>
            <div class="row">
           		 <?php for ($i=0 ; $i<12 ; $i++){ ?>
                    <div class="column-item">
                        <a href="../ chitiet.php?idsp=<?php echo $wizards[$i]['idSP'] ?>"class="column-image">
                        	<img src="<?php echo  $wizards[$i]['../UrlHinh']?>" alt="">
                        </a>
                        <ul>
                            <li>
                                <a href="" class="product-name"><?php echo  $wizards[$i]['TenSP']; ?></a>
                                <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                    <span class="hover-add">THÊM VÀO GIỎ</span>
                                </a>
                            </li>
                            <li>
                                <span class="product-terms">
                                    <a href=""><?php echo  $chungloais[$wizards[$i]['id_CL']-1]['TenCL'] ?></a>
                                    <span class="comma">,</span>
                                    <a href="">GIÀY</a>
                                    <span class="comma">,</span>
                                    <a href="">ULTRA BOOST</a>
                                </span>
                            </li>
                            <li><span class="product-cost"><?php echo  $wizards[$i]['Gia'] ; ?> đ</span></li>
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
				$url = $ip.'/bestseller'; 
				$data = file_get_contents($url);
				$wizards = json_decode($data, true);
				for ($i=0 ; $i<8 ; $i++){ ?>
                    <div class="column-item">
                        <a href="<?php echo "../chitiet.php?idsp=".$wizards[$i]['idsp']; ?>" class="column-image">
                        <img src="<?php echo  $wizards[$i]['../UrlHinh']; ?>" alt=""></a>
                        <ul>
                            <li>
                                <a href="<?php echo "../chitiet.php?idsp=".$wizards[$i]['idsp']; ?>" class="product-name">
									<?php echo  $wizards[$i]['TenSP']; ?></a>
                                <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                    <span class="hover-add">THÊM VÀO GIỎ</span>
                                </a>
                            </li>
                            <li>
                                <span class="product-terms">
                                    <a href=""><?php echo  $chungloais[$wizards[$i]['id_CL']-1]['TenCL'] ?></a>
                                    <span class="comma">,</span>
                                    <a href="">GIÀY</a>
                                    <span class="comma">,</span>
                                    <a href="">ULTRA BOOST</a>
                                </span>
                            </li>
                            <li><span class="product-cost"><?php echo  $wizards[$i]['Gia'] ; ?> đ</span></li>
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
					 
					$url = $ip.'/sanpham'; 
					$data = file_get_contents($url);
					$wizards = json_decode($data, true);
		
					for ($i=0 ; $i<4 ; $i++){ ?>
                    <div class="column-item">
                        <a href="<?php echo "../chitiet.php?idsp=".$wizards[$i]['idsp']; ?>" class="column-image"><img src="<?php echo  $wizards[$i]['../UrlHinh']; ?>" alt=""></a>
                        <ul>
                            <li>
                                <a href="<?php echo "../chitiet.php?idsp=".$wizards[$i]['idsp']; ?>" class="product-name"><?php echo  $wizards[$i]['TenSP']; ?></a>
                                <a href="" class="add-product"><span style="font-size: 30px;">+</span>
                                    <span class="hover-add">THÊM VÀO GIỎ</span>
                                </a>
                            </li>
                            <li>
                                <span class="product-terms">
                                    <a href=""><?php echo  $chungloais[$wizards[$i]['id_CL']-1]['TenCL'] ?></a>
                                    <span class="comma">,</span>
                                    <a href="">GIÀY</a>
                                    <span class="comma">,</span>
                                    <a href="">ULTRA BOOST</a>
                                </span>
                            </li>
                            <li><span class="product-cost"><?php echo  $wizards[$i]['Gia'] ; ?> đ</span></li>
                        </ul>
                    </div>
                    <?php } ?>
            </div>
        </div>
        <!-- end sale-off -->