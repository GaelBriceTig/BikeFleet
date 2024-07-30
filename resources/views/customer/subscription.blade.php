<x-app-layout>
    <div class="grid grid-cols-4">
        <div class="col-span-1">
            <div class="p-4 bg-white rounded-md">
                <h3 class="text-xl py-4">
                    Vous serons prélevés {{ number_format($plan->price, 2) }} € pour le plan {{ $plan->name }}
                </h3>
                <div class="card-body">
                    <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                        <div class="py-4">
                            <label for="">Nom</label>
                            <input type="text" name="name" id="card-holder-name" class="rounded p-2"
                                   value="" placeholder="Name on the card">
                        </div>
                        <div class="py-4">
                            <label for="">Numéro de carte</label>
                            <div id="card-element"></div>
                        </div>
                        <hr>
                        <div class="py-4">

                            <button type="submit" class="button" id="card-button"
                                    data-secret="{{ $intent->client_secret }}">Acheter
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card')
        cardElement.mount('#card-element')
        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')
        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const {setupIntent, error} = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if (error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
        })
    </script>
</x-app-layout>
