<?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 3/24/2018
 * Time: 2:48 PM
 */
class Account extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('userModel', 'model_users');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('pagination');
        //$this->user_id = $this->session->id; //@todo put real user id in session

    }


    public function Header(){

        $data = array();

        $data["title"] = "NwaAba | Find everything in Aba";
        $this->load->view('home/header', $data);
    }

    public  function  Header2(){
        $this->load->helper('url');

        $data["title"] = "NwaAba | Find everything in Aba";
        $this->load->view('home/header2', $data);
    }
    public function Footer(){
        $this->load->helper('url');
        $this->load->view('home/footer');
    }

    public function Index()
    {


            $data = array();
            $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

            if($this->session->userdata('user_id')){
                redirect("http://localhost/NwaAba/AbaNgwa/index.php/User");
            }
            elseif(!$this->session->userdata('user_id'))
            {
                redirect("http://localhost/NwaAba/AbaNgwa/index.php/Account/Login");
            }



    }




    ///--------------------------------->Acccount redefined ------------------------------------------->



    public function login()
    {

        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";
        if(isset($_POST['login'])) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $validate_data = array(
                array(
                    'field' => 'emails',
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

            if($this->form_validation->run() === true)
            {

                $dateTime = new DateTime();
                $time = $dateTime->format("Y-m-d H:i:s");

                $login = $this->model_users->login($time);

                if ($login) {

                    $this->load->library('session');

                    $newdata = array(
                        'user_id' => $login,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    redirect('http://localhost/NwaAba/AbaNgwa/index.php/User');
                    //$validator['messages'] = 'Loading..............';
                    //$validator['messages'] = 'http://localhost/NwaAba/AbaNgwa/index.php/User';
                } else {
                    //$validator['success'] = false;
                    $this->session->set_flashdata('msg_login', '<div class="alert alert-danger text-center">Invalid User</div>');

                }

            }


                // /else
        }


        //$data['products'] = $this->model_users->Show_ProductById($id);
        $this->load->view('home/account', $data);
        $this->Footer();

    }


    public function register()
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";

        if(isset($_POST['register']))
        {

            $validate_data = array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
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
                    'rules' => 'required|integer|is_unique[jk_users.Phone]'
                ),
                array(
                    'field' => 'password',
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

                $name = $this->input->post('name');
                $email =  $this->input->post('email');
                $phone =  $this->input->post('phone');
                $pin = $this->input->post('password');

                $this->SmsAlert($phone, $pin, $name);
                //$this->send_confirmation($name, $pin, $email);


                $this->session->set_flashdata('msg','<div class="alert alert-success text-center text-success">Registration was successful. Check your email to for
details</div>');

            }
            else {
                $this->session->set_flashdata('msg','<div class="alert alert-info text-center
                text-success">Oops! Something went wrong!</div>');

            }



        }

        //$data['products'] = $this->model_users->Show_ProductById($id);
        $this->load->view('home/account2', $data);
        $this->Footer();
    }



    /*####################################### User Management by Mr.Francis################## */




    function send_confirmations($name,$hash){
        $this->load->library('email',  array('mailtype' => 'html'));  	//load email library
        $this->email->from('info@codinglab.ng', 'Coding Lab'); //sender's email
        $address = $this->input->post(html_escape('email'));	//receiver's email
        $subject="Coding Lab Email Verification";	//subject
        $data = $this->adminModel->get_hash_value($address);
        //$hash = $data['hash'];
        //$new_hash = $this->input->get($hash);
        $message= "<p>Thanks for signing up, $name! </p>

        Your account has been created. <br/>
        Here are your login details. <br/>
        ------------------------------------------------- <br/>
        Email   : . $address .
        -------------------------------------------------<br/>

       <p> Please click on the link below to activate your account:</p>
       <a href='http://www.codinglab.ng/Home/verify?email=$address&hash=$hash'>http://www.codinglab.ng/Home/verify?email=$address &hash=$hash </a>";
        /*-----------email body ends-----------*/
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();


    }


    function  verify(){


        $email = $_GET['email'];
        $hash = $_GET['hash'];




        $result = $this->adminModel->get_hash_value($email); //get the hash value which belongs to given email from database
        // $verified = $result['activation'];
        if($result['activation'] ==NULL)
        {
            if($result['activation_key']== $hash)
            {
                //check whether the input hash value matches the hash value retrieved from the database
                $update = $this->adminModel->verify_user($email); //update the status of the user as verified
                /*---Now you can redirect the user to whatever page you want---*/

                if($update==TRUE)
                {
                    redirect("Home/Login?user=$email");
                    //$this->Login();
                }
                redirect($this->Register());

            }

        }
        else
        {
            $this->Register();
        }
    }


    public function email_existss($email)
    {
        $data = array(
            'email' => $email
        );
        $this->db->where('email', $email);
        $query = $this->db->get('user',$data);
        return $query->row_array();
    }
    public function reset_password($email,$password){
        $data =array(
            'email' => $email,
            'password'=>$password);
        $email = $data['email'];

        if($data){
            $this->db->where('email', $email);
            $this->db->update('user', $data);
            return TRUE;
        }else{
            return FALSE;
        }

    }


    public function forgots(){

        //Loads the view for the recover password process.


        //$this->smartyci->display(APPPATH.'views/templates/forgot.tpl');
        if(isset($_POST['send']))
        {
            $this->recover_password();
            redirect('student/recover_password');
        }

    }
    public function reset_pass(){
        $this->load->library('smartyci');
        //Loads the view for the recover password process.

        redirect('student/login');


        //$this->smartyci->display(APPPATH.'views/templates/login.tpl');

    }
    public function recover_password(){
        $this->load->library('form_validation');
        $this->load->library('email', array('mailtype' => 'html'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
        $email = $this->input->post(html_escape('email'));
        $result = $this->student_model->email_exists($email);
        //check if email is in the database
        if ($email === $result['email'])
        {
            //$them_pass is the varible to be sent to the user's email
            $temp_pass = md5(uniqid());
            //send email with #temp_pass as a link

            $this->email->from('info@codinglab.ng', "Coding Lab");
            $this->email->to($email);
            $this->email->subject("Reset your Password");
            $message = "<p>This email has been sent as a request to reset your password</p>";
            $message .= "<p><a href='" . base_url() . "student/enter_pass/'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            $this->email->message($message);
            $send = $this->email->send();
            if ($send === TRUE)
            {
                echo "check your email for instructions, thank you";
            }

            else
            {
                echo "email was not sent, please contact your Network administrator";
            }

        }
        else
        {
            echo "your email is not in our database";
        }
    }


    public function enter_pass()
    {
        $this->load->library('form_validation');
        if(isset($_POST['reset']))
        {
            $email = $this->input->post(html_escape('email'));
            $new_pass = $this->input->post(html_escape('new_pass'));
            $this->input->post(html_escape('c_new_pass'));
            $salt = uniqid($new_pass);
            $hashed = hash('sha256', $new_pass.$salt);
            $this->form_validation->set_rules('email', 'Enail', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('new_pass', 'Password', 'required|trim');
            $this->form_validation->set_rules('c_new_pass', 'Confirm Password', 'required|trim|matches[password]');
            if ($this->form_validation->run()) {
                echo "passwords match";
            } else {
                echo "passwords do not match";
            }
            $query = $this->adminModel->reset_password($email, $hashed);
            if ($query === TRUE) {
                $this->reset_pass();
            }
        }

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
        $sender="NWaAba"; /* sender id */
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
                //die("SMS to $sendto was successful: [$answer]");
            }
            else
            {
                //die("an error has occurred: [$answer].");
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















}