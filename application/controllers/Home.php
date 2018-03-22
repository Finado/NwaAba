<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('userModel', 'model_users');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		//$this->user_id = $this->session->id; //@todo put real user id in session

	}

	public function index() {
		$this->show();
	}

	public function show() {
		$data['title'] = 'Home';
		$data['products'] = $this->model_users->getAllProductCat($cat=NULL,4);
		$data['productts'] = $this->model_users->Show_Portfolio();
		$data['featuredCompany'] = $this->model_users->Show_Featured_Company();


		$this->load->shop_template('home', $data);
	}

	public function promo() {
		$data['title'] = 'Promo';
		$this->load->shop_template('shop/promo', $data);
	}

	public function info() {
		phpinfo();
	}


	/* For Register and Login */

	public function register()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'companyName',
				'label' => 'Company Name',
				'rules' => 'required'
			),

			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|is_unique[jk_users.Email]'
			),

			array(
				'field' => 'phone',
				'label' => 'Phone',
				'rules' => 'required|integer'
			),
			array(
				'field' => 'passwords',
				'label' => 'Password',
				'rules' => 'required'
			)

		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_message('is_unique', 'The {field} already exists');
		$this->form_validation->set_message('integer', 'The {field} must be number');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {

			$this->model_users->register();

			$name = $this->input->post('companyName');
			$email =  $this->input->post('email');
			$phone =  $this->input->post('phone');
			$pin = $this->input->post('passwords');

			//$this->send_confirmation($name, $pin, $email);
			//$this->SmsAlert($phone, $pin, $name);

			$validator['success'] = true;
			$validator['messages'] = 'Sign up Successfully, check your phone / email for verification';
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}






	public function login()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|callback_validate_username'
			),
			array(
				'field' => 'passwords',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {

			$dateTime = new DateTime();
			$time = $dateTime->format("Y-m-d H:i:s");

			$login = $this->model_users->login($time);

			if($login) {

				$this->load->library('session');

				$newdata = array(
					'user_id'  => $login,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);

				$validator['success'] = true;
				//$validator['messages'] = 'Loading..............';
				$validator['messages'] = 'Company';
			}
			else {
				$validator['success'] = false;
				$validator['messages'] = 'Incorrect username/password combination';
			} // /else
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function validate_username()
	{
		$username = $this->model_users->validate_username();

		if($username === true) {
			return true;
		}
		else {
			$this->form_validation->set_message('validate_username', 'The {field} does not exists');
			return false;
		}
	}



	public function update() {
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|callback_username_exists'
			),
			array(
				'field' => 'fullName',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {
			$this->load->library('session');
			$userId = $this->session->userdata('user_id');

			$update = $this->model_users->update($userId);

			if($update) {

				$validator['success'] = true;
				$validator['messages'] = 'Successfully Updated';
			}
			else {
				$validator['success'] = false;
				$validator['messages'] = 'Incorrect username/password combination';
			} // /else
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function username_exists()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('user_id');

		$username_exists = $this->model_users->usernameExists($userId);

		if($username_exists === false) {
			return true;
		}
		else {
			$this->form_validation->set_message('username_exists', 'The {field} value already exists');
			return false;
		}

	}


	///Phone and Email verification

	function send_confirmation($name,$hash, $email){
		$this->load->library('email',  array('mailtype' => 'html'));  	//load email library
		$this->email->from('info@ikotashops.com.ng', 'IkotaShops.Com.Ng'); //sender's email
		$address = $email;	//receiver's email
		$subject="WorkBox Email Verification";	//subject
		//$data = $this->model_users->get_hash_value($address);
		//$hash = $data['hash'];
		//$new_hash = $this->input->get($hash);
		$message= "<p>Thanks for signing up, $name! </p>

        Your account has been created. <br/>
        Here is your verification pin. <br/>
        ------------------------------------------------- <br/>
        Pin: . $hash .
        -------------------------------------------------<br/>

       <p> Please, use the verification pin to activate your account. Thanks</p>
       <pre> Note, you wouldn't be able to login without verifying your account</pre>";
		/*-----------email body ends-----------*/
		$this->email->to($address);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();


	}


	public function SmsAlert($number, $pass, $name){
		/*********************************************************************************
		 * Sample code for sending SMS through HTTP API.
		Author: Ayodeji Ajala, iDevWorks Technologies Limited <deji@idevorks.com>
		Application granted only for SMSLive247 customers. ********************************************************************************/
		/* Variables with the values to be sent. */
		$owneremail="franconet34@gmail.com";
		$subacct="ONLINESMS";
		$subacctpwd="yes";
		$address = "you@me.com";	//receiver's email
		$password = "yes";
		//$name = "name";
		$dateTime = new DateTime();
		$time = $dateTime->format("Y-m-d H:i:s");
		$sendto=$number; /* destination number */
		$sender="Ikota Shops"; /* sender id */
		$message= "Dear $name Thanks for registration. Activate and start showcasing your products/services to the world. Your Password is: $pass ";

		/* create the required URL */
		$url = "http://www.smslive247.com/http/index.aspx?"
			. "cmd=sendquickmsg"
			. "&owneremail=" . UrlEncode($owneremail)
			. "&subacct=" . UrlEncode($subacct)
			. "&subacctpwd=" . UrlEncode($subacctpwd)
			. "&sender=" . UrlEncode($sender)
			. "&sendto=" . UrlEncode($sendto)
			. "&message=" . UrlEncode($message);
		/* call the URL */
		if ($f = @fopen($url, "r"))
		{
			$answer = fgets($f, 255);
			if (substr($answer, 0, 1) == "+")
			{
				die("SMS to $sendto was successful: [$answer]");
			}
			else
			{
				die("an error has occurred: [$answer].");
			}
		}
		else
		{
			//echo "Error: URL could not be opened.";
		}

	}



	//Forgot password starts here
	public function forgot(){
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|callback_email_exists'
			),

		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {


			//$this->model_users->emailExists();

			/*$this->load->library('email',  array('mailtype' => 'html'));  	//load email library
            $this->email->from('info@work.com.ng', 'WorkBox.Com.Ng'); //sender's email
            $address = $this->input->post(html_escape('email'));	//receiver's email
            $subject="WorkBox Password Reset";	//subject
            //$data = $this->model_users->get_hash_value($address);
            //$hash = $data['hash'];
            //$new_hash = $this->input->get($hash);
            $message= "<p>You requested to reset your password; follow below! </p>



   <p> The Link for resetpassword</p>
   <pre> Note, Ignore if this mail was by mistake or wrongly initiated</pre>";
            /*-----------email body ends-----------
            $this->email->to($address);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send(); */




			$validator['success'] = true;
			$validator['messages'] = 'Password reset link has been sent to your email';

		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);


	}


	public function email_exists()
	{

		$email = $this->input->post('email');

		$email_exists = $this->model_users->emailExists($email);

		if($email_exists === true) {
			return true;
		}
		else {
			$this->form_validation->set_message('email_exists', 'The {field} does not exists');
			return false;
		}
	}

	//forgot password ends here


	public function companydetails(){

		$data = array();
		$data["title"] = "My Work Box | Find Best Artisans by their portfolios";
		$artisanId = $this->uri->segment(3);
		if(isset($artisanId)){
			$user_details = $this->model_users->jk_users($artisanId);
			$logdata = $this->model_users->jk_users($artisanId);

			foreach($logdata as $logs){
				$userId = $logs['Id'];
			}

			$data['logo'] = $this->model_users->Show_Company_Logo($userId);
		}

		foreach($user_details as $user){
			$data['id'] = $user['Id'];
			$data['user'] = $user['CompanyName'];
			$data['loco'] = $user['CompanyAddress'];
			$data['phone'] = $user['Phone'];
			$data['mail'] = $user['Email'];
			$data['category'] = $user['Category'];
			//$data['profileview'] = $user['ProfileViewCount'];
			//$data['profileimage'] = $user['Image'];
			// $data['skills'] = $user['Skills'];

		};





		$data['products'] = $this->model_users->Show_User_Portfolio($artisanId);

		/*foreach($pro as $product){

			$data['pro_Id'] = $product['Id'];
			$data['Title'] = $product['Title'];
			$data['Category'] = $product['Category'];
			$data['Price'] = $product['Price'];
			$data['Description'] = $product['Description'];
			$data['Image'] = $product['Image'];

		} */



		$this->load->shop_template('shop/product', $data);


	}

	public function company()
	{
		$data = array();
		$data["title"] = "My Work Box | Find Best Artisans by their portfolios";
		if (isset($_GET['search'])) {
			$search = $_GET['search'];
			$data["artisanFound"] = $this->model_users->getArtisan($search);

			$logdata = $this->model_users->getArtisan($search);

			foreach($logdata as $logs){
				$userId = $logs->Id;
			}

			$data['logo'] = $this->model_users->Show_Company_Logo($userId);

		}



		$this->load->shop_template('company/search', $data);

	}
	public function search()
	{
		$data = array();

		if (isset($_GET['search'])) {
			$search = $_GET['search'];
			$data["artisanFound"] = $this->model_users->getArtisan($search);

			$logdata = $this->model_users->getArtisan($search);

			foreach($logdata as $logs){
				$userId = $logs->Id;
			}

			$data['logo'] = $this->model_users->Show_Company_Logo($userId);

		}



		$this->load->shop_template('company/search', $data);

	}

}