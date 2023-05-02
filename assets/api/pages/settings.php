<hr><div class="page-title">
    <h1>S E T T I N G S</h1>
</div><hr>

<form action="?act=edit" method="POST" class="setting-form">
	<h2>Edit your information</h2><br>
	<div class="form-group">
		<div class="row">
		    <div class="col-xs-6 col-sm-6 col-md-6">
		    	<div class="form-group">
	            <input type="text" name="name" id="first_name" class="form-control input-sm" placeholder="Name">
		    	</div>
		    </div>
		</div>
		<div class = "row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<input type="text" name="surname" id="last_name" class="form-control input-sm" placeholder="Surname">
				</div>
			</div>
		</div>	
		<div class = "row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<input type="text" name="age" id="age" class="form-control input-sm" placeholder = "Age">
				</div>
			</div>
		</div>	
        <div class = "row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<input type="text" name="login" id="login" class="form-control input-sm" placeholder = "Login">
				</div>
			</div>
		</div>
        <div class = "row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<input type="text" name="email" id="email" class="form-control input-sm" placeholder = "Email">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="Change" class="change-btn"></input>
	</div>
	<button class="show-info-btn">
		<a href="#" id="show-info-btn">
			Show your old information
		</a>
	</button>
</form>	

<?php include "assets/api/list/old-info-modal.php"; ?>