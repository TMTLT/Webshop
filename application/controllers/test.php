<?php

require_once(APPPATH . "classes/payme.php");

class Test extends MY_Controller{
	
	public function __construct(){

		parent::__construct();
	}

	public function index(){
		$data = $this->data;
		$data['title'] = 'Test';
		
		$this->load->template('test/index', $data);
	}

	public function payme(){
		$data = $this->data;
		$data['title'] = 'Payme Test';

		$data['testdata'][] = 'Payme';
		$data['testdata'][] = implode(',' , PayMe::GetBankList());

		$returnURL	 = 'http://tmtl-06.ict-lab.nl/about';
		$failURL	 = 'http://tmtl-06.ict-lab.nl/index.php/account/login';

		$StartURL = PayMe::StartTransaction(1000, 1, 000001, urlencode('Test der tests'), $returnURL, $failURL);
		
		$data['testdata'][] = $StartURL;

		$this->load->template('test/index', $data);
	}
}