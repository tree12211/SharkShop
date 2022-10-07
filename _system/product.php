  <?php
    if(isset($_GET['id']) && $_GET['id'] != NULL && $_GET['id'] != "")
    {
      $product_id = $_GET['id'];
      $sql_f_edit_product = 'SELECT * FROM shop WHERE id = "'.$product_id.'"';
      $query_f_edit_product = $connect->query($sql_f_edit_product);

      if($query_f_edit_product->num_rows != 0)
      {
        $product_f = $query_f_edit_product->fetch_assoc();

        if(isset($_POST['btn_edit_product']))
        {
          $bungee_edit = $_POST['edit_product_bungee'];
          $sql_edit_product = 'UPDATE shop SET name = "'.$_POST['product_name'].'", price = "'.$_POST['product_price'].'", pic1 = "'.$_POST['pic11'].'", pic2 = "'.$_POST['pic22'].'", pic3 = "'.$_POST['pic33'].'", username = "'.$_POST['Username'].'", password = "'.$_POST['Password'].'"';
          $sql_edit_product .= ' WHERE id = "'.$product_f['id'].'"';
          $query_edit_product = $connect->query($sql_edit_product);
          if($query_edit_product)
          {
            $msg = 'แก้ไข #'.$product_f['id'].' เรียบร้อยแล้ว';
            $alert = 'success';
            $msg_alert = 'สำเร็จ!';
            //* ประกาศ
            echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>แก้ไข #'.$product_f['id'].' เรียบร้อยแล้ว</strong></div>';

            //* REFRESH
            echo "<meta http-equiv='refresh' content='5 ;'>";
          }
          else
          {
            $msg = 'เกิดข้อผิดพลาดในการแก้ไข #'.$product_f['id'];
            $alert = 'error';
            $msg_alert = 'เกิดข้อผิดพลาด!';
            //* ประกาศ
            echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>เกิดข้อผิดพลาดในการแก้ไข #'.$product_f['id'].'</strong></div>';

            //* REFRESH
            echo "<meta http-equiv='refresh' content='5 ;'>";
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
        if(isset($_POST['btn_rm_product']))
        {
          $sql_rm_product = 'DELETE FROM shop';
          $sql_rm_product .= ' WHERE id = "'.$product_f['id'].'"';
          $query_rm_product = $connect->query($sql_rm_product);
          if($query_rm_product)
          {
            $msg = 'ลบ #'.$product_f['id'].' เรียบร้อยแล้ว';
            $alert = 'success';
            $msg_alert = 'สำเร็จ!';
            //* ประกาศ
            echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>ลบ #'.$product_f['id'].' เรียบร้อยแล้ว</strong></div>';

            //* REFRESH
            echo "<meta http-equiv='refresh' content='5 ;'>";
          }
          else
          {
            $msg = 'เกิดข้อผิดพลาดในการลบ #'.$product_f['id'];
            $alert = 'error';
            $msg_alert = 'เกิดข้อผิดพลาด!';
            //* ประกาศ
            echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>เกิดข้อผิดพลาดในการลบ #'.$product_f['id'].'</strong></div>';

            //* REFRESH
            echo "<meta http-equiv='refresh' content='5 ;'>";
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
          <h4 class="mb-3 text-center">จัดการสินค้า <div class='text-muted'>#<?php echo $product_f['id']; ?></div></h4>
          <form name="edit_product" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                      <label for="product_name">ชื่อไอเทม</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_f['name']; ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="product_price">ราคา</label>
                      <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_f['price']; ?>">
                  </div>


                  <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 1</label>
                      <input type="text" class="form-control" id="product_pic" name="pic12" value="<?php echo $product_f['pic1']; ?>">
                  </div>
                                   <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 2</label>
                      <input type="text" class="form-control" id="product_pic" name="pic22" value="<?php echo $product_f['pic2']; ?>">
                  </div>
                  
                                  <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 3</label>
                      <input type="text" class="form-control" id="product_pic" name="pic33" value="<?php echo $product_f['pic3']; ?>">
                  </div>
                  
                                      <div class="col-md-6 mb-3">
                      <label for="product_pic">UserName</label>
                      <input type="text" class="form-control" id="product_pic" name="Username" value="<?php echo $product_f['username']; ?>">
                  </div>
                  
                                              <div class="col-md-6 mb-3">
                      <label for="product_pic">Password</label>
                      <input type="text" class="form-control" id="product_pic" name="Password" value="<?php echo $product_f['password']; ?>">
                  </div>
                  
                  
                  <div class="col-md-3 my-4">
                    <button type="submit" name="btn_edit_product" class="btn btn-primary btn-block">
                      แก้ไข #<?php echo $product_f['id']; ?>
                    </button>
                  </div>
                  <div class="col-md-3 my-4">
                    <button type="submit" name="btn_rm_product" class="btn btn-primary btn-block">
                      ลบ #<?php echo $product_f['id']; ?>
                    </button>
                  </div>
              </div>
          </form>
        <?php
      }
    }
    elseif(isset($_GET['action']) && $_GET['action'] != NULL && $_GET['action'] != "" && $_GET['action'] == 'add')
    {
      if(isset($_POST['btn_add_product']))
      {
        $bungee_add = $_POST['product_bungeecord'];
        $sql_add_product = 'INSERT INTO shop (name,price,pic1,pic2,pic3) VALUES ("'.$_POST['product_name'].'","'.$_POST['product_price'].'","'.$_POST['product_pic1'].'","'.$_POST['product_pic3'].'","'.$_POST['product_pic2'].'")';
        $query_add_product = $connect->query($sql_add_product);

        if($query_add_product)
        {
          $msg = 'เพิ่มสินค้าใหม่เรียบร้อยแล้ว';
          $alert = 'success';
          $msg_alert = 'สำเร็จ!';
          //* ประกาศ
          echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>เพิ่มสินค้าใหม่เรียบร้อยแล้ว</strong></div>';

          //* REFRESH
          echo "<meta http-equiv='refresh' content='5 ;'>";
        }
        else
        {
          $msg = 'เกิดข้อผิดพลาดในการเพิ่มสินค้า';
          $alert = 'error';
          $msg_alert = 'เกิดข้อผิดพลาด!';
          //* ประกาศ
          echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>เกิดข้อผิดพลาดในการเพิ่มสินค้า</strong></div>';

          //* REFRESH
          echo "<meta http-equiv='refresh' content='5 ;'>";
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
        <h4 class="mb-3 text-center">เพิ่มสินค้า</h4>
        <form name="add_product" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                      <label for="product_name">ชื่อไอเทม</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" required="">
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="product_price">ราคา</label>
                      <input type="text" class="form-control" id="product_price" name="product_price" required="">
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 1</label>
                      <input type="text" class="form-control" id="product_pic1" name="product_pic1" required="">
                  </div>
                  
                              <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 2</label>
                      <input type="text" class="form-control" id="product_pic2" name="product_pic2" value="<?php echo $product_f['pic2']; ?>">
                  </div>
                  
                              <div class="col-md-6 mb-3">
                      <label for="product_pic">รูปภาพ 3</label>
                      <input type="text" class="form-control" id="product_pic3" name="product_pic3" value="<?php echo $product_f['pic3']; ?>">
                  </div>
                  <div class="col-md-6 my-4">
                    <button type="submit" name="btn_add_product" class="btn btn-primary btn-block">
                      เพิ่ม
                    </button>
                  </div>
              </div>
          </form>
      <?php
    }
    else
    {
      $sql_product = 'SELECT * FROM shop';

      if(isset($_GET['category']) && is_numeric($_GET['category']))
      {
        $sql_product .= ' WHERE category = "'.$_GET['category'].'"';
      }

      $sql_product .= ' ORDER BY id DESC';

      $query_product = $connect->query($sql_product);

      if($query_product->num_rows <= 0)
      {
        echo "<h5 class='col-md-12 text-center'>ไม่พบสินค้า</h5>";
      }
      else
      {
        echo '<div class="row">';
        while($product = $query_product->fetch_assoc())
        {
          ?>
 <div class="col-md-4 mb-3">
                            
<div class="card vivify animationObject pulsate h-jello " style="width:100%; height:100%">
<div class="card-body ">
    
 <h6><?php echo $product['name'] ?></h6>
                                    <hr>
                                        <center>
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
        <img class="d-block w-100% img-fluid" src="../<?php echo $product['pic1']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="../<?php echo $product['pic2']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="../<?php echo $product['pic3']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      
      <!--/Third slide-->

      </div>
</div>
                                                <hr>
                                                    <h6 class="h-grow"> <?php if($product['pricerp'] >= 1 and $product['price'] >= 1)
								 {
									echo $product['price'];
									echo ' พ้อยท์ ';
									echo ' และ ';
									echo ''.$product['pricerp'].' บาท';
								 }
								 else
								 {
									if($product['price'] >= 1)
									{
										echo $product['price'];
										echo ' พ้อยท์ ';
									}
									else
									{
										if($product['pricerp'] >= 1)
										{
											echo ''.$product['pricerp'].' บาท';
										}
									}
								 }?> <h6>
                                                    <a href="?page=backend&menu=manageproduct&id=<?php echo $product['id']; ?>"class="h-jello col-md-12 btn btn-success">ซื้อสินค้า</a>
                                </div>
                            </div>
                        </div>

          <?php
        }
        echo "</div>";
        echo '<br><a href="?page=backend&menu=manageproduct&=add" class="col-md-12 btn btn-danger w-100 mb-1 border-0">เพิ่ม</a>';
      }
    }
?>