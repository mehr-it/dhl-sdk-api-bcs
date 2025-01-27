<?php

/**
 * See LICENSE.md for license details.
 */

declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Soap;

use Dhl\Sdk\Paket\Bcs\Exception\AuthenticationErrorException;
use Dhl\Sdk\Paket\Bcs\Exception\DetailedErrorException;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\CreateShipmentOrderRequest;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\CreateShipmentOrderResponse;
use Dhl\Sdk\Paket\Bcs\Model\DeleteShipment\DeleteShipmentOrderRequest;
use Dhl\Sdk\Paket\Bcs\Model\DeleteShipment\DeleteShipmentOrderResponse;
use Dhl\Sdk\Paket\Bcs\Model\ValidateShipment\ValidateShipmentOrderRequest;
use Dhl\Sdk\Paket\Bcs\Model\ValidateShipment\ValidateShipmentResponse;

abstract class AbstractClient
{
    /**
     * ValidateShipmentOrder is the operation call used to validate shipments before booking label and tracking number.
     *
     * @param ValidateShipmentOrderRequest $requestType
     *
     * @return ValidateShipmentResponse
     *
     * @throws AuthenticationErrorException
     * @throws DetailedErrorException
     * @throws \SoapFault
     */
    abstract public function validateShipment(ValidateShipmentOrderRequest $requestType): ValidateShipmentResponse;

    /**
     * CreateShipmentOrder is the operation call used to generate shipments with the relevant DHL Paket labels.
     *
     * @param CreateShipmentOrderRequest $requestType
     *
     * @return CreateShipmentOrderResponse
     *
     * @throws AuthenticationErrorException
     * @throws DetailedErrorException
     * @throws \SoapFault
     */
    abstract public function createShipmentOrder(CreateShipmentOrderRequest $requestType): CreateShipmentOrderResponse;

    /**
     * DeleteShipmentOrder is the operation call used to cancel created shipments.
     *
     * Note that cancellation is only possible before the end-of-the-day manifest.
     *
     * @param DeleteShipmentOrderRequest $requestType
     *
     * @return DeleteShipmentOrderResponse
     *
     * @throws AuthenticationErrorException
     * @throws DetailedErrorException
     * @throws \SoapFault
     */
    abstract public function deleteShipmentOrder(DeleteShipmentOrderRequest $requestType): DeleteShipmentOrderResponse;
}
