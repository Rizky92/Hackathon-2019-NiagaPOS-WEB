<?php
/**
 * Created by PhpStorm.
 * User: mac-eko
 * Date: 13/01/19
 * Time: 06.26
 */

namespace App\Http\Controllers\TraitController;


trait SmsTrait
{
    public function sendOTP($number,$kode){
        ob_start();
// setting
        $apikey      = env('RAJA_SMS_KEY_API'); // api key
        $urlserver   = 'http://45.32.118.255/sms/api_sms_otp_send_json.php'; // url server sms geprek lama
        //$urlserver   = 'http://sms241.xyz/sms/api_sms_otp_send_json.php'; // url server sms
        $callbackurl = ''; // url callback get status sms
        $senderid    = '1'; // Option senderid 0=Sms Long Number / 1=Sms Masking/Custome Senderid

// create header json
        $senddata = array(
            'apikey' => $apikey,
            'callbackurl' => $callbackurl,
            'senderid' => $senderid,
            'datapacket'=>array()
        );

// create detail data json
// data 1
        $message='KODE AKTIVASI MEMBER ANDA : '.$kode;
        array_push($senddata['datapacket'],array(
            'number' => trim($number),
            'message' => $message
        ));
// sending
        $data=json_encode($senddata);
        $curlHandle = curl_init($urlserver);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        //curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 60);
        $respon = curl_exec($curlHandle);

        return $respon;

        /*$curl_errno = curl_errno($curlHandle);
        $curl_error = curl_error($curlHandle);
        $http_code  = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        curl_close($curlHandle);
        if ($curl_errno > 0) {
            $senddatax = array(
                'sending_respon'=>array(
                    'globalstatus' => 90,
                    'globalstatustext' => $curl_errno."|".$http_code)
            );
            $respon=json_encode($senddatax);
        } else {
            if ($http_code<>"200") {
                $senddatax = array(
                    'sending_respon'=>array(
                        'globalstatus' => 90,
                        'globalstatustext' => $curl_errno."|".$http_code)
                );
                $respon= json_encode($senddatax);
            }
        }
        header('Content-Type: application/json');
        echo $respon;*/
    }
}