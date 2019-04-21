<?php

namespace App\Classes;

use Symfony\Component\HttpFoundation\Session\Session;

class Basket
{
	public function getItems()
	{
		$session = new Session();
		return $session->get('items');
	}

	public function addItem($code)
	{
		$session = new Session();

		if ($items = $session->get('items'))
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
			$items = array($code => 1);
		}

		$session->set('items', $items);
	}
}