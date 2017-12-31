Stripe.setPublishableKey('YOUR_STRIPE_PUBLISHABLE_KEY');


var $form=$('#payment-form');

$form.submit(function(event){
    $('payment-error').addClass('hidden');
    $form.find('button').prop('disabled', false); // Disable submission

    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val()
      }, stripeResponseHandler);
      return false;
});




  function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#payment-form');
    
      if (response.error) { // Problem!
    
        // Show the errors on the form
        $('#payment-error').removeClass('hidden');
        $form.find('#payment-error').text(response.error.message);
        $form.find('button').prop('disabled', false); // Re-enable submission
    
      } else { // Token was created!
    
        // Get the token ID:
        var token = response.id;
    
        // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    
        // Submit the form:
        $form.get(0).submit();
    
      }
    }