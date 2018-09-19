<?php
// memastikan user sudah login untuk mengakses web ini(mengaktifkan session)
   include "include/session.php";
   // konek ke database
    include "config.php";
    //query dengan PHP PDO
    $count=$dbo->prepare("select * from plus_signup where username=:username");
    $count->bindParam(":username",$username,PDO::PARAM_STR);
    while $row = $count->fetch(PDO::FETCH_OBJ, $modal){

?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Your Profile</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">

        		
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="nama">Nama</label>
                    <input type="hidden" name="todo"  class="form-control" value="update" />
                    <input type="text" name="nama"  class="form-control" value="<?php echo $row['nama']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="email">Email</label>
                    <input type="email" name="email"  class="form-control" value="<?php echo $row['email']; ?>"/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"  class="form-control" value="<?php echo $row['phone']; ?>"/>
                </div>

                <div class="form-group">
                            <label for="division"> Select Divison : </label>
                            <select class="form-control" name="division" id="division">
                                <option>IT Support</option>
                                <option>IT Infrastruktur</option>
                                <option>IT Electronic Data Processing</option>
                                <option>IT Solution</option>
                            </select>
                        </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Kirim
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>