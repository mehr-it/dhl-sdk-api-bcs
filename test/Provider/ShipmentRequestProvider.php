<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Test\Provider;

use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentOrderType;
use Dhl\Sdk\Paket\Bcs\RequestBuilder\ShipmentOrderRequestBuilder;

/**
 * Class ShipmentRequestProvider
 *
 * @package Dhl\Sdk\Paket\Bcs\Test
 * @author  Christoph Aßmann <christoph.assmann@netresearch.de>
 * @link    https://www.netresearch.de/
 */
class ShipmentRequestProvider
{
    /**
     * @return ShipmentOrderType[]
     */
    public static function createSingleShipmentSuccess()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '53113', 'Bonn', 'Charles-de-Gaulle-Straße', '20', 'Happy Customer');
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(2.4);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }

    /**
     * @return ShipmentOrderType[]
     */
    public static function createMultiShipmentSuccess()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();

        $requestBuilder->setSequenceNumber('0');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '53113', 'Bonn', 'Charles-de-Gaulle-Straße', '20', 'John Doe');
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(2.4);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        $requestBuilder->setSequenceNumber('1');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '53113', 'Bonn', 'Sträßchensweg', '2', 'Jane Doe');
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(1.125);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }

    /**
     * wrong address and "print only if codeable" is active.
     *
     * @return ShipmentOrderType[]
     */
    public static function createMultiShipmentPartialSuccess()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();

        $requestBuilder->setPrintOnlyIfCodeable(true);
        $requestBuilder->setSequenceNumber('0');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '53113', 'Bonn', 'Charles-de-Gaulle-Straße', '20', 'John Doe');
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(2.4);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        $requestBuilder->setPrintOnlyIfCodeable(true);
        $requestBuilder->setSequenceNumber('1');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '04229', 'Bonn', 'Sträßchensweg', '2', 'Jane Doe'); // wrong zip code
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(1.125);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }

    /**
     * wrong address but "print only if codeable" is not active.
     *
     * @return ShipmentOrderType[]
     */
    public static function createShipmentsValidationWarning()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();

        $requestBuilder->setSequenceNumber('0');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '53113', 'Bonn', 'Charles-de-Gaulle-Straße', '20', 'John Doe');
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(2.4);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        $requestBuilder->setSequenceNumber('1');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '04229', 'Bonn', 'Sträßchensweg', '2', 'Jane Doe'); // wrong zip code
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(1.125);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }

    /**
     * wrong address and "print only if codeable" is active.
     *
     * @return ShipmentOrderType[]
     */
    public static function createSingleShipmentError()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();

        $requestBuilder->setPrintOnlyIfCodeable(true);
        $requestBuilder->setSequenceNumber('0');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '04229', 'Bonn', 'Sträßchensweg', '2', 'Jane Doe'); // wrong zip code
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(1.125);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }

    /**
     * wrong address and "print only if codeable" is active.
     *
     * @return ShipmentOrderType[]
     */
    public static function createMultiShipmentError()
    {
        $shipmentOrders = [];
        $tsShip = time() + 60 * 60 * 24; // tomorrow

        $requestBuilder = new ShipmentOrderRequestBuilder();

        $requestBuilder->setPrintOnlyIfCodeable(true);
        $requestBuilder->setSequenceNumber('0');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '04229', 'Bonn', 'Charles-de-Gaulle-Straße', '20', 'John Doe'); // wrong zip code
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(2.4);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        $requestBuilder->setPrintOnlyIfCodeable(true);
        $requestBuilder->setSequenceNumber('1');
        $requestBuilder->setShipperAccount('22222222220101');
        $requestBuilder->setShipperAddress('DE', '04229', 'Leipzig', 'Nonnenstraße', '11d', 'Netresearch GmbH & Co.KG');
        $requestBuilder->setRecipientAddress('DE', '04229', 'Bonn', 'Sträßchensweg', '2', 'Jane Doe'); // wrong zip code
        $requestBuilder->setShipmentDetails('V01PAK', date('Y-m-d', $tsShip));
        $requestBuilder->setPackageDetails(1.125);
        $shipmentOrder = $requestBuilder->create();
        $shipmentOrders[]= $shipmentOrder;

        return $shipmentOrders;
    }
}