
          <form method="POST" enctype="multipart/form-data">
              
<div class="col-md-17">
	<div class="col-md-12">
	<div class="card col-md-12 border-0 shadow mb-4">
		<div class=" card-body">
<hr>
<center>
    
	<img width="50%" src="./assets/user_img/<?php echo $player['user_img']; ?>">
	
</center>
	<hr>	    
      <div class="col-12 input-group input-group-sm pl-3 pr-3 pb-2">
                <div class="custom-file">
                        <input type="file" id="image_img" name="image_img" accept=".jpg,.png" required/>
                        <label class="custom-file-label" for="image_img">เลือกรูปโปรไฟล์</label>
                </div>
            </div>
            <div class="pl-3 pr-3 pb-2"><button type="submit" name="pimg" value="pimg" class="btn btn-sm btn-outline-success w-100">เปลี่ยนรูปโปรไฟล์</button></div>
            <input type="hidden" name="imgname" value="<?php echo $player['user_img']; ?>">
            
            <hr>
            
            </div>
        </div>
    </div>
 </div>
          </form>
          
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

<?php 
    if(isset($_POST['pimg'])){
            $namea = 'id'.$_SESSION['uid'].'_'.bin2hex(random_bytes(3)).'_img.jpg';
            function Upload($file,$path="./assets/user_img/"){
                global $namea;
                $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
                if(@copy($file['tmp_name'],$path.$newfilename)){
                    @chmod($path.$file,0777);
                    return $newfilename;
                }else{
                    return false;
                }
            }

            unlink('./assets/user_img/'.$_POST['imgname']);
            
            $id_data = $_SESSION['uid'];
            $imagefile = Upload($_FILES['image_img']);
            
        	$sql_edit = 'UPDATE authme SET user_img = "'.$imagefile.'" WHERE id = "'.$id_data.'"';
					$query_edit = $connect->query($sql_edit);
	
            if($query_edit) {
                
    $msg = 'Success';
	$alert = 'success';
	$msg_alert = 'เปลี่ยนรูปโปรไฟล์แล้ว! '.$player['user_img'].'';
	
	
    }else{
        
        $msg = 'Error';
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

