<center>
    
<div class="card border-0 shadow mb-4">
     <div class="card-body">
        <div class="vivify animationObject driveInRight sidebar">
<hr>
              <h3 class="sidebar-title"><center>เติมเงินล่าสุด</center></h3>
              <div class="sidebar-item categories">
                <ul>
                <?php
                $sql_last = 'SELECT * FROM giftlog WHERE (action = "เติมเงิน" || action = "เติมเงิน") ORDER BY id DESC LIMIT 3';
                $query_last = $connect->query($sql_last);
                
    
                ?>
                <table class="table table-striped ranking_tb" border="0" style="font-size:13px;">
                <thead>
                <tr>
                <th scope="col">ชื่อผู้เล่น</th>
                <th scope="col">จำนวน</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if($query_last->num_rows > 0)
                    {
                      while($last_topup = $query_last->fetch_assoc())
                      {
                        ?>
                        <tr class=" h-grow">
                          <td >
                            <img src="./assets/user_img/<?php echo $player['user_img']; ?>" class="mr-3" width="28"> <?php echo $last_topup['username']; ?>
                          </td>
                        <td>
                          <?php echo number_format($last_topup['topup_amount'],2); ?> <i class="fa fa-adjust"></i>
                        </td>
                      </tr>
                        <?php
                      }
                    }
                    else
                    {
                      ?>
                      <tr>
                        <td>
                          <img src="https://minotar.net/helm/steve/28" class="mr-3" width="28"> ไม่มีคนเติมเงินล่าสุด
                        </td>
                      <td>
                        <?php echo number_format("0",2); ?> <i class="fa fa-coins text-dark"></i>
                      </td>
                    </tr>
                  <?php
                    }
                    ?>
                  </tbody>
                  </table>
                <ul>
              </div>
              <hr>
              <h3 class="sidebar-title"><center>อันดับเติมเงิน</center></h3>
              <div class="sidebar-item categories">
                <ul>
                <?php
					$sql_list = 'SELECT * FROM authme ORDER BY topup DESC LIMIT 3';
					$query_list = $connect->query($sql_list);

                ?>
                <table class="table table-striped ranking_tb" border="0" style="font-size:13px;">
                <thead>
                <tr >
                <th scope="col">ชื่อผู้เล่น</th>
                <th scope="col">จำนวน</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if($query_list->num_rows > 0)
                    {
                      while($list_topup = $query_list->fetch_assoc())
                      {
                        ?>
                        <tr class=" h-grow">
                          <td>
                            <img src="./assets/user_img/<?php echo $list_topup['user_img']; ?>" class="mr-3" width="28"> <?php echo $list_topup['realname']; ?>
                          </td>
                        <td>
                          <?php echo number_format($list_topup['topup'],2); ?> <i class="fa fa-adjust"></i>
                        </td>
                      </tr>
                        <?php
                      }
                    }
                    else
                    {
                      ?>
                      <tr>
                        <td>
                          <img src="https://minotar.net/helm/steve/28" class="mr-3" width="28"> ไม่มีอันดับคนเติมเงิน
                        </td>
                      <td>
                        <?php echo number_format("0",2); ?> <i class="fa fa-coins text-dark"></i>
                      </td>
                    </tr>
                  <?php
                    }
                    ?>
                  </tbody>
                  </table>
                <ul>
              </div>
            </div>
            
          </div></div>


    <div class="card border-0 shadow mb-4">
    <div class="card-body">
        <h5 class="m-0"><i class="fa fa-bullhorn"></i> ข่าวสารต่างๆ</h5>
                            <br>
                            <div class="table-responsive">
                                    <table class="table" style="color: black;">
                                        <tbody>
                                            <?php
                                                              $query_announce = $connect->query('SELECT * FROM announce ORDER BY id DESC LIMIT 5');
                                                              if($query_announce->num_rows > 0)
                                                              {
                                                                      $i = 1;
                                                                      while($announce = $query_announce->fetch_assoc())
                                                                      {
                                                                  ?>
                                            <tr>
                                <td width="65%"><span style="font-size: 14px;" class="badge badge-primary">ข่าวสาร</span> :&nbsp;<a style="font-size: 16px;"> <?php echo $announce['html']; ?> </a></td><td>( วันที่ : <?php echo $announce['date_create']; ?> )<a></a></td></tr> 
                                
        
                                                                  <?php
                                                                      }
                                                              }
                                                              else
                                                              {
                                                                ?>
                                                                  <tr>
                                                                      <td class="text-center" colspan="3">
                                                                        ยังไม่มีประกาศ
                                                                      </td>
                                                                  </tr>
                                                                <?php
                                                              }
                                                          ?>
                                            </tr>
                                        </tbody> 
                                      </table> <hr>
                                      
                <a href="<?php echo $setting['page_facebook']; ?>"<button type="submit" class="col-md-12 btn btn-outline-success ">กดเพื่อติดตามเพจ Auto Shop!</button> </a>
                
        <hr>
                            </div>
                        </div>
                    </div> 