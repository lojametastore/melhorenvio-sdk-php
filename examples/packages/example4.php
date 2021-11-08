<?php

require "vendor/autoload.php";

use MelhorEnvio\Shipment;
use MelhorEnvio\Enums\Service;
use MelhorEnvio\Enums\Environment;

// Create Shipment Instance
$shipment = new Shipment('', Environment::SANDBOX);

try {
    $service = $shipment->service();

    $services = $service->list();

}catch (Exception $exception) {
    //Proper exception context
}

print_r($services);
exit;
