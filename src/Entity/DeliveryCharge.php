<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeliveryChargeRepository")
 */
class DeliveryCharge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $min_amount;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $max_amount;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $charge;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinAmount()
    {
        return $this->min_amount;
    }

    public function setMinAmount($min_amount): self
    {
        $this->min_amount = $min_amount;

        return $this;
    }

    public function getMaxAmount()
    {
        return $this->max_amount;
    }

    public function setMaxAmount($max_amount): self
    {
        $this->max_amount = $max_amount;

        return $this;
    }

    public function getCharge()
    {
        return $this->charge;
    }

    public function setCharge($charge): self
    {
        $this->charge = $charge;

        return $this;
    }
}
