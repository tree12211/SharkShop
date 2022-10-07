<div class="card border-0 shadow mb-4">
    <div class="card-body">
        
			<form name="search_user" method="POST">
				<div class="col-12 col-md-12  pull-left text-right mb-2">
					<div class="input-group">
					    <input type="text" class="form-control" id="input_search" name="input_search" placeholder="ใส่ไอดี สินค้าที่จำได้!">
					    <div class="input-group-append">
			            	<button type="submit" name="btn_search_user" class="btn btn-primary">ค้นหา</button>
			          	</div>
					</div>
				</div>
			</form>
			
        </div>
    </div>

<?php

						$sql_user_w = 'SELECT * FROM shop';
						if(isset($_POST['btn_search_user']))
						{
							$sql_user_w .= " WHERE (name LIKE '%".$_POST["input_search"]."%' ) || id LIKE '%".$_POST["input_search"]."%'";
						}
						else
						{
							$sql_user_w .= ' ORDER BY id DESC';
						}
						$query_user_w = $connect->query($sql_user_w);
						$i = 0;

						if($query_user_w->num_rows != 0)
						{
							while($user_w = $query_user_w->fetch_assoc())
							{
								$i++;
    echo '<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <center>
          <hr>  
          
        <h2 style="color: red; font-size: 20;">ไอดีที่ : '.$user_w["id"].'</h2>
          <hr>
          
<img style="width: 100; height: 100;" src="../img/'.$user_w["img"].'"><h1 class="badge badge-primary" style="font-size: 17">ราคา : '.$user_w["price"].'</h1></img>
          <hr>
         </center>
         
        <h1 class="badge badge-primary" style="font-size: 15"> ข้อมูลสินค้า!</h1> :&nbsp;<a style="font-size: 16px;">'.$user_w["name"].'</a> <br>
        
        <h1 class="badge badge-Success" style="font-size: 15"> สถานะสินค้า!</h1> :&nbsp;<a style="font-size: 16px; color: red;">'.$user_w["order"].'</a>
        
    <a href="?page=confirm&id="'.$user_w['id'].'"class="col-md-12 btn btn-outline-danger ">ซื้อสินค้า</a>
   
     <hr>
     <h1 style="font-size: 20">#คลิกที่รูปเพื่อ ดูรูปทั้งหมด!</h1>
    </div>
</div>';
							}
						}
						else
						{
							?>
								<tr>
									<td class="text-center" colspan="6">
				    <button class="col-md-12 btn btn-outline-danger ">ไม่พบข้อมูลสินค้า Error!</butyon><br>
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>