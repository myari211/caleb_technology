<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('backend/Model_menu_frontend', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias','email'));
                $this->load->library(array('form_validation'));
                $_SESSION['url']= current_url();
	}
	
	public function index()
	{
		$this->data['controller'] = "Contact";
		//include 'checkSession.php'; 
                
                //      JSon Contact
                 $pathcontact = PATH_ASSETS."/json/contact.json";
                 $arrContact = json_decode(file_get_contents($pathcontact),TRUE);
                 $this->data['dataContact'] = $arrContact;
                 $this->data['countContact'] = count($arrContact);
//                 echo'<pre>';
//                 print_r( $this->data['dataContact']);
//                 die;
                 
		$this->load->view('vcontact',$this->data);
	}
        
        public function contactUs()
	{
            
                $session_url =isset($_SESSION['url']) ? $_SESSION['url']:'';
                $this->data['session_url']=$session_url;
                $this->data['subjectform']='Contact Form';
               
            
		$this->data['title'] = "Contact";
		          
                 $full_name = $this->security->xss_clean(secure_input($_POST['full_name'])); 
                 $email = $this->security->xss_clean(secure_input($_POST['email']));                  
                 $phone = $this->security->xss_clean(secure_input($_POST['phone']));  
                 $company  = $this->security->xss_clean(secure_input($_POST['company']));
                 $subject  = 'CONTACT US';
                 $message = $this->security->xss_clean(secure_input($_POST['message']));  
                                
                $this->form_validation->set_rules('full_name', 'full_name', 'required');
                $this->form_validation->set_rules('phone', 'phone', 'required');   
               
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('company', 'company', 'required');
                $this->form_validation->set_rules('message', 'message', 'required');
                 
                    if ($this->form_validation->run() == FALSE)
                    {
                     $this->data['notif']='error send contact us';
                     $this->load->view('vcontact',$this->data);
                    }
                     else
                        {   
                         $this->sendmail($full_name,$phone,$email,$company,$subject,$message);
                         $this->sendmailUser($full_name,$email,$subject);
                         $this->data['notif']='Your message has been succesful to send Us, we will replay your mail soon<br/> ';
                         $this->load->view('vsuccess_aplly',$this->data);          
                        }                                      
//              $this->data['notif']='';
//              $this->load->view('vcontact',$this->data);     
                
		
	}
       function sendmail($full_name,$phone,$email,$company,$subject,$message)  
            {     
       //  $this->load->library('email'); 
      
               $company = "Contact Us - ".$company;
				$message_email = "Message From, <br><br>";
				$message_email .= "Name : ".$full_name."<br>";
				$message_email .= "Phone Number : ".$phone."<br>";
                                $message_email .= "Name : ".$company."<br>";
                                $message_email .= "Name : ".$subject."<br>";
				$message_email .= "Email : ".$email."<br>";
				$message_email .= "Message : ".$message."<br><br>";
			$header = "";
			$header .= "Reply-To: caleb-technology.com.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "Return-Path: caleb-technology.com.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "From: caleb-technology.com.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "Organization: ".$_SERVER['SERVER_NAME']." \r\n";
			$header .= "X-Priority: 3\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                       
                // Insert user record     
                 mail(MAIL_SENDER, $company, $message_email, $header);   
                // mail("hl.prbadolsa@gmail.com", $company, $message_email, $header);  
            } 
            
            function sendmailUser($full_name,$email,$subject)  
            {     
       //  $this->load->library('email'); 
      
               $subjects = $subject;
                        $message_email = "Dear, <br><br>";
                        $message_email .= "Name : ".$full_name."<br>";
                        $message_email .= "Thank you for your message via the Caleb-Technology website.  <br> "
                        . "One of our staff will contact you within 2 business days . <br>"
                        . " If you have not been contacted within 2 business days, please phone our Call Center at +6221 2928 5708.";
			$header = "";
			$header .= "Reply-To: caleb-technology.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "Return-Path: caleb-technology.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "From: caleb-technology.com <noreply@".$_SERVER['SERVER_NAME'].">\r\n";
			$header .= "Organization: ".$_SERVER['SERVER_NAME']." \r\n";
			$header .= "X-Priority: 3\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                       
                // Insert user record     
            mail($email, $subjects, $message_email, $header);   
                // mail("training@caleb-technology.com", $company, $message_email, $header);  
            }  
}