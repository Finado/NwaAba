<?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 10/2/2017
 * Time: 12:53 PM
 */
class Company extends CI_Controller{

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
        $data["title"] = "Ikota Shops | Find everything in Ikota Shopping Complex";
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




}