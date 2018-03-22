<?php
/**
 * Created by PhpStorm.
 * User: FRANCONET
 * Date: 5/23/2017
 * Time: 11:55 PM
 */
class UserModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function UploadPort($values){

        $this->db->insert('jk_products', $values);
    }

    public function UploadLogo($values, $userId){


        $this->db->where('Id', $userId);
        $query = $this->db->update('jk_users', $values);
    }



    public function approve_property($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_properties', $value);
    }

    public function featured_property($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_properties', $value);
    }




    public function approve_job($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_jobs', $value);
    }

    public function featured_job($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_jobs', $value);
    }


    public  function  approve_company($value,$Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_company', $value);
    }

    public function featured_company($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_company', $value);
    }




    public function SaveBasic($values, $userId){


        $this->db->where('Id', $userId);
        $query = $this->db->update('jk_users', $values);
    }

    public function Show_User_Portfolio($userId){
        $this->db->select('*');
        $this->db->from('jk_products');
        $this->db->where('UserId', $userId);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_ProductById($Id){
        $this->db->select('*');
        $this->db->from('jk_products');
        $this->db->where('Id', $Id);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }



    public function Show_Company_Logo($userId){
        $this->db->select('*');
        $this->db->from('jk_users');
        $this->db->where('Id', $userId);
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Featured_Company(){
        $this->db->select('*');
        $this->db->from('jk_company');
        $this->db->where('Approved', 1) && $this->db->where('Featured', 1);
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Company(){
        $this->db->select('*');
        $this->db->from('jk_company');
       // $this->db->where('Approved', 1) && $this->db->where('Featured', 1);
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Approved_Company(){
        $this->db->select('*');
        $this->db->from('jk_company');
        $this->db->where('Approved', 1);
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Portfolio(){
        $this->db->select('*');
        $this->db->from('jk_products');
        $query= $this->db->get();
        return $query->result_array();
    }

    public function approve_product($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_products', $value);
    }

    public function featured_product($value, $Id){
        $this->db->where('Id', $Id);
        $query = $this->db->update('jk_products', $value);
    }


    //Save and Get Like for porfolio
    public function Save_like($table, $values){
        $this->db->insert($table, $values);
    }


    public function get_likes($album){

        $this->db->select('*');
        $this->db->from('reaction');
        $this->db->where('linker', $album);
        $query= $this->db->get();
        return $query->result_array();

    }

    /* User registration and Login */

    public function register()
    {

        $salt = $this->salt();

        $password = $this->makePassword($this->input->post('password'), $salt);

        $dateTime = new DateTime();
        $time = $dateTime->format("Y-m-d H:i:s");

        $insert_data = array(
            'Email' => $this->input->post('email'),
            'Password' => $password,
            'Salt' => $salt,
            'Phone' => $this->input->post('phone'),
            'Category' => 'user',
            'SignUpDate' => $time,
            'CompanyName' => $this->input->post('name')
        );

        $this->db->insert('jk_users', $insert_data);
    }

    public function salt()
    {
        return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
    }

    public function makePassword($password = null, $salt = null)
    {
        if($password && $salt) {
            return hash('sha256', $password.$salt);
        }
    }

    public function validate_username()
    {
        $username = $this->input->post('emails');
        $sql = "SELECT * FROM jk_users WHERE Email = ?";
        $query = $this->db->query($sql, array($username));
        return ($query->num_rows() == 1) ? true: false;
    }


    public function fetchDataByUsername($username = null)
    {
        if($username) {
            $sql = "SELECT salt FROM jk_users WHERE Email = ?";
            $query = $this->db->query($sql, array($username));
            $result = $query->row_array();

            return ($query->num_rows() == 1) ? $result : false;
            return $result;
        }
    }

    public function login($loginTime)
    {
        $username = $this->input->post('emails');
        $password = $this->input->post('passwords');

        $userData = $this->fetchDataByUsername($username);

        if($userData) {

            $sql2 = "UPDATE jk_users SET LastLogin='$loginTime' WHERE Email = ? ";
            $query2 = $this->db->query($sql2, array($username));

            $password = $this->makePassword($password, $userData['salt']);

            $sql = "SELECT * FROM jk_users WHERE Email = ? AND Password = ?";
            $query = $this->db->query($sql, array($username, $password));
            $result = $query->row_array();

            return ( $query->num_rows() == 1 ) ? $result['Id'] : false;
        } // /if
        else {
            return false;
        } // /else
    }

    public function fetchUserData($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM jk_users WHERE Id = ?";
            $query = $this->db->query($sql, array($userId));
            $result = $query->row_array();

            return $result;
        }
    }

    public function userDetails($userId){
        $this->db->select('*');
        $this->db->from('jk_users');
        $this->db->where('Id', $userId);
        $query= $this->db->get();
        return $query->result_array();

    }

    public function usernameExists($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM jk_users WHERE Username = ? AND Id != ?";
            $query = $this->db->query($sql, array($this->input->post('username'), $userId));
            return ($query->num_rows() >= 1) ? true : false;
        }
    }

    public function getUserDataById($userId) {
        $sql = "SELECT * FROM jk_users WHERE Id = ?";
        $query = $this->db->query($sql, array($userId));
        return $query->row_array();
    }

    public function validCurrentPassword($userId = null)
    {
        if($userId) {

            $getUserDataById = $this->getUserDataById($userId);
            $salt = $getUserDataById['salt'];
            $currentPassword = $this->makePassword($this->input->post('currentPassword'), $salt);

            return ($currentPassword == $getUserDataById['password']) ? true : false;
        }
    }

    public function update($userId)
    {
        if($userId) {
            $update_data = array(
                'Username' => $this->input->post('username'),
                'name' => $this->input->post('fullName'),
                'contact' => $this->input->post('contact'),
            );

            $this->db->where('id', $userId);
            $query = $this->db->update('jk_users', $update_data);

            return ($query === true) ? true : false;
        }
    }

    public function changepassword($userId)
    {
        $salt = $this->salt();

        $password = $this->makePassword($this->input->post('password'), $salt);

        $update_data = array(
            'Password' => $password,
            'salt' => $salt
        );

        $this->db->where('id', $userId);
        $query = $this->db->update('jk_users', $update_data);
        return ($query === true) ? true : false;
    }

    public  function UploadProfile($userIdss, $proImage){
        $sql2 = "UPDATE jk_users SET Image='$proImage' WHERE Id = ? ";
        $query2 = $this->db->query($sql2, array($userIdss));

    }

    public function deleteImage($imageId){
        $this->db->where('Id', $imageId);
        $this->db->delete('portfolio');
    }

    //Checking email before sending mail for forgot password

    public function emailExists()
    {
        $email = $this->input->post('email');
        $sql = "SELECT * FROM jk_users WHERE Email = ?";
        $query = $this->db->query($sql, array($email));
        return ($query->num_rows() == 1) ? true: false;
    }


    //Everything jk_users Search is below

    public function getjk_users($searchjk_users) {
        if(empty($searchjk_users))
            return array();

        $result = $this->db->like('Name', $searchjk_users)
            ->or_like('Username', $searchjk_users)
            ->or_like('Email', $searchjk_users)
            ->or_like('Location', $searchjk_users)
            ->or_like('Mobile', $searchjk_users)
            ->or_like('Skills', $searchjk_users)
            ->get('jk_users');

        return $result->result();
    }

    public function jk_users($userIdentity){

        $this->db->select('*');
        $this->db->from('jk_users');
        $this->db->where('Id', $userIdentity);
        $query= $this->db->get();
        return $query->result_array();


    }


    public function users(){

        $this->db->select('*');
        $this->db->from('jk_users');
        //$this->db->where('Id', $userIdentity);
        $query= $this->db->get();
        return $query->result_array();


    }

    public  function  ViewPort($userIdentity){
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('UserId', $userIdentity);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();

    }



    function getAllProduct() {
        $this->db->join('jk_category', 'jk_category.category_id = jk_product.category_id');
        $query = $this->db->get('jk_product');
        return checkRes($query);
    }

    function getAllProductCat($cat = NULL, $limit = NULL, $offset = FALSE) {
        // $limit = 16;
        $limit = $limit ? $limit : $limit = 16;
        $offset = $offset ? $offset : $offset = 0;
        $this->db->join('product_image', 'product_image.product_id = product.product_id','left');
        $this->db->join('category', 'category.category_id = product.category_id','inner');
        $this->db->group_by('product.product_id');
        //$not_draft = array('product_image.img_name !=' => 'draft');
        $where = ! empty($cat) ? array('category.slug' => $cat) : array();
        $query = $this->db->get_where('product', $where, $limit, $offset);
        //echo $this->db->last_query();
        return checkRes($query);
    }

    function countAllProductCat($cat = NULL) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id');
        $this->db->join('category', 'category.category_id = product.category_id');
        $this->db->group_by('product.product_id');
        $where = ! empty($cat) ? array('category.slug' => $cat) : array();
        $query = $this->db->get_where('product', $where);
        // echo $this->db->last_query();
        return $query->num_rows();
    }

    function getProduct($id) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id','inner');
        $query = $this->db->get_where('product', array('product.product_id' => $id));
        return checkRow($query);
    }

    function getProductDraft() {
        $this->db->order_by('product_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product', array('name' => 'draft'));
        //echo $this->db->last_query();
        return checkRow($query);
    }

    /** Draft only
     * @param unknown $product_id
     * @return boolean
     */
    function getProductImgDraft($product_id) {
        $this->db->order_by('image_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product_image', array('product_id' => $product_id,'img_name' => 'draft'));
        return checkRow($query);
    }

    /** Get All Product Image from 1 id
     *
     * @param int $id
     * @return boolean
     */
    function getAllProductImg($id) {
        $query = $this->db->get_where('product_image', array('product_id' => $id, 'img_name !=' => 'draft'));
        return checkRes($query);
    }

    function getLatestProductDraft($id) {
        $query = $this->db->get_where('product', array('product_id' => $id));
        return checkRow($query);
    }

    function getLatestProductImgDraft($id) {
        $this->db->order_by('image_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product_image', array('product_id' => $id));
        return checkRow($query);
    }

    function getProductSlug($slug) {
        $query = $this->db->get_where('product', array('slug' => $slug));
        return checkRow($query);
    }


    /** Get Only One Default Product Image
     * @param unknown $id
     * @return boolean
     */
    function getOneProductImg($id) {
        $this->db->limit(1);
        $this->db->order_by('product_id', 'ASC');
        $query = $this->db->get_where('product_image', array('product_id' => $id));
        return checkRow($query);
    }


    function checkSlug($slug) {
        $this->db->like('slug', $slug);
        $query = $this->db->get('product');
        if (checkRes($query)) {
            return $this->getLatestExistsSlug($slug);
        } else {
            return slugify($slug);
        }
    }

    function getLatestExistsSlug($slug) {
        $this->db->order_by('product_id', "desc");
        $this->db->like('slug', $slug);
        $this->db->limit(1);
        $query = $this->db->get('product');
        $slugName = checkRow($query);
        if (strpos($slugName->slug, '-') !== false) {
            $latestSlugPlus = substr($slugName->slug, strrpos($slugName->slug, '-') + 1) + 1;
            $latestSlugClear = preg_replace('/[0-9]+/', '', $slugName->slug);
            return $latestSlugClear . $latestSlugPlus;
        } else {
            return $slugName->slug . '-' . 1;
        }
    }

    function getAllSize() {
        $query = $this->db->get('size');
        return checkRes($query);
    }

    function getCatSlug($cat) {
        $this->db->like('slug', $cat);
        $this->db->limit(1);
        $query = $this->db->get('category');
        // echo $this->db->last_query();
        $row = checkRow($query);
        // print_r($row);exit();
        return $row->category_id;
    }

    function getProductCat($prod_id, $cat_id) {
        $query = $this->db->get_where('product', array('product_id' => $prod_id,'category_id' => $cat_id));
        return checkRes($query);
    }

    function insertProductImg($data) {
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }

    // Insert Quick Only
    function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    // Insert Quick Image Only
    function insertQuickProductImg($data) {
        $query = $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }

    function insertProductPrice($data) {
        $data_price['price'] = $data['price'];
        $data_price['unit_id'] = $data['unit_id'];
        $data_price['product_id'] = $data['product_id'];
        $data_price['status'] = 1;
        $data_price['description'] = "Product Pertama";
        $data_price['price'] = numberOnly($data['price']);
        $query = $this->db->insert('product_price', $data_price);
        return $this->db->insert_id();
    }

    function editProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
        unset($data['price']);
        unset($data['unit_id']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function updateProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
//         unset($data['stock']);
//         unset($data['qty']);
        $data['price'] = numberOnly($data['price']);
        $data['price_en'] = numberOnly($data['price_en']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function editProductImg($data, $id) {
        unset($data['image_id']);
        $query = $this->db->update('product_image', $data, array('image_id' => $id));
        fire($this->db->last_query());
        return $query;
    }

    /**
     * Resize Uploaded Image to original, small and thumb
     *
     * @param files $ori
     * @param files $new
     */
    function resize_all($config, $new_name, $width, $height, $quality, $type) {
        $config['new_image'] = FCPATH . 'assets/product/' . $type . '/' . $new_name;
        // echo $config['new_image'] . "<br/>";
        $config['width'] = $width;
        $config['height'] = $height;
        $config['quality'] = $quality;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        if (! $this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    function getProductSize() {
        return array('S' => 'Small','M' => 'Medium','L' => 'Large','XL' => 'Extra Large');
    }


    public function getCompanies($searchArtisan) {
        if(empty($searchArtisan))
            return array();

        $result = $this->db->like('Name', $searchArtisan)
            ->or_like('Phone', $searchArtisan)
            ->or_like('Email', $searchArtisan)
            ->or_like('Address', $searchArtisan)
            ->or_like('Services', $searchArtisan)
            ->get('jk_company');

        return $result->result_array();
    }
    public function getProperties($searchArtisan) {
        if(empty($searchArtisan))
            return array();

        $result = $this->db->like('Name', $searchArtisan)
            ->or_like('Category', $searchArtisan)
            ->or_like('Location', $searchArtisan)
            ->get('jk_properties');

        return $result->result_array();
    }
    public function getJobs($searchArtisan) {
        if(empty($searchArtisan))
          return array();

        $result = $this->db->like('Title', $searchArtisan)
            ->or_like('Location', $searchArtisan)
            ->or_like('JobType', $searchArtisan)
            ->or_like('Description', $searchArtisan)
            ->or_like('Website', $searchArtisan)
            ->or_like('Tagline', $searchArtisan)
            ->get('jk_jobs');

        return $result->result_array();
    }
    public function getProducts($searchArtisan){
        if(empty($searchArtisan))
            return array();

        $result = $this->db->like('Title', $searchArtisan)
            ->or_like('Category', $searchArtisan)
            ->or_like('Price', $searchArtisan)
            ->get('jk_products');

        return $result->result_array();
    }


    //new models

    public function AddJob($values){

        $query = $this->db->insert('jk_jobs', $values);
        return $query;
    }

    public function Show_Jobs(){
        $this->db->select('*');
        $this->db->from('jk_jobs');
       $this->db->where('Approved', 1);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Featured_Jobs(){
        $this->db->select('*');
        $this->db->from('jk_jobs');
        $this->db->where('Approved', 1) && $this->db->where('Featured', 1);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Jobs2(){
        $this->db->select('*');
        $this->db->from('jk_jobs');
        //$this->db->where('UserId', $userId);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }


    public function record_count() {
        return $this->db->count_all("jk_jobs");
    }

    // Fetch data according to per_page limit.
    public function fetch_jobs($limit, $id) {
        $this->db->limit($limit);
        $this->db->where('Id', $id);
        $query = $this->db->get("jk_jobs");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }


    public function Add_News($values){

        $query = $this->db->insert('jk_news', $values);
        return $query;
    }

    public function Add_Properties($values){

        $query = $this->db->insert('jk_properties', $values);
        return $query;
    }

    public function Add_Company($values){

        $query = $this->db->insert('jk_company', $values);
        return $query;
    }


    public function Show_News(){
        $this->db->select('*');
        $this->db->from('jk_news');
        //$this->db->where('UserId', $userId);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Show_Properties(){
        $this->db->select('*');
        $this->db->from('jk_properties');
        $this->db->where('Approved', 1);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    public function Featured_Properties(){
        $this->db->select('*');
        $this->db->from('jk_properties');
        $this->db->where('Approved', 1) && $this->db->where('Featured', 1) ;
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }


    public function Show_Properties2(){
        $this->db->select('*');
        $this->db->from('jk_properties');
        //$this->db->where('Approved', 1);
        $this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    // for details
    public function Show_JobDetails($Id)
    {
        $this->db->select('*');
        $this->db->from('jk_jobs');
        $this->db->where('Id', $Id);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();

    }
    public function Show_PropertyDetails($Id)
    {
        $this->db->select('*');
        $this->db->from('jk_properties');
        $this->db->where('Id', $Id);
        $query= $this->db->get();
        return $query->result_array();

    }
    public function Show_CompanyDetails($Id)
    {
        $this->db->select('*');
        $this->db->from('jk_company');
        $this->db->where('Id', $Id);
        $query= $this->db->get();
        return $query->result_array();
    }
    public function Show_ProductDetails($Id)
    {
        $this->db->select('*');
        $this->db->from('jk_products');
        $this->db->where('Id', $Id);
        $query= $this->db->get();
        return $query->result_array();
    }
    public function Show_NewsDetails($Id)
    {
        $this->db->select('*');
        $this->db->from('jk_news');
        $this->db->where('Id', $Id);
        $query= $this->db->get();
        return $query->result_array();
    }




    //------------------------------------------>Mainly for users---------------------------------------->

    public function get_company_by_userid($UserId)
    {
        $this->db->select('*');
        $this->db->from('jk_company');
        $this->db->where('UserId', $UserId);
        $query= $this->db->get();
        return $query->result_array();

    }


    public function get_property_by_userid($UserId)
    {

        $this->db->select('*');
        $this->db->from('jk_properties');
        $this->db->where('UserId', $UserId);
        $query= $this->db->get();
        return $query->result_array();

    }

    public function get_product_by_userid($UserId)
    {

        $this->db->select('*');
        $this->db->from('jk_products');
        $this->db->where('UserId', $UserId);
        $query= $this->db->get();
        return $query->result_array();

    }


    public function get_job_by_userid($UserId)
    {
        $this->db->select('*');
        $this->db->from('jk_jobs');
        $this->db->where('UserId', $UserId);
        $query= $this->db->get();
        return $query->result_array();

    }

//For activity
    public function get_activities()
    {
        $this->db->select('*');
        $this->db->from('jk_activity');
        $query= $this->db->get();
        return $query->result_array();

    }

    public function Add_Activity($values){

        $query = $this->db->insert('jk_activity', $values);
        return $query;
    }

}