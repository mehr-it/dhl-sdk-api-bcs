<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Model\CreateShipment;

use Dhl\Sdk\Paket\Bcs\Model\Common\AbstractRequest;
use Dhl\Sdk\Paket\Bcs\Model\Common\Version;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentOrderType;

/**
 * CreateShipmentOrderRequest
 *
 * @package Dhl\Sdk\Paket\Bcs\Model\CreateShipment
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://choosealicense.com/licenses/mit/ The MIT License
 * @link    https://www.netresearch.de/
 */
class CreateShipmentOrderRequest extends AbstractRequest
{
    /**
     * ShipmentOrder is the highest parent element that contains all data with respect to one shipment order.
     *
     * @var ShipmentOrderType[] $ShipmentOrder
     */
    protected $ShipmentOrder;

    /**
     * Dial to determine label output format. Must be either 'URL' or 'B64'.
     *
     * It is possible to request an URL for receiving the label as PDF stream, or to request the label as base64encoded
     * binary data directly. If not defined by client, web service defaults to 'URL'.
     *
     * @var string $labelResponseType
     */
    protected $labelResponseType = null;

    /**
     * @var string $groupProfileName
     */
    protected $groupProfileName = null;

    /**
     * @var string $labelFormat
     */
    protected $labelFormat = null;

    /**
     * @var string $labelFormatRetoure
     */
    protected $labelFormatRetoure = null;

    /**
     * @var string $combinedPrinting
     */
    protected $combinedPrinting = null;

    /**
     * @var string $feederSystem
     */
    protected $feederSystem = null;

    /**
     * @param Version $version
     * @param ShipmentOrderType[] $shipmentOrders
     */
    public function __construct(Version $version, array $shipmentOrders)
    {
        $this->ShipmentOrder = $shipmentOrders;

        parent::__construct($version);
    }

    /**
     * @param string $labelResponseType
     * @return CreateShipmentOrderRequest
     */
    public function setLabelResponseType(string $labelResponseType): self
    {
        $this->labelResponseType = $labelResponseType;
        return $this;
    }

    /**
     * @param string $groupProfileName
     * @return CreateShipmentOrderRequest
     */
    public function setGroupProfileName(string $groupProfileName): self
    {
        $this->groupProfileName = $groupProfileName;
        return $this;
    }

    /**
     * @param string $labelFormat
     * @return CreateShipmentOrderRequest
     */
    public function setLabelFormat(string $labelFormat): self
    {
        $this->labelFormat = $labelFormat;
        return $this;
    }

    /**
     * @param string $labelFormatRetoure
     * @return CreateShipmentOrderRequest
     */
    public function setLabelFormatRetoure(string $labelFormatRetoure): self
    {
        $this->labelFormatRetoure = $labelFormatRetoure;
        return $this;
    }

    /**
     * @param string $combinedPrinting
     * @return CreateShipmentOrderRequest
     */
    public function setCombinedPrinting(string $combinedPrinting): self
    {
        $this->combinedPrinting = $combinedPrinting;
        return $this;
    }

    /**
     * @param string $feederSystem
     * @return CreateShipmentOrderRequest
     */
    public function setFeederSystem(string $feederSystem): self
    {
        $this->feederSystem = $feederSystem;
        return $this;
    }
}