<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Model\CreateShipment\ResponseType;

/**
 * CreationState
 *
 * @package Dhl\Sdk\Paket\Bcs\Model\CreateShipment
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://choosealicense.com/licenses/mit/ The MIT License
 * @link    https://www.netresearch.de/
 */
class CreationState
{
    /**
     * Identifier for ShipmentOrder set by client application in CreateShipment request.
     *
     * @var string|null $sequenceNumber
     */
    protected $sequenceNumber;

    /**
     * Can contain any DHL shipment number.
     *
     * @var string|null $shipmentNumber
     */
    protected $shipmentNumber = null;

    /**
     * Can contain any DHL shipment number.
     *
     * @var string|null $returnShipmentNumber
     */
    protected $returnShipmentNumber = null;

    /**
     * For successful operations, a shipment number is created and returned. Depending on the invoked product.
     *
     * @var LabelData $LabelData
     */
    protected $LabelData;

    /**
     * @return string
     */
    public function getSequenceNumber(): string
    {
        return $this->sequenceNumber;
    }

    /**
     * @return string
     */
    public function getShipmentNumber()
    {
        return $this->shipmentNumber;
    }

    /**
     * @return string
     */
    public function getReturnShipmentNumber()
    {
        return $this->returnShipmentNumber;
    }

    /**
     * @return LabelData
     */
    public function getLabelData(): LabelData
    {
        return $this->LabelData;
    }
}