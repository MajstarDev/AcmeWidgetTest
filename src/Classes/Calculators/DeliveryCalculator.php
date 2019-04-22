<?php

namespace App\Classes\Calculators;

class DeliveryCalculator
{
	private $doctrine;

	public function __construct($doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function calculate($basketSubtotal)
	{
		$repo = $this->doctrine->getRepository(\App\Entity\DeliveryCharge::class);

		$qb = $repo->createQueryBuilder('d')
		->andWhere('d.min_amount <= :amount')
		->andWhere(':amount <= d.max_amount')
		->setParameter('amount', $basketSubtotal)
		->getQuery();

	        if (! ($charge = $qb->execute()))
		{
			$qb = $repo->createQueryBuilder('d')
			->andWhere('d.min_amount <= :amount')
			->andWhere('d.max_amount IS NULL')
			->setParameter('amount', $basketSubtotal)
			->getQuery();

			$charge = $qb->execute();
		}

		return ($charge && count($charge) > 0) ? $charge[0] -> getCharge() : NULL;
	}
}