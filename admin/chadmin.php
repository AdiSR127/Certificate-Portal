
<button type="button" title="Change Admin Password" data-toggle="modal" data-target="#addadmin" class="btn btn-success"><i class="fas fa-users-cog"></i></button>

			<div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="addcerti" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addcerti">Manage Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="statall.php" method="POST" id="adminpass" onsubmit="return adminForm();">
						<label for="npwd"  class="col-form-label">New Password:</label>
						<input type="password" id="npwd" name="npwd" class="form-control" required>
						<label for="cnpwd"  class="col-form-label">Confirm New Password:</label>
						<input type="password"  id="cnpwd" name="cnpwd" class="form-control" required>
						<div id="adminmsg" class="text-danger"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="reset" form="adminpass" class="btn btn-secondary" >Clear</button>
					<button type="submit" form="adminpass" name="adminch" class="btn btn-primary">Change</button>
				</div>
				</div>
			</div>
			</div>
			<script>
			function adminForm() {    
				var pw1 = $("#npwd").val();  
				var pw2 = $("#cnpwd").val();
				if(pw1 != pw2){  
                 $("#adminmsg").html("**Passwords are not same");  
                 return false;  
                } 
			}
			</script>