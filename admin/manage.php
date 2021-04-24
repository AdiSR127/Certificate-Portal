<?php                
                $email = $_POST['email'];
				$query = "select * from nprint where email = '$email'";
				$result = mysqli_query($conn,$query);
				$nums = mysqli_num_rows($result); 
				$i=1; ?>
				<a href="/statall.php" class="nounderline"> <i class="fas fa-arrow-circle-left"></i> Back</a>
				<?php	
				if($nums==0){ ?>
					   <h3 class="text-danger">No Records Found!</h3>
				<?php 
				} 
				while($res = mysqli_fetch_array($result)){
					if($i==1){
					?>
							<div class="alert alert-primary mx-auto" role="alert">
							    <h5 class="text-danger float-right"><?php echo $msg ?></h5>
								Name: <b><?php echo $res['name'] ?></b> <br>
								Email: <b><?php echo $res['email'] ?></b>
							</div>
							<div class="table-responsive">
							<table class="table table-light" bordercolor="#e4f834">
							<thead>
								<tr>
								<th scope="col">#</th>
								<th scope="col">Event / Team</th>
								<th scope="col">Post</th>
								<th scope="col">Printed Copies</th>
								<th scope="col">Options</th>
								</tr>
							</thead>
							<tbody>
						   <tr>
				<?php 
				}  
				$print='None';
				if($res['printed']>0){
					$print= $res['printed'];
				}	
				?>   
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $res['event'] ?></td>
							<td><?php echo $res['post'] ?></td>
							<td><?php echo $print ?></td>
							<td>
							<form action="certificate.php" class="d-inline" method="POST" target="_blank">
                            <input name="name" type="hidden" value="<?php echo $res['name'] ?>">
                            <input name="event" type="hidden" value="<?php echo $res['event'] ?>">
							<input name="post" type="hidden" value="<?php echo $res['post'] ?>">
							<input name="id" type="hidden" value="<?php echo $res['id'] ?>">
							<input name="admin" type="hidden" value='admin'>
							<button type="submit" name="req" value="View" title="View without print count" class="btn btn-secondary btn-sm my-1"><i class="fas fa-eye"></i></button>
							</div>
		                   </form>

							<form class="d-inline" action="statall.php" method="POST" onsubmit="return confirm('********************************\nALERT!\n********************************\nYou are about to commit a change!\n⚫Click on OK to confirm.\n⚫Click on Cancel to exit.')">
							<input name="email" type="hidden" value='<?php echo $res['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $res['name'] ?>'>
							<input name="id" type="hidden" value='<?php echo $res['id'] ?>'>
							<input name="admin" type="hidden" value='admin'>
							<button type="submit" name="option" value="NoCopy" title="Erase Printing Data" class="btn btn-success btn-sm my-1"><i class="fas fa-eraser"></i></button>
							<button type="button" title="Edit Certificate" class="btn btn-info d-inline btn-sm" data-toggle="modal" data-target="#editmag" data-name='<?php echo $res['name'] ?>' data-email='<?php echo $res['email'] ?>' data-post='<?php echo $res['post'] ?>' data-event='<?php echo $res['event'] ?>' data-id='<?php echo $res['id'] ?>'><i class="fas fa-edit"></i></button>
							<button type="submit" name="option" value="Delete" title="Delete Certificate" class="btn btn-danger btn-sm my-1"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            

							
							</td>
							</tr>
							
					<?php $i++;
				}
?>
                           <div class="modal fade" id="editmag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Certificate</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form action="statall.php" method="POST" id="edit" onsubmit="return confirm('********************************\nALERT!\n********************************\nYou are about to commit a change!\n⚫Click on OK to confirm.\n⚫Click on Cancel to exit.')">
									<label for="nname"  class="col-form-label">Name:</label>
									<input type="text" name="nname" class="form-control" id="manage-name" readonly>
									<label for="nemail" class="col-form-label">Email:</label>
									<input type="email" name="nemail" class="form-control" id="manage-email" readonly>
									<label for="nevent" class="col-form-label">Event/Team:</label>
									<input type="text" list="eventlist" name="nevent" class="form-control" id="manage-event">
									<label for="npost" class="col-form-label">Post:</label>
									<input type="text" list="postlist" name="npost" class="form-control" id="manage-post">
									<input name="nid" type="hidden" id="nid">

								</form>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" form="edit" name="editmag" class="btn btn-primary">Update</button>
								</div>
								</div>
							</div>
							</div>
</tbody>
</table>
<script>
$('#editmag').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var oldn = button.data('name') // Extract info from data-* attributes
  var olde = button.data('email')
  var oldp = button.data('post')
  var oldev = button.data('event')
  var nid = button.data('id')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#manage-email').val(olde);
  modal.find('#manage-name').val(oldn);
  modal.find('#manage-post').val(oldp);
  modal.find('#manage-event').val(oldev);
  modal.find('#nid').val(nid);

})
</script>