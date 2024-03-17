<?php
  ob_start();
  include("header.php");
  
  //change category status
 /* if($_GET['id'] !='' && $_GET['status'] !='')
  {
    $qry = "update category set `category_status`=".$_GET['status']." where `category_id`=".$_GET['id'];
    mysqli_query($db,$qry);
    header("location:category.php");
  }

  //delete catefory record
  if($_GET['did'] !='')
  {
    $qry = "delete from category where `category_id`=".$_GET['did'];
    mysqli_query($db,$qry);
    header("location:category.php"); 
  }*/
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
              <li class="breadcrumb-item"><a href="NewColor.php" class="btn btn-info">New Color</a></li>
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
              <h3 class="card-title">Manage Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  //fetch all category
                  $qry ="select * from color";
                  $res = mysqli_query($db,$qry);

                  while($arr = mysqli_fetch_assoc($res))
                  {
                ?>
                  <tr>
                    <td><?php echo $arr['color_id'];?></td>
                    <td><?php echo $arr['color_code'];?></td>
                    <td><?php echo $arr['color'];?></td>
                    <td><?php if($arr['category_status'] == 0){?>
                        
                        <a href="category.php?id=<?php echo $arr['color_id'];?>&status=1" class="btn btn-success">Active</a>   
                        <?php } else {?> 
                        <a href="category.php?id=<?php echo $arr['color_id'];?>&status=0" class="btn btn-danger">Deactive</a>   
                        <?php } ?>

                    </td>
                    <td>
                        <a class="btn btn-info" href="NewColor.php?id=<?php echo $arr['color_id'];?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="color.php?did=<?php echo $arr['color_id'];?>"><i class="fa fa-trash"></i></a>
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