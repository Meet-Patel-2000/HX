
<?php
ob_start();
  include("header.php");

  if(isset($_POST['sbt_color']))
  {
  	extract($_POST);

  	if($category =='')
  	{	
  		$msg = "Enter Color";
  	}
  	else
  	{
      if($_GET['id'] !='')
      {
        $qry = "update color set `color`='$color' where `color_id`=".$_GET['id'];
      }
      else
      {
        $qry = "insert into color(`color`) values('$color')";        
      }

  		mysqli_query($db,$qry) or die();
  		header("location:color.php");
  	}	
  }

  //fetch category record
  if($_GET['id'] !='')
  {
    $qry = "select * from color where color_id=".$_GET['id'];
    $res = mysqli_query($db,$qry);
    $arr = mysqli_fetch_assoc($res);
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
              <li class="breadcrumb-item"><a href="color.php" class="btn btn-info">View Color</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Color</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Color</label>
                    <input type="text" class="form-control remove" id="color" placeholder="Enter Color" name="color" value="<?php echo $arr['color'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit" name="sbt_color" id="sbt_color">
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
 <?php
  include("footer.php");
 ?>


<script type="text/javascript">

//jquery click event
$("#sbt_color").click(function(){
	
	if($("#color").val() =='')
	{
		alert('Enter Color value');
		return false;
	}
}); 	
 
</script>