<?php

namespace app\components;

use yii\base\BaseObject;
use Stripe\Stripe;

class StripePayments extends BaseObject
{

	public $apiKey;

	public function __construct( $config = [] ) {
		parent::__construct( $config );
	}

	public function init() {
		parent::init();
		Stripe::setApiKey($this->apiKey);
	}

	public function createPaymentIntent($amount)
	{
		$paymentIntent = \Stripe\PaymentIntent::create([
			'amount' => $this->_formatAmount($amount),
			'currency' => 'usd'
		]);

		return $paymentIntent->client_secret;
	}

	protected function _formatAmount($amount)
	{
		return $amount * 100;
	}
}