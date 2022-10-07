<?php
		if(isset($_POST['settings_web_submit']))
		{
			$sql_edit_tmtopup = 'UPDATE setting SET name_server = "'.$_POST['name_server'].'", detail_server = "'.$_POST['detail_server'].'", max_reg = "'.$_POST['max_reg'].'",  bg = "'.$_POST['bg'].'", slash = "'.$_POST['slash'].'", icon = "'.$_POST['icon'].'", page_facebook = "'.$_POST['page_facebook'].'", www = "'.$_POST['url'].'"';
			$query_edit_tmtopup = $connect->query($sql_edit_tmtopup);
			if($query_edit_tmtopup)
			{
				$msg = 'แก้ไขการตั้งค่า WebSite เรียบร้อยแล้ว';
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
			}
			else
			{
				$msg = 'แก้ไขการตั้งค่า WebSite ไม่สำเร็จ';
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
?>
			<center>
                                <div class="row">
				<div class="col-md-12">
				</div>
			</div>
			<form name="settings_web_submit" method="POST">
				<div class="row">
					<div class="col-md-6 mb-3">
			            <label for="name_server">ชื่อเว็บไซต์</label>
                                    <input type="text" class="form-control" id="name_server" name="name_server" required="" value="<?php echo $setting['name_server']; ?>">
			        </div>

                    <div class="col-md-6 mb-3">
			            <label for="max_reg">จำกัดการสมัครสมาชิก</label>
                                    <input type="text" class="form-control" id="max_reg" name="max_reg" required="" value="<?php echo $setting['max_reg']; ?>">
			        </div>
                    <div class="col-md-6 mb-3">
			            <label for="detail_server">รายละเอียด Server</label>
                                    <input type="text" class="form-control" id="detail_server" name="detail_server" required="" value="<?php echo $setting['detail_server']; ?>">
			        </div>

                    <div class="col-md-6 mb-3">
			            <label for="page_facebook">ลิ้งเฟสบุ๊ก!</label>
                                    <input type="text" class="form-control" id="page_facebook" name="page_facebook" required="" value="<?php echo $setting['page_facebook']; ?>">
			        </div>

			        <div class="col-md-6 mb-3">
			            <label for="bg">พื้นหลัง</label>
                                    <input type="text" class="form-control" id="bg" name="bg" required="" value="<?php echo $setting['bg']; ?>">
			        </div>

                    <div class="col-md-6 mb-3">
			            <label for="icon">รูปหน้าเว็ป</label>
                                    <input type="text" class="form-control" id="icon" name="icon" required="" value="<?php echo $setting['icon']; ?>">
			        </div>

                    <div class="col-md-12 mb-2">
					<hr class="is-divider">
			        <div class="col-md-12 mb-3">
			        	<button name="settings_web_submit" type="submit" class="btn btn-primary btn-block">
			        		แก้ไขการตั้งค่าระบบ
			        	</button>

			</form>	
			
			
                                            <?php
                                                              $query_announce = $connect->query('SELECT * FROM xpoint');
                                                              if($query_announce->num_rows > 0)
                                                              {
                                                                      $i = 1;
                                                 while($announce = $query_announce->fetch_assoc())
                                                                      {
                                                                  ?>
                                                                  
                                                                  
                                            <form method="POST"><hr>
	    
	   
			
			
	  <div class="col-md-6 mb-3">
			           
			 <label for="backend_password">จัดการเรทเติมเงิน</label>
                                    <input type="text" class="form-control"  name="rateedit" required="" value="<?php echo $announce['xpoint']; ?>">
			        </div>

	 <label for="backend_password">จัดการเบอร์โทรสัพ</label>

   <input type="text" class="form-control"  name="phone1" required="" value="<?php echo $announce['x2']; ?>">
			       
    </div>



	<button name="rate" type="submit" class="btn btn-primary btn-block">
			        		แก้ไขการตั้งค่าระบบ
			        	</button>
			        
			</form><hr>
			
			        </div>
			    </div>
			
	
	</center>
	
                                                                  <?php
                                                                      }
                                                              }
                                                          ?>
	
	
	<?php
	
	
	if(isset($_POST['rate'])){
	    
$sql_edit_rate = 'UPDATE xpoint SET xpoint = "'.$_POST["rateedit"].'", x2 = "'.$_POST["phone1"].'" ';
	    
	   	$editrate = $connect->query($sql_edit_rate);
	   	
	   	if($editrate){
	   	    
	   	    
	   	    	$msg = 'แก้ไขการตั้งค่า WebSite เรียบร้อยแล้ว';
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
	
	   	    
	   	    
	   	}else{
	   	    
	   	    
	   	    	$msg = 'แก้ไขการตั้งค่า WebSite ไม่สำเร็จ';
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
	
	
	?>