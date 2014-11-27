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

		if($StartData['keyMatch']){

			$data['fwdurl'] = $StartData['fwdurl'];

			$this->load->model('payme_model');
			$this->payme_model->SaveTransaction($StartData['transid'], $StartData['sha1']);
		}

		$this->load->template('test/index', $data);
	}

	public function aanbiedingen(){

		$data = $this->data;
		$data['title'] = 'Aanbideingen test Test';

		/*
			Code hier

			Niks printen of echoen, 

			Data in $data['testdata']['Aanbiedingen']
		*/

		$this->load->template('test/index', $data);
	}

	public function paymestatus(){

		$data = $this->data;
		$data['title'] = 'Payme Test';
		
		$this->load->model('payme_model');
		$result = $this->payme_model->GetActiveTransactions();

		foreach($result as $transaction)
			$data['testdata'][] = PayMe::GetTransactionStatus($transaction['transid'], $transaction['hash']);


		$this->load->template('test/index', $data);
	}
}