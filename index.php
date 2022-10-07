<?php
require_once("_system/_database.php");

	if(isset($_SESSION['uid']) || isset($_SESSION['username']))
	{
		$sql_player = 'SELECT * FROM authme WHERE id = "'.$_SESSION['uid'].'"';
		$query_player = $connect->query($sql_player);

		if($query_player->num_rows <= 0)
		{
			session_destroy();

				//* REFRESH
			echo "<meta http-equiv='refresh' content='0 ;'>";
		}
		else
		{
			$player = $query_player->fetch_assoc();
		}
	}
	
      $sql_setting = 'SELECT * FROM setting';
		$query_setting = $connect->query($sql_setting);
		
                $setting = $query_setting->fetch_assoc();

?>

</html>
<!DOCTYPE html>
<html lang="th">
    <head>
            <meta charset="utf-8">
            <title><?php echo $setting['name_server'];?></title>
            <link href="assets/css/kanit.css" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/style-theme.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/fa/css/font-awesome.css">
            <link rel="stylesheet" href="assets/css/sweetalert2.min.css" >
            <link rel="stylesheet" href="assets/css/mary.css">
            <link rel="stylesheet" href="assets/css/lt.css">
            <script src="assets/js/sweetalert2.all.min.js"></script>
            <link rel="icon" href="<?php echo $setting['icon'];?>" sizes="16x16">
            <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta>
    </head>
<style type="text/css">

body,td,th {
font-family: 'Kanit', sans-serif;
font-size: 15px;
}
body
{
  background: url(<?php echo $setting['bg'];?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.lp-panel {
color: black;
font-size: 18px;
background: rgba(255,255,255.1);
padding: 20px;
}
.lp-menu {
padding: 11px;
font-size: 17px;
border-bottom: 1px solid white;
text-decoration: none !important;
color: black;
transition-duration: 0.3s;
background: rgba(238,238,238,1)
}
.lp-menu:hover {
border-left: 6.5px solid transparent;
color: black;
background: rgba(223,223,223,1)
}
.lp-title-input {
color: white;
background: rgba(0,0,0,0.5);
border: 0px;
border-radius: 0px;
}
.lp-input {
font-size:16px;
background: rgba(255,255,255,1);
border-radius: 0px;
color: black;
}
.lp-input:disabled {
background: rgba(0,0,0,0.1);
}
.modal-content
 {
 border-radius: 0px;
 border: solid 1px white;
     padding:9px 15px;
     background-color: rgba(255,255,255,1);
 }
 .lp-card {
color: black;
background: rgba(255,255,255.1);
}


</style>
<body style="color:#000;">
  
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto pt-3 pt-lg-0">
                    <li class="nav-item dropdown"> 
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == "home"){echo 'active';}else{if($_GET['page'] == ""){echo 'active';}else{}} ?>" href="?page=home"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == "shop"){echo 'active';}else{} ?>" href="?page=shop"><i class="fa fa-shopping-cart fa-fw"></i> ร้านค้า</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-credit-card fa-fw"></i> เติมเงิน</a>
                        <div class="dropdown-menu border-0 shadow animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?php if($_GET['page'] == "truemoney"){echo 'active';}else{} ?>" href="?page=truemoney">TrueMoney ( บัตรเติมเงิน )</a>

                        </div>
                    </li>
                    <li class="nav-item <?php if($_GET['page'] == "redeem"){echo 'active';}else{} ?>">
                        <a class="nav-link" href="?page=redeem"><i class="fa fa-code fa-fw"></i> เติมไอเท็มโค็ด</a>
                    </li>

                </ul>
                <ul class="navbar-nav pb-3 pb-lg-0">
                    <?php if(!$_SESSION['username']){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login"><i class="fa fa-user fa-fw"></i> เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=register"><i class="fa fa-registered fa-fw"></i> สมัครสมาชิก</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item <?php if($_GET['page'] == "log"){echo 'active';}else{} ?>">
                        <a class="nav-link" href="?page=log"><i class="fa fa-history fa-fw"></i> ประวัติการสั่งซื้อทั้งหมด</a>
                    </li>
                    <?php } 
                    
            
          if($player["status"] == "admin"){
            ?>
                    
                    
                    <li class="nav-item <?php if($_GET['page'] == "log"){echo 'active';}else{} ?>">
                        <a class="nav-link" href="admin"><i class="fa fa-history fa-fw"></i> จัดการหน้าแอดมิน</a>
                        
        <?php
          }
        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php // จ. Navbar ?>
    
        <div class="container">
        <div style="text-align:center; margin-top:20px;margin-bottom:30px;">
<div class="container" align="center">
    <img class="animation" style="width: 30%;" src="<?php echo $setting['icon'];?>">
<br><a style="font-size: 40px;"><?php echo $setting['name_server'];?></a>
  </div>
  </div>
 </div>
 
        <div class="container">
  
<div class="card border-0 shadow mb-4">
  <div class="col-lg-4">
    <div class="card-body" style="text-align:center;">
        
    <?php echo $setting['detail_server']; ?>
        
    </div>
  </div>

 </div>
</div>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                   <?php
                    if(!$_GET){$_GET["page"] = 'home';}
                    if(!$_GET["page"])
                    {
                      $_GET["page"] = "home";
                    }
                     if($_GET["page"] == "home"){
                         include_once __DIR__.'/_page/home.php';
                    }elseif($_GET['page'] == "shop"){
                        include_once __DIR__.'/_page/shop.php';
                    }elseif($_GET['page'] == "search"){
                        include_once __DIR__.'/_page/search.php';
                    }elseif($_GET['page'] == "truemoney"){
                        include_once __DIR__.'/_page/truemoney.php';
                    }elseif($_GET['page'] == "log"){
                        include_once __DIR__.'/_page/log.php';
                    }elseif($_GET['page'] == "gift"){
                        include_once __DIR__.'/_page/gift.php';						
                    }elseif($_GET['page'] == "confirm"){
                        include_once __DIR__.'/_page/confirm.php';
                    }elseif($_GET['page'] == "login"){
                        include_once __DIR__.'/_page/login.php';
                    }elseif($_GET['page'] == "register"){
                        include_once __DIR__.'/_page/register.php';
                    }elseif($_GET['page'] == "logout"){
                        include_once __DIR__.'/_page/logout.php';
                    }elseif($_GET['page'] == "redeem"){
                        include_once __DIR__.'/_page/redeem.php';
                    }elseif($_GET['page'] == "profile"){
                        include_once __DIR__.'/_page/profile.php';
					}elseif($_GET['page'] == "uploadimg"){
                        include_once __DIR__.'/_page/uploadimg.php';
					}elseif($_GET['page'] == "gift"){
                        include_once __DIR__.'/_page/gift.php';
                    }elseif($_SESSION['uid'] && $player['status'] == "admin" && $_GET['page'] == "backend"){
                        include_once __DIR__.'/backend/index.php';
                    }else{
                                            echo '<div class="alert alert-danger"><i class="fa fa-warning"></i>404 ไม่พบหน้าที่ต้องการ</div>';
                                            echo '<meta http-equiv="refresh" content="2;URL=?page=home">';
                                        }
                     ?>
                </div>
                



        <div class="col-lg-4">
        <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            

                            <?php if($_SESSION['username']){ ?>
            
            <center>
                <hr>
        	<img width="50%" src="./assets/user_img/<?php echo $player['user_img']; ?>"> <hr>
        	
        	    </center>
                            <a>
                                <i class="fal fa-user fa-fw"></i> <span>สวัสดีคุณ , <?php echo $_SESSION['realname']; ?></span>
                            </a>
                            <hr>
                                    <p><b>Username :</b> <span class="pull-right"><?php echo $_SESSION['realname'] ?></span></p>
                                    <p><b>Point :</b> <span class="pull-right"><span id="user_point"><?php echo number_format($player['points']); ?>.00 พ้อยท์</span></span></p>
                                    <center><hr>
                                        <div class="d-flex flex-column" style="width: 100%">
                                        <a class="lp-menu" href="?page=profile"><i class="fa fa-user"></i>&nbsp;ข้อมูลส่วนตัว</a>
                    
                                        <a class="lp-menu" href="?page=uploadimg"><i class="fa fa-money"></i>&nbsp;เปลี่ยนรูปโปรไฟล์!</a>
                                        

                                        <a class="lp-menu" href="?page=log"><i class="fa fa-credit-card"></i>&nbsp;ประวัติการเติมเงิน</a>
                                        </div><hr>
                                    <a href="?page=logout"><button type="button" class="btn btn-danger btn-block">ออกจากระบบ</button></a></center>
                            <?php }else{ ?>
                            <a>
                                <div class="card-header bg-warning"><i class="fa fa-signal"></i> เข้าสู่ระบบ ( LOGIN )</div>
                            </a>
                            <hr>
                            <form method="post" action="">
                                  <input type="hidden" name="login_submit">
                                <div class="form-group">
                                    <input type="text"  name="username" class="form-control" placeholder="ชื่อตัวละคร : ">
                                </div>
                                <div class="form-group">
                                    <input type="password"  name="password" class="form-control" placeholder="รหัสผ่าน : ">
                                </div>
                                        <button type="submit" class="btn btn-block btn-outline-success mb-3"><i class="far fa-sign-in fa-fw"></i> เข้าสู่ระบบ</button>
                                        
    <center>
        
                                        
        <span><a href="?page=register">ยังไม่มีบัญชี? สมัครสมาชิก</a></span>
                            
          </center>                      
                            </form>
                            <?php } ?>
                        </div>
                    </div>
<br>

                 </div>
                            
                  </div>
                  
                  
        

<div class="card border-0 shadow mb-4">
    <div class="card-body">
                            <hr>


            <div class="row">
            <?php 
            
            

             $gift_check_bag = 'SELECT * FROM shop';
            $gift_connect = $connect->query($gift_check_bag);
            $gift_me = $gift_connect->fetch_assoc();
            $gift_mes = $gift_connect->num_rows;
              
              

					
					
		         $sql_log = 'SELECT * FROM activities ';
            $log_connect = $connect->query($sql_log);
            $log_me = $log_connect->fetch_assoc();
            
            $log_mes = $log_connect->num_rows;		    
							    



					
					
		         $topup_log = 'SELECT * FROM topuplog ';
            $log_connect_topup = $connect->query($topup_log);
            $log_me_topup = $log_connect->fetch_assoc();
            
            $log_mes_topup = $log_connect_topup->num_rows;		    
							   
            
            


                        ?>
    <div class="col-md-4 mb-3">
                            
        <div class="card vivify animationObject pulsate h-jello " style="width:100%; height:100%">
         <div class="card-body ">
            

                                            <h6 class="h-grow"> 
                                            
        <center>

        <h5 class="m-0"><i class="fa fa-shopping-cart"></i> สินค้าทั้งหมด!</h5>
<hr>
          

<h2><a href="?page=shop"><?php echo number_format($gift_mes); ?> 
</a></h2>

<hr>

                                                    
<h6>
                                </div>
                            </div>
                        </div>
                        
        <div class="col-md-4 mb-3">
                            
        <div class="card vivify animationObject pulsate h-jello " style="width:100%; height:100%">
         <div class="card-body ">
            

                                            <h6 class="h-grow"> 
                                            
        <center>

        <h5 class="m-0"><i class="fa fa-shopping-cart"></i> ซื้อสินค้าแล้ว!</h5>
<hr>
          

<h2><a href="?page=shop"><?php echo number_format($log_mes); ?> 
</a></h2>

<hr>

                                                    
<h6>
                                </div>
                            </div>
                        </div>
                        
                        
                <div class="col-md-4 mb-3">
                            
        <div class="card vivify animationObject pulsate h-jello " style="width:100%; height:100%">
         <div class="card-body ">
            

                                            <h6 class="h-grow"> 
                                            
        <center>

        <h5 class="m-0"><i class="fa fa-shopping-cart"></i> ผู้ใช้ที่เติมเงิน!</h5>
<hr>
          

<h2><a href="?page=shop"><?php echo number_format($log_mes_topup); ?> 
</a></h2>

<hr>

                                                    
<h6>
                                </div>
                            </div>
                        </div>
                        
    
        </div>
    </div>


 
                 </main>
 
    
                    

                    
        <div class="card mb-3" style="border-radius:10px;opacity:0.8;">
<div class="card-body p-2 m-0 text-center" style="height:83px;font-size:0.8rem;">
                <i class="far fa-copyright"></i> Copyright 2021 Website By <a href="https://www.facebook.com/McWebSX/" class="text-primary" target="_blank"><b><u>บริการขาย Web-Shop</u></b></a> All Rights Reserved.</br> <b class="navy-text-red">(ให้ Cradit กันหน่อยนะจ๊ะ ^^)</b>
		    </div>
            </div>

<script id="dsq-count-scr" src="//startbootstrap.disqus.com/count.js" async type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script src="assets/js/scripts.js" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="1bd4d45c54bc5ac897fcf366-|49" defer=""></script></body>
</html>


 <?php
	if(isset($_POST['login_submit']))
	{
		$msg = '';
		$alert = 'error';
		$msg_alert = 'เกิดข้อผิดพลาด!';

		$username = $connect->real_escape_string($_POST['username']);
		$sql = 'SELECT * FROM authme WHERE username = "'.$username.'"';
		$a = $connect->query($sql);
		$a_num = $a->num_rows;
		if($a_num == 1)
		{
			$password_info = $a->fetch_assoc();
			$sha_info = explode("$",$password_info['password']);
			$salt = $sha_info[2];
			$sha256_password = hash('sha256', $_POST['password']);
			$sha256_password .= $sha_info[2];

			if(strcasecmp(trim($sha_info[3]),hash('sha256', $sha256_password)) == 0){
				$sql_user = 'SELECT * FROM authme WHERE username = "'.$username.'"';
				$query_user = $connect->query($sql_user);
				$fetch_user = $query_user->fetch_assoc();

				//* SET SESSION
				$_SESSION['uid'] = $fetch_user['id'];
				$_SESSION['username'] = $fetch_user['username'];
				$_SESSION['realname'] = $fetch_user['realname'];
				
    
    
				$msg = 'ยินดีต้อนรับคุณ: '.$_SESSION['realname'];
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
			}
			else
			{
				$msg = 'รหัสผ่านไม่ถูกต้อง';
				$alert = 'error';
				$msg_alert = 'เกิดข้อผิดพลาด!';
			}
		}
		else
		{
			$msg = 'ไม่พบตัวละครนี้';
			$alert = 'error';
			$msg_alert = 'เกิดข้อผิดพลาด!';
		}

		?>
			<script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script>
		<?php
	}
        
if(isset($_POST['submit']) == "redeem")
{
    if($_SESSION['username']){
    $code = $_POST['redeem_code'];

    $redeem_q = $connect->query("SELECT * FROM redeem WHERE code = '".$code."'");
    $redeem = $redeem_q->fetch_assoc();

    if($redeem_q->num_rows != 0)
    {
        
        $activities_action = "ใส่โค้ด";
										$time_date = date("Y-m-d H:i");
										$sql_insert_log = 'INSERT INTO redeemlog (uid,username,action,date,transaction,topup_amount) VALUES ("'.$_SESSION['uid'].'","'.$_SESSION['username'].'","'.$activities_action.'","'.$time_date.'","'.$code.'","'.$redeem['cmd'].'")';
										$connect->query($sql_insert_log);
										
        $update_q = $connect->query("UPDATE authme set points = points + '".$redeem['cmd']."' WHERE username = '".$_SESSION['username']."'");
        //alert
            $msg = 'คุณได้รับสินค้าแล้ว';
			$alert = 'success';
			$msg_alert = 'สำเร็จ!';
        $delete_redeem = $connect->query("DELETE FROM redeem WHERE id = '".$redeem['id']."'");
    }
    else
    {
        $msg = 'ไม่มีโค๊ดที่ท่านเลือก';
			$alert = 'error';
			$msg_alert = 'ผิดพลาด!';
    } ?>
        <script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script>                
                        <?php
      exit();
}else{
    $msg = 'คุณไม่ได้เข้าสู่ระบบ';
			$alert = 'error';
			$msg_alert = 'ผิดพลาด!';
    ?>               
    <script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script> 
                        <?php
}
}
?>

<?php

if($player["status"] == "ban"){

			$msg = 'คุณถูกแบนเนื่องจากทำผิดกฎของเว็ป';
			$alert = 'error';
			$msg_alert = 'ผิดพลาด';
			
	echo '<meta http-equiv="refresh" content="2;URL=?page=logout">';
	
		  ?>
<script>
swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
button: "Reload",
})
</script>               
<script>
swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", "<?php echo $delay ?>"{
button: "Reload",
})
</script> 
<?php
}?>

