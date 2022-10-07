     <div class="col-md-17">
	<div class="col-md-12">
	<div class="card col-md-12 border-0 shadow mb-4">
		<div class=" card-body">

        <h5 class="m-0"><i class="fa fa-bullhorn"></i> โปรโมชั่นเติมเงิน!</h5>
                            <br>
                            <div class="table-responsive">
                                    <table class="table" style="color: black;">
                                        <tbody>
                                            <?php
                                                              $query_announce = $connect->query('SELECT * FROM Xpoint');
                                                              if($query_announce->num_rows > 0)
                                                              {
                                                                      $i = 1;
                                                                      while($announce = $query_announce->fetch_assoc())
                                                                      {
                                                                  ?>
                                            <tr>
                                <td width="65%"><span style="font-size: 14px;" class="badge badge-primary">ข่าวสาร</span> :&nbsp;<a style="font-size: 16px;">โปรโมชั่นเติมเงิน</a></td><td>( × <?php echo $announce['xpoint']; ?> )<a></a></td></tr> 
                                                                  <?php
                                                    $mutiple = $announce['xpoint'];
                                                    
                                  $twn_number = $announce['x2'];
                                                                      }
                                                              }
                                                              else
                                                              {
                                                                ?>
                                                                  <tr>
                                                                      <td class="text-center" colspan="3">
                                                                        ยังไม่มีโปรโมชั่นในตอนนี้
                                                                      </td>
                                                                  </tr>
                                                                <?php
                                                              }
                                                          ?>
                                            </tr>
                                        </tbody> 
                                      </table> <hr>
                            </div>
                        </div>
                    </div> 

</div></div>

              
<div class="col-md-17">
	<div class="col-md-12">
	<div class="card col-md-12 border-0 shadow mb-4">
		<div class=" card-body">
		    
	<hr>
	
<span class="card-header-text">
    <img src="img/ezy.png" width="100%" class="card-icon"></span> 
		<hr>
			<div class="col-md-12 mb-1">

				<i class="text-info"></i>
					<h5>ระบบเติมเงิน อั่งเปา <strong></strong></h5>
						<hr>
						
<form method="POST">
							<div class="row">
								<div class="input-group col-md-12 mb-3">
									<input name="gift" type="text" class="form-control" placeholder="ลิงค์อั่งเปา" required="">
								</div>
								<div class="input-group col-md-12 ">
									<button name="btn_wallet_link" type="submit" class="btn btn-expand btn-primary btn-block">
										ยืนยันการเติมเงิน
									</button>
								</div>
							</div>
						</form>
			</div>
		</div>
	</div>
	</div>
	
	<?php
		if(!isset($_SESSION['username']))
		{
			echo '<meta http-equiv="refresh" content="2;URL=?page=login">';
			$msg = 'โปรดเข้าสู่ระบบ';
			$alert = 'error';
			$msg_alert = 'ผิดพลาด';
		  ?>
<script>
swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
button: "Reload",
})
</script>               
<script>
swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
button: "Reload",
})
</script> 
<?php
}?>
</div>	

<?php


if(isset($_POST['btn_wallet_link']))
{
  include('_page/wallet.php');
  $tmgift = new TMWAPI();
    $trequest = $tmgift->VoucherCode($twn_number, $_POST["gift"], true);
    if ($trequest['code'] === 200)
    
  {
      
    $valueEx = $trequest["amount"]*$mutiple;
	
    $sql_updatep = 'UPDATE authme SET points = points+"'.$valueEx.'", topup = topup+"'.$trequest["amount"].'", rp = rp+"'.$trequest["amount"].'" WHERE id = "'.$_SESSION['uid'].'"';
	$connect->query($sql_updatep);

$activities_action = "เติมเงิน";
										$time_date = date("Y-m-d H:i");
										$sql_insert_log = 'INSERT INTO topuplog (uid,username,action,date,topup_amount) VALUES ("'.$_SESSION['uid'].'","'.$_SESSION['username'].'","'.$activities_action.'","'.$time_date.'","'.$trequest["amount"].'")';
										$connect->query($sql_insert_log);

            echo '</body><script> swal("เติมเงินเรียบร้อย","[ '.$_POST['gift'].' ] จำนวน '.$valueEx.' ได้รับ '.$valueEx.' พ้อย","success").then(function() {window.location = "";});</script>';
        
}else{
        
        
                echo '</body><script> swal("ผิดพลาด","ไม่สามารถทำรายการได้!","error").then(function() {window.location = "";});</script>';
    
}
}
?>

                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i>ประวัติการเติมเงินต่างๆ</h5>
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
						$sql_list_topup = 'SELECT * FROM topuplog WHERE username = "'.$_SESSION['username'].'" order by id desc';
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