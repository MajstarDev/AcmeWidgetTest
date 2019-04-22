<?php

namespace App\Classes\Calculators;

class ItemDiscountCalculator
{
	private $doctrine;

	public function __construct($doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function calculate($product_id, $regular_price, $qty)
	{
		$repo = $this->doctrine->getRepository(\App\Entity\SpecialOffer::class);

		if ($so = $repo->findBy(['product_id' => $product_id]))
		{
			$regular_product_qty = $so[0]->getRegularPriceProductQty();
			$discounted_product_qty = $so[0]->getDiscountedPriceProductQty();
			$discount_multiplier = $so[0]->getDiscountMultiplier();

			$num_in_chunk = $regular_product_qty + $discounted_product_qty;
			$chunk_price = $regular_product_qty * $regular_price + $discounted_product_qty * $regular_price * $discount_multiplier;
			$chunk_price = round($chunk_price, 2, PHP_ROUND_HALF_DOWN);

			$num_chunks = intdiv($qty, $num_in_chunk);
			$num_no_discount = $qty - $num_chunks * $num_in_chunk;

			if ($num_chunks > 0)
			{
				return ($regular_price * $num_in_chunk - $chunk_price) * $num_chunks;
			}
		}
		else
		{
			return 0;
		}
	}
}