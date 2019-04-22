<?php

namespace App\Classes;

use Symfony\Component\HttpFoundation\Session\Session;
use App\Classes\Calculators\ItemDiscountCalculator;
Use App\Classes\Calculators\DeliveryCalculator;

class Basket
{
	private $session;
	private $doctrine;
	private $itemsExtended;

	private $subtotalAmount;
	private $deliveryAmount;
	private $totalAmount;

	public function __construct($doctrine)
	{
		$this->session = new Session();
		$this->doctrine = $doctrine;
	}

	public function getItems()
	{		
		return $this->session->get('items');
	}

	public function addItem($code)
	{
		if ($items = $this->session->get('items'))
		{
			if (isset($items[$code]))
			{
				$items[$code]++;
			}
			else
			{
				$items[$code] = 1;
			}
		}
		else
		{
			$items = [$code => 1];
		}

		$this->session->set('items', $items);
	}

	public function removeItem($code)
	{
		if ($items = $this->session->get('items'))
		{
			if (isset($items[$code]))
			{
				unset($items[$code]);
			}
			$this->session->set('items', $items);
		}
	}

	public function getItemsExtended()
	{
		$itemsExtended = array();

		$items = $this->getItems();

		if (!is_null($items) && count($items) > 0)
		{		
			$repo = $this->doctrine->getRepository(\App\Entity\Product::class);
			$discountCalculator = new ItemDiscountCalculator($this->doctrine);

			foreach ($items as $code => $qty)
			{
				$product = $repo->findBy(['code' => $code]);

				if (count($product) == 1)
				{
					$itemPrice = $product[0] -> getPrice();
					$subtotalFull = $itemPrice * $qty;
					$discount = $discountCalculator->calculate($product[0] -> getId(), $itemPrice, $qty);
					$subtotalDiscounted = $subtotalFull - $discount;

					$itemsExtended[] = array(
						'id' => $product[0] -> getId(),
						'code' => $code,
						'name' => $product[0] -> getName(),						
						'price' => $itemPrice,
						'qty' => $qty,
						'subtotalFull' => $subtotalFull,
						'discount' => $discount,
						'subtotalDiscounted' => $subtotalDiscounted
					);
				}
			} 
		}

		return $this->itemsExtended = $itemsExtended;
	}

	public function calculateSubtotal()
	{
		$this->getItemsExtended();

		$subtotal = 0;
		foreach ($this->itemsExtended as $item)
		{
			$subtotal += $item['subtotalDiscounted'];
		}
		
		$this->subtotalAmount = $subtotal;
	}

	public function calculateDelivery()
	{
		$deliveryCalc = new DeliveryCalculator($this->doctrine);
		$this->deliveryAmount = $deliveryCalc->calculate($this->subtotalAmount);
	}

	public function calculateTotal()
	{
		return $this->totalAmount = $this->subtotalAmount + $this->deliveryAmount;
	}

	public function recalculateEverything()
	{
		$this->getItemsExtended();
		$this->calculateSubtotal();
		$this->calculateDelivery();
		$this->calculateTotal();
	}

	public function getTotals()
	{
		return array(
			'subtotal' => $this->subtotalAmount,
			'delivery' => $this->deliveryAmount,
			'total' => $this->totalAmount
		);
	}

	public function getFreeDeliveryThreshold()
	{
		$repo = $this->doctrine->getRepository(\App\Entity\DeliveryCharge::class);

		$qb = $repo->createQueryBuilder('d')
			->andWhere('d.max_amount IS NULL')
			->getQuery();

		$charge = $qb->execute();

		return ($charge && count($charge) > 0) ? $charge[0] -> getMinAmount() : NULL;		
	}
}