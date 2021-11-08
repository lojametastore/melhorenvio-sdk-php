<?php

namespace MelhorEnvio\Resources\Shipment;

use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use MelhorEnvio\Exceptions\ServiceException;
use MelhorEnvio\Resources\Resource;

class Service
{
    /**
     * @var array
     */
    protected $payload = [];

    /**
     * @var Resource
     */
    protected $resource;

    /**
     * New Calculate instance.
     * @param $resource
     * @throws InvalidArgumentException
     */
    public function __construct($resource)
    {
        if (! $resource instanceof Resource) {
            throw new InvalidResourceException;
        }

        $this->resource = $resource;
    }

    /**
     * @throws ServiceException
     */
    public function list()
    {
        try {
            $response = $this->resource->getHttp()->get('me/shipment/services', [
                'json' => $this->payload,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (ClientException $exception) {
            throw new ServiceException($exception);
        }
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->getPayload());
    }
}
