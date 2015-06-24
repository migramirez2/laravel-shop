<?php

namespace Amsgames\LaravelShop\Core;

/**
 * This file is part of LaravelShop,
 * A shop solution for Laravel.
 *
 * @author Alejandro Mostajo
 * @copyright Amsgames, LLC
 * @license MIT
 * @package Amsgames\LaravelShop
 */

use JsonSerializable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Amsgames\LaravelShop\Contracts\PaymentGatewayInterface;

abstract class PaymentGateway implements PaymentGatewayInterface, Arrayable, Jsonable, JsonSerializable
{
    /**
     * Gateway Id, set by shop.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Constructor.
     *
     * @param mixed $if Gateway id.
     */
    public function __construct($id = '')
    {
        $this->id = $id;
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return ['id' => $this->id];
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }


}