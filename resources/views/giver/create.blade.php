<form action="{{ URL::route('care_givers.store') }}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="user_type" value="giver">
	{!! Form::token() !!}
	<div class="form-row">
		<label for="firstname">First Name</label>
		<input type="text" name="firstname">
	</div>
	<div class="form-row">
		<label for="lastname">Last Name</label>
		<input type="text" name="lastname">
	</div>
	<div class="form-row">
		<label for="email">Email</label>
		<input type="email" name="email">
	</div>
	<div class="form-row">
		<label for="email">Phone</label>
		<input type="text" name="phone">
	</div>
	<div class="form-row">	
		<label for="picture">Your Photo</label>
		<input type="file" name="picture">
	</div> 
	<div class="form-row">
		<label for="password">Password</label>
		<input type="password"　name="password">
	</div>
	<div class="form-row">
		<label for="confirm-password">Confirm Password</label>
		<input type="password"　name="confirm-password">
	</div>
	<div class="form-row">
		<input type="submit" value="Submit">
	</div>
</form>
