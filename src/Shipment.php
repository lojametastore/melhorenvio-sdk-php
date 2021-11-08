<?php

namespace MelhorEnvio;

use MelhorEnvio\Resources\Base;
use MelhorEnvio\Resources\Shipment\Calculator;
use MelhorEnvio\Resources\Shipment\Service;

class Shipment extends Base
{
    /**
     * @return Calculator
     */
    public function calculator()
    {
        return new Calculator($this);
    }

    /**
     * @return Service()
     */
    public function service()
    {
        return new Service($this);
    }
}
