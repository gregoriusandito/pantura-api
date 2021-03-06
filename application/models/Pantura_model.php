<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Pantura_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function get_kota(){
      $obj = $this->db->select('*')
          ->get('tb_kota');
      return $obj->result_array();
		}

		function get_wisata($kd){
      $obj = $this->db->select('*')
					->where('tb_tempat_wisata.id_kota',$kd)
          ->get('tb_tempat_wisata');
      return $obj->result_array();
		}

		function get_kuliner($kd){
      $obj = $this->db->select('*')
					->where('tb_tempat_kuliner.id_kota',$kd)
          ->get('tb_tempat_kuliner');
      return $obj->result_array();
		}

    function detail_kota($kd){
      $obj = $this->db->select('*')
          ->where('id_kota',$kd)
          ->get('tb_kota');
      return $obj->result_array();
    }

		function detail_wisata($kd, $idw){
      $obj = $this->db->select('*')
          ->where('id_kota',$kd)
					->where('id_tempat_wisata',$idw)
          ->get('tb_tempat_wisata');
      return $obj->result_array();
    }

		function detail_kuliner($kd, $idk){
      $obj = $this->db->select('*')
          ->where('id_kota',$kd)
					->where('id_tempat_kuliner',$idk)
          ->get('tb_tempat_kuliner');
      return $obj->result_array();
    }

		function get_feedback_wisata($wd, $idw){
      $obj = $this->db->select('*')
					->join('tb_user','tb_user.id_user = feedback_tempat_wisata.id_user')
          ->where('id_kota',$wd)
					->where('id_tempat_wisata',$idw)
          ->get('feedback_tempat_wisata');
      return $obj->result_array();
    }

function get_feedback_kuliner($kd, $idk){
      $obj = $this->db->select('*')
					->join('tb_user','tb_user.id_user = feedback_tempat_kuliner.id_user')
          ->where('id_kota',$kd)
					->where('id_tempat_kuliner',$idk)
          ->get('feedback_tempat_kuliner');
      return $obj->result_array();
    }

    function store_user($data){
      return $this->db->insert('tb_user', $data);
    }

    function store_comment_wisata($data){
      return $this->db->insert('feedback_tempat_wisata', $data);
    }

    function store_comment_kuliner($data){
      return $this->db->insert('feedback_tempat_kuliner', $data);
    }

		function input_kota($data){
      return $this->db->insert('tb_kota', $data);
    }

		function input_wisata($data){
      return $this->db->insert('tb_tempat_wisata', $data);
    }

		function input_kuliner($data){
      return $this->db->insert('tb_tempat_kuliner', $data);
    }

		function edit_kota($data) {
			$this->db->where('id_kota', $data['id_kota']);
			return $this->db->update('tb_kota', $data);
		}

		function edit_tempat_wisata($data) {
			$this->db->where('id_kota', $data['id_kota'])
							 ->where('id_tempat_wisata', $data['id_tempat_wisata']);
			return $this->db->update('tb_tempat_wisata', $data);
		}

		function edit_tempat_kuliner($data) {
			$this->db->where('id_kota', $data['id_kota'])
							 ->where('id_tempat_kuliner', $data['id_tempat_kuliner']);
			return $this->db->update('tb_tempat_kuliner', $data);
		}

		public function delete_comment_wisata($data) {
			$this->db->where('id_user',$data['id_user'])
							 ->where('id_tempat_wisata', $data['id_tempat_wisata'])
							 ->where('id_feedback_tw', $data['id_feedback_tw']);
			return $this->db->delete('feedback_tempat_wisata');
		}

		public function delete_comment_kuliner($data) {
			$this->db->where('id_user',$data['id_user'])
							 ->where('id_tempat_kuliner', $data['id_tempat_kuliner'])
							 ->where('id_feedback_tk', $data['id_feedback_tk']);
			return $this->db->delete('feedback_tempat_kuliner');
		}

		public function delete_kota($data) {
			$this->db->where('id_kota',$data['id_kota']);
			return $this->db->delete('tb_kota');
		}


		public function delete_kuliner($data) {
			$this->db->where('id_kota',$data['id_kota']);
			$this->db->where('id_tempat_kuliner',$data['id_kuliner']);
			return $this->db->delete('tb_tempat_kuliner');
		}

		public function delete_wisata($data) {
			$this->db->where('id_kota',$data['id_kota']);
			$this->db->where('id_tempat_wisata',$data['id_wisata']);
			return $this->db->delete('tb_tempat_wisata');
		}


		/**
		* User Query
		**/

    function get_individual_user($data){
      $obj = $this->db->select('*')
          ->where('email',$data)
          ->get('tb_user');
      return $obj->result_array();
    }

    function get_if_user_exist($data){
      $obj = $this->db->select('email')
          ->where('email',$data)
          ->get('tb_user');
      return $obj->result_array();
    }

		/**
	   * Encrypting password
	   * @param password
	   * returns salt and encrypted password
	   */
	  public function hashSSHA($password) {

	      $salt = sha1(rand());
	      $salt = substr($salt, 0, 10);
	      $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
	      $hash = array("salt" => $salt, "encrypted" => $encrypted);
	      return $hash;
	  }

	  /**
	   * Decrypting password
	   * @param salt, password
	   * returns hash string
	   */

	  public function checkhashSSHA($salt, $password) {

	      $hash = base64_encode(sha1($password . $salt, true) . $salt);

	      return $hash;
	  }

		public function store_user_2($name, $email, $password){
			$uuid = random_string('sha1',40);
			$hash = $this->Pantura_model->hashSSHA($password);
			$encrypted_password = $hash["encrypted"]; // encrypted password
			$salt = $hash["salt"]; // salt
			$this->db->query("INSERT INTO tb_user VALUES (NULL, '$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW(), NULL)");
		}

		public function get_user_by_email_password($email, $password) {
			$query = $this->Pantura_model->get_individual_user($email);
			if(count($query) == 1) {
				foreach($query as $user) {
					$salt = $user['salt'];
					$encrypted_password = $user['encrypted_password'];
					$email = $user['email'];
				}
				$hash = $this->Pantura_model->checkhashSSHA($salt, $password);
				if ($encrypted_password == $hash) {
						// user authentication details are correct
						return $this->Pantura_model->get_individual_user($email);
				}
			} else {
				return NULL;
			}
		}

		public function is_user_existed($email) {
			$query = $this->Pantura_model->get_if_user_exist($email);
			if ($query) {
				//echo 'true';
				return true;
			} else {
				//echo 'false';
				return false;
			}
		}

		//fungsi CRUD
		function data_view_kota(){
			return $this->db->get('tb_kota');
		}
		
		function data_view_wisata(){
			return $this->db->get('tb_tempat_wisata');
		}
		
		function data_view_kuliner(){
			return $this->db->get('tb_tempat_kuliner');
		}
		
		function input_data($data, $table){
			$this->db->insert($table, $data);
		}
		
		function hapus_data($where, $table){
			$this->db->where($where);
			$this->db->delete($table);
		}
		
		function edit_data($where, $table){
			return $this->db->get_where($table, $where);
		}
		
		function update_data($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table, $data);
		}
		
		//fungsi Login
		function cek_login($table, $where){
			return $this->db->get_where($table, $where);
		}


	}

?>
