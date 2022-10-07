<div class="card border-0 shadow mb-4">
                        <div class="card-body">
        
                            <hr>
	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
                    include_once '_page/alertLogin.php';
		}
		else
		{
			?>
<form method="post" action="">
            <input type="hidden" name="submit" value="redeem">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input"><i class="fa fa-barcode"></i>&nbsp;โค๊ต&nbsp;:&nbsp;</span>
  </div>
<input type="text" name="redeem_code" class="form-control form-control-lg lp-input">
</div>

<button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-check"></i>&nbsp;ยืนยันและเติมโค๊ต</button>

</form>
			<?php
		}
	?>
</div></div>

                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i>ประวัติการใส่โค้ดต่างๆ</h5>
                            <br>
                            			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF;" class="text-dark">#</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ชื่อตัวละคร</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ระบบ</th>
						<th style="background-color: #FFF;" class="text-center text-dark">เวลา</th>
						<th style="background-color: #FFF;" class="text-center text-dark">ได้เงิน</th>
						<th style="background-color: #FFF;" class="text-center text-dark">รหัสโค้ด</th>
				</thead>
				<tbody>
			
					<?php
						$sql_list_topup = 'SELECT * FROM redeemlog WHERE username = "'.$_SESSION['username'].'" order by id desc';
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
			<hr>
                        </div>
                    </div>