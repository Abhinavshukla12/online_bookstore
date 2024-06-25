<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<h2 class="mb-4">Payment</h2>

<form action="<?= site_url('project/orders/process_payment') ?>" method="post" id="payment-form">
    <div class="form-row">
        <label for="card-element">
            Credit or debit card
        </label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('<?= $_ENV['STRIPE_PUBLIC_KEY'] ?>');

    var elements = stripe.elements();
    var cardElement = elements.create('card');

    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>

<?= $this->endSection() ?>
