var stripe = Stripe('pk_test_YkBIhMoaSkoVRkXbeFA54qwJ00L4xqP6x1');
var elements = stripe.elements();

Stripe.card.createToken({
    number
})
