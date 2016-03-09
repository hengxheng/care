@extends ('html')

@section('pageType', 'seeker-payment')
@endsection

@section ('content')
<div class="register-block">
<form id="subscription-form" action="{{ URL::route('seeker.upgrade') }}" method="POST" >
	{!! Form::token() !!}
	<input type="hidden" name="uid" value="{{ Auth::user()->id }}">
	<div class="payment-errors"></div>
<!-- 	<div class="form-row">
		<label for="subscription">Subscription plan: </label>
		<select name="subscription">
			<option value="001">$99.00/month</option>
			<option value="002">$237.60 for months</option>
			<option value="003">$445.50 for 6 months</option>
			<option value="004">$831.60 for 12 months</option>
		</select>
	</div> -->
	<div class="form-row payment-plan">
		<h2>Choose your package</h2>
		<div class="col-4">
			<div class="plans">
				<div class="plan-option">
					<input id="op1" type="radio" name="subscription" value="001" required>
				</div>
				<a href="#" onclick=" $('#op1').prop('checked',true);return false;">
				<div class="plan-content">
					<h2><span class="dollar-sign">$</span>99</h2>
					<h3>per month</h3>
					<ul>
						<li>Billed monthly</li>
						<li>Unlimited Secure<br/>Private Messages</li>
						<li>Unlimited Job Listings</li>
					</ul>
				</div>
				</a>
			</div>
		</div>
		<div class="col-4">
			<div class="plans">
				<div class="plan-option">
					<input id="op2" type="radio" name="subscription" value="002">
				</div>
				<a href="#" onclick=" $('#op2').prop('checked',true);return false;">
				<div class="plan-content">
					<h2><span class="dollar-sign">$</span>237.60</h2>
					<h3>for 3 months</h3>
					<ul>
						<li>One-off payment</li>
						<li>Unlimited Secure<br/>Private Messages</li>
						<li>Unlimited Job Listings</li>
					</ul>

					<h4>Save 20%</h4>
				</div>
				</a>
			</div>
		</div>
		<div class="col-4">
			<div class="plans">
				<div class="plan-option">
					<input id="op3" type="radio" name="subscription" value="003">
				</div>
				<a href="#" onclick=" $('#op3').prop('checked',true);return false;">
				<div class="plan-content">
					<h2><span class="dollar-sign">$</span>445.50</h2>
					<h3>for 6 months</h3>
					<ul>
						<li>One-off payment</li>
						<li>Unlimited Secure<br/>Private Messages</li>
						<li>Unlimited Job Listings</li>
					</ul>

					<h4>Save 25%</h4>
				</div>
				</a>
			</div>
		</div>
		<div class="col-4">
			<div class="plans">
				<div class="plan-option">
					<input id="op4" type="radio" name="subscription" value="004">
				</div>
				<a href="#" onclick=" $('#op4').prop('checked',true);return false;">
				<div class="plan-content">
					<h2><span class="dollar-sign">$</span>831.60</h2>
					<h3>for 12 months</h3>
					<ul>
						<li>One-off payment</li>
						<li>Unlimited Secure<br/>Private Messages</li>
						<li>Unlimited Job Listings</li>
					</ul>

					<h4>Save 30%</h4>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="form-row">
		<label for="ccn">Credit card number: </label>
		<div><img src="{{ URL::asset('images/logo-stripe.png') }}" alt="" style="width: 200px;margin:5px 0;"></div>
		<input type="text" name="ccn" data-stripe="number" required pattern="[0-9]{13,16}">
	</div>
	<div class="form-row-2">
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

	<div class="form-row-2">
		<label for="cvc">CVC number</label>
		<input type="text" name="cvc" data-stripe="cvc">
	</div>
	<div class="form-row">
		<input id="subscript-submit" type="submit" value="Sign Up">
	</div>

</form>
</div>

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

