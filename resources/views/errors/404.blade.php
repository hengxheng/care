@extends('html')


@section('content')

<div class="error-page" style="text-align:center;">
	<p><img src="{{ URL::asset('images/sign-error-icon.png') }}" alt="" style="width:50px;"></p>
	<p style="font-size: 18px;"><span style="font-size: 30px;font-weight: bold;">Oops!</span> That page can't be found.</p>
	<p style="font-size: 14px;">Please <a href="http://www.carenation.com.au/">click here</a> to go back to our homepage or <a href="https://app.carenation.com.au">click here</a> to login to our portal.<p>
</div>


<style>
.page-main{
    min-height: 500px !important;
}
</style>
@endsection
