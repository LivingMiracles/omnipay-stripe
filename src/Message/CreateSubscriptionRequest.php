<?php

/**
 * Stripe Create Subscription Request.
 */

namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Subscription Request
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/php#create_subscription
 */
class CreateSubscriptionRequest extends AbstractRequest
{
    /**
     * Get the plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->getParameter('plan');
    }

    /**
     * Set the plan
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest|CreateSubscriptionRequest
     */
    public function setPlan($value)
    {
        return $this->setParameter('plan', $value);
    }

    /**
     * Get the tax percent
     *
     * @return string
     */
    public function getTaxPercent()
    {
        return $this->getParameter('tax_percent');
    }


    /**
     * Get the the trial end timestamp
     *
     * @return int
     */
    public function getTrialEnd()
    {
        return $this->getParameter('trial_end');
    }

    /**
     * Set the trial end timestamp.
     *
     * @param int $value
     * @return \Omnipay\Common\Message\AbstractRequest|CreateSubscriptionRequest
     */
    public function setTrialEnd($value)
    {
        return $this->setParameter('trial_end', $value);
    }

    /**
     * Get the the description
     *
     * @return int
     */
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * Set the description.
     *
     * @param int $value
     * @return \Omnipay\Common\Message\AbstractRequest|CreateSubscriptionRequest
     */
    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    /**
     * Set the tax percentage
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest|CreateSubscriptionRequest
     */
    public function setTaxPercent($value)
    {
        return $this->setParameter('tax_percent', $value);
    }

    public function getData()
    {
        $this->validate('customerReference', 'plan');

        $data = array(
            'plan' => $this->getPlan()
        );

        if ($this->parameters->has('tax_percent')) {
            $data['tax_percent'] = (float)$this->getParameter('tax_percent');
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getTrialEnd()) {
            $data['trial_end'] = $this->getTrialEnd();
        }

        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }
        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/customers/'.$this->getCustomerReference().'/subscriptions';
    }
}
