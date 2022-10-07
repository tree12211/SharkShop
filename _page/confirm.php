<?php
	if(isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$sql_buy = 'SELECT * FROM shop WHERE id = "'.$_GET['id'].'"';
	}
	else
	{
		$sql_buy = 'SELECT * FROM shop WHERE id = "0"';
	}

	$query_buy = $connect->query($sql_buy);
?>
    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-shopping-cart"></i> ยืนยันการซื้อ</h5>
                            <hr>
	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
                    echo '<div class="col-md-12 mb-1">
                            <div class="alert alert-danger">
				<i class="fa fa-exclamation-triangle"></i> กรุณาเข้าสู่ระบบก่อนซื้อสินค้า !
			</div>
                    </div>';
		}
		else
		{
			?>
				<div class="row">
					<?php
						if($query_buy->num_rows <= 0)
						{
							?>
								<div class="col-md-12">
                                                                    <h5 class="col-md-12 text-center"><div class="alert alert-danger">ไม่พบสินค้านี้</div></h5>
								</div>
							<?php
						}
						else
						{
							$buy = $query_buy->fetch_assoc();

							// START BUY
							if(isset($_POST['btn_buy']))
							{
								$msg = '';
								$alert = 'error';
								$msg_alert = 'เกิดข้อผิดพลาด!';
								?>
									<div class="col-md-12 mb-3">
										<?php
											if($player['points'] < $buy['price'])
											{
												$msg = 'พ้อยท์คุณไม่เพียงพอ กรุณาเติมเงินค่ะ !';
												$alert = 'error';
												$msg_alert = 'เกิดข้อผิดพลาด!';
											}
											else
											{	
											    
											   $activities_action = "ซื้อ";
										$time_date = date("Y-m-d H:i");
															$sql_insert_log = 'INSERT INTO activities (uid,username,action,date,transaction, phone) VALUES ("'.$_SESSION['uid'].'","'.$_SESSION['username'].'","'.$activities_action.'","'.$time_date.'","'.$buy['username'].'", "'.$buy['password'].'")';
										$sql_log = $connect->query($sql_insert_log); 
											    $sql_rem_points = 'UPDATE authme SET points = points-"'.$buy['price'].'" WHERE id = "'.$_SESSION['uid'].'"';

														$query_rem_points = $connect->query($sql_rem_points);
														
											        $delete_redeem = $connect->query("DELETE FROM shop WHERE id = '".$buy['id']."'");
										
														if($query_rem_points)
														{
									
						              $msg = 'ซื้อสินค้าไอดี '.$buy['id'].' สำเร็จแล้ว!';
										$alert = 'success';
										$msg_alert = 'สำเร็จ!';
							
														if($sql_log){
												    
												    $msg = 'ซื้อสินค้าไอดี '.$buy['id'].' สำเร็จแล้ว!';
										$alert = 'success';
										$msg_alert = 'สำเร็จ!';
												    
												}else{
												    
																											$msg = 'ไม่สามารถ แก้ไขสถาน่ะข้อมูลได้!';
															$alert = 'error';
															$msg_alert = 'เกิดข้อผิดพลาด!';    
												    
												}
		
			
											}
														else
														{
															$msg = 'เกิดข้อผิดพลาด #ไม่สามารถอัพเดทพ้อยท์ล่าสุดได้ !';
															$alert = 'error';
															$msg_alert = 'เกิดข้อผิดพลาด!';
												}
											}
										?>
									</div>

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
							else
							{
								if(!isset($_POST['btn_gift']))
								{
									if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
									{
										?>
											<div class="col-md-12 mb-1">
												<div class="alert alert-info">
													<i class="fa fa-exclamation-triangle"></i> กรุณาเข้าสู่ระบบก่อนซื้อสินค้า !
												</div>
											</div>
										<?php
									}
									else
									{
										?>
											<div class="col-md-12 mb-1">
												<div class="alert alert-info">
													<i class="fa fa-exclamation-triangle"></i> ซื้อรหัสแล้วไปเช็คที่ ประวัติได้เลย!										</div>
											</div>
										<?php
									}
								}
							}
?>
		<div class="col-md-4">

<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
          <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      </ol>
  <!--/.Indicators-->
  <!--Slides 1920 * 500-->
  <div class="carousel-inner" role="listbox">
  
      <!--First slide-->
      <div class="carousel-item active">
        <img class="d-block w-100% img-fluid" src="<?php echo $buy['pic1']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="<?php echo $buy['pic2']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="<?php echo $buy['pic3']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      
      <!--/Third slide-->

      </div>
</div>

</div>



							<div class="col p-4 d-flex flex-column position-static">
					          	<strong class="d-inline-block mb-0 text-success">
					          		<?php echo $category_f['name']; ?>
					          	</strong>
					          	<h3 class="mb-0">
					          		<?php echo $buy['name']; ?> <small>ราคา <?php echo number_format($buy['price'],2); ?> พ้อยท์</small>
					          	</h3>
					          	<div class="mb-1 text-muted">
					          		#รหัสสินค้า: <?php echo $buy['id']; ?>
					          	</div>
					          	<form name="buy" method="POST">
					          		<input type="hidden" value="<?php echo $buy['id']; ?>"/>

			
						          	
    
    <button type="submit" name="btn_buy" class="btn btn-primary btn-block mt-3">
				
<i class="fa fa-shopping-cart"></i> กดเพื่อซื้อสินค้า
						          	</button>
    
						          	<hr>
					        </div>
							<?php
						}
					?>
				</div>
			<?php
		}
	?>
</div>
</div>