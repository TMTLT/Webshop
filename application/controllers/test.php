<?php

require_once(APPPATH . "classes/payme.php");

class Test extends MY_Controller{
	
	public function __construct(){

		parent::__construct();
		$this->load->helper(array('form', 'url'));
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

	public function upload(){

		$data = $this->data;
		$data['title'] = 'Upload test';

		if($this->input->post('userfile')){
			print('Userfile not set');
			$this->load->template('test/upload', $data);
		}else{

			$config['upload_path'] = FCPATH .'/database/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['file_name']        = "what123ever";
			$this->load->library('upload', $config);
			$result = $this->upload->do_upload();

			if($result){

				$data['testdata'][] = 'Gelukt';
				$data['testdata'][] = $this->upload->data();

			}else{

				$data['testdata'][] = 'Niet gelukt';
				$data['testdata'][] = $this->upload->display_errors();
			}

			$this->load->template('test/upload', $data);
		}

	}
}