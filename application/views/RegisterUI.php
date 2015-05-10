<script>
function myFunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("pass_confirm").value;
    var ok = true;
    if (pass1 != "") {
        //alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("pass_confirm").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}

</script>

<div class="container">
	<div class="row" style="margin-top: 100px;">

			<div class="col-lg-12">

				<div class="tuffyh2a admintitle">Register New Account</div>
				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post', 'onsubmit' => 'return myFunction()');
				echo form_open('RegisterCtr/addMember', $attributes); ?>
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Name <span class="req">*</span></label>
  						<input class="form-control" type="text" value="" id="name" name="name" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Username <span class="req">*</span></label>
  						<input class="form-control" type="text"value="" id="username" name="username" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">E-mail <span class="req">*</span></label>
  						<input class="form-control" type="email"  value="" id="email" name="email" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password <span class="req">*</span></label>
  						<input class="form-control" type="password" value="" id="password" name="password" required>
				      <br></div>
				    </div>
					<br>
					
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password Confirmation <span class="req">*</span></label>
  						<input class="form-control" type="password" value="" id="pass_confirm" name="pass_confirm" required>
				      <br></div>
				    </div>
					<br>
				  
				    <br><br>

				    <input class="btn btn-warning" type="submit"></input>
				    <?php echo form_close(); ?>
			</div>
		</div>
</div>
