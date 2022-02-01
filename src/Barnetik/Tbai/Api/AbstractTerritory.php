<?php

namespace Barnetik\Tbai\Api;

use Barnetik\Tbai\Api\ApiRequestInterface;
use Barnetik\Tbai\TicketBai;

abstract class AbstractTerritory implements EndpointInterface
{
    const SUBMIT_ENDPOINT = '';
    const SUBMIT_ENDPOINT_DEV = '';

    protected bool $dev;

    public function __construct(bool $dev = false)
    {
        $this->dev = $dev;
    }

    protected function getSubmitEndpoint(): string
    {
        if ($this->dev) {
            return static::SUBMIT_ENDPOINT_DEV;
        }

        return static::SUBMIT_ENDPOINT;
    }

    abstract public function headers(ApiRequestInterface $apiRequest, string $dataFile): array;
    abstract public function createSubmitInvoiceRequest(TicketBai $ticketBai): ApiRequestInterface;
}
