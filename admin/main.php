<?php
$q = "SELECT * FROM nprint where printed>0 ORDER BY time DESC";
		$r = mysqli_query($conn,$q);
		$no = mysqli_num_rows($r);
		?>
		 <button type="button" title="View Printed" class="btn btn-primary" data-toggle="modal" data-target="#view" data-whatever="@getbootstrap"><i class="fas fa-print"></i></button>
			<div class="modal full-modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog full-modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content full-modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Printed Certificates</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<br>
				</div>
				<div class="modal-body full-modal-body" style="overflow-y:auto;">
				    <form action="statall.php" method="POST" onsubmit="return confirm('********************************\nALERT!\n********************************\nYou are about to commit a change!\n⚫Click on OK to confirm.\n⚫Click on Cancel to exit.')">
							<button type="submit" title="Delete All Printing Data" name="option" value="NoCopyAll" class="btn btn-danger btn-sm"><i class="fas fa-eraser"></i> Delete Print Records</button>
		            </form>
		            <p class="text-primary">*LPT = Last Print Time.<br>Table is in the decreasing order of LPT.</p>
				<table class="table table-bordered mt-2 table-sm">
				<thead>
					<tr>
					<th scope="col">LPT</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Event / Team</th>
					<th scope="col">Post</th>
					<th scope="col">Open</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while($res = mysqli_fetch_array($r)){
					?>
                    <tr>
                    <td><?php echo $res['time']?></td>
					<td><?php echo $res['name'] ?></td>
					<td><?php echo $res['email'] ?></td>
					<td><?php echo $res['event']?></td>
					<td><?php echo $res['post']?></td>
					<td>
					<form action="statall.php" method="POST">
                            <input name="email" type="hidden" value='<?php echo $res['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $res['name'] ?>'>
							<button type="submit" value="Submit" class="btn btn-primary btn-sm"><i class="fas fa-folder-open"></i></button>
		            </form>
					</td>
					</tr>
				<?php
				}
                ?>
				  </tbody>
                </table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>
			<?php $q = "SELECT * FROM nprint";
		$r = mysqli_query($conn,$q);
		$notot = mysqli_num_rows($r); ?>
		Certificates Printed Atleast Once: <?php echo $no ?> / <?php echo $notot ?>
		<?php 
	if(isset($_POST['search'])){
		$search = '%'.$_POST['search'].'%';
		$query = "SELECT DISTINCT email, name FROM nprint where (email LIKE '$search' OR name LIKE '$search')";
	}
	else{
		$query = "SELECT DISTINCT email, name FROM nprint";
	}
        $result = mysqli_query($conn,$query);
		$nums = mysqli_num_rows($result); 
		$i=1;
		?>
		<div class="float-right mb-2">
		<form class="form-inline d-inline mr-1 " action="statall.php" method="POST">
                            <input class="form-control mr-sm-2" type="search" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>"
							 name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
		 <form class="form-inline d-inline mr-1" action="statall.php" method="POST">
							<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cancel</button>
         </form>
		 </div>
		<?php	
		if($nums==0){ ?>
		   	<h3 class="text-danger">No Records Found!</h3>
		<?php 
		} 				
        while($res = mysqli_fetch_array($result)){
			if($i==1){
			?>
			<h5 class="text-danger float-left"><?php echo $msg ?></h5>

			        
					<div class="table-responsive">
					<table class="table table-light" bordercolor="#e4f834">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Email</th>
						<th scope="col">Name</th>
                        <th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
		<?php }	?>   
		            <tr>
					<th scope="row"><?php echo $i ?></th>
					<td><?php echo $res['email'] ?></td>
					<td><?php echo $res['name'] ?></td>
                    <td>
                    <form action="statall.php" method="POST" class="d-inline">
                            <input name="email" type="hidden" value='<?php echo $res['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $res['name'] ?>'>
							<button type="submit" value="Submit" title="Open Record" class="btn btn-primary btn-sm"><i class="far fa-folder-open"></i></button>
							<button type="button" title="Edit Record" class="btn btn-info d-inline btn-sm" data-toggle="modal" data-target="#editmain" data-name='<?php echo $res['name'] ?>' data-email='<?php echo $res['email'] ?>'><i class="fas fa-edit"></i></button>
		            </form>
                    <form class="d-inline" action="statall.php" method="POST" onsubmit="return confirm('********************************\nALERT!\n********************************\nYou are about to commit a change!\n⚫Click on OK to confirm.\n⚫Click on Cancel to exit.')">
							<input name="email" type="hidden" value='<?php echo $res['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $res['name'] ?>'>
							<button type="submit" name="option" value="Delall" title="Delete Record" class="btn btn-danger btn-sm my-1"><i class="fas fa-trash-alt"></i></button>
                     </form>
				
                    </td>
					</tr>
     
            <?php $i++;
        }
        ?>
                  <div class="modal fade" id="editmain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="statall.php" method="POST" id="edit" onsubmit="return confirm('********************************\nALERT!\n********************************\nYou are about to commit a change!\n⚫Click on OK to confirm.\n⚫Click on Cancel to exit.')">
                            <label for="nname"  class="col-form-label">Name:</label>
                            <input type="text" name="nname" class="form-control" id="main-name">
                            <label for="nemail" class="col-form-label">Email:</label>
                            <input type="email" name="nemail" class="form-control" id="main-email">
							<input name="oemail" type="hidden" id="dum-email">
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="edit" name="editmain" class="btn btn-primary">Update</button>
                        </div>
                        </div>
                    </div>
                    </div>
</tbody>
</table>
<script>
$('#editmain').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var oldn = button.data('name') // Extract info from data-* attributes
  var olde = button.data('email')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#main-name').val(oldn);
  modal.find('#main-email').val(olde);
  modal.find('#dum-email').val(olde);
})
</script>
