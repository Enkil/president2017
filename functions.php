<?php

/**
 * @return array
 * Поля формы (только для шаблона, значения указывать вручную в form.php не нужно)
 */
function formFields(){
    return [
        'formname','email','name','phone','promo'
    ];
}

/**
 * @return array
 * Кастомные поля (только для шаблона, значения указывать вручную в form.php)
 */
function customFields(){
    return [
        'site','today','country','region','city','region_time','referer',
    ];
}

/**
 * @return array
 * Поля UTM-меток (только для шаблона, значения указывать вручную в form.php не нужно)
 */
function utmData(){
    return [
        'utm_source','utm_medium','utm_campaign','utm_term','utm_content'

    ];
}

function adress($country, $city, $region){
    $string = check($country).','.check($city).','.check($region);
    return $string;
}

function check($var,$message = ' '){
    return ($var) ? $var : $message;
}

function formFieldValues(){
    return array_map(function ($key){
        return (isset($_POST[$key])) ? htmlspecialchars($_POST[$key]) : false;
    },formFields());
}

function utmDataValues(){
    return array_map(function ($key){
        return \UtmCookie\UtmCookie::get($key);
    },utmData());
}

function loadData(){
    return array_combine(formFields(),formFieldValues());
}

function loadUtm(){
    return array_combine(utmData(),utmDataValues());
}

function sendEmail($settings,$body){
    $mail = new PHPMailer();

    $mail->CharSet = 'UTF-8';
    $mail->setFrom('dk@regnum.ru', 'Regnum.ru');

    array_map(function ($email) use ($mail){
        $mail->addAddress($email);
    },$settings['EmailRecipients']);

    array_map(function ($email) use ($mail){
        $mail->addReplyTo($email);
    },$settings['EmailReplyTo']);

    $mail->isHTML(true);
    $mail->Subject = $settings['EmailSubject'];
    $mail->Body    = $body;

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

function sendSms($settings,$data){
    return file_get_contents("http://sms.ru/sms/send?api_id=".$settings['smsRuApiKey']."&to=". $settings['smsRecipietns'] ."&text=".urlencode("Заявка от {$data['name']},'.{$data['email']}.','.{$data['phone']}."));
}

function insertRowInGoogleSpreadSheet($listFeed,$today,$data,$country,$city,$region,$utm){
    $refPattern = '/^president2017-/';
    $refCode = preg_match($refPattern,$utm['utm_campaign'],$arr);
    $row = array('дата'=>$today, 'статус'=>'Новая с телефоном', 'телефон'=>$data['phone'], 'e-mail'=>$data['email'], 'фио'=>$data['name'],  'адрес'=>adress($country,$city,$region),'промо-код'=>$data['promo'],'источник'=>($utm['utm_source']) ? $utm['utm_source'] : 0,'рефкод'=> $arr);
    $listFeed->insert($row);
}