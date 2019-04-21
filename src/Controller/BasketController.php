<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Classes\Basket;

use Symfony\Component\HttpFoundation\Session\Session; # delete

class BasketController extends AbstractController
{
	private $basket;

	public function __construct()
	{
		$this->basket = new Basket();
	}	

	/**
	* @Route("/")
	*/
	public function viewBasket()
	{
		$session = new Session();
		print_r($session->get('items'));

		$repository = $this->getDoctrine()->getRepository(\App\Entity\Product::class);

		return $this->render('basket.html.twig', [
			'products' => $repository->findAll(),
			'basket' => $this->basket
		]);
	}

	/**
	* @Route("/add/{code}")
	*/
	public function addToBasket($code)
	{
		$this->basket->addItem($code);
		return $this->redirect('/');
	}
}