<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
  	parent::__construct();
  }

	public function index() {
		$data = array();
		$data['page_title'] = "Home Page";
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'home';
		$config['total_rows'] = $this->db->where('cards.delete = 0')->get('cards')->num_rows();
		$config['per_page'] = 6;
		$config['num_links'] = 2;

		$config['full_tag_open']   = '<div class="pagination text-center">';
		$config['full_tag_close']  = '</div>';
		$config['num_tag_open']    = '<span class="btn">';
		$config['num_tag_close']   = '</span>';
		$config['cur_tag_open']    = '<span class="btn btn-raised btn-primary">';
		$config['cur_tag_close']   = '</span>';
		$config['next_tag_open']   = '<span class="hide">';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']   = '<span class="hide">';
		$config['prev_tag_close']  = '</span>';
		$config['first_tag_open']  = '<span>';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open']   = '<span>';
		$config['last_tag_close']  = '</span>';

		$this->pagination->initialize($config);
		$this->load->model('cards');
    $query = $this->cards->get_all_cards($config['per_page'], $this->uri->segment(2));
    if($query) {
      $data['cards'] = $query;
			$this->load_basic('home', $data);
    } else {
			$this->load_basic('home', $data);
		}
	}
}

-----

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Signup Page";
		$this->load_forms('signup', $data);
	}

	public function validate() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if($ispost) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'trim|strtolower|required|min_length[3]|max_length[10]|alpha|is_unique[users.username]',
				array(
                'required'	 => 'Required',
				'min_length' => 'Minimum length of 3',
				'max_length' => 'Maximum length of 10',
				'alpha' 	 => 'Only letters alowed',
				'is_unique'  => 'Someone\'s using it already'
				)
			);
			$this->form_validation->set_rules(
				'email',
				'Email',
				'trim|required|valid_email|max_length[30]|is_unique[users.email]',
				array(
                'required'		=> 'Required',
				'max_length' 	=> 'Maximum length of 30',
				'valid_email'	=> '%s format is not valid',
				'is_unique' 	=> 'Someone\'s using it already'
				)
			);
			$this->form_validation->set_rules(
				'password',
				'Password',
				'trim|required|min_length[8]|max_length[20]',
				array(
                'required'	 => 'Required',
				'min_length' => 'Minimum length of 8',
				'max_length' => 'Maximum length of 15'
				)
			);
			$this->form_validation->set_rules(
				'repeatPassword',
				'Password confirmation',
				'trim|required|matches[password]',
				array(
                'required' => 'Required',
				'matches'  => 'Doesn\'t match'
				)
			);
			if($this->form_validation->run()) {
				$this->load->model('validate');
				$query = $this->validate->signup();
				if($query) {
					$message = 'The account is successfully created. You can log in now.';
                    $this->session->set_flashdata('message', $message);
					redirect('login');
				}
    	} else {
				$data = array();
				$data['page_title'] = "Signup Page";
				$this->load_forms('signup', $data);
			}
		}
	}
}

-----
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Login Page";
		$this->load_forms('login', $data);

		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if($ispost) {
			$this->load->model('validate');
			$query = $this->validate->login();
			if(!$query) {
				$warning = 'Your credentials are not valid. Please try again.';
				$this->session->set_flashdata('warning', $warning);
				redirect ('login');
			} else {
				if($this->session->userdata('id_rolle') == 2) {
					redirect('dashboard');
				} else {
					redirect('/');
				}
			}
		} else {
			if($this->session->userdata('id_rolle') == 2) {
				redirect('dashboard');
			} else if($this->session->userdata('id_rolle') == 1) {
				redirect('/');
			}
		}
	}
}

-----
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->session->userdata('validated')) {
			$data = array(
				'id_user' ,
				'username',
				'email',
				'id_rolle',
				'validated'
			);
			$this->session->unset_userdata($data);
			$this->session->set_flashdata('message', 'Bye bye, hope to see You again soon.');
			redirect('/');
		} else {
			$this->session->set_flashdata('message', 'You have to be logged in first.');
			redirect ('/');
		}
	}
}

