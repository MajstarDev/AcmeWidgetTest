<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialOfferRepository")
 */
class SpecialOffer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $regular_price_product_qty;

    /**
     * @ORM\Column(type="integer")
     */
    private $discounted_price_product_qty;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $discount_multiplier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getRegularPriceProductQty(): ?int
    {
        return $this->regular_price_product_qty;
    }

    public function setRegularPriceProductQty(int $regular_price_product_qty): self
    {
        $this->regular_price_product_qty = $regular_price_product_qty;

        return $this;
    }

    public function getDiscountedPriceProductQty(): ?int
    {
        return $this->discounted_price_product_qty;
    }

    public function setDiscountedPriceProductQty(int $discounted_price_product_qty): self
    {
        $this->discounted_price_product_qty = $discounted_price_product_qty;

        return $this;
    }

    public function getDiscountMultiplier()
    {
        return $this->discount_multiplier;
    }

    public function setDiscountMultiplier($discount_multiplier): self
    {
        $this->discount_multiplier = $discount_multiplier;

        return $this;
    }
}
