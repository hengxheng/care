@extends ('admin.master')
@section ('content')
<div class="profile-block">
	<div class="row">
		<div class="col-1">
			<div class="profile-image block">
				<img src="{{ URL::asset('images/user/'.$the_seeker -> picture) }}" alt="">
			</div>
			<div class="profile-info">
				<h2 class="profile-name">
					{{ $the_user->firstname }} {{ $the_user -> lastname }}
				</h2>		
				@if (Auth::user()->user_type == 'admin')
					<div class="user-status">			
							<label for="status">User Status: </label>
							<select name="status" id="user-status">
								<option value="{{ $the_user->status }}">{{ $the_user->status }}</option>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
					</div>
				@endif			
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-1">
			<div class="profile-contact block">
				<h2 class="block-title">Contact 
					@if ( Auth::user()->id == $the_user->id )
					<a class="edit-btn" href="{{ URL::route('care_seekers.edit', array('id'=>$the_user->id)) }}">Edit</a>
					@endif
				</h2>
				<div class="block-content">
					<p>Email: {{ $the_user -> email }}</p>
					<p>Phone: {{ $the_user -> phone }}</p>
					<p>Address: {{ $the_seeker -> address1 }}</p>
					<p>Address2: {{ $the_seeker -> address2 }}</p>
					<p>Suburb: {{ $the_seeker -> suburb }}</p>
					<p>State: {{ $the_seeker -> state }}</p>
					<p>Postcode: {{ $the_seeker -> postcode }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-1">
		<a class="dark-blue-btn" href="{{ URL::previous() }}">&lt; Back</a>
	</div>
</div>
<script>
	$(function(){
		$("#user-status").change(function(){
			var v = $(this).val();
			$.ajax({
					type: 'POST',
					url: "{{ URL::route('changeUserStatus') }}",
					data: { 
							"_token" : "{{ Session::token()}}",
							"uid" : {{ $the_user->id }},
							"status": $(this).val()
					},
					success: function(result){
						console.log(result);
					}
			});
		});
	});
</script>
@endsection