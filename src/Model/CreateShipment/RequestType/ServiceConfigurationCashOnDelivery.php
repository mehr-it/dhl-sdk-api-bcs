<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType;

/**
 * ServiceConfigurationCashOnDelivery
 *
 * @package Dhl\Sdk\Paket\Bcs\Model\CreateShipment
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://choosealicense.com/licenses/mit/ The MIT License
 * @link    https://www.netresearch.de/
 */
class ServiceConfigurationCashOnDelivery
{
    /**
     * Indicates, if the option is on/off.
     *
     * @var bool $active
     */
    protected $active;

    /**
     * Money amount to be collected. Mandatory if COD is chosen.
     *
     * @var float $codAmount
     */
    protected $codAmount;

    /**
     * Configuration whether the transmission fee to be added to the COD amount or not by DHL.
     *
     * @var bool|null $addFee
     */
    protected $addFee;

    /**
     * @param bool $active
     * @param float $codAmount
     */
    public function __construct(bool $active, float $codAmount)
    {
        $this->active = $active;
        $this->codAmount = $codAmount;
    }

    /**
     * @param bool|null $addFee
     */
    public function setAddFee(bool $addFee = null)
    {
        $this->addFee = $addFee;
    }
}