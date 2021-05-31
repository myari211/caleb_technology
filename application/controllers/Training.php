<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Training extends MY_Controller
{
    public $data = array();
    public $module = 'Training';
    public $section = 13;
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array(
            'web/Model_content',
            'web/Model_training',
            'web/Model_menu',
            'backend/Model_language',
            'backend/Model_logcms'
        ));
        $this->load->helper(array(
            'funcglobal',
            'menu',
            'accessprivilege',
            'alias',
            'form',
            'url'
        ));
        $this->load->library(array(
            'form_validation'
        ));
        $this->data['controller'] = $this->module;
        $getmodule                = $this->Model_content->getModuleId($this->data['controller']);
        foreach ($getmodule as $gm) {
            $this->data['controller'] = $gm->module_path;
            $this->data['module_id']  = $gm->module_id;
            $_SESSION['module_id']    = $this->data['module_id'];
        } //$getmodule as $gm
        $this->data['menu_id'] = $this->Model_content->getMenuContent($_SESSION['module_id']);
    }
    public function index()
    {
        $this->data['title']                    = $this->data['controller'];
        $this->data['getContent']               = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
        $pathTrainingQuote                      = PATH_ASSETS . "/json/training_quote.json";
        $arrTrainingQuote                       = json_decode(file_get_contents($pathTrainingQuote), TRUE);
        $this->data['brand_quote']              = $arrTrainingQuote['brand_quote'];
        $this->data['event_quote']              = $arrTrainingQuote['event_quote'];
        $this->data['getTraining']              = $this->Model_training->getListTraining();
        $pathHeadQuote                          = PATH_ASSETS . "/json/training_head_quote.json";
        $arrHeadQuote                           = json_decode(file_get_contents($pathHeadQuote), TRUE);
        $this->data['quote_head']               = $arrHeadQuote['quote_desc'];
        $pathlatest_trainingHome                = PATH_ASSETS . "/json/latest_training.json";
        $arrLatest_trainingHome                 = json_decode(file_get_contents($pathlatest_trainingHome), TRUE);
        $this->data['dataLatest_trainingHome']  = $arrLatest_trainingHome;
        $this->data['countLatest_trainingHome'] = count($arrLatest_trainingHome);
        $this->load->view('vtraining', $this->data);
    }
    function detail($training_id = null)
    {
        $_SESSION['url']                   = current_url();
        $this->data['module_id']           = $this->module_id;
        $this->data['module_name']         = $this->module_name;
        $_SESSION['training_id']           = $training_id;
        $getTraining                       = $this->Model_training->getTraining($training_id);
        $this->data['countTraining']       = count($getTraining);
        $this->data['training_id']         = $getTraining[0]['training_id'];
        $this->data['title']               = $getTraining[0]['training_title'];
        $this->data['training_type']       = $getTraining[0]['training_type'];
        $this->data['training_location']   = $getTraining[0]['training_location'];
        $this->data['training_image']      = $getTraining[0]['training_image'];
        $this->data['training_desc']       = $getTraining[0]['training_desc'];
        $this->data['training_date']       = $getTraining[0]['training_date'];
        $this->data['training_start_time'] = $getTraining[0]['training_start_time'];
        $this->data['training_end_time']   = $getTraining[0]['training_end_time'];
        $this->data['description']         = $getTraining[0]['training_meta_description'];
        $this->data['keywords']            = $getTraining[0]['training_meta_keywords'];
        $this->load->view('vtrainingdetail', $this->data);
    }
    function sendTraining()
    {
        $session_url                       = isset($_SESSION['url']) ? $_SESSION['url'] : '';
        $this->data['session_url']         = $session_url;
        $this->data['subjectform']         = 'Training Form ';
        $this->data['title']               = "Send Mail Training";
        $getTraining                       = $this->Model_training->getTraining($_SESSION['training_id']);
        $this->data['countTraining']       = count($getTraining);
        $this->data['training_id']         = $getTraining[0]['training_id'];
        $this->data['title']               = $getTraining[0]['training_title'];
        $this->data['training_type']       = $getTraining[0]['training_type'];
        $this->data['training_location']   = $getTraining[0]['training_location'];
        $this->data['training_image']      = $getTraining[0]['training_image'];
        $this->data['training_desc']       = $getTraining[0]['training_desc'];
        $this->data['training_date']       = $getTraining[0]['training_date'];
        $this->data['training_start_time'] = $getTraining[0]['training_start_time'];
        $this->data['training_end_time']   = $getTraining[0]['training_end_time'];
        $this->data['description']         = $getTraining[0]['training_meta_description'];
        $this->data['keywords']            = $getTraining[0]['training_meta_keywords'];
        $full_name                         = $this->security->xss_clean(secure_input($_POST['full_name']));
        $email                             = $this->security->xss_clean(secure_input($_POST['email']));
        $phone                             = $this->security->xss_clean(secure_input($_POST['phone']));
        $subject                           = $this->security->xss_clean(secure_input($_POST['subject']));
        $message                           = $this->security->xss_clean(secure_input($_POST['message']));
        $this->form_validation->set_rules('full_name', 'full_name', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['notif'] = 'error send mail us';
            $this->load->view('vtrainingdetail', $this->data);
        } //$this->form_validation->run() == FALSE
        else {
            $this->sendmail($full_name, $phone, $email, $subject, $message);
            $this->sendmailUser($full_name, $phone, $email, $subject, $message);
            $this->data['notif'] = 'Your message has been succesful to send Us, we will replay your mail soon<br/> ';
            $this->load->view('vsuccess_aplly', $this->data);
        }
        $this->data['notif'] = '';
        $this->load->view('vsuccess_aplly', $this->data);
    }
    function sendmail($full_name, $phone, $email, $subject, $message)
    {
        $subject       = "Training- " . $subject;
        $message_email = "Message From, <br><br>";
        $message_email .= "Name : " . $full_name . "<br>";
        $message_email .= "Phone Number : " . $phone . "<br>";
        $message_email .= "Email : " . $email . "<br>";
        $message_email .= "Message : " . $message . "<br><br>";
        $header = "";
        $header .= "Reply-To: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "Return-Path: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "From: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "Organization: " . $_SERVER['SERVER_NAME'] . " \r\n";
        $header .= "X-Priority: 3\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail("admin@caleb-technology.com", $subject, $message_email, $header);
    }
    function sendmailUser($full_name, $phone, $email, $subject, $message)
    {
        $subject       = "Training- " . $subject;
        $message_email = "Message From, <br><br>";
        $message_email .= "Name : " . $full_name . "<br>";
        $message_email .= "Phone Number : " . $phone . "<br>";
        $message_email .= "Email : " . $email . "<br>";
        $message_email .= "Thank you for your message via the Caleb-Technology website.  <br> "
                        . "One of our staff will contact you within 2 business days . <br>"
                        . " If you have not been contacted within 2 business days, please phone our Call Center at +6221 2928 5708.";
        $header = "";
        $header .= "Reply-To: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "Return-Path: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "From: caleb-technology.com <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        $header .= "Organization: " . $_SERVER['SERVER_NAME'] . " \r\n";
        $header .= "X-Priority: 3\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($email, $subject, $message_email, $header);
    }
}