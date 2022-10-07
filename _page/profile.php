<head>
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css" >
</head>
<script src="assets/js/sweetalert2.all.min.js"></script>
<?php
if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
{
    echo "<script>window.location.href='?page=rank'</script>";
}
else
{
?>
<?php
	if(isset($_POST['reset_submit']))
	{
        $username = $_SESSION['username'];
		$sql = 'SELECT * FROM authme WHERE username = "'.$username.'"';
		$a = $connect->query($sql);
		$a_num = $a->num_rows;

		$password_info = $a->fetch_assoc();
		$sha_info = explode("$",$password_info['password']);
		$salt = $sha_info[2];
		$sha256_password = hash('sha256', $_POST['password']);
		$sha256_password .= $sha_info[2];

        $reg_password = $connect->real_escape_string($_POST['new_password']);

		if(strcasecmp(trim($sha_info[3]),hash('sha256', $sha256_password)) == 0)
        {
			$sql_user = 'SELECT * FROM authme WHERE username = "'.$username.'"';
		    $query_user = $connect->query($sql_user);
			$fetch_user = $query_user->fetch_assoc();
            
            $update_pass = 'UPDATE authme SET password = "'.hashPassword($reg_password).'" WHERE id = "'.$_SESSION['uid'].'"';
            $check_update = $connect->query($update_pass);
            if($check_update)   
            {
			    $msg = 'เปลี่ยนรหัสผ่านสำเร็จ';
			    $alert = 'success';
			    $msg_alert = '';
            }
            else
            {
                $msg = 'ไม่สามารถอัปเดตรหัสผ่านได้';
                $alert = 'error';
                $msg_alert = 'เกิดข้อผิดพลาด!';
            }
		}
		else
		{
			$msg = 'รหัสผ่านไม่ตรงกัน';
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

  <div class="container">
  
<div class="card border-0 shadow mb-4">
  <div class="col-lg-4">
    <div class="card-body" style="text-align:center;">
     


<div class="sidebar vivify animationObject pulsate">
    <h4 class="text-dark m-0 text-dark"><i class="fa fa-user-plus"></i> เปลี่ยนหรัสผ่าน</h4>
        <hr>
	<form name="register" method="POST">
		<div class="row">
			<div class="text-dark col-md-6 mb-2">
				<label for="password">รหัสผ่านเก่า</label>
				<input name="password" class="form-control" type="password" placeholder="รหัสผ่านในเกม"/>
			</div>
			<div class="text-dark col-md-6 mb-2">
				<label for="new_password">รหัสผ่านใหม่</label>
				<input name="new_password" class="form-control" type="password" placeholder="รหัสผ่านใหม่"/>
			</div>
		</div>
		<hr/>
		<?php
			if(isset($_POST['reset_submit']))
			{
				?>
					<button class="btn col-md-12 btn-primary btn-block" type="button" disabled>
					  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					  Loading...
					</button>
				<?php
			}
			else
			{
				?>
					<input name="reset_submit" class="btn col-md-12 btn-block btn-success" type="submit" value="รีเซ็ตรหัสผ่าน"/>
				<?php
			}
		?>
		</form>
</div>
</div>
<?php } ?>
        
    </div>
  </div>

 </div>
</div>
