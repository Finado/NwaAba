<?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 10/2/2017
 * Time: 12:53 PM
 */
class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('userModel', 'model_users');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        //$this->user_id = $this->session->id; //@todo put real user id in session

    }


    public function Header(){

        $data = array();
        $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

        if(!$this->session->userdata('user_id')){
            redirect("http://localhost/NwaAba/AbaNgwa/");
        }


        foreach ($user_details as $user) {

            $data['companyName'] = $user['CompanyName'];
            $data['email'] = $user['Email'];
            $data['phone'] = $user['Phone'];
            $data['signUpDate'] = $user['SignUpDate'];

        }
        $this->load->helper('url');
        $data["title"] = "NwaAba | Find everything in Aba";
        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('users/header', $data);
    }

    public function Footer(){
        $this->load->helper('url');
        $this->load->view('users/footer');
    }

    public function Index(){
        $this->Header();

        $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

       //$data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $pro = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));

        $data['products'] = $this->model_users->get_product_by_userid($this->session->userdata('user_id'));
        $data['properties'] = $this->model_users->get_property_by_userid($this->session->userdata('user_id'));
        $data['com'] = $this->model_users->get_company_by_userid($this->session->userdata('user_id'));
        $data['jobs'] = $this->model_users->get_job_by_userid($this->session->userdata('user_id'));


        $data['pronum'] = count($pro);
        foreach ($user_details as $user) {
            $data['companyName'] = $user['CompanyName'];
            $data['email'] = $user['Email'];
            $data['phone'] = $user['Phone'];
            $name = $user['CompanyName'];
            // $data['phone'] = $user['Mobile'];
            //$data['mail'] = $user['Email'];
            // $data['reputation'] = $user['ReputationStatus'];
            //$data['profileview'] = $user['ProfileViewCount'];
            //$data['profileimage'] = $user['Image'];
        }

        $this->load->view('users/dashboard', $data);
        $this->Footer();
    }

    public  function  Products(){
        $this->Header();
        if(isset($_POST['add'])) {
            $user_id = $this->session->userdata('user_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $category = $this->input->post('category');
            $description = $this->input->post('description');
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];
            $data = array(
                'UserId' => $user_id,
                'Title' => $title,
                'Price' => $price,
                'Category' => $category,
                'Description' => $description,
                'Image' => $path
            );

           //Adding activity starts here
            $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

            foreach ($user_details as $user) {

                $name = $user['CompanyName'];

            }

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");

            $values = array(

                'Activity' => "Upload a product",
                'User' => $name,
                'Date' =>  $time

            );

            $this->model_users->Add_Activity($values);
            //Adding activity stops here

            $this->model_users->UploadPort($data);
            $this->proupload($image);
            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully added for approval!
                        </div>';
        }

        $data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $this->load->view('users/products', $data);
        $this->Footer();
    }


    public  function  ManageProducts(){
        $this->Header();
        $data = array();

        $data['pros'] = $this->model_users->get_product_by_userid($this->session->userdata('user_id'));


        $this->load->view('users/manage_products', $data);
        $this->Footer();
    }



    public function Orders(){

        $this->Header();

        $this->load->view('users/orders');

        $this->Footer();

    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('location: http://localhost/NwaAba/AbaNgwa/index.php/Home');
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

    public function ProfilePhoto()
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
        $this->load->view('users/companylogo', @$data);
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
        $this->load->view('users/basicinfo', $data);
        $this->Footer();
    }

    public function AddJob(){

        $this->Header();
        $data = array();

        if(isset($_POST['add'])) {
            $user_id = $this->session->userdata('user_id');

            $email = $this->input->post('email');
            $title = $this->input->post('title');
            $location = $this->input->post('location');
            $jobtype = $this->input->post('jobtype');
            $category = $this->input->post('category');
            $jobtag = $this->input->post('jobtags');
            $description = $this->input->post('description');
            $appemail = $this->input->post('appemail');
            $closedate = $this->input->post('closedate');
            $companyname = $this->input->post('companyname');
            $website = $this->input->post('website');
            $tagline = $this->input->post('tagline');
            $video = $this->input->post('video');
            $twiiter= $this->input->post('twitter');
            $logo = $this->input->post('logo');
            $salary = $this->input->post('salary');


            $data = array(
                //'Id' => $user_id,
                'Useremail' => $email,
                'Title' => $title,
                'Location' => $location,
                'JobType' => $jobtype,
                'Category' => $category,
                'JobTags' => $jobtag,
                'Description' => $description,
                'ApplicationEmail' => $appemail,
                'CosingDate' => $closedate,
                'CompanyName' => $companyname,
                'Website' => $website,
                'Tagline' => $tagline,
                'VideoUrl' => $video,
                'TwitterUsername' => $twiiter,
                'image' => $website,
                'UserId' =>  $user_id,
                'salary' => $salary

            );

            $this->model_users->AddJob($data);

            $data['msg'] = ' <div id="successMessage" class="notification notice closeable margin-bottom-40">
                                        <p><span>Successfully added for approval!</span> </p>
                                    </div>';


            /* '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Successfully Added!
                         </div>'; */

            //Adding activity starts here
            $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

            foreach ($user_details as $user) {

                $name = $user['CompanyName'];

            }

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");

            $values = array(

                'Activity' => "Added a Job",
                'User' => $name,
                'Date' =>  $time

            );

            $this->model_users->Add_Activity($values);
            //Adding activity stops here




        }


        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('users/add_job', $data);
        $this->Footer();

    }

    public  function  ManageJobs(){
        $this->Header();
        $data = array();

        $data['jobs'] = $this->model_users->get_job_by_userid($this->session->userdata('user_id'));


        $this->load->view('users/manage_job', $data);
        $this->Footer();
    }

    public function AddNews(){

        $this->Header();
        $data = array();

        if(isset($_POST['add'])) {
            //$user_id = $this->session->userdata('user_id');

            $headline = $this->input->post('headline');
            $newstags = $this->input->post('newstag');
            $category = $this->input->post('category');
            $content = $this->input->post('content');
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];



            $data = array(
                //'Id' => $user_id,
                'Headline' => $headline,
                'NewsTag' => $newstags,
                'Category' => $category,
                'Content' => $content,
                'Image' => $path


            );

            $this->model_users->Add_News($data);
            $this->newsupload($image);

            $data['msg'] = ' <div id="successMessage" class="notification notice closeable margin-bottom-40">
                                        <p><span>Successfully Added!</span> </p>
                                    </div>';


            /* '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Successfully Added!
                         </div>'; */
        }


        //$data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('users/add_news', $data);
        $this->Footer();

    }

    public  function  ManageNews(){
        $this->Header();
        $data = array();

        $data['news'] = $this->model_users->Show_News();


        $this->load->view('users/manage_news', $data);
        $this->Footer();
    }

    public function AddProperty(){

        $this->Header();
        $data = array();

        if(isset($_POST['add'])) {
            $user_id = $this->session->userdata('user_id');

            $title = $this->input->post('title');
            $location = $this->input->post('location');
            $category = $this->input->post('category');
            $description = $this->input->post('description');
            $amount = $this->input->post('amount');
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");



            $data = array(
                //'Id' => $user_id,
                'Name' => $title,
                'Location' => $location,
                'Category' => $category,
                'Description' => $description,
                'Image' => $path,
                'UserId' =>  $user_id,
                'Amount' => $amount,
                'Date' => $time


            );

            $this->model_users->Add_Properties($data);
            $this->propertyupload($image);
            $data['msg'] = ' <div id="successMessage" class="notification notice closeable margin-bottom-40">
                                        <p><span>Successfully added for approval!</span> </p>
                                    </div>';


            /* '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Successfully Added!
                         </div>'; */


            //Adding activity starts here
            $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

            foreach ($user_details as $user) {

                $name = $user['CompanyName'];

            }

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");

            $values = array(

                'Activity' => "Added a property for " . $category,
                'User' => $name,
                'Date' =>  $time

            );

            $this->model_users->Add_Activity($values);
            //Adding activity stops here

        }


        //$data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('users/add_properties', $data);
        $this->Footer();


    }


    public  function  ManageProperty(){
        $this->Header();
        $data = array();

        $data['properties'] = $this->model_users->get_property_by_userid($this->session->userdata('user_id'));


        $this->load->view('users/manage_property', $data);
        $this->Footer();
    }



    public function AddCompany(){

        $this->Header();
        if(isset($_POST['add'])) {
            $user_id = $this->session->userdata('user_id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $category = $this->input->post('category');
            $address = $this->input->post('address');
            $website = $this->input->post('website');
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];
            $data = array(
                //'UserId' => $user_id,
                'Name' => $name,
                'Email' => $email,
                'Phone' => $phone,
                'Category' => $category,
                'Address' => $address,
                'Website' => $website,
                'Logo' => $path,
                'UserId' =>  $user_id
            );

            $this->model_users->Add_Company($data);
            $this->companyupload($image);
            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully added for approval!
                        </div>';


            //Adding activity starts here
            $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

            foreach ($user_details as $user) {

                $name = $user['CompanyName'];

            }

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");

            $values = array(

                'Activity' => "Added a company",
                'User' => $name,
                'Date' =>  $time

            );

            $this->model_users->Add_Activity($values);
            //Adding activity stops here


        }

        $data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $this->load->view('users/add_company', $data);
        $this->Footer();


    }

    public  function  ManageCompany(){
        $this->Header();
        $data = array();

        $data['pros'] = $this->model_users->get_company_by_userid($this->session->userdata('user_id'));


        $this->load->view('users/manage_company', $data);
        $this->Footer();
    }



    public function propertyupload($path){

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
                        "assets/uploads/property/" . $path["name"]);
                    // Save the uploaded passport information to the database




                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }


    public function newsupload($path){

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
                        "assets/uploads/news/" . $path["name"]);
                    // Save the uploaded passport information to the database




                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }

    public function companyupload($path){

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
                        "assets/uploads/logo/" . $path["name"]);
                    // Save the uploaded passport information to the database




                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }


}