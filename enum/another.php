<?php

interface PaymentMethodGlobal
{
    public function getApiLabel();
}

class ApplePay implements PaymentMethodGlobal
{
    private string $code = 'apple-pay';

    public function getApiLabel(): string
    {
        return $this->code;
    }
}

class CreditCard implements PaymentMethodGlobal
{
    private string $code = 'credit-card';

    public function getApiLabel(): string
    {
        return $this->code;
    }
}

class AfterPay implements PaymentMethodGlobal
{
    private string $code = 'afterpay';

    public function getApiLabel(): string
    {
        return $this->code;
    }

    public function validateCountry(&$availability, $config): void
    {
        $availability = $config;
    }
}

enum PaymentMethods: string
{
    case ApplePay = 'ApplePay';
    case CreditCard = 'CreditCard';
    case Afterpay = 'AfterPay';

    /**
     * @return PaymentMethodGlobal mixed
     */
    public function getPayment(): PaymentMethodGlobal
    {
        return new $this->value;
    }

    public function isAvailable(): bool
    {
        $available = true;
        $method = $this->getPayment();
        switch ($this->value) {
            case 'AfterPay' :
                $method->validateCountry($available, false);
        }
        return $available;
    }
}

class TestEnv
{
    public function getPaymentLabel(PaymentMethods $paymentMethod)
    {
        return $paymentMethod->getPayment()->getApiLabel();
    }

    public function displayMethod(PaymentMethods $method)
    {
        $method->isAvailable() ? display() : hide();
    }
}

$program = new TestEnv();
$response = $program->getPaymentLabel(PaymentMethods::Afterpay);
$program->displayMethod(PaymentMethods::ApplePay);
print_r($response);

function display()
{
}

function hide()
{
}