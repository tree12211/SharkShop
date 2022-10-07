
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <h5 class="m-0"><i class="fa fa-shopping-cart"></i> Select Shop ID!</h5>
                            <hr>


            <div class="row">
            <?php 

            if(isset($_GET['page']) && $_GET['page'] != 'shop')
            {
                $sql_product = 'SELECT * FROM shop ORDER BY id DESC';
            }
            else
            {
                $sql_product = 'SELECT * FROM shop';
            }

                if(isset($_GET['server']) && is_numeric($_GET['server']))
                {
                  $sql_product .= ' WHERE server_id = "'.$_GET['server'].'"';
                }

                if(isset($_GET['category']) && is_numeric($_GET['category']))
                {
                  if(isset($_GET['server']) && is_numeric($_GET['server']))
                  {
                    $sql_product .= ' AND category = "'.$_GET['category'].'"';
                  }
                  else
                  {
                    $sql_product .= ' WHERE category = "'.$_GET['category'].'"';
                  }
                }

        $query_product = $connect->query($sql_product);

        if($query_product->num_rows > 0)
        {
          while($product = $query_product->fetch_assoc())
          {
                        ?>
    <div class="col-md-4 mb-3">
                            
        <div class="card vivify animationObject pulsate h-jello " style="width:100%; height:100%">
         <div class="card-body ">
            

                                            <h6 class="h-grow"> 
                                            
        <center>

<hr>
          
        <h2 style="color: red; font-size: 20;">ไอดีที่ : <?php echo $product["id"]; ?></h2>
          <hr>
          
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
        <img class="d-block w-100% img-fluid" src="<?php echo $product['pic1']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="<?php echo $product['pic2']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      <!--/Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <img class="d-block w-100% img-fluid" src="<?php echo $product['pic3']; ?> " style="max-height: 500px;"alt="First slide">

      </div>
      
      <!--/Third slide-->

      </div>
</div>

<hr>
        
         </center>
         
        <h1 class="badge badge-primary" style="font-size: 15"> ข้อมูลสินค้า!</h1> :&nbsp;<a style="font-size: 16px;"><?php echo $product["name"]; ?></a> <br>

        <h1 class="badge badge-Success" style="font-size: 15"> ราคา!</h1> :&nbsp;<a style="font-size: 16px; color: red;"><?php echo $product["price"]; ?></a> 
        
        
<?php
                  
if($player['points'] > $product['price']){
    
?>

<a href="?page=confirm&id=<?php echo $product['id']; ?>"class="col-md-12 btn btn-outline-danger ">สินค้าราคา <?php echo $product["price"]; ?> บาท</a>

<?php
    
}else{
    
    
    ?>
    
    <a class="col-md-12 btn btn-outline-danger ">คุณมีเงินไม่พอที่จะซื้อสินค้าราคา <br> <?php echo $product["price"]; ?> บาท</a>
 </a>
    
    
    <?php
    
    
}

?>
            
    

<hr>

                                                    
<h6>
                                </div>
                            </div>
                        </div>
                        <?php
          }
        }
        else
        {
            ?>
            <div class="col-md-12">
                <div class="card card-body">
                    <h6>ไม่มีสินค้าในตอนนี้</h6>
                        <hr>
                        <center>
                        <h1><i class="bi bi-bag-x-fill">ไม่มีสินค้าในตอนนี้</i></h1>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
