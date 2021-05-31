<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home';
//$route['404_override'] = 'my_404';
$route['translate_uri_dashes'] = FALSE;

$route['backend'] = "backend/signin/login";
$route['backend/signin'] = "backend/signin/login";
$route['backend/cekLogin'] = "backend/signin/cekLogin";
$route['backend/signout'] = "backend/signin/signout";
$route['backend/changePassword'] = "backend/home/changePassword";
$route['backend/doChangePassword'] = "backend/home/doChangePassword";
//$route['backend/Interior/add/'] = "backend/Content/add/";

$pathPageAlias = PATH_ASSETS."/json/pages.json";
$arr_page_alias = json_decode(file_get_contents($pathPageAlias),TRUE);
foreach($arr_page_alias as $k => $page) {
	$route[$page['web_alias']] = "pages/detail/".$page['pages_id'];
}

define('EXT', '.php');

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get_where( 'tbl_module',array('module_group_id' => 8));
$result = $query->result();
$where = "alias_category='Training' OR alias_category='News' OR alias_category='Career'";
$query2 = $db->get_where( 'tbl_alias',$where);
$result2 = $query2->result();

// untuk route alias
foreach( $result2 as $row )
{
   $route[$row->web_alias] = $row->web_ori;
   //$route[$row->web_ori] = "Works/detail/$1"; 
}
// untuk route
foreach( $result as $row )
{
    
  $route['backend/'.$row->module_path] = "backend/".$row->module_path;
  $route['backend/'.$row->module_path.'/(:any)'] = "backend/$row->module_path/$1";
  $route['backend/'.$row->module_path.'/(:any)/(:num)'] = "backend/$row->module_path/$1/$2";
  $route['backend/'.$row->module_path.'/(:num)/(:num)/(:any)'] = "backend/$row->module_path/index/$1/$2/$3";
  $route['backend/'.$row->module_path.'/(:num)/(:num)/(:num)/(:any)'] = "backend/$row->module_path/index/$1/$2/$3/$4";
  
  $route[''.$row->module_path.''] = $row->module_path;
  $route[''.$row->module_path.'/(:any)'] = "$row->module_path/$1";
  $route[''.$row->module_path.'/(:num)/(:any)'] = "$row->module_path/index/$1/$2";
  $route[''.$row->module_path.'/(:num)/(:num)/(:any)'] = "$row->module_path/index/$1/$2/$3";
  $route[''.$row->module_path.'/(:num)/(:num)/(:num)/(:any)'] = "$row->module_path/index/$1/$2/$3/$4";
  $route[''.$row->module_path.'/detail/(:num)'] = "$row->module_path/detail/$1";
  $route[''.$row->module_path.'/detail/(:any)'] = "$row->module_path/detail/$1";
  $route[''.$row->module_path.'/page/(:num)'] = "$row->module_path/page/$1";
  $route[''.$row->module_path.'/page/(:num)/(:num)'] = "$row->module_path/page/$1/$2";
}


 $route['backend/Material_file/(:num)'] = "backend/Material_file/index/$1";
 $route['backend/Material_file/(:any)'] = "backend/Material_file/$1";
 $route['Material_file/(:num)'] = "Material_file/index/$1";
 $route['Material_file/'] = "Material_file/index/";

 $route['backend/Content_subpage/(:num)'] = "backend/Content_subpage/index/$1";
 $route['backend/Content_subpage/(:any)'] = "backend/Content_subpage/$1";
 $route['Content_subpage/(:num)'] = "Content_subpage/index/$1";
 $route['Content_subpage/'] = "Content_subpage/index/";
 
 
 $route['about'] = "about/index";
 $route['backend/Gallery/(:num)'] = "backend/Gallery/index/$1";
 $route['backend/Gallery/(:any)'] = "backend/Gallery/$1";
 $route['sitemap/(:num)'] = "Sitemap/index/$1";
 $route['sitemap/'] = "Sitemap/index/";



//echo'<pre>';
//print_r($result2);
//die;
//require_once(PATH."config/alias_routes.php");	
