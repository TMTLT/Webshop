<?php

require_once(APPPATH . "classes/payme.php");

class Store extends MY_Controller {

	public function __construct() {

		parent::__construct();
	}

	public function index() {
		$data = $this->data;

		$data['title'] = 'Store';
		$data['products'] = $this->Webshop_model->GetProducts();

		$this->load->template('store/index', $data);
	}

	public function category($category) {
		$data = $this->data;

		$data['title'] = 'Category - '.urldecode($category);
		$data['products'] = $this->Webshop_model->GetProducts($category);

		$this->load->template('store/index', $data);
	}

	public function checkOut() {

		$data = $this->data;
		$data['title'] = 'Checkout';

		$this->load->template('store/checkout', $data);
	}

	/**
	 *
	 */
	public function addtocart() {
		$this->load->library('cart');

		$id = $this->input->post('id');

		$item = $this->Webshop_model->GetProduct($id);

		$flag = true;

		foreach ($this->cart->contents() as $item)
		{

			if ($item['id'] == $id)
			{
				$qtyn = $item['qty'] + 1;

				$data = array(
					'rowid' => $item['rowid'],
					'qty'   => $qtyn
				);


				$this->cart->update($data);
				$flag = false;
				break;
			}
		}

		if ($flag)
		{
			$data = array(
				'id'      => $id,
				'qty'     => 1,
				'price'   => $item['prijs'],
				'name'    => $item['titel']
			);
			$this->cart->insert($data);

		}
	}

	/**
	 *
	 */
	public function cartcontent() {
		$this->load->library('cart');
		echo json_encode($this->cart->contents());
	}
}