<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'/libraries/JWT.php';
use \Firebase\JWT\JWT;

class UserController extends CI_Controller {

	private $secret;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}

	public function response($data)
	{
			$this->output
					->set_content_type('application/json')
					->set_status_header(200)
					->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();

			exit;
	}

	public function register()
	{
		return $this->response($this->user->save());
	}

	public function get_all()
	{
		return $this->response($this->user->get());
	}

	public function get($id)
	{
		return $this->response($this->user->get('id', $id));
	}

	public function login()
	{
		$date = new DateTime();

		if (!$this->user->is_valid()) {
			return $this->response([
					'success' => false,
					'message' => 'Email atau password salah'
			]);
		}

		$user = $this->user->get('email', $this->input->post('email'));
		// Lanjut jika login berhasil
		$payload['id'] 		= $user->id;
		$payload['email'] = $user->email;
		$payload['iat'] 	= $date->getTimestamp();
		$payload['exp'] 	= $date->getTimestamp() + 60*60*2;

		$output['id_token'] = JWT::encode($payload, $this->secret);

		$this->response($output);
	}
}
