<?php

require_once ('vendor/autoload.php');
require_once ('vendor/google/apiclient/src/Google/autoload.php');
require_once ('settings.php');

use UtmCookie\UtmCookie;

echo var_dump($_POST);


// Google Spreddsheets
/**
 * AUTHENTICATE
 *
 */
// These settings are found on google developer console
$CLIENT_APP_NAME = $settings['googleSpreedSheetsAppName'];
$CLIENT_ID       = $settings['googleSpreedSheetsClientId'];
$CLIENT_EMAIL    = $settings['googleSpreedSheetsClientEmail'];
$CLIENT_KEY_PATH = $settings['googleSpreedSheetsP12'];
$CLIENT_KEY_PW   = 'notasecret';

$objClientAuth  = new Google_Client ();
$objClientAuth->setClassConfig('Google_Cache_File', 'directory', 'tmp/Google_Client');
$objClientAuth -> setApplicationName ($CLIENT_APP_NAME);
$objClientAuth -> setClientId ($CLIENT_ID);
$objClientAuth -> setAssertionCredentials (new Google_Auth_AssertionCredentials (
    $CLIENT_EMAIL,
    array('https://spreadsheets.google.com/feeds','https://docs.google.com/feeds'),
    file_get_contents ($CLIENT_KEY_PATH),
    $CLIENT_KEY_PW
));
$objClientAuth->getAuth()->refreshTokenWithAssertion();
$objToken  = json_decode($objClientAuth->getAccessToken());
$accessToken = $objToken->access_token;


/**
 * Initialize the service request factory
 */
use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

$serviceRequest = new DefaultServiceRequest($accessToken);
ServiceRequestFactory::setInstance($serviceRequest);

/**
 * Get spreadsheet by id
 */
$spreadsheetService = new Google\Spreadsheet\SpreadsheetService();
$spreadsheetFeed = $spreadsheetService->getSpreadsheetFeed();
$spreadsheet = $spreadsheetFeed->getById($settings['googleSpreedSheetsSpreedSheetID']);

/**
 * Get particular worksheet of the selected spreadsheet
 */
$worksheetFeed = $spreadsheet->getWorksheetFeed();
$worksheet = $worksheetFeed->getById($settings['googleSpreedSheetsWorkSheetID']);
$listFeed = $worksheet->getListFeed();

if(isset($_POST['formname']))
{
    // Forms data
    $formname = htmlspecialchars(isset($_POST['formname']) ? $_POST['formname'] : '');
    $email = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '');
    $name = htmlspecialchars(isset($_POST['name']) ? $_POST['name'] : '');
    $phone = htmlspecialchars(isset($_POST['phone']) ? $_POST['phone'] : '');
    $promo = htmlspecialchars(isset($_POST['promo']) ? $_POST['promo'] : '');
    $today = date("Y-m-d H:i:s");

    $utm_source = UtmCookie::get('utm_source');
    $utm_medium = UtmCookie::get('utm_medium');
    $utm_campaign = UtmCookie::get('utm_campaign');
    $utm_term = UtmCookie::get('utm_term');
    $utm_content = UtmCookie::get('utm_content');
    $referer = htmlspecialchars(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');

    // SypexGeo
    $ip = $_SERVER['REMOTE_ADDR'];
    $spgeo_api_req = file_get_contents('http://api.sypexgeo.net/'. $settings['sypexGeoApiKey'] .'/json/'. $ip .'?lng=ru');
    $geodata = json_decode($spgeo_api_req,true);
    $region = $geodata['region']['name_ru'];
    $city = $geodata['city']['name_ru'];
    $country = $geodata['country']['name_ru'];
    $utc = $geodata['region']['utc'];
    $timezone = $geodata['region']['timezone'];
    date_default_timezone_set($timezone);
    $region_time = date("Y-m-d H:i:s");
    
    // Email body
    $message = file_get_contents('partials/templates/mail.html');
    $message = str_replace('%site%', $_SERVER['SERVER_NAME'], $message);
    $message = str_replace('%today%', $today, $message);
    $message = str_replace('%formname%', $formname, $message);
    $message = str_replace('%name%', $name, $message);
    $message = str_replace('%email%', $email, $message);
    $message = str_replace('%phone%', $phone, $message);
    $message = str_replace('%promo%', $promo, $message);
    $message = str_replace('%country%', $country, $message);
    $message = str_replace('%region%', $region, $message);
    $message = str_replace('%city%', $city, $message);
    $message = str_replace('%region_time%', $region_time, $message);
    $message = str_replace('%utm_source%', $utm_source, $message);
    $message = str_replace('%utm_medium%', $utm_medium, $message);
    $message = str_replace('%utm_campaign%', $utm_campaign, $message);
    $message = str_replace('%utm_content%', $utm_content, $message);
    $message = str_replace('%utm_term%', $utm_term, $message);
    $message = str_replace('%referer%', $referer, $message);

    // Email sending
    $mail = new PHPMailer();
//    $mail->isSMTP();
//    $mail->SMTPDebug = 2;
//    $mail->SMTPAuth = true;
//    $mail->Host = $settings['EmailSMTPHosts'];
//    $mail->Username = $settings['EmailSMTPUser'];
//    $mail->Password = $settings['EmailSMTPPassword'];
//    $mail->SMTPSecure = $settings['EmailSMTPSecure'];
//    $mail->Port = $settings['EmailSMTPPort'];
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($settings['EmailFrom']);
  
    foreach ($settings['EmailRecipients'] as $emailRecipient) {
        $mail->addAddress($emailRecipient);
    }
    foreach ($settings['EmailReplyTo'] as $emailReplyTo) {
        $mail->addReplyTo($emailReplyTo);
    }
    
    $mail->isHTML(true);
    $mail->Subject = $settings['EmailSubject'];
    $mail->Body    = $message;

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

    // Requests file
    function toWindow($ii){
        return iconv( "utf-8", "windows-1251",$ii);
    }
    header('Content-Type: text/csv; charset=windows-1251');
    $file = fopen($settings['fileForRequests'], 'a');
    $settings['fileForRequestsTitles'] = [$formname,$phone,$email,$name,$promo,$country,$region,$city,$region_time,$utm_source,$utm_medium,$utm_campaign,$utm_content,$utm_term,$referer];
    foreach($settings['fileForRequestsTitles'] as $p=>$titlesItem){
        $settings['fileForRequestsTitles'][$p] = toWindow($titlesItem);
    }
    fputcsv($file, $settings['fileForRequestsTitles'], ";");
    fclose($file);

    // Send SMS
    $body=file_get_contents("http://sms.ru/sms/send?api_id=".$settings['smsRuApiKey']."&to=". $settings['smsRecipietns'] ."&text=".urlencode("Заявка от'.$name.','.$email.','.$phone."));

    // Send data to Google Sheets
    /**
     * Add/update headers of worksheet
     */
//    $cellFeed = $worksheet->getCellFeed();
//    $cellFeed->editCell(1,3, "name"); // 1st row, 3rd column
//    $cellFeed->editCell(1,4, "age"); // 1st row, 4th column
    
    /**
     * Insert row entries
     * Supposing, that there are two headers 'name' and 'age'
     */

    $row = array('дата'=>$today, 'статус'=>'Новая с email', 'оператор'=>'Тест');
    $listFeed->insert($row);

}
