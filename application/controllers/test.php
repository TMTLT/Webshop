<?php

require_once(APPPATH . "classes/payme.php");

class Test extends MY_Controller{
	
	public function __construct(){

		parent::__construct();
	}

	public function index(){
		$data = $this->data;
		$data['title'] = 'Test';
		
		$data['testdata'] = 'Testing the testpage. Don\' do stuff here pls';

		$this->load->template('test/index', $data);
	}

	public function payme(){
		$data = $this->data;
		$data['title'] = 'Payme Test';

		$data['testdata'][] = 'Payme';
		$data['testdata'][] = implode(',' , PayMe::GetBankList());

		$returnURL	 = 'http://tmtl-06.ict-lab.nl/about';
		$failURL	 = 'http://tmtl-06.ict-lab.nl/index.php/account/login';

		$StartData = PayMe::StartTransaction(1000, 1, 000001, 'Test der tests', $returnURL, $failURL);
		
		$data['testdata'][] = $StartData;
		
		$this->load->template('test/index', $data);
	}
}