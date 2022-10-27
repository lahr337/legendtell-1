<?php
namespace App\Classes;
use App\Models\Payment;
use App\Models\PaymentCard;

class StripePayment
{
    public static function addPaymentMethod($user, $input)
    {
        StripePayment::createCustomerIfNot($user);
        $card = $payment_card = [];
        if($input['payment_source'] == 'new' && PaymentCard::where('card_number', $input['card_number'])->first() == null){
            $card = StripePayment::createCard($user, $input);
            if(isset($card['id'])){
                $payment_card = PaymentCard::create([
                    'user_id'           =>  auth()->user()->id,
                    'customer_id'       =>  $user->stripe_customer_id,
                    'card_number'       =>  $input['card_number'],
                    'card_id'           =>  $card['id'],
                ]);

                if($user->stripe_default_card_id == null) {
                    $user->update(['stripe_default_card_id' => $card['id'] ]);
                }
            }
        }

        return [
            'card'          => $card,
            'payment_card'  => $payment_card,
        ];
    }

    public static function charge($user, $input, $plan){
        $charge = \Stripe::charges()->create([
            'customer' => $user->stripe_customer_id,
            'currency' => 'USD',
            'amount'   => $plan->price,
        ]);

        if(Payment::create([
            'charge_id'     =>  $charge['id'],
            'amount'        =>  $plan->price,
            'plan_id'       =>  $plan->id,
            'user_id'       =>  $user->id,
        ])){
            $user->update([
                'plan_id' => $input['plan_id'],
                'purchased_reports' => $user->purchased_reports + $plan->allow_reports
            ]);
            return true;
        }
        return false;
    }

    public static function createCustomerIfNot($user){
        // dd($user->stripe_customer_id);
        if($user->stripe_customer_id == null){
            // add user as customer on stripe
            $customer = \Stripe::customers()->create([
                'email'     => $user->email,
                'name'      => $user->name,
            ]);

            $user->update(['stripe_customer_id' => $customer['id']]);
        }
    }

    public static function createCard($user, $input){
        if($user->stripe_customer_id != null){
            $token = \Stripe::tokens()->create([
                'card' => [
                    'number'        => $input['card_number'],
                    'exp_month'     => $input['exp_month'],
                    'cvc'           => $input['cvc'],
                    'exp_year'      => $input['exp_year'],
                ]
            ]);

            $card = \Stripe::cards()->create($user->stripe_customer_id, $token['id']);

            $card = \Stripe::cards()->update($user->stripe_customer_id, $card['id'], [
                "address_city"          => $input['city'],
                "address_country"       => $input['country'],
                "address_line1"         => $input['billing_address1'],
                "address_line2"         => $input['billing_address2'],
                "address_zip"           => $input['zipcode'],
                "address_state"         => $input['state'],
                "name"                  => $input['cardholder_name'],
            ]);

            return $card;
        }
    }

    public static function getDefaultCard()
    {
        $user = auth()->user();

        $card = \Stripe::cards()->find($user->stripe_customer_id, $user->stripe_default_card_id);

        return $card;

    }
}