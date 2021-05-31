<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('backend/Model_menu_frontend'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));		$this->data['controller']= 'home';
               
	}
	
	public function index()
	{
                $this->data['title']= 'HARINDO';
                 $this->data['metacontent']= '';
		//include 'checkSession.php'; 
                //Banner Home
		 $pathBannerHome = PATH_ASSETS."/json/bannerhome.json";
                 $arrBannerHome = json_decode(file_get_contents($pathBannerHome),TRUE);
		 $this->data['dataBannerHome'] = $arrBannerHome;
                 $this->data['countBannerHome'] = count($arrBannerHome);
                 
             
              
                   //      JSon Count
                     
                $pathCountTeam = PATH_ASSETS."/json/countteam.json";
                $arrCountTeam = json_decode(file_get_contents($pathCountTeam),TRUE);
                $this->data['CountTeam'] = $arrCountTeam;
                
                $pathCountClient = PATH_ASSETS."/json/countclient.json";
                $arrCountClient = json_decode(file_get_contents($pathCountClient),TRUE);
                $this->data['CountClient'] = $arrCountClient;
                
                $pathCountProject = PATH_ASSETS."/json/countprojects.json";
                $arrCountProject = json_decode(file_get_contents($pathCountProject),TRUE);
                $this->data['CountProject'] = $arrCountProject;
                
                $pathCountMaterial = PATH_ASSETS."/json/countmaterial.json";
                $arrCountMaterial = json_decode(file_get_contents($pathCountMaterial),TRUE);
                $this->data['CountMaterial'] = $arrCountMaterial;
                
                 //JSON QUOTES
                $pathQuote = PATH_ASSETS."/json/quote.json";
                $arrQuote = json_decode(file_get_contents($pathQuote),TRUE);
                $this->data['quote_desc'] = $arrQuote['quote_desc'];
                
                $pathPartner = PATH_ASSETS."/json/partner.json";
                $arrPartner = json_decode(file_get_contents($pathPartner),TRUE);
                $this->data['partner_title'] = $arrPartner['partner_title'];
                $this->data['partner_desc'] = $arrPartner['partner_desc'];
                
                
                $pathTestimonial = PATH_ASSETS."/json/testimonial.json";
                $arrTestimonial = json_decode(file_get_contents($pathTestimonial),TRUE);
                $this->data['testimonial_desc'] = $arrTestimonial['testimonial_desc'];
                //      JSon Material
                 
                 $pathMaterialHome = PATH_ASSETS."/json/material.json";
                 $arrMaterialHome = json_decode(file_get_contents($pathMaterialHome),TRUE);
                 $this->data['dataMaterialHome'] = $arrMaterialHome;
                 $this->data['countMaterialHome'] = count($arrMaterialHome);
                 
                 //      JSon TEAM
                 $pathTeamHome = PATH_ASSETS."/json/team.json";
                 $arrTeamHome = json_decode(file_get_contents($pathTeamHome),TRUE);
                 $this->data['dataTeamHome'] = $arrTeamHome;
                 $this->data['countTeamHome'] = count($arrTeamHome);
                 
                //      JSon Client
                 $pathclientHome = PATH_ASSETS."/json/client.json";
                 $arrClientHome = json_decode(file_get_contents($pathclientHome),TRUE);
                 $this->data['dataClientHome'] = $arrClientHome;
                 $this->data['countClientHome'] = count($arrClientHome);
		
//                 echo'<pre>';
//                 print_r( $this->data['dataBannerHome']);
//                 die;
		$this->data['menu_parent']= '';
		$this->load->view('vhome',$this->data);
	}
}