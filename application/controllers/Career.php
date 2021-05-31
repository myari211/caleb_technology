<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Career extends MY_Controller
{
    public $data = array();
    public $module = 'Career';
    public $section = 13;
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array(
            'web/Model_content',
            'web/Model_career',
            'web/Model_menu',
            'backend/Model_language',
            'backend/Model_logcms'
        ));
        $this->load->helper(array(
            'funcglobal',
            'menu',
            'url',
            'accessprivilege',
            'alias',
            'form'
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
        $this->data['title']       = $this->data['controller'];
        $this->data['getContent']  = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
        $pathCareerQuote           = PATH_ASSETS . "/json/career_quote.json";
        $arrCareerQuote            = json_decode(file_get_contents($pathCareerQuote), TRUE);
        $this->data['quote_title'] = $arrCareerQuote['quote_title'];
        $this->data['quote_desc']  = $arrCareerQuote['quote_desc'];
        $this->data['getCareer']   = $this->Model_career->getListCareer();
        $pathHeadQuote             = PATH_ASSETS . "/json/career_head_quote.json";
        $arrHeadQuote              = json_decode(file_get_contents($pathHeadQuote), TRUE);
        $this->data['quote_head']  = $arrHeadQuote['quote_desc'];
        $this->load->view('vcareer', $this->data);
    }
    function detail($career_id = null)
    {
        $_SESSION['url']                   = current_url();
        $_SESSION['success']               = '';
        $this->data['module_id']           = $this->module_id;
        $this->data['module_name']         = $this->module_name;
        $getCareer                         = $this->Model_career->getCareer($career_id);
        $this->data['countCareer']         = count($getCareer);
        $this->data['career_id']           = $getCareer[0]['career_id'];
        $this->data['title']               = $getCareer[0]['career_title'];
        $this->data['career_desc']         = $getCareer[0]['career_desc'];
        $this->data['career_publish_date'] = $getCareer[0]['career_publish_date'];
        $this->data['description']         = $getCareer[0]['career_meta_description'];
        $this->data['keywords']            = $getCareer[0]['career_meta_keywords'];
        $this->load->view('vcareerdetail', $this->data);
    }
    function apply()
    {
        $full_name   = $this->security->xss_clean(secure_input($_POST['full_name']));
        $phone       = $this->security->xss_clean(secure_input($_POST['phone']));
        $email       = $this->security->xss_clean(secure_input($_POST['email']));
        $htmlContent = '<h1>NEW APPLICATION</h1><br/>';
        $htmlContent .= '<p>From</p>';
        $htmlContent .= 'Name : ' . $full_name . '<br/>';
        $htmlContent .= 'Phone : ' . $phone . ' <br/>';
        $htmlContent .= 'Email : ' . $email . ' <br/>';
        $subject = 'NEW APPLICATION';
        if (!empty($_FILES['attach']['name'])) {
            $config['upload_path']   = FILE_PATH_ASSETS;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|rar|docx|zip|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
            $config['max_size']      = 2048;
            $config['overwrite']     = TRUE;
            $config['file_name']     = $_FILES['attach']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('attach')) {
                $uploadData = $this->upload->data();
                $attach     = $uploadData['file_name'];
            } //$this->upload->do_upload('attach')
            else {
                $attach = '';
            }
        } //!empty($_FILES['attach']['name'])
        else {
            $attach = '';
        }
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->attach(FILE_PATH_ASSETS . $attach);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from($email);
        $this->email->to('admin@caleb-technology.com');
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        if ($this->email->send()) {
            sendmailUser($full_name, $phone, $email);
            unlink(FILE_PATH_ASSETS . $attach);
            $this->load->view('vsuccess_aplly', $this->data);
            return true;
        } //$this->email->send()
        else {
            redirect(BASE_URL . '/Career/successApply');
            show_error($this->email->print_debugger());
        }
    }
    function sendmailUser($full_name, $phone, $email)
    {
        $subject       = "Career - Application ";
        $message_email = "Dear, <br><br>";
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
    function successApply()
    {
        $session_url               = isset($_SESSION['url']) ? $_SESSION['url'] : '';
        $this->data['session_url'] = $session_url;
        $this->data['subjectform'] = 'Application';
        $this->load->view('vsuccess_aplly', $this->data);
    }
}