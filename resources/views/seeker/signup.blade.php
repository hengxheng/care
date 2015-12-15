@extends ('html')
@section ('content')
<form id="subscription-form" action="{{ URL::route('seeker.upgrade') }}" method="POST" >
	{!! Form::token() !!}
	<input type="hidden" name="uid" value="{{ Auth::user()->id }}">
	<div class="payment-errors"></div>
	<div class="form-ele">
		<label for="subscription">Subscription plan: </label>
		<select name="subscription">
			<option value="001">$99.00/month</option>
			<option value="002">$237.60 for months</option>
			<option value="003">$445.50 for 6 months</option>
			<option value="004">$831.60 for 12 months</option>
		</select>
	</div>
	<div class="form-ele">
		<label for="ccn">Credit card number: </label>
		<input type="text" name="ccn" data-stripe="number">
	</div>
	<div class="form-ele">
		<label for="expiration">Expiration date: </label>
		<select name="month" data-stripe="exp-month">
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>
		/
		<select name="year" data-stripe="exp-year">
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
		</select>
	</div>

	<div class="form-ele">
		<label for="cvc">CVC number</label>
		<input type="text" name="cvc" data-stripe="cvc">
	</div>
	<div class="form-ele">
		<input id="subscript-submit" type="submit" value="SIGN UP">
	</div>

</form>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    Stripe.setPublishableKey('pk_test_aMlK26GLHcnoJIpjqhQspL4q');
    jQuery(function($) {
        $('#subscription-form').submit(function(event) {
            var $form = $(this);
            // Disable the submit button to prevent repeated clicks
            $form.find('#subscript-submit').prop('disabled', true);
            Stripe.card.createToken($form, stripeResponseHandler);
            // Prevent the form from submitting with the default action
            return false;
        });
    });
    var stripeResponseHandler = function(status, response) {
        var $form = $('#subscription-form');
        if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('#subscript-submit').prop('disabled', false);
        } else {
            // token contains id, last4, and card type
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and submit
            $form.get(0).submit();
        }
    };
</script>
@endsection

