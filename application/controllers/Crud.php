<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends Application {

	public function index()
	{
		$userrole = $this->session->userdata('userrole');
		if ($userrole != 'admin')
			$message = 'You are not authorized to access this page. Go away';
		else{
			$message = 'Get ready to fix stuff.';
			$this->load->model('Menu');
			$test = $this->Menu->all();
			//$test->result_array();
			//$arr = json_decode($test, true);
			//var_dump($test);
			//$this->data['content'] = $arr[1];
			$a = array();			
			foreach($test as $row) {
				//$id = $row->id;
				// $a = array('id' => $row->id,
				// 			'name' => $row->name,
				// 			'description' => $row->description,
				// 			'price' => $row->price,
				// 			'picture' => $row->picture,
				// 			'category' => $row->category);
				$str =  $row->id . '      ' .
					$row->name . '      ' .
					 $row->description . '      ' .
					 $row->price . '      ' .
					 $row->picture . '      ' .
					 $row->category . '</br>';

				array_push($a, $str);
				//echo $id .'</br>';
			}
		}
			
		// $this->data['content'] = $message;
		$this->data['content'] = implode(" ",$a);
		$this->render();
	}

}
