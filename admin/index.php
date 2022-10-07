<?php


if(!file_exists("../_system/license.key"))
{
	header("location: install/install.php");
}

	require_once("../_system/_config.php");
        require_once("../_system/_database.php");
                 $sql_setting = 'SELECT * FROM setting';
		$query_setting = $connect->query($sql_setting);
                $setting = $query_setting->fetch_assoc();


                $now_month = "-".date("m")."-";
                $sql_list_topup_wallet = 'SELECT * FROM activities WHERE action = "TOPUP Truewallet" AND date LIKE "%'.$now_month.'%"';
		$query_list_topup_wallet = $connect->query($sql_list_topup_wallet);
                $sql_list_topup_tmn = 'SELECT * FROM activities WHERE action = "TOPUP TrueMoney" AND date LIKE "%'.$now_month.'%"';
		$query_list_topup_tmn = $connect->query($sql_list_topup_tmn);
                $amount_wallet = 0;
                while($topup_wallet = $query_list_topup_wallet->fetch_assoc())
		{
			$amount_wallet += $topup_wallet['topup_amount'];
		}
                $amount_tmn = 0;
		while($topup_tmn = $query_list_topup_tmn->fetch_assoc())
		{
			$amount_tmn += $topup_tmn['topup_amount'];
		}
		
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
?>
<!DOCTYPE html>
<html lang="th">
    <head>
            <meta charset="utf-8">
            <title><?php echo $setting['name_server'];?></title>
            <link href="../assets/css/kanit.css" rel="stylesheet">
            <link rel="stylesheet" href="../assets/css/style-theme.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
            <link rel="stylesheet" href="../assets/fa/css/font-awesome.css">
            <link rel="stylesheet" href="../assets/css/sweetalert2.min.css" >
            <link rel="stylesheet" href="../assets/css/mary.css">
            <link rel="stylesheet" href="../assets/css/lt.css">
            <script src="../assets/js/sweetalert2.all.min.js"></script>
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
    <div class="container">
    
                        <main>
<?php include('_page/navbar.php'); ?>
                            <h5><i class="fa fa-cogs"></i>&nbsp;<?php if($menu == 'manageuser'){echo'จัดการชื่อผู้ใช้';}elseif($menu == 'gacha'){echo'Gacha_1';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'managecategory'){echo'จัดการหมวดหมู่';}elseif($menu == 'managetopup'){echo'ระบบเติมเงิน';}elseif($menu == 'slide'){echo'จัดการ Video YT';}elseif($menu == 'bungeecord'){echo'จัดการ Server';}elseif($menu == 'manageannounce'){echo'จัดการการประกาศ';}elseif($menu == 'settings'){echo'ตั้งค่า WebShop';}else{echo 'หน้า Backend';} ?> 
                            </h5><hr>
                                <?php
                                    if(isset($_GET['menu']) && $_GET['menu'] != NULL && $_GET['menu'] != "")
				{
					$menu = $_GET['menu'];
					if($menu == 'manageuser')
					{
						include_once '_page/manageuser.php';
					}
					elseif($menu == 'historytopup')
					{
						include_once '_page/list_topup.php';
					}
									elseif($menu == 'gacha')
					{
						include_once '_page/gacha.php';
					}
					elseif($menu == 'manageproduct')
					{
						include_once '_page/product.php';
					}
									elseif($menu == 'gachabox')
					{
						include_once '_page/gachabox.php';
					}
					elseif($menu == 'managecategory')
					{
						include_once '_page/managecategory.php';
					}
					elseif($menu == 'managetopup')
					{
						include_once '_page/managetopup.php';
					}
					elseif($menu == 'slide')
					{
						include_once '_page/slide.php';
					}	
					elseif($menu == 'rank')
					{
						include_once '_page/rank.php';						
					}
					elseif($menu == 'announce')
					{
						include_once '_page/announce.php';						
					}					
					elseif($menu == 'bungeecord')
					{
						include_once '_page/bungeecord.php';
					}
					elseif($menu == 'manageannounce')
					{
						include_once '_page/manageannounce.php';
					}
                    elseif($menu == 'settings')
					{
						include_once '_page/settings.php';
					}
                    elseif($menu == 'redeem')
					{
						include_once '_page/redeem.php';
					}
                    elseif($menu == 'update')
					{
						include_once '_page/update.php';
					}
                    elseif($menu == 'logout')
					{
						include_once '_page/logout.php';
					}
                                        else
					{
                                            echo "<h5 class='mb-2 text-center'><div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> ไม่พบเมนูนี้</div></h5>";
					}
				}
				else
				{
                                    //include_once '_page/manageuser.php';
				}
                                  ?>
                        </div>
                    </div>
                </div>
                
                
            <div class="container">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> ผู้ใช้ที่ ซื้อของทั้งหมด!</h5>
                            <br>
                            			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF;" class="text-dark">#</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ชื่อ</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ระบบ</th>
						<th style="background-color: #FFF;" class="text-center text-dark">จำนวน</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ชื่อผู้ใช้</th>
						
						<th style="background-color: #FFF;" class="text-center text-dark">รหัสผ่าน</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql_list_topup = 'SELECT * FROM activities order by id desc';
						$query_list_topup = $connect->query($sql_list_topup);
						$i = 0;
						if($query_list_topup->num_rows != 0)
						{
							while($list_topup = $query_list_topup->fetch_assoc())
							{
								$i++;
								echo '
									<tr>
										<td class="text-left">'.$list_topup['id'].'</td>
										<td class="text-center">'.$list_topup['username'].'</td>
										<td class="text-center">'.$list_topup['action'].'</td>
										<td class="text-center">'.  number_format($list_topup['topup_amount']).'</td>
										<td class="text-center">'.$list_topup['transaction'].'</td>
										
<td class="text-center">'.$list_topup['phone'].'</td>
									</tr>
								';
							}
						}
						else
						{
							?>
								<tr>
									<td class="text-center" colspan="6">
										ไม่พบข้อมูล
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
                        </div>
                    </div>
                              
                              
                     <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> ผู้ใช้ที่เติมเงินทั้งหมด!</h5>
                            <br>
                            			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF;" class="text-dark">#</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ชื่อตัวละคร</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ระบบ</th>
						<th style="background-color: #FFF;" class="text-center text-dark">เวลา</th>
						<th style="background-color: #FFF;" class="text-center text-dark">เงินเติม</th>
						<th style="background-color: #FFF;" class="text-center text-dark">--</th>
				</thead>
				<tbody>
					<?php
						$sql_list_topup = 'SELECT * FROM topuplog order by id desc';
						$query_list_topup = $connect->query($sql_list_topup);
						$i = 0;
						if($query_list_topup->num_rows != 0)
						{
							while($list_topup = $query_list_topup->fetch_assoc())
							{
								$i++;
								echo '
									<tr>
										<td class="text-left">'.$list_topup['id'].'</td>
										<td class="text-center">'.$list_topup['username'].'</td>
										<td class="text-center">'.$list_topup['action'].'</td>
										<td class="text-center">'.$list_topup['date'].'</td>
										<td class="text-center">'.  number_format($list_topup['topup_amount']).'</td>
										<td class="text-center">'.$list_topup['transaction'].'</td>
									</tr>
								';
							}
						}
						else
						{
							?>
								<tr>
									<td class="text-center" colspan="6">
										ไม่พบข้อมูล
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
                        </div>
                    </div>                             
                              
                              
                              
                                        </div>
    
                
                

    </main>
                        
    </div>
<script id="dsq-count-scr" src="//startbootstrap.disqus.com/count.js" async type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script src="../assets/js/scripts.js" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="1bd4d45c54bc5ac897fcf366-|49" defer=""></script></body>
</html>


<?php

if($player["status"] == "admin"){

	
	
}else{
    
    header("location: ../?page=home");

    
}
	
?>



