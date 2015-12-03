@extends ('html')
@section ('content')
<form action="" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_aMlK26GLHcnoJIpjqhQspL4q"
    data-amount="2000"
    data-name="CareNation"
    data-description="Membership Sign Up"
    data-image="{{ URL::asset('images/logo.png') }}"
    data-locale="auto">
  </script>
</form>
@endsection

