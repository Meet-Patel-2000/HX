<?php

//fetch_data.php

include("../config.php");

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM product WHERE product_status = 1 ";
 if(isset($_POST["color_id"]))
 {
  $color_filter = implode("','", $_POST["color"]);
  $query .= "
   AND color_id IN('".$color_filter."')
  ";
 }


 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="col-md-4 item-grid1 simpleCart_shelfItem">
          <div class=" mid-pop">
          <div class="pro-img">
            <img src="assets/upload/<?php echo $row['product_img'];?>"  height="280px" width="180px" class="" alt="img">
            <div class="zoom-icon ">
            <a class="picture" href="assets/upload/<?php echo $row['product_img'];?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="single.php"><i class="glyphicon glyphicon-menu-right icon"></i></a>
            </div>
            </div>
            <div class="mid-1">
            <div class="women">
            <div class="women-top">
                <?php 
                $c_qry="select category,category_id from category where category_id=".$row[category_id];
                $c_res=mysqli_query($db,$c_qry);
                $c_arr=mysqli_fetch_assoc($c_res);
                ?>
              <span><?php echo $c_arr['category'];?></span>
              <h6><a href="single.php"><?php echo substr($row['product'],0,15)."...";?></a></h6>
              </div>
              <div class="img item_add">
                <a href="#"><img src="assets/front/images/ca.png" alt=""></a>
              </div>
              <div class="clearfix"></div>
              </div>
              <div class="mid-2">
                <!--<p ><label>$100.00</label><em class="item_price">$70.00</em></p>-->
                <p><em>Rs <?php echo $row['product_price'];?></em></p>
                  <div class="block">
                  <div class="starbox small ghosting"> </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              
            </div>
          </div>
          </div>
   
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>



<!-- <div class="col-sm-4 col-lg-3 col-md-3">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     <img src="image/'. $row['product_img'] .'" alt="" class="img-responsive" >
     <p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
     <h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
     <p>Camera : '. $row['product_camera'].' MP<br />
     Brand : '. $row['product_brand'] .' <br />
     RAM : '. $row['product_ram'] .' GB<br />
     Storage : '. $row['product_storage'] .' GB </p>
    </div>

   </div> -->