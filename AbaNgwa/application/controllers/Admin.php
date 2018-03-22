<?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 10/2/2017
 * Time: 12:53 PM
 */
class Admin extends CI_Controller{

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



        foreach ($user_details as $user) {

            $data['companyName'] = $user['CompanyName'];
            $data['email'] = $user['Email'];
            $data['phone'] = $user['Phone'];
            $data['signUpDate'] = $user['SignUpDate'];

        }
        $this->load->helper('url');
        $data["title"] = "NwaAba | Find everything in Aba";
        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('company/header', $data);
    }

    public function Footer(){
        $this->load->helper('url');
        $this->load->view('company/footer');
    }

    public function Index(){
        $this->Header();

        $user_details = $this->model_users->userDetails($this->session->userdata('user_id'));

        $data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $pro = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));

        $data['companies'] = $this->model_users->Show_Company();
        $data['properties'] = $this->model_users->Show_Properties2();
        $data['jobs'] = $this->model_users->Show_Jobs2();
        $data['products'] = $this->model_users->Show_Portfolio();
        $data['users'] = $this->model_users->users();


        $data['pronum'] = count($pro);

        foreach ($user_details as $user) {

            $data['companyName'] = $user['CompanyName'];
            $data['email'] = $user['Email'];
            $data['phone'] = $user['Phone'];
            //$data['loco'] = $user['Location'];
            // $data['phone'] = $user['Mobile'];
            //$data['mail'] = $user['Email'];
            // $data['reputation'] = $user['ReputationStatus'];
            //$data['profileview'] = $user['ProfileViewCount'];
            //$data['profileimage'] = $user['Image'];

        }


        $this->load->view('company/dashboard', $data);

        $this->Footer();
    }

    public function Users(){
        $this->Header();
        $data = array();

        $data['users'] = $this->model_users->users();


        $this->load->view('company/manage_users', $data);
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

            $this->model_users->UploadPort($data);
            $this->proupload($image);
            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Product Uploaded Successfully
                        </div>';
        }

        $data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $this->load->view('company/products', $data);
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
        header('location: http://localhost/ikotashops');
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
                'UserId' =>  $user_id,
                'salary' => $salary

            );

            $this->model_users->AddJob($data);

            $data['msg'] = ' <div id="successMessage" class="notification notice closeable margin-bottom-40">
                                        <p><span>Successfully Added!</span> </p>
                                    </div>';


           /* '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         Successfully Added!
                        </div>'; */
        }


        $data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('company/add_job', $data);
        $this->Footer();

    }

    public  function  ManageJobs(){
        $this->Header();
        $data = array();

        $data['jobs'] = $this->model_users->Show_Jobs2();


        $this->load->view('company/manage_job', $data);
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
        $this->load->view('company/add_news', $data);
        $this->Footer();

    }

    public  function  ManageNews(){
        $this->Header();
        $data = array();

        $data['news'] = $this->model_users->Show_News();


        $this->load->view('company/manage_news', $data);
        $this->Footer();
    }





    //-------------------------------------->Propety stuffs below---------------------------->

    public function AddProperty(){

        $this->Header();
        $data = array();

        if(isset($_POST['add'])) {
            $user_id = $this->session->userdata('user_id');

            $title = $this->input->post('title');
            $location = $this->input->post('location');
            $category = $this->input->post('category');
            $description = $this->input->post('description');
            //$image = $this->input->post('image');
            $image = $_FILES['image'];
            $path = $_FILES['image']['name'];



            $data = array(
                //'Id' => $user_id,
                'Name' => $title,
                'Location' => $location,
                'Category' => $category,
                'Description' => $description,
                'Image' => $path


            );

            $this->model_users->Add_Properties($data);
            $this->propertyupload($image);
            $data['msg'] = ' <div id="successMessage" class="notification notice closeable margin-bottom-40">
                                        <p><span>Successfully Added!</span> </p>
                                    </div>';


            /* '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Successfully Added!
                         </div>'; */
        }


        //$data['logo'] = $this->model_users->Show_Company_Logo($this->session->userdata('user_id'));
        $this->load->view('company/add_properties', $data);
        $this->Footer();


    }


    public  function  ManageProperty(){
        $this->Header();
        $data = array();

        $data['properties'] = $this->model_users->Show_Properties2();


        $this->load->view('company/manage_property', $data);
        $this->Footer();
    }
    public  function  ManageProducts(){
        $this->Header();
        $data = array();

        $data['products'] = $this->model_users->Show_Portfolio();


        $this->load->view('company/manage_products', $data);
        $this->Footer();
    }


    public function Approve_Property($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Approved' => 1
        );

        $approve = $this->model_users->approve_property($value, $id );



            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageProperty");


    }


    public function Featured_Property($id)
{
    //$approve = $this->model_users->approve_property($id);

    $value = array(

        'Featured' => 1
    );

    $approve = $this->model_users->featured_property($value, $id );



    $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

    // header:("/index,php/Admin/ManageProperty");

    header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageProperty");



}

    public function Featured_Product($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Featured' => 1
        );

        $approve = $this->model_users->featured_product($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        // header:("/index,php/Admin/ManageProperty");

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageProducts");



    }


    public function Approve_Product($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Approved' => 1
        );

        $approve = $this->model_users->approve_product($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        // header:("/index,php/Admin/ManageProperty");

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageProducts");



    }

    public function  Property_Details($id)
    {
        $data = array();
        $this->Header();
        $data["title"] = "NwaAba | Find everything in Aba";


        $data['property'] = $this->model_users->Show_PropertyDetails($id);
        $this->load->view('company/property_details', $data);
        $this->Footer();

    }




    //---------------------------------------------->Jobs stuffs below--------------------------------------

    public function Approve_Jobs($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Approved' => 1
        );

        $approve = $this->model_users->approve_job($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageJobs");


    }



    public function Featured_Jobs($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Featured' => 1
        );

        $approve = $this->model_users->featured_job($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';
        // header:("/index,php/Admin/ManageProperty");
        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageJobs");

    }


    public function  Job_Details($id)
    {
        $data = array();
        $this->Header();
        $data["title"] = "NwaAba | Find everything in Aba";


        $jobdetails = $this->model_users->Show_JobDetails($id);

        foreach($jobdetails as $jobdetail)
        {
            $data['id'] = $jobdetail['Id'];
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
            $data['salary'] = $jobdetail['salary'];
        }


        $data['property'] = $this->model_users->Show_PropertyDetails($id);
        $this->load->view('company/job_details', $data);
        $this->Footer();

    }





//---------------------------------------------------->Company stuffs below----------------------------

    public function AddCompany(){

        $this->Header();
        if(isset($_POST['add'])) {
            //$user_id = $this->session->userdata('user_id');
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
                'Logo' => $path
            );

            $this->model_users->Add_Company($data);
            $this->companyupload($image);
            $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Product Uploaded Successfully
                        </div>';
        }

        $data['products'] = $this->model_users->Show_User_Portfolio($this->session->userdata('user_id'));
        $this->load->view('company/add_company', $data);
        $this->Footer();


    }


    public function ManageCompany(){

        $this->Header();


        $data['companies'] = $this->model_users->Show_Company();
        $this->load->view('company/manage_companies', $data);
        $this->Footer();


    }


    public function Approve_Company($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Approved' => 1
        );

        $approve = $this->model_users->approve_company($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageCompany");


    }

    public function Featured_Company($id)
    {
        //$approve = $this->model_users->approve_property($id);

        $value = array(

            'Featured' => 1
        );

        $approve = $this->model_users->featured_company($value, $id );



        $data['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Successfully Approved!
                        </div>';

        header("Location: http://localhost/NwaAba/AbaNgwa/index.php/Admin/ManageCompany");


    }

    public function  Company_Details($id)
    {
        $data = array();
        $this->Header();
        $data["title"] = "NwaAba | Find everything in Aba";


        $jobdetails = $this->model_users->Show_JobDetails($id);

        foreach($jobdetails as $jobdetail)
        {
            $data['id'] = $jobdetail['Id'];
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
            $data['salary'] = $jobdetail['salary'];
        }


        $data['property'] = $this->model_users->Show_PropertyDetails($id);
        $this->load->view('company/job_details', $data);
        $this->Footer();

    }



//------------------------------------------------->Uploads stuffs---------------------------------------

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