<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\Bcs\Model\CreateShipment\RequestType;

/**
 * BankType
 *
 * @package Dhl\Sdk\Paket\Bcs\Model\CreateShipment
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://choosealicense.com/licenses/mit/ The MIT License
 * @link    https://www.netresearch.de/
 */
class BankType
{
    /**
     * Name of bank account owner.
     *
     * @var string $accountOwner
     */
    protected $accountOwner;

    /**
     * Name of bank.
     *
     * @var string $bankName
     */
    protected $bankName;

    /**
     * IBAN code of bank account.
     *
     * @var string $iban
     */
    protected $iban;

    /**
     * IBAN code of bank account.
     *
     * @var string|null $note1
     */
    protected $note1 = null;

    /**
     * Purpose of bank information.
     *
     * @var string|null $note2
     */
    protected $note2 = null;

    /**
     * Bank-Information-Code (BankCCL) of bank account.
     *
     * @var string|null $bic
     */
    protected $bic = null;

    /**
     * Account reference to customer profile.
     *
     * @var string|null $accountreference
     */
    protected $accountreference = null;

    /**
     * @param string $accountOwner
     * @param string $bankName
     * @param string $iban
     */
    public function __construct(string $accountOwner, string $bankName, string $iban)
    {
        $this->accountOwner = $accountOwner;
        $this->bankName = $bankName;
        $this->iban = $iban;
    }

    /**
     * @param string|null $note1
     * @return BankType
     */
    public function setNote1(string $note1 = null): self
    {
        $this->note1 = $note1;
        return $this;
    }

    /**
     * @param string|null $note2
     * @return BankType
     */
    public function setNote2(string $note2 = null): self
    {
        $this->note2 = $note2;
        return $this;
    }

    /**
     * @param string|null $bic
     * @return BankType
     */
    public function setBic(string $bic = null): self
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * @param string|null $accountReference
     * @return BankType
     */
    public function setAccountReference(string $accountReference = null): self
    {
        $this->accountreference = $accountReference;
        return $this;
    }
}