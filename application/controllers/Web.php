<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login_pin');
	}

	public function vc()
	{
		$this->load->view('vc');
	}

	public function cek_pin($pin)
	{
		// echo json_encode(array('hasil'=>'1'));

		$db_lsima = $this->load->database('db_lsima', TRUE);

		$pin1 = $this->db->get_where('vc', array('pin'=>$pin));
		$pin2 = $db_lsima->get_where('kunjungan', array('pin'=>$pin));

		if ($pin1->num_rows() == 1 && $pin2->num_rows() == 1) {

			$cek_status = $pin1->row()->status_selesai;
			$channel = $pin1->row()->channel;
			$cek_jam = $pin2->row()->tgl_kunjungan.' '.$pin2->row()->jam_vc.':00';
			$selisih_menit = cek_time(get_waktu(),$cek_jam);

			// log_r($selisih_menit);
			if ($cek_status == '1' ) {
				//waktu habis
				// echo json_encode(array('hasil'=>'2'));
				echo json_encode(array('hasil'=>'1','channel'=>$channel));

			} else {
				if ($selisih_menit > 5) {
					//waktu belum sampai
					echo json_encode(array('hasil'=>'3','jadwal' => $cek_jam));
				} elseif ($selisih_menit < -10){
					//jadwal sudah lwat
					// echo json_encode(array('hasil'=>'4'));
					echo json_encode(array('hasil'=>'1','channel'=>$channel));
				} else {
					//waktu masih bisa
					echo json_encode(array('hasil'=>'1','channel'=>$channel));
				}
				
			}

			
		} else {
			echo json_encode(array('hasil'=>'0'));
		}
	}

	public function kembali($pin)
	{
		// $this->db->where('channel', $pin);
		// $this->db->update('vc', array('channel'=>create_random(15)));
		redirect('web','refresh');
	}

	public function test_query()
	{
		foreach ($this->db->get('vc')->result() as $rw) {
			$this->db->where('pin', $rw->pin);
			$this->db->update('vc', array('channel'=>$rw->pin));
			log_data($this->db->last_query());
		}
	}

}
