<?php

require_once 'lib/PayPlug.php';

class PaymentFailureUnitTest extends PHPUnit_Framework_TestCase {
    public function testCreatePaymentFailureFromAttributes()
    {
        $paymentFailure = PayPlug_PaymentFailure::fromAttributes(array(
            'code'      => 'card_stolen',
            'message'   => 'The card is stolen.'
        ));

        $this->assertEquals('card_stolen', $paymentFailure->getAttribute('code'));
        $this->assertEquals('The card is stolen.', $paymentFailure->getAttribute('message'));
    }
}
