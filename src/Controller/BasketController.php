<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Classes\Basket;

class BasketController extends AbstractController
{
	/**
	* @Route("/")
	*/
	public function viewBasket()
	{
		$repo = $this->getDoctrine()->getRepository(\App\Entity\Product::class);

		$basket = new Basket($this->getDoctrine());
		$basket->recalculateEverything();

		return $this->render('basket.html.twig', [
			'products' => $repo->findAll(),
			'basket' => $basket->getItemsExtended(),
			'totals' => $basket->getTotals(),
			'freeDelivery' => $basket->getFreeDeliveryThreshold()
		]);
	}

	/**
	* @Route("/add/{code}")
	*/
	public function addToBasket($code)
	{
		$basket = new Basket($this->getDoctrine());
		$basket->addItem($code);
		return $this->redirect('/');
	}

	/**
	* @Route("/remove/{code}")
	*/
	public function deleteFromBasket($code)
	{
		$basket = new Basket($this->getDoctrine());
		$basket->removeItem($code);
		return $this->redirect('/');
	}
}