<?php

class Home extends CI_Controller 
{
	public function __construct()
  {
  	parent::__construct();
  }

  function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login', 'Имя пользователя', 
			'trim|required|min_length[5]|max_length[12]',
			array('required' => 'Вы не заполнили %s.',
			'min_length' => '%s должно быть не меньше 5 символов.',
			'max_length' => '%s должно быть не больше 12 символов.')
		);
		$this->form_validation->set_rules('pass1', 'Пароль', 
			'trim|required|min_length[5]|max_length[12]', 
			array('required' => 'Вы не заполнили %s.',
			'min_length' => '%s должно быть не меньше 5 символов.',
			'max_length' => '%s должно быть не больше 12 символов.')
		);
		$this->form_validation->set_rules('pass2', 'Подтверждение пароля', 
			'required|matches[pass1]',
			array('required' => 'Вы не заполнили %s.',
			'matches' => 'Пароль и подтверждение не совпадают!')
		);
		$this->form_validation->set_rules('email', 'Адрес электронной почты', 
			'required|valid_email', 
			array('required' => 'Вы не заполнили %s.',
			'valid_email' => 'Неверный адрес электронной почты!')
		);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_validation');
		}
		else
		{
			$data['success']='Валидация успешно пройдена!';
			$this->load->view('form_validation',$data);
		}
	}  
}
?>
