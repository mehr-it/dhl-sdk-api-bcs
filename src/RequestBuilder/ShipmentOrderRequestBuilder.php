<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\RequestBuilder;

use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\BankType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\CommunicationType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\CountryType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ExportDocPosition;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ExportDocumentType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\Ident;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\NameType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\NativeAddressType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\PackStationType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\PostfilialeType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ReceiverNativeAddressType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ReceiverType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfiguration;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationAdditionalInsurance;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationCashOnDelivery;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationDateOfDelivery;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationDeliveryTimeFrame;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationDetails;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationDetailsOptional;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationEndorsement;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationIC;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationISR;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationShipmentHandling;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ServiceConfigurationVisualAgeCheck;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\Shipment;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentDetailsTypeType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentItemType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentNotificationType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentOrderType;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipmentService;
use Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType\ShipperType;

/**
 * CreateShipmentRequestBuilder
 *
 * @package Dhl\Sdk\Paket\Bcs\Serializer
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://choosealicense.com/licenses/mit/ The MIT License
 * @link    https://www.netresearch.de/
 */
class ShipmentOrderRequestBuilder
{
    /**
     * The collected data used to build the request
     *
     * @var mixed[]
     */
    private $data = [];

    /**
     * @param string $sequenceNumber
     * @return ShipmentOrderRequestBuilder
     */
    public function setSequenceNumber(string $sequenceNumber): ShipmentOrderRequestBuilder
    {
        $this->data['sequenceNumber'] = $sequenceNumber;

        return $this;
    }

    /**
     * @param bool $printOnlyIfCodeable
     * @return ShipmentOrderRequestBuilder
     */
    public function setPrintOnlyIfCodeable(bool $printOnlyIfCodeable): ShipmentOrderRequestBuilder
    {
        $this->data['printOnlyIfCodeable'] = $printOnlyIfCodeable;

        return $this;
    }

    /**
     * Set shipper account (required).
     *
     * @param string $accountNumber
     * @param string|null $returnAccountNumber Provide if return label should included with response.
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipperAccount(
        string $accountNumber,
        string $returnAccountNumber = null
    ): ShipmentOrderRequestBuilder {
        $this->data['shipper']['account'] = $accountNumber;
        $this->data['shipper']['returnAccount'] = $returnAccountNumber;

        return $this;
    }

    /**
     * Set shipper address (optional).
     *
     * The shipper address is already stored in GKP but may be overridden if necessary.
     *
     * @see setShipperReference
     *
     * @param string $country
     * @param string $postalCode
     * @param string $city
     * @param string $streetName
     * @param string $streetNumber
     * @param string $company
     * @param string|null $name
     * @param string|null $nameAddition
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $contactPerson
     * @param string|null $state
     * @param string|null $dispatchingInformation
     * @param string[] $addressAddition
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipperAddress(
        string $country,
        string $postalCode,
        string $city,
        string $streetName,
        string $streetNumber,
        string $company,
        string $name = null,
        string $nameAddition = null,
        string $email = null,
        string $phone = null,
        string $contactPerson = null,
        string $state = null,
        string $dispatchingInformation = null,
        array $addressAddition = []
    ): ShipmentOrderRequestBuilder {
        $this->data['shipper']['address']['country'] = $country;
        $this->data['shipper']['address']['postalCode'] = $postalCode;
        $this->data['shipper']['address']['city'] = $city;
        $this->data['shipper']['address']['streetName'] = $streetName;
        $this->data['shipper']['address']['streetNumber'] = $streetNumber;
        $this->data['shipper']['address']['company'] = $company;
        $this->data['shipper']['address']['name'] = $name;
        $this->data['shipper']['address']['nameAddition'] = $nameAddition;
        $this->data['shipper']['address']['email'] = $email;
        $this->data['shipper']['address']['phone'] = $phone;
        $this->data['shipper']['address']['contactPerson'] = $contactPerson;
        $this->data['shipper']['address']['state'] = $state;
        $this->data['shipper']['address']['dispatchingInformation'] = $dispatchingInformation;
        $this->data['shipper']['address']['addressAddition'] = $addressAddition;

        return $this;
    }

    /**
     * @param string $accountOwner
     * @param string $bankName
     * @param string $iban
     * @param string|null $bic
     * @param string|null $accountReference
     * @param string[] $notes
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipperBankData(
        string $accountOwner,
        string $bankName,
        string $iban,
        string $bic = null,
        string $accountReference = null,
        array $notes = []
    ): ShipmentOrderRequestBuilder {
        $this->data['shipper']['bankData']['owner'] = $accountOwner;
        $this->data['shipper']['bankData']['bankName'] = $bankName;
        $this->data['shipper']['bankData']['iban'] = $iban;
        $this->data['shipper']['bankData']['bic'] = $bic;
        $this->data['shipper']['bankData']['accountReference'] = $accountReference;
        $this->data['shipper']['bankData']['notes'] = $notes;

        return $this;
    }


    /**
     * Set return address (optional).
     *
     * Return address will be discarded if no return billing number is given.
     *
     * @param string $country
     * @param string $postalCode
     * @param string $city
     * @param string $streetName
     * @param string $streetNumber
     * @param string $company
     * @param string|null $name
     * @param string|null $nameAddition
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $contactPerson
     * @param string|null $state
     * @param string|null $dispatchingInformation
     * @param string[] $addressAddition
     * @return ShipmentOrderRequestBuilder
     */
    public function setReturnAddress(
        string $country,
        string $postalCode,
        string $city,
        string $streetName,
        string $streetNumber,
        string $company,
        string $name = null,
        string $nameAddition = null,
        string $email = null,
        string $phone = null,
        string $contactPerson = null,
        string $state = null,
        string $dispatchingInformation = null,
        array $addressAddition = []
    ): ShipmentOrderRequestBuilder {
        $this->data['return']['address']['country'] = $country;
        $this->data['return']['address']['postalCode'] = $postalCode;
        $this->data['return']['address']['city'] = $city;
        $this->data['return']['address']['streetName'] = $streetName;
        $this->data['return']['address']['streetNumber'] = $streetNumber;
        $this->data['return']['address']['company'] = $company;
        $this->data['return']['address']['name'] = $name;
        $this->data['return']['address']['nameAddition'] = $nameAddition;
        $this->data['return']['address']['email'] = $email;
        $this->data['return']['address']['phone'] = $phone;
        $this->data['return']['address']['contactPerson'] = $contactPerson;
        $this->data['return']['address']['state'] = $state;
        $this->data['return']['address']['dispatchingInformation'] = $dispatchingInformation;
        $this->data['return']['address']['addressAddition'] = $addressAddition;

        return $this;
    }

    /**
     * Set consignee address for a shipment (required).
     *
     * @param string $country
     * @param string $postalCode
     * @param string $city
     * @param string $streetName
     * @param string $streetNumber
     * @param string $name
     * @param string|null $company
     * @param string|null $nameAddition
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $contactPerson
     * @param string|null $state
     * @param string|null $dispatchingInformation
     * @param string[] $addressAddition
     * @return ShipmentOrderRequestBuilder
     */
    public function setRecipientAddress(
        string $country,
        string $postalCode,
        string $city,
        string $streetName,
        string $streetNumber,
        string $name,
        string $company = null,
        string $nameAddition = null,
        string $email = null,
        string $phone = null,
        string $contactPerson = null,
        string $state = null,
        string $dispatchingInformation = null,
        array $addressAddition = []
    ): ShipmentOrderRequestBuilder {
        $this->data['recipient']['address']['country'] = $country;
        $this->data['recipient']['address']['postalCode'] = $postalCode;
        $this->data['recipient']['address']['city'] = $city;
        $this->data['recipient']['address']['streetName'] = $streetName;
        $this->data['recipient']['address']['streetNumber'] = $streetNumber;
        $this->data['recipient']['address']['name'] = $name;
        $this->data['recipient']['address']['company'] = $company;
        $this->data['recipient']['address']['nameAddition'] = $nameAddition;
        $this->data['recipient']['address']['email'] = $email;
        $this->data['recipient']['address']['phone'] = $phone;
        $this->data['recipient']['address']['contactPerson'] = $contactPerson;
        $this->data['recipient']['address']['state'] = $state;
        $this->data['recipient']['address']['dispatchingInformation'] = $dispatchingInformation;
        $this->data['recipient']['address']['addressAddition'] = $addressAddition;

        return $this;
    }

    /**
     * Enable sending recipient notifications by email after successful manifesting of shipment.
     *
     * @param string $email
     * @return ShipmentOrderRequestBuilder
     */
    public function setRecipientNotification(string $email): ShipmentOrderRequestBuilder
    {
        $this->data['recipient']['notification'] = $email;

        return $this;
    }

    /**
     * Set shipment details (required).
     *
     * Possible product code values:
     * - V01PAK
     * - V53WPAK
     * - V54EPAK
     * - V06PAK
     * - V06TG
     * - V06WZ
     * - V86PARCEL
     * - V87PARCEL
     * - V82PARCEL
     *
     * @param string $productCode Product to be ordered.
     * @param string $cetDate Date in CET.
     * @param string|null $shipmentReference
     * @param string|null $returnReference
     * @param string|null $costCentre
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipmentDetails(
        string $productCode,
        string $cetDate,
        string $shipmentReference = null,
        string $returnReference = null,
        string $costCentre = null
    ): ShipmentOrderRequestBuilder {

        $this->data['shipmentDetails']['product'] = $productCode;
        $this->data['shipmentDetails']['date'] = $cetDate;
        $this->data['shipmentDetails']['shipmentReference'] = $shipmentReference;
        $this->data['shipmentDetails']['returnReference'] = $returnReference;
        $this->data['shipmentDetails']['costCentre'] = $costCentre;

        return $this;
    }

    /**
     * Set package details.
     *
     * @param float $weight Weight in KG
     * @param float $insuredValue The amount the package should be insured with. Omit if standard amount is sufficient.
     * @return ShipmentOrderRequestBuilder
     */
    public function setPackageDetails(
        float $weight,
        float $insuredValue = null
    ): ShipmentOrderRequestBuilder {
        $this->data['packageDetails']['weight'] = $weight;
        $this->data['packageDetails']['insuredValue'] = $insuredValue;

        return $this;
    }


    /**
     * Set COD amount (optional).
     *
     * @param float $codAmount Money amount to be collected.
     * @param bool $addFee Indicate whether or not transmission fee should be added to the COD amount automatically.
     * @return ShipmentOrderRequestBuilder
     */
    public function setCodAmount(float $codAmount, bool $addFee = null): ShipmentOrderRequestBuilder
    {
        $this->data['packageDetails']['codAmount'] = $codAmount;
        $this->data['packageDetails']['addCodFee'] = $addFee;

        return $this;
    }

    /**
     * Set package dimensions.
     *
     * @param float $width Width in cm
     * @param float $length Length in cm
     * @param float $height Height in cm
     * @return ShipmentOrderRequestBuilder
     */
    public function setPackageDimensions(
        float $width,
        float $length,
        float $height
    ): ShipmentOrderRequestBuilder {
        $this->data['packageDetails']['dimensions']['width'] = $width;
        $this->data['packageDetails']['dimensions']['length'] = $length;
        $this->data['packageDetails']['dimensions']['height'] = $height;

        return $this;
    }

    /**
     * Choose Packstation delivery.
     *
     * @param string $packstationNumber
     * @param string $postalCode
     * @param string $city
     * @param string|null $postNumber
     * @param string|null $state
     * @param string|null $country
     * @return ShipmentOrderRequestBuilder
     */
    public function setPackstation(
        string $packstationNumber,
        string $postalCode,
        string $city,
        string $postNumber = null,
        string $state = null,
        string $country = null
    ): ShipmentOrderRequestBuilder {
        $this->data['recipient']['packstation']['number'] = $packstationNumber;
        $this->data['recipient']['packstation']['postalCode'] = $postalCode;
        $this->data['recipient']['packstation']['city'] = $city;
        $this->data['recipient']['packstation']['postNumber'] = $postNumber;
        $this->data['recipient']['packstation']['state'] = $state;
        $this->data['recipient']['packstation']['country'] = $country;

        return $this;
    }

    /**
     * Choose Postfiliale delivery.
     *
     * @param string $postfilialNumber
     * @param string $postNumber
     * @param string $postalCode
     * @param string $city
     * @param string|null $country
     * @return ShipmentOrderRequestBuilder
     */
    public function setPostfiliale(
        string $postfilialNumber,
        string $postNumber,
        string $postalCode,
        string $city,
        string $country = null
    ): ShipmentOrderRequestBuilder {
        $this->data['recipient']['postfiliale']['number'] = $postfilialNumber;
        $this->data['recipient']['postfiliale']['postNumber'] = $postNumber;
        $this->data['recipient']['postfiliale']['postalCode'] = $postalCode;
        $this->data['recipient']['postfiliale']['city'] = $city;
        $this->data['recipient']['postfiliale']['country'] = $country;

        return $this;
    }

    /**
     * Set reference to the shipper data configured in GKP (optional).
     *
     * If not given, set address details.
     *
     * @see setShipperAddress
     *
     * @param string $reference
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipperReference(string $reference): ShipmentOrderRequestBuilder
    {
        $this->data['shipper']['reference'] = $reference;

        return $this;
    }

    /**
     * Book "Day of Delivery" service (V06TG and V06WZ only).
     *
     * @param string $cetDate
     * @return ShipmentOrderRequestBuilder
     */
    public function setDayOfDelivery(string $cetDate): ShipmentOrderRequestBuilder
    {
        $this->data['services']['dayOfDelivery'] = $cetDate;

        return $this;
    }

    /**
     * Book "Delivery Time Frame" service (V06TG and V06WZ only).
     *
     * @param string $timeFrameType
     * @return ShipmentOrderRequestBuilder
     */
    public function setDeliveryTimeFrame(string $timeFrameType): ShipmentOrderRequestBuilder
    {
        $this->data['services']['deliveryTimeFrame'] = $timeFrameType;

        return $this;
    }

    /**
     * Book "Preferred Day" service.
     *
     * @param string $cetDate
     * @return ShipmentOrderRequestBuilder
     */
    public function setPreferredDay(string $cetDate): ShipmentOrderRequestBuilder
    {
        $this->data['services']['preferredDay'] = $cetDate;

        return $this;
    }

    /**
     * Book "Preferred Time" service (V01PAK and V06PAK only).
     *
     * @param string $timeFrameType
     * @return ShipmentOrderRequestBuilder
     */
    public function setPreferredTime(string $timeFrameType): ShipmentOrderRequestBuilder
    {
        $this->data['services']['preferredTime'] = $timeFrameType;

        return $this;
    }

    /**
     * Book "Preferred Location" service.
     *
     * @param string $location
     * @return ShipmentOrderRequestBuilder
     */
    public function setPreferredLocation(string $location): ShipmentOrderRequestBuilder
    {
        $this->data['services']['preferredLocation'] = $location;

        return $this;
    }

    /**
     * Book "Preferred Neighbour" service.
     *
     * @param string $neighbour
     * @return ShipmentOrderRequestBuilder
     */
    public function setPreferredNeighbour(string $neighbour): ShipmentOrderRequestBuilder
    {
        $this->data['services']['preferredNeighbour'] = $neighbour;

        return $this;
    }

    /**
     * Add individual details for handling (free text).
     *
     * @param string $handlingDetails
     * @return ShipmentOrderRequestBuilder
     */
    public function setIndividualSenderRequirement(string $handlingDetails): ShipmentOrderRequestBuilder
    {
        $this->data['services']['individualSenderRequirement'] = $handlingDetails;

        return $this;
    }

    /**
     * Book service for package return.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setPackagingReturn(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['packagingReturn'] = true;

        return $this;
    }

    /**
     * Book service of immediate shipment return in case of non-successful delivery (V06PA only).
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setReturnImmediately(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['returnImmediately'] = true;

        return $this;
    }

    /**
     * Book service notice in case of non-deliverability.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setNoticeOfNonDeliverability(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['noticeOfNonDeliverability'] = true;

        return $this;
    }

    /**
     * Specify how DHL should handle the parcel container (V06WZ only).
     *
     * Possible values:
     * - a
     * - b
     * - c
     * - d
     * - e
     *
     * @param string $handlingType
     * @return ShipmentOrderRequestBuilder
     */
    public function setContainerHandlingType(string $handlingType): ShipmentOrderRequestBuilder
    {
        $this->data['services']['shipmentHandling'] = $handlingType;

        return $this;
    }

    /**
     * Specify how DHL should handle the shipment if recipient is not met.
     *
     * Possible values:
     * - SOZU
     * - ZWZU
     * - IMMEDIATE
     * - AFTER_DEADLINE
     * - ABANDONMENT
     *
     * @param string $endorsementType
     * @return ShipmentOrderRequestBuilder
     */
    public function setShipmentEndorsementType(string $endorsementType): ShipmentOrderRequestBuilder
    {
        $this->data['services']['endorsement'] = $endorsementType;

        return $this;
    }

    /**
     * Book "Visual Age Check" service.
     *
     * Possible values:
     * - A16
     * - A18
     *
     * @param string $ageType
     * @return ShipmentOrderRequestBuilder
     */
    public function setVisualCheckOfAge(string $ageType): ShipmentOrderRequestBuilder
    {
        $this->data['services']['visualCheckOfAge'] = $ageType;

        return $this;
    }

    /**
     * Book GoGreen
     * @return ShipmentOrderRequestBuilder
     */
    public function setGoGreen(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['goGreen'] = true;

        return $this;
    }

    /**
     * Indicate delivery as perishable goods.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setPerishables(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['perishables'] = true;

        return $this;
    }

    /**
     * Book "Personal Shipment Handover" service.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setPersonally(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['personally'] = true;

        return $this;
    }

    /**
     * Prohibit delivery to neighbours.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setNoNeighbourDelivery(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['noNeighbourDelivery'] = true;

        return $this;
    }

    /**
     * Book "Named Person Only" service.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setNamedPersonOnly(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['namedPersonOnly'] = true;

        return $this;
    }

    /**
     * Book "Return Receipt" service.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setReturnReceipt(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['returnReceipt'] = true;

        return $this;
    }

    /**
     * Book "Premium" service.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setPremium(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['premium'] = true;

        return $this;
    }

    /**
     * Indicate shipment containing bulky goods.
     *
     * @return ShipmentOrderRequestBuilder
     */
    public function setBulkyGoods(): ShipmentOrderRequestBuilder
    {
        $this->data['services']['bulkyGoods'] = true;

        return $this;
    }

    /**
     * Book "Ident Check" service.
     *
     * @param string $surname
     * @param string $givenName
     * @param string $dateOfBirth
     * @param string $minimumAge
     * @return ShipmentOrderRequestBuilder
     */
    public function setIdentCheck(
        string $surname,
        string $givenName,
        string $dateOfBirth,
        string $minimumAge
    ): ShipmentOrderRequestBuilder {
        $this->data['services']['identCheck']['surname'] = $surname;
        $this->data['services']['identCheck']['givenName'] = $givenName;
        $this->data['services']['identCheck']['dateOfBirth'] = $dateOfBirth;
        $this->data['services']['identCheck']['minimumAge'] = $minimumAge;

        return $this;
    }

    /**
     * Book "Parcel Outlet Routing" service.
     *
     * @param string|null $email If not set, receiver email will be used.
     * @return ShipmentOrderRequestBuilder
     */
    public function setParcelOutletRouting(string $email = null): ShipmentOrderRequestBuilder
    {
        $this->data['services']['parcelOutletRouting']['active'] = true;
        $this->data['services']['parcelOutletRouting']['details'] = $email;

        return $this;
    }

    /**
     * Set customs details for international shipments.
     *
     * @param string $exportType
     * @param string $placeOfCommital
     * @param float $additionalFee
     * @param string|null $exportTypeDescription
     * @param string|null $termsOfTrade
     * @param string|null $invoiceNumber
     * @param string|null $permitNumber
     * @param string|null $attestationNumber
     * @param bool|null $electronicExportNotification
     * @return $this
     */
    public function setCustomsDetails(
        string $exportType,
        string $placeOfCommital,
        float $additionalFee,
        string $exportTypeDescription = null,
        string $termsOfTrade = null,
        string $invoiceNumber = null,
        string $permitNumber = null,
        string $attestationNumber = null,
        bool $electronicExportNotification = null
    ) {
        if (!isset($this->data['customsDetails']['items'])) {
            $this->data['customsDetails']['items'] = [];
        }

        $this->data['customsDetails']['exportType'] = $exportType;
        $this->data['customsDetails']['exportTypeDescription'] = $exportTypeDescription;
        $this->data['customsDetails']['placeOfCommital'] = $placeOfCommital;
        $this->data['customsDetails']['additionalFee'] = $additionalFee;
        $this->data['customsDetails']['termsOfTrade'] = $termsOfTrade;
        $this->data['customsDetails']['invoiceNumber'] = $invoiceNumber;
        $this->data['customsDetails']['permitNumber'] = $permitNumber;
        $this->data['customsDetails']['attestationNumber'] = $attestationNumber;
        $this->data['customsDetails']['electronicExportNotification'] = $electronicExportNotification;

        return $this;
    }

    /**
     * Add a package item's customs details (optional).
     *
     * @param int $qty
     * @param string $description
     * @param float $value Customs value in EUR
     * @param float $weight Weight in kg
     * @param string $hsCode
     * @param string $countryOfOrigin
     * @return ShipmentOrderRequestBuilder
     */
    public function addExportItem(
        int $qty,
        string $description,
        float $value,
        float $weight,
        string $hsCode,
        string $countryOfOrigin
    ): ShipmentOrderRequestBuilder {
        if (!isset($this->data['customsDetails']['items'])) {
            $this->data['customsDetails']['items'] = [];
        }

        $this->data['customsDetails']['items'][]= [
            'qty' => $qty,
            'description' => $description,
            'weight' => $weight,
            'value' => $value,
            'hsCode' => $hsCode,
            'countryOfOrigin' => $countryOfOrigin,
        ];

        return $this;
    }

    /**
     * Create the shipment request and reset the builder data.
     *
     * @return object
     * @throws \InvalidArgumentException
     */
    public function create()
    {
        $sequenceNumber = $this->data['sequenceNumber'] ?? '0';
        $printOnlyIfCodeable = new ServiceConfiguration($this->data['printOnlyIfCodeable'] ?? false);

        if (!isset($this->data['shipper']['reference']) && !isset($this->data['shipper']['address'])) {
            throw new \InvalidArgumentException("No sender included with shipment order $sequenceNumber.");
        }

        if (isset($this->data['shipper']['address'])) {
            $shipperCountry = new CountryType($this->data['shipper']['address']['country']);

            $shipperName = new NameType($this->data['shipper']['address']['company']);
            $shipperName->setName2($this->data['shipper']['address']['name']);
            $shipperName->setName3($this->data['shipper']['address']['nameAddition']);

            $shipperCommunication = new CommunicationType();
            $shipperCommunication->setContactPerson($this->data['shipper']['address']['contactPerson']);
            $shipperCommunication->setEmail($this->data['shipper']['address']['email']);
            $shipperCommunication->setPhone($this->data['shipper']['address']['phone']);

            $shipperAddress = new NativeAddressType(
                $this->data['shipper']['address']['streetName'],
                $this->data['shipper']['address']['streetNumber'],
                $this->data['shipper']['address']['postalCode'],
                $this->data['shipper']['address']['city']
            );
            $shipperAddress->setAddressAddition($this->data['shipper']['address']['addressAddition']);
            $shipperAddress->setDispatchingInformation($this->data['shipper']['address']['dispatchingInformation']);
            $shipperAddress->setProvince($this->data['shipper']['address']['state']);
            $shipperAddress->setOrigin($shipperCountry);

            $shipper = new ShipperType($shipperName, $shipperAddress);
            $shipper->setCommunication($shipperCommunication);
            $shipperReference = null;
        } else {
            $shipper = null;
            $shipperReference = $this->data['shipper']['reference'];
        }

        if (!isset($this->data['recipient'])) {
            throw new \InvalidArgumentException("No recipient included with shipment order $sequenceNumber.");
        }

        $receiverCommunication = new CommunicationType();
        $receiverCommunication->setContactPerson($this->data['recipient']['address']['contactPerson']);
        $receiverCommunication->setEmail($this->data['recipient']['address']['email']);
        $receiverCommunication->setPhone($this->data['recipient']['address']['phone']);

        $receiver = new ReceiverType($this->data['recipient']['address']['name']);
        $receiver->setCommunication($receiverCommunication);

        if (isset($this->data['recipient']['packstation'])) {
            $packstationCountry = new CountryType($this->data['recipient']['packstation']['country']);
            $packstation = new PackStationType(
                $this->data['recipient']['packstation']['number'],
                $this->data['recipient']['packstation']['postalCode'],
                $this->data['recipient']['packstation']['city']
            );
            $packstation->setPostNumber($this->data['recipient']['packstation']['postNumber']);
            $packstation->setProvince($this->data['recipient']['packstation']['state']);
            $packstation->setOrigin($packstationCountry);
            $receiver->setPackstation($packstation);
        } elseif (isset($this->data['recipient']['postfiliale'])) {
            $postfilialeCountry = new CountryType($this->data['recipient']['postfiliale']['country']);
            $postfiliale = new PostfilialeType(
                $this->data['recipient']['postfiliale']['number'],
                $this->data['recipient']['postfiliale']['postNumber'],
                $this->data['recipient']['postfiliale']['postalCode'],
                $this->data['recipient']['postfiliale']['city']
            );
            $postfiliale->setOrigin($postfilialeCountry);
            $receiver->setPostfiliale($postfiliale);
        } elseif (isset($this->data['recipient']['address'])) {
            $receiverCountry = new CountryType($this->data['recipient']['address']['country']);
            $receiverAddress = new ReceiverNativeAddressType(
                $this->data['recipient']['address']['streetName'],
                $this->data['recipient']['address']['streetNumber'],
                $this->data['recipient']['address']['postalCode'],
                $this->data['recipient']['address']['city']
            );
            $receiverAddress->setName2($this->data['recipient']['address']['company']);
            $receiverAddress->setName3($this->data['recipient']['address']['nameAddition']);
            $receiverAddress->setAddressAddition($this->data['recipient']['address']['addressAddition']);
            $receiverAddress->setDispatchingInformation($this->data['recipient']['address']['dispatchingInformation']);
            $receiverAddress->setProvince($this->data['recipient']['address']['state']);
            $receiverAddress->setOrigin($receiverCountry);

            $receiver->setAddress($receiverAddress);
        }

        $shipmentItem = new ShipmentItemType($this->data['packageDetails']['weight']);
        if (isset($this->data['packageDetails']['dimensions'])) {
            $shipmentItem->setWidthInCM($this->data['packageDetails']['dimensions']['width']);
            $shipmentItem->setLengthInCM($this->data['packageDetails']['dimensions']['length']);
            $shipmentItem->setHeightInCM($this->data['packageDetails']['dimensions']['height']);
        }

        $shipmentDetails = new ShipmentDetailsTypeType(
            $this->data['shipmentDetails']['product'],
            $this->data['shipper']['account'],
            $this->data['shipmentDetails']['date'],
            $shipmentItem
        );
        $shipmentDetails->setCustomerReference($this->data['shipmentDetails']['shipmentReference']);
        $shipmentDetails->setReturnShipmentAccountNumber($this->data['shipper']['returnAccount']);
        $shipmentDetails->setReturnShipmentReference($this->data['shipmentDetails']['returnReference']);
        $shipmentDetails->setCostCentre($this->data['shipmentDetails']['costCentre']);

        if (isset($this->data['services'])) {
            $services = new ShipmentService();
            if (isset($this->data['services']['dayOfDelivery'])) {
                $config = new ServiceConfigurationDateOfDelivery(true, $this->data['services']['dayOfDelivery']);
                $services->setDayOfDelivery($config);
            }

            if (isset($this->data['services']['deliveryTimeFrame'])) {
                $config = new ServiceConfigurationDeliveryTimeFrame(true, $this->data['services']['deliveryTimeFrame']);
                $services->setDeliveryTimeframe($config);
            }

            if (isset($this->data['services']['preferredDay'])) {
                $config = new ServiceConfigurationDetails(true, $this->data['services']['preferredDay']);
                $services->setPreferredDay($config);
            }

            if (isset($this->data['services']['preferredTime'])) {
                $config = new ServiceConfigurationDeliveryTimeFrame(true, $this->data['services']['preferredTime']);
                $services->setPreferredTime($config);
            }

            if (isset($this->data['services']['preferredLocation'])) {
                $config = new ServiceConfigurationDetails(true, $this->data['services']['preferredLocation']);
                $services->setPreferredLocation($config);
            }

            if (isset($this->data['services']['preferredNeighbour'])) {
                $config = new ServiceConfigurationDetails(true, $this->data['services']['preferredNeighbour']);
                $services->setPreferredNeighbour($config);
            }

            if (isset($this->data['services']['individualSenderRequirement'])) {
                $config = new ServiceConfigurationISR(true, $this->data['services']['individualSenderRequirement']);
                $services->setIndividualSenderRequirement($config);
            }

            if (isset($this->data['services']['packagingReturn'])) {
                $config = new ServiceConfiguration(true);
                $services->setPackagingReturn($config);
            }

            if (isset($this->data['services']['returnImmediately'])) {
                $config = new ServiceConfiguration(true);
                $services->setReturnImmediately($config);
            }

            if (isset($this->data['services']['noticeOfNonDeliverability'])) {
                $config = new ServiceConfiguration(true);
                $services->setNoticeOfNonDeliverability($config);
            }

            if (isset($this->data['services']['shipmentHandling'])) {
                $config = new ServiceConfigurationShipmentHandling(true, $this->data['services']['shipmentHandling']);
                $services->setShipmentHandling($config);
            }

            if (isset($this->data['services']['endorsement'])) {
                $config = new ServiceConfigurationEndorsement(true, $this->data['services']['endorsement']);
                $services->setEndorsement($config);
            }

            if (isset($this->data['services']['visualCheckOfAge'])) {
                $config = new ServiceConfigurationVisualAgeCheck(true, $this->data['services']['visualCheckOfAge']);
                $services->setVisualCheckOfAge($config);
            }

            if (isset($this->data['services']['goGreen'])) {
                $config = new ServiceConfiguration(true);
                $services->setGoGreen($config);
            }

            if (isset($this->data['services']['perishables'])) {
                $config = new ServiceConfiguration(true);
                $services->setPerishables($config);
            }

            if (isset($this->data['services']['personally'])) {
                $config = new ServiceConfiguration(true);
                $services->setPersonally($config);
            }

            if (isset($this->data['services']['noNeighbourDelivery'])) {
                $config = new ServiceConfiguration(true);
                $services->setNoNeighbourDelivery($config);
            }

            if (isset($this->data['services']['namedPersonOnly'])) {
                $config = new ServiceConfiguration(true);
                $services->setNamedPersonOnly($config);
            }

            if (isset($this->data['services']['returnReceipt'])) {
                $config = new ServiceConfiguration(true);
                $services->setReturnReceipt($config);
            }

            if (isset($this->data['services']['premium'])) {
                $config = new ServiceConfiguration(true);
                $services->setPremium($config);
            }

            if (isset($this->data['packageDetails']['codAmount'])) {
                $config = new ServiceConfigurationCashOnDelivery(true, $this->data['packageDetails']['codAmount']);
                $config->setAddFee($this->data['packageDetails']['addCodFee']);
                $services->setCashOnDelivery($config);
            }

            if (isset($this->data['packageDetails']['insuredValue'])) {
                $config = new ServiceConfigurationAdditionalInsurance(
                    true,
                    $this->data['packageDetails']['insuredValue']
                );
                $services->setAdditionalInsurance($config);
            }

            if (isset($this->data['services']['bulkyGoods'])) {
                $config = new ServiceConfiguration(true);
                $services->setBulkyGoods($config);
            }

            if (isset($this->data['services']['identCheck'])) {
                $ident = new Ident(
                    $this->data['services']['identCheck']['surname'],
                    $this->data['services']['identCheck']['givenName'],
                    $this->data['services']['identCheck']['dateOfBirth'],
                    $this->data['services']['identCheck']['minimumAge']
                );
                $config = new ServiceConfigurationIC(true, $ident);
                $services->setIdentCheck($config);
            }

            if (isset($this->data['services']['parcelOutletRouting'])) {
                $config = new ServiceConfigurationDetailsOptional(true);
                $config->setDetails($this->data['services']['parcelOutletRouting']['details']);
                $services->setParcelOutletRouting($config);
            }

            $shipmentDetails->setService($services);
        }

        if (isset($this->data['recipient']['notification'])) {
            $notification = new ShipmentNotificationType($this->data['recipient']['notification']);
            $shipmentDetails->setNotification($notification);
        }

        if (isset($this->data['shipper']['bankData'])) {
            $bankData = new BankType(
                $this->data['shipper']['bankData']['owner'],
                $this->data['shipper']['bankData']['bankName'],
                $this->data['shipper']['bankData']['iban']
            );
            $bankData->setBic($this->data['shipper']['bankData']['bic']);
            $bankData->setAccountReference($this->data['shipper']['bankData']['accountReference']);
            $bankData->setNote1($this->data['shipper']['bankData']['notes'][0] ?? null);
            $bankData->setNote2($this->data['shipper']['bankData']['notes'][1] ?? null);
            $shipmentDetails->setBankData($bankData);
        }

        $shipment = new Shipment($shipmentDetails, $receiver, $shipper);
        $shipment->setShipperReference($shipperReference);

        if (isset($this->data['return']['address'], $this->data['shipper']['returnAccount'])) {
            // only add return receiver if account number was provided
            $returnCountry = new CountryType($this->data['return']['address']['country']);

            $returnName = new NameType($this->data['return']['address']['company']);
            $returnName->setName2($this->data['return']['address']['name']);
            $returnName->setName3($this->data['return']['address']['nameAddition']);

            $returnCommunication = new CommunicationType();
            $returnCommunication->setContactPerson($this->data['return']['address']['contactPerson']);
            $returnCommunication->setEmail($this->data['return']['address']['email']);
            $returnCommunication->setPhone($this->data['return']['address']['phone']);

            $returnAddress = new NativeAddressType(
                $this->data['return']['address']['streetName'],
                $this->data['return']['address']['streetNumber'],
                $this->data['return']['address']['postalCode'],
                $this->data['return']['address']['city']
            );
            $returnAddress->setAddressAddition($this->data['return']['address']['addressAddition']);
            $returnAddress->setDispatchingInformation($this->data['return']['address']['dispatchingInformation']);
            $returnAddress->setProvince($this->data['return']['address']['state']);
            $returnAddress->setOrigin($returnCountry);

            $returnReceiver = new ShipperType($returnName, $returnAddress);
            $returnReceiver->setCommunication($returnCommunication);

            $shipment->setReturnReceiver($returnReceiver);
        }

        if (isset($this->data['customsDetails'])) {
            $exportDocument = new ExportDocumentType(
                $this->data['customsDetails']['exportType'],
                $this->data['customsDetails']['placeOfCommital'],
                $this->data['customsDetails']['additionalFee']
            );
            $exportDocument->setExportTypeDescription($this->data['customsDetails']['exportTypeDescription']);
            $exportDocument->setTermsOfTrade($this->data['customsDetails']['termsOfTrade']);
            $exportDocument->setInvoiceNumber($this->data['customsDetails']['invoiceNumber']);
            $exportDocument->setPermitNumber($this->data['customsDetails']['permitNumber']);
            $exportDocument->setAttestationNumber($this->data['customsDetails']['attestationNumber']);
            if (isset($this->data['customsDetails']['electronicExportNotification'])) {
                $notification = new ServiceConfiguration($this->data['customsDetails']['electronicExportNotification']);
                $exportDocument->setWithElectronicExportNtfctn($notification);
            }

            $exportItems = [];
            foreach ($this->data['customsDetails']['items'] as $itemData) {
                $exportItems[] = new ExportDocPosition(
                    $itemData['description'],
                    $itemData['countryOfOrigin'],
                    $itemData['hsCode'],
                    $itemData['qty'],
                    $itemData['weight'],
                    $itemData['value']
                );
            }
            $exportDocument->setExportDocPosition($exportItems);

            $shipment->setExportDocument($exportDocument);
        }

        $shipmentOrder = new ShipmentOrderType($sequenceNumber, $shipment);
        $shipmentOrder->setPrintOnlyIfCodeable($printOnlyIfCodeable);

        $this->data = [];

        return $shipmentOrder;
    }
}