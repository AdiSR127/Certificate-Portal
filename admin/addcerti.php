<button type="button" title="Add New Certificate" class="btn btn-primary" data-toggle="modal" data-target="#addcerti" data-whatever="@getbootstrap"><i class="fas fa-plus"></i></button>

			<div class="modal fade" id="addcerti" tabindex="-1" role="dialog" aria-labelledby="addcerti" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addcerti">New Certificate</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="statall.php" method="POST" id="add" >
				
						<label for="name"  class="col-form-label">Name:</label>
						<input type="text" name="name" class="form-control" id="add-name" value='<?php echo $name ?>'>
						<label for="email" class="col-form-label">Email:</label>
						<input type="email" name="email" class="form-control" id="add-email" value='<?php echo $email ?>'>
						<label for="event"  class="col-form-label">Event / Team:</label>
						<input type="text" list="eventlist" name="event" class="form-control" id="add-event">
						<label for="post"  class="col-form-label">Post:</label>
						<input type="text" list="postlist" name="post" class="form-control" id="add-post" >
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" form="add" name="add" class="btn btn-primary">Add</button>
				</div>
				</div>
			</div>
			</div>