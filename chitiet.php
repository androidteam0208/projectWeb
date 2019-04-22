<?php 
	session_start(); ob_start();
	if(!isset($_SESSION['giohang']))
 	$_SESSION['giohang']=0;
 	include "./PHP/process.php" ;
	include "./PHP/connect.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link href="./css/chitiet.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Chi tiết</title>
</head>
<body>
<?php include "header.php" ?>
    <?php 
				$truyxuat = new dulieu;
				$truyxuat->connect($ip,'/sanpham/'.$_GET['idsp']);
				$truyxuat->getdulieudon();
				$sanpham = $truyxuat->result;
				 
				$url = $ip.'/chitietsanpham/'.$_GET['idsp']; 
                $data = file_get_contents($url);
                $chitiet = json_decode($data);
         ?>
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
    <div id="chitietsanpham">
        <span class="mauchu gia"><?php echo $sanpham->TenSP?></span>
        <div class="sanpham">
       
            <div class="slide-wrap">
                    <div class="slider">
                      <div class="slide " id="slide-1"><img src="<?php echo $ipPlus.$sanpham->UrlHinh ?>" /></div>
                      <div class="slide " id="slide-2"><img src="<?php echo $ipPlus.$chitiet->UrlHinh1 ?>" /></div>
                      <div class="slide" id="slide-3"><img src="<?php echo $ipPlus.$chitiet->UrlHinh2 ?>" /></div>
                      <div class="slide" id="slide-4"><img src="<?php echo $ipPlus.$chitiet->UrlHinh3 ?>" /></div>
    
                    </div>
                    <div class="clear"></div>
                    <a class="side-button column-item" href="#slide-1" ><img src="<?php echo $ipPlus.$sanpham->UrlHinh ?>" /></a>
                    <a class="side-button column-item" href="#slide-2"><img src="<?php echo $ipPlus.$chitiet->UrlHinh1 ?>" /></a>
                    <a class="side-button column-item" href="#slide-3"><img src="<?php echo $ipPlus.$chitiet->UrlHinh2 ?>" /></a>
                    <a class="side-button column-item" href="#slide-4"><img src="<?php echo $ipPlus.$chitiet->UrlHinh3 ?>" /></a>
                    <div class="clear"></div>
                    
            </div>  
        

        <!-- mo ta -->
        <div class="vungdat">
        <h1 style="font-size: 50px ; font-weight: 300"><?php echo $sanpham->TenSP?></h1><br />
        <span class="mauchu" >Số lượng : <?php echo $sanpham->TonKho?></span></br>
        <span class="mauchu" >Giá : &nbsp;</span><span style="font-size:30px ; font-weight: 300">
		<?php $truyxuat->price($sanpham->Gia); echo $truyxuat->price ?> đ</span></br>
        <form action="" id="form1" name="form1" method="post">
    		<br />
            
            
    
          <div id="table">
          <table>
          <tr>
          <td><input type="button" name="button-" class ="datmua datmua2" id="button_down" value="-"/>&nbsp;<td>
          <td id="test"><input type="number" inputmode="numeric"  step="1" min="0" max=""  
          				name="text_number" class ="datmua" id="text_number" value=1 />&nbsp </td>
          <td><input type="button" name="button+" class ="datmua datmua2" id="button_increate" value="+"/></td>
          </tr>
          </table>
          </div>
          <script>
		$(document).ready(function(){
			
		  	 $("#button_down").click(function(){
				 var nhan= document.getElementById('text_number').value;
				var so = parseInt(nhan);
				if(so==0){
					so=1;
				}
    			document.getElementById('text_number').value = so-1;
  			});
  			$("#button_increate").click(function(){
				var nhan= document.getElementById('text_number').value;
				var so = parseInt(nhan);
    			document.getElementById('text_number').value = so+1});
		 });
    </script>
          <input type="submit" name="themvaogio" class ="datmua datmua2" id="themvaogio" value="+ thêm vào giỏ ">
          <?php
				if(isset($_POST['themvaogio']))
				{
					$_SESSION['giohang']= $_SESSION['giohang']+1;
					$_SESSION['urlHinh'.$_SESSION['giohang']]= $ipPlus.$sanpham->UrlHinh;
					$_SESSION['idSP'.$_SESSION['giohang']]= $sanpham->idSP;
					$_SESSION['TenSP'.$_SESSION['giohang']]= $sanpham->TenSP;
					$_SESSION['Gia'.$_SESSION['giohang']]= $sanpham->Gia;
					$_SESSION['Tongtien'] =0;
					$_SESSION['soluong'.$_SESSION['giohang']]= $_POST['text_number'];
					$_SESSION['Total'.$_SESSION['giohang']] = $sanpham->Gia*$_SESSION['soluong'.$_SESSION['giohang']];
					
					
					if($_SESSION['giohang']>1)
					{
						for($j=1; $j<=$_SESSION['giohang']-1; $j++)
						{
							if($_SESSION['idSP'.$_SESSION['giohang']] == $_SESSION['idSP'.$j])
							{
								$_SESSION['soluong'.$j] += $_POST['text_number'];
								$_SESSION['Total'.$_SESSION['giohang']] = $sanpham->Gia*$_SESSION['soluong'.$_SESSION['giohang']];
								$_SESSION['Total'.$j]+= $_SESSION['Total'.$_SESSION['giohang']] ;
								$_SESSION['Tongtien']+= $_SESSION['Total'.$j];
								$_SESSION['giohang']= $_SESSION['giohang']-1;
							}
						}
					}	
				
				}
	
	
	 ?>
        </form>

        <div class="clear"></div>
        <br/> <br/>
        <span class="sub_decription">
                Product ID: <?php echo $sanpham->idSP?>352 <br>
                <?php
                	$adress = $ip.'/chungloai'; 
					$datas = file_get_contents($adress);
					$tencl = json_decode($datas, true);?>
                    
                Danh mục: <?php echo $tencl[$sanpham->id_CL-1]['TenCL'] ?>, Giày <br>
                Tag: <?php echo $sanpham->TenSP?><br>
                SIZE : 36 –> 44     <br>
            </span> 
            <br/>
            
        </div>
        
    </div>
    <div class="clear"></div>
    
    <span class="mauchu gia">Mô tả</span>
    <hr>
    <div class="mota">
        
    <span  class="mota">
    		<br/>
            SMATE 1 : 198/5 HỒ VĂN HUÊ P.9 Q. PHÚ NHUẬN <br>
            SMATE 2 : 1074 QUANG TRUNG P.8. Q. GÒ VẤP <br>
            THANK YOU <br>
            NHẬN BỎ SỈ SỐ LƯỢNG LỚN TẤT CẢ CÁC MẶT HÀNG – ĐẢM BẢO GIÁ TỐT NHẤT THỊ TRƯỜNG.
    </span>
    </div>
    <span class="mauchu gia">Sản phẩm khác</span>
    <hr />
    <br />
    <div class="sanphamkhac">
    
    <?php 
			$url = $ip.'/sanphamtheocl/'.$sanpham->id_CL; 
			$data = file_get_contents($url);
			$result = json_decode($data, true);
	
			for($i=0; $i<4 ;$i++){ ?>
				<div class="spkhac">
					<a href="chitiet.php?idsp=<?php echo $result[$i]['idSP'] ?>">
                    	<img src="<?php echo  $ipPlus.$result[$i]['UrlHinh']; ?>" /></a><br />
                    <div class="spkhac__link">
                       <a class="link-spk" href="chitiet.php?idsp=<?php echo $result[$i]['idSP'] ?>"><?php echo  $result[$i]['TenSP']; ?></a>
					   <a class="link-spk add " href="chitiet.php?idsp=<?php echo $result[$i]['idSP'] ?>" title="thêm vào giỏ">+</a>
                    </div>
					
					<div class="clear"></div>
					<span><?php echo $truyxuat->price( $result[$i]['Gia']) ; echo $truyxuat->price; ?> đ</span>
				</div>
        <?php } ?>
    </div>
</div>
    </div>
    <div class="clear">&nbsp;</div>
    <?php include "footer.php" ?>




</body>
</html>
