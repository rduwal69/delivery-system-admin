<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shopName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shopFirstAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shopSecondAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shopThirdAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string")
     */
    private $firstPhoneNumber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $primaryContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $band;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    public function setShopName(string $shopName): self
    {
        $this->shopName = $shopName;

        return $this;
    }

    public function getShopFirstAddress(): ?string
    {
        return $this->shopFirstAddress;
    }

    public function setShopFirstAddress(string $shopFirstAddress): self
    {
        $this->shopFirstAddress = $shopFirstAddress;

        return $this;
    }

    public function getShopSecondAddress(): ?string
    {
        return $this->shopSecondAddress;
    }

    public function setShopSecondAddress(?string $shopSecondAddress): self
    {
        $this->shopSecondAddress = $shopSecondAddress;

        return $this;
    }

    public function getShopThirdAddress(): ?string
    {
        return $this->shopThirdAddress;
    }

    public function setShopThirdAddress(?string $shopThirdAddress): self
    {
        $this->shopThirdAddress = $shopThirdAddress;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getFirstPhoneNumber(): ?int
    {
        return $this->firstPhoneNumber;
    }

    public function setFirstPhoneNumber(int $firstPhoneNumber): self
    {
        $this->firstPhoneNumber = $firstPhoneNumber;

        return $this;
    }

    public function getSecondPhoneNumber(): ?int
    {
        return $this->secondPhoneNumber;
    }

    public function setSecondPhoneNumber(int $secondPhoneNumber): self
    {
        $this->secondPhoneNumber = $secondPhoneNumber;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPrimaryContact(): ?string
    {
        return $this->primaryContact;
    }

    public function setPrimaryContact(?string $primaryContact): self
    {
        $this->primaryContact = $primaryContact;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBand(): ?string
    {
        return $this->band;
    }

    public function setBand(?string $band): self
    {
        $this->band = $band;

        return $this;
    }
}
