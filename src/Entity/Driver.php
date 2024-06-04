<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DriverRepository")
 */
class Driver
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
    private $driverName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $band;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $optionalAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriverName(): ?string
    {
        return $this->driverName;
    }

    public function setDriverName(string $driverName): self
    {
        $this->driverName = $driverName;

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

    public function getFirstPhoneNumber(): ?string
    {
        return $this->firstPhoneNumber;
    }

    public function setFirstPhoneNumber(string $firstPhoneNumber): self
    {
        $this->firstPhoneNumber = $firstPhoneNumber;

        return $this;
    }

    public function getSecondPhoneNumber(): ?string
    {
        return $this->secondPhoneNumber;
    }

    public function setSecondPhoneNumber(?string $secondPhoneNumber): self
    {
        $this->secondPhoneNumber = $secondPhoneNumber;

        return $this;
    }

    public function getBand(): ?string
    {
        return $this->band;
    }

    public function setBand(string $band): self
    {
        $this->band = $band;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getOptionalAddress(): ?string
    {
        return $this->optionalAddress;
    }

    public function setOptionalAddress(?string $optionalAddress): self
    {
        $this->optionalAddress = $optionalAddress;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

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
}
