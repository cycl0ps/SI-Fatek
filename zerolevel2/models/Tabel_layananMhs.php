<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_layananMhs extends CI_Model {
	
	public function __construct() {
		parent::__construct();	
	}

	public function get($condition = FALSE, $sort = FALSE, $limit = FALSE, $groupby = FALSE) {
		
		if ($condition) $this->db->where($condition);
		if ($sort) $this->db->order_by($sort);
		if ($limit) $this->db->limit($limit);
		if ($groupby) $this->db->group_by($groupby);

		$this->db->where("aso_disposisi.jenis = 'layananMhs'");
		$this->db->where("proses = prosesId");

		$this->db->join('aso_disposisi', 'idRequest = jenisId');
		$this->db->join('ft_mahasiswa', 'nim = nimReq');
		$this->db->join('ref_jurusan', 'ft_mahasiswa.jurusanId = ref_jurusan.idJurusan');
		$this->db->join('ref_prodi', 'ft_mahasiswa.prodiId = ref_prodi.idProdi');
		
		$query = $this->db->get('layanan_mhs');
		$result = $query->result_array();
		//print_r($this->db->last_query()); die;
		return $result;
	}

	public function aso_get($condition = FALSE, $sort = FALSE, $limit = FALSE, $groupby = FALSE) {
		
		if ($condition) $this->db->where($condition);
		if ($sort) $this->db->order_by($sort);
		if ($limit) $this->db->limit($limit);
		if ($groupby) $this->db->group_by($groupby);

		$this->db->where("aso_disposisi.jenis = 'layananMhs'");
		$this->db->join('layanan_mhs', 'idRequest = jenisId');
		$this->db->join('ft_mahasiswa', 'nim = nimReq');
		$this->db->join('ref_jurusan', 'ft_mahasiswa.jurusanId = ref_jurusan.idJurusan');
		$this->db->join('ref_prodi', 'ft_mahasiswa.prodiId = ref_prodi.idProdi');
		
		$query = $this->db->get('aso_disposisi');
		$result = $query->result_array();
		//print_r($this->db->last_query()); die;
		return $result;
	}

	public function detail($condition) {
		$this->db->where($condition);

		$this->db->where("aso_disposisi.jenis = 'layananMhs'");
		$this->db->where("proses = prosesId");

		$this->db->join('aso_disposisi', 'idRequest = jenisId');
		$this->db->join('ft_mahasiswa', 'nim = nimReq');
		$this->db->join('ref_jurusan', 'ft_mahasiswa.jurusanId = ref_jurusan.idJurusan');
		$this->db->join('ref_prodi', 'ft_mahasiswa.prodiId = ref_prodi.idProdi');

		$query = $this->db->get('layanan_mhs');
		$result = $query->row_array();
		//print_r($this->db->last_query()); die;
		return $result;
	}	

	public function tambah($data, $data2) {

		$this->db->insert('layanan_mhs', $data);
		$idRequest = $this->db->insert_id();

		$data2['jenisId'] = $idRequest;

		return $this->tambah_aso($data2);
	}

	public function tambah_aso($data) {
		$data['jenis'] = "layananMhs";
		return $this->db->insert('aso_disposisi', $data);
	}

	public function delete($id) {
		$this->delete_aso_all($id);
		$this->db->delete('layanan_mhs', array('idRequest' => $id));
		return $this->db->affected_rows();
	}

	public function delete_aso_all($id) {
		$this->db->where("aso_disposisi.jenis = 'layananMhs'");
		return $this->db->delete('aso_disposisi', array('jenisId' => $id));
	}

	public function update_status($data, $data2) {
		
		$this->db->where('idRequest', $data['idRequest']);
		$this->db->update('layanan_mhs', $data);

		return $this->tambah_aso($data2);
	}

}

		//echo var_dump($result);die;
		//print_r($this->db->last_query()); die;
