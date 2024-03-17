
<?php
  ob_start();
  include("header.php");
  
  //change category status
  if($_GET['id'] !='' && $_GET['status'] !='')
  {
    $qry = "update product set `product_status`=".$_GET['status']." where `product_id`=".$_GET['id'];
    mysqli_query($db,$qry);
    header("location:product.php");
  }

  //delete catefory record
  if($_GET['did'] !='')
  {
    $qry = "delete from product where `product_id`=".$_GET['did'];
    mysqli_query($db,$qry);
    header("location:product.php"); 
  }
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="newproduct.php" class="btn btn-info">New Product</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Catagory</th>
                  <th>Subcategory</th>
                  <th>Brand</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  //fetch all category
                  $qry ="select * from product";
                  $res = mysqli_query($db,$qry);

                  while($arr = mysqli_fetch_assoc($res))
                  {
                ?>
                  <tr>
                    <td><?php echo $arr['product_id'];?></td>
                    <td><?php echo $arr['product'];?></td>
                    <td><?php echo $arr['product_price'];?></td>
                    <td></td>
                    <td><?php echo $arr['product_dec'];?></td>
                    <td><?php echo $arr['category_id'];?></td>
                    <td><?php echo $arr['subcategory_id'];?></td>
                    <td><?php echo $arr['brand_id'];?></td>
                    <td><?php if($arr['product_status'] == 0){?>
                        
                        <a href="product.php?id=<?php echo $arr['product_id'];?>&status=1" class="btn btn-success">Active</a>   
                        <?php } else {?> 
                        <a href="product.php?id=<?php echo $arr['product_id'];?>&status=0" class="btn btn-danger">Deactive</a>   
                        <?php } ?>

                    </td>
                    <td>
                        <a class="btn btn-info" href="NewCategory.php?id=<?php echo $arr['category_id'];?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="category.php?did=<?php echo $arr['category_id'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>

                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php
    include("footer.php");
  ?>

  <script type="text/javascript">
    
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  </script>