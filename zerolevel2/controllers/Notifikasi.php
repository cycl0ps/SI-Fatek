<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		//* Check if current-user is logged user *//
		if (!isset($this->session->userdata['logged_in_portal'])) {
			redirect(site_url('login'));
		}

		//* Load model, library, helper, etc *//
		$this->load->model(array('Tabel_xNotifikasi')); 

	}

	public function index() {


	}

	public function get_notif() {

		$id = $this->session->userdata['logged_in_portal']['desc'];

		$data['notif']	= $this->Tabel_xNotifikasi->get("tipe, link, tglNotif, GROUP_CONCAT(idNotif SEPARATOR '-') as idNotif, CONCAT_WS(' ',COUNT('idNotif') , isiNotif) as isiNotif",array('toUser' => $id, 'unread' => '1'),'tglNotif ASC', 'isiNotif');
		

		if (isset($this->session->userdata['logged_in_portal']['auth'])) {
			$unit 	= $this->session->userdata['logged_in_portal']['auth']['kodeGrup'];
			$data2	= $this->Tabel_xNotifikasi->get("tipe, link, tglNotif, GROUP_CONCAT(idNotif SEPARATOR '-') as idNotif, CONCAT_WS(' ',COUNT('idNotif') , isiNotif) as isiNotif",array('toUser' => $unit, 'unread' => '1', 'isi'),'tglNotif ASC', 'isiNotif');

			foreach ($data2 as $key) array_push($data['notif'], $key);
		}

		$datasystem = $this->from_system();
		foreach ($datasystem as $key) array_push($data['notif'], $key);

 		$custom_price = array();
    	foreach ($data['notif'] as $key => $row) {
        	$custom_price[$key] = $row['tglNotif'];
    	}

    	array_multisort($custom_price, SORT_DESC, $data['notif']);

		foreach ($data['notif'] as &$val) {
			$val['link'] = site_url($val['link']);
		}

		$data['jumlah'] = count($data['notif']);

		echo json_encode($data);
	}

	public function set_read($id) {

		$notif = explode("-", $id);

		//*Set Read in database *//
		foreach ($notif as $key => $value) {
			$this->Tabel_xNotifikasi->set_read($value);
		}
		
	}


	private function from_system() {
		$data[0]['tipe'] = 'sistem';
		$data[0]['isiNotif'] = 'Upgrade Portal Fatek ver.2';
		$data[0]['link'] = 'wall/about';
		$data[0]['tglNotif'] = '2020-04-01 00:00:00';
		$data[0]['idNotif'] = '';

		return $data;

	}

}