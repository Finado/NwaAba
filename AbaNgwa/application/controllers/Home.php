<?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 10/2/2017
 * Time: 12:53 PM
 */
class Home extends CI_Controller{

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

    public function Index(){
        $this->Header();

        $data = array();

        $data['featuredCompany'] = $this->model_users->Show_Featured_Company();
        $data['jobs'] = $this->model_users->Show_Featured_Jobs();
        $data['properties'] = $this->model_users->Featured_Properties();
        $data['news'] = $this->model_users->Show_News();
        $data["title"] = "NwaAba | Find everything in Aba";


        $this->load->view('home/dashboard', $data);

        $this->Footer();
    }



    public function Orders(){

        $this->Header();

        $this->load->view('company/orders');

        $this->Footer();

    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('location: index.php/Home');
    }

    public function proupload($path){

        if(isset($path)) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
            $temp = explode(".", $path["name"]);
            $extension = end($temp);
            if ((($path["type"] == "image/gif")
                    || ($path["type"] == "image/jpeg")
                    || ($path["type"] == "image/jpg")
                    || ($path["type"] == "image/pjpeg")
                    || ($path["type"] == "image/x-png")
                    || ($path["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200000)
                && in_array($extension, $allowedExts)
            ) {
                if ($path["error"] > 0) {
                    $message = "Return Code: " . $path["error"] . "<br>";
                } else {


                    move_uploaded_file($path["tmp_name"],
                        "assets/uploads/" . $path["name"]);
                    // Save the uploaded passport information to the database




                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }

    public function CompanyLogo()
    {

        $this->Header();
        if(isset($_POST['adder']))
        {
            $data = array();
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];
            $udata = array(

                'Logo' => $path
            );

            $this->model_users->UploadLogo($udata, $this->session->userdata('user_id') );
            $this->logoupload($image);
            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Logo Uploaded
                        </div>';
        }
        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('company/companylogo', @$data);
        $this->Footer();
    }


    public function logoupload($path){

        if(isset($path)) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
            $temp = explode(".", $path["name"]);
            $extension = end($temp);
            if ((($path["type"] == "image/gif")
                    || ($path["type"] == "image/jpeg")
                    || ($path["type"] == "image/jpg")
                    || ($path["type"] == "image/pjpeg")
                    || ($path["type"] == "image/x-png")
                    || ($path["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200000)
                && in_array($extension, $allowedExts)
            ) {
                if ($path["error"] > 0) {
                    $message = "Return Code: " . $path["error"] . "<br>";
                } else {
                    move_uploaded_file($path["tmp_name"],
                        "assets/uploads/profile/" . $path["name"]);
                    // Save the uploaded passport information to the database


                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }

    public function BasicInfo()
    {

        $this->Header();
        $data = array();

        if(isset($_POST['addbasic'])) {
            $user_id = $this->session->userdata('user_id');
            $address = $this->input->post('address');
            $services = $this->input->post('services');
            $website = $this->input->post('website');

            $data = array(
                'Id' => $user_id,
                'CompanyAddress' => $address,
                'Services' => $services,
                'Website' => $website

            );

            $this->model_users->SaveBasic($data, $user_id);

            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         Successfully Saved
                        </div>';
        }


        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('company/basicinfo', $data);
        $this->Footer();
    }



    /* For Register and Login */

    public function register()
    {
        $validator = array('success' => false, 'messages' => array());

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
                $validator['messages'] = 'http://localhost/NwaAba/AbaNgwa/index.php/User';
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

    //forgot companydetails ends here

    public function search()
    {
        $data = array();
        //$this->Header2();
        $clicked = $this->input->post('search');
        if (isset($clicked)) {
            //$search = $_GET['search'];

            $category = $this->input->post('category');
            $keyword = $this->input->post('keyword');

            if($category == 'companies')
            {
                $this->searchcompanies($keyword);
            }
            elseif($category == "properties")
            {
                $this->searchproperties($keyword);
            }
            elseif($category == 'jobs')
            {
                $this->searchjobs($keyword);
            }
            elseif($category == 'products')
            {
                $this->searchproducts($keyword);
            }


        }

    }

    //for search pages
    public function searchjobs($search){
        $this->Header2();
        $data["jobs"] = $this->model_users->getJobs($search);

        /*foreach($logdata as $logs){
            $userId = $logs->Id;
        }*/

        //$data['logo'] = $this->model_users->Show_Company_Logo($userId);

        $this->load->view('home/searchjobs', $data);
        $this->Footer();
    }

    public function searchcompanies($search){
        $this->Header2();
        $data["companies"] = $this->model_users->getCompanies($search);


        $this->load->view('home/searchcompanies', $data);
        $this->Footer();
    }

    public function searchproducts($search){
        $this->Header2();
        $data["products"] = $this->model_users->getProducts($search);


        $this->load->view('home/searchproducts', $data);
        $this->Footer();
    }
    public function searchproperties($search){
        $this->Header2();
        $data["properties"] = $this->model_users->getProperties($search);


        $this->load->view('home/searchproperties', $data);
        $this->Footer();
    }



    //for individual pages

        public function  jobs()
        {
            $data = array();
            $this->Header2();
            $data["title"] = "NwaAba | Find everything in Aba";

            $config = array();
            $config["base_url"] = base_url() . "index.php/home/jobs";
            $total_row = $this->model_users->record_count();
            $config["total_rows"] = $total_row;
            $config["per_page"] = 1;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            if($this->uri->segment(3)){
                $page = ($this->uri->segment(3)) ;
            }
            else{
                $page = 1;
            }
            $data["jobs"] = $this->model_users->fetch_jobs($config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );


            $data['numjob'] = $this->model_users->Show_Jobs();

            $this->load->view('home/jobs', $data);
            $this->Footer();

        }

        public function  companies()
        {
            $data = array();
            $this->Header2();
            $data["title"] = "NwaAba | Find everything in Aba";


            $data['featuredCompany'] = $this->model_users->Show_Approved_Company();

            $this->load->view('home/companies', $data);
            $this->Footer();

        }

        public function  products()
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['products'] = $this->model_users->Show_Portfolio();
        $this->load->view('home/products', $data);
        $this->Footer();

    }

        public function  properties()
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";

        $data['properties'] = $this->model_users->Show_Properties();
        $this->load->view('home/properties', $data);
        $this->Footer();

    }


        public function  news()
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['news'] = $this->model_users->Show_News();
        $this->load->view('home/news', $data);
        $this->Footer();

    }



    //for individual pages details

        public function  newsdetails()
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['news'] = $this->model_users->Show_News();
        $this->load->view('home/newsdetails', $data);
        $this->Footer();

    }



    public function  propertydetails($id)
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['property'] = $this->model_users->Show_PropertyDetails($id);
        $this->load->view('home/propertydetails', $data);
        $this->Footer();

    }

        public function companydetails($companyId){

        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";
       // $companyId = $this->uri->segment(3);
        $company_details = $this->model_users->Show_CompanyDetails($companyId);
        /* if(isset($artisanId)){
            $user_details = $this->model_users->jk_users($artisanId);
            $logdata = $this->model_users->jk_users($artisanId);

            foreach($logdata as $logs){
                $userId = $logs['Id'];
            }

            $data['logo'] = $this->model_users->Show_Company_Logo($userId);
        }*/

        foreach($company_details as $user){
            $data['id'] = $user['Id'];
            $data['user'] = $user['Name'];
            $data['loco'] = $user['Address'];
            $data['phone'] = $user['Phone'];
            $data['mail'] = $user['Email'];
            $data['website'] = $user['Website'];
            $data['phone'] = $user['Phone'];
            $data['about'] = $user['AboutUs'];
            //$data['profileimage'] = $user['Image'];
            $data['service'] = $user['Services'];

        };


        $data['products'] = $this->model_users->Show_User_Portfolio($companyId);

      /* foreach($products as $product){

            $data['pro_Id'] = $product['Id'];
            $data['Title'] = $product['Title'];
            $data['Category'] = $product['Category'];
            $data['Price'] = $product['Price'];
            $data['Description'] = $product['Description'];
            $data['Image'] = $product['Image'];

        } */

        $this->load->view('home/companydetails', $data);
        $this->Footer();

    }

        public function  productdetails($id)
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['products'] = $this->model_users->Show_ProductById($id);
        $this->load->view('home/productdetails', $data);
        $this->Footer();

    }

        public function  jobdetails($Id)
    {
        $data = array();
        $this->Header2();
        $data["title"] = "NwaAba | Find everything in Aba";
        //$id = $this->uri->segment(3);

        $jobdetails = $this->model_users->Show_JobDetails($Id);

        foreach($jobdetails as $jobdetail)
        {
            $data['title'] = $jobdetail['Title'];
            $data['location'] = $jobdetail['Location'];
            $data['tags'] = $jobdetail['JobTags'];
            $data['description'] = $jobdetail['Description'];
            $data['appemail'] = $jobdetail['ApplicationEmail'];
            $data['closingDate'] = $jobdetail['CosingDate'];
            $data['companyName'] = $jobdetail['CompanyName'];
            $data['website'] = $jobdetail['Website'];
            $data['tagline'] = $jobdetail['Tagline'];
            $data['video'] = $jobdetail['VideoURL'];
            $data['twitter'] = $jobdetail['TwitterUsername'];
            $data['image'] = $jobdetail['Image'];
            $data['type'] = $jobdetail['JobType'];
        }


        $this->load->view('home/jobdetails', $data);
        $this->Footer();

    }


}