<?php

/**
 * Created by PhpStorm.
 * User: tama
 * Date: 2017/02/05
 * Time: 2:52
 */
class Speak_model extends CI_Model
{
    // 認証情報 : あなた用のAPIキー
    // Account name
    var $sp_api_account_name = 'hackday';
    // KEY 1
    var $sp_api_key_1 = '80ff081d32654875b59d1a63e6ada561';
    // KEY2
    var $sp_api_key_2 = 'd62e9976cedc4c5daf4321d0ea1af886';
    // Account name Translator Speech API
    var $sp2_api_account_name = 'hackdat2sp';
    // KEY 1
    var $sp2_api_key_1 = 'bad644fbef12420c95d27a0146704150';
    // KEY2
    var $sp2_api_key_2 = 'a5e2a58511c744a2be40911463e77ac3';


    public function getVoiceInfo($word = "", $userId = 0)
    {

        $data = array(
            '&speaker_id=1',
            '&speaker_id=2',
            '&speaker_id=6',
            '&speaker_id=24',
        );

        $ai_user_name = "MA11WebAPIJ";
        $ai_pass_word = "tRWjUhJB";
        //
        $volume = "2.0";

        $url = 'http://webapi.aitalk.jp/webapi/v1/ttsget.php';
        $url .= '?username=' . $ai_user_name;
        $url .= '&password=' . $ai_pass_word;
        $url .= '&text=' . rawurlencode($word);// 日本語の場合UTF-8エンコード。
        $url .= '&volume=' . $volume;
//        $url .= '&ext=ogg'; // ogg、aac、wavの中から選択。既定値はogg。
//        $url .= '&ext=aac'; // ogg、aac、wavの中から選択。既定値はogg。
        $url .= '&ext=wav'; // ogg、aac、wavの中から選択。既定値はogg。

        mt_srand($userId + date("Ymd"));
        $lucky = mt_rand(0, count($data) - 1);
        $url .= $data[$lucky]; //

        print $url;

//        $url .= '&joy=1.0'; // よろこび　範囲は 0.0～1.0。省略時は 0.0。感情 対応 話者 のみ 有
//        $url .= '&anger=1.0'; // 怒り　範囲は 0.0～1.0。省略時は 0.0。感情 対応 話者 のみ 有
//        $url .= '&sadness=1.0'; // 悲しみ　範囲は 0.0～1.0。省略時は 0.0。感情 対応 話者 のみ 有

//        $response = @file_get_contents($url);
        //xmlファイルを読み込み、配列へ変換
//        $xml = simplexml_load_file($url);
        $response = @file_get_contents($url);
//        print $url;
//        $response = json_decode(json_encode($xml), true);

//        if (strpos($response, "?xml")) {
//            $response = "";
//        }
        return $response;

    }


    /**
     * Bing Text To Speech API
     */
    public function getS2t()
    {

        //  ja-JP 	Female 	"Microsoft Server Speech Text to Speech Voice (ja-JP, Ayumi, Apollo)"
        //  ja-JP 	Male 	"Microsoft Server Speech Text to Speech Voice (ja-JP, Ichiro, Apollo)"

        // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://westus.api.cognitive.microsoft.com/speech/v0/meter/stt');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Ocp-Apim-Subscription-Key' => $this->sp2_api_key_1,
        );

        $request->setHeader($headers);

        $parameters = array(// Request parameters
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_POST);

        // Request body
        $request->setBody("{body}");

        try {
            $response = $request->send();
            echo $response->getBody();
        } catch (HttpException $ex) {
            echo $ex;
        }

    }

    public function getT2s()
    {

// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $url = "https://api.cognitive.microsoft.com/sts/v1.0";

        $request = new Http_Request2('https://westus.api.cognitive.microsoft.com/speech/v0/meter/tts');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Ocp-Apim-Subscription-Key' =>$this->sp2_api_key_1,
        );

        $request->setHeader($headers);
                $parameters = array(// Request parameters
        );

        $url->setQueryVariables($parameters);
        $request->setMethod(HTTP_Request2::METHOD_POST);

        // Request body
        $request->setBody("{body}");

        try {
            $response = $request->send();
            echo $response->getBody();
        } catch (HttpException $ex) {
            echo $ex;
        }


    }


//class AccessTokenAuthentication {
//
//    function getTokens2($clientKey, $authUrl){
//        try {
////Initialize the Curl Session.
//            $ch = curl_init();
////Set the Curl URL.
//            curl_setopt($ch, CURLOPT_URL, $authUrl . '?Subscription-Key=' . $clientKey);
////Set HTTP POST Request.
//            curl_setopt($ch, CURLOPT_POST, TRUE);
////Set data to POST in HTTP "POST" Operation.
//            curl_setopt($ch, CURLOPT_POSTFIELDS, ""); // $paramArr);
////CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
//            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
////CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
////Execute the cURL session.
//            $strResponse = curl_exec($ch);
////Get the Error Code returned by Curl.
//            $curlErrno = curl_errno($ch);
//            if($curlErrno){
//                $curlError = curl_error($ch);
//                throw new Exception($curlError);
//            }
////Close the Curl Session.
//            curl_close($ch);
//            return $strResponse ;
//        } catch (Exception $e) {
//            return ""; // echo "Exception-".$e->getMessage();
//        }
//    }
//}
//
///*
//* Class:AzureTranslator
//*
//* Processing the translator request.
//*/
//Class AzureTranslator {
//
//    private $clientSecret = "";
//    private $authUrl = "https://api.cognitive.microsoft.com/sts/v1.0/issueToken";
//    private $phrase = null;
//    private $sourceLang = "";
//    private $targetLang = "";
//
//    public function setPhrase ($phrase = "")
//    {
//        $this->phrase = "";
//        if (!empty($phrase))
//            $this->phrase = trim($phrase);
//    }
//
//    public function setSourceLang ($sLang = "")
//    {
//        $this->sourceLang = "";
//        if (!empty($sLang))
//            $this->sourceLang = trim($sLang);
//    }
//
//    public function setTargetLang ($tLang = "")
//    {
//        $this->targetLang = "";
//        if (!empty($tLang))
//            $this->targetLang = trim($tLang);
//    }
//
//    public function getTranslateByCurl()
//    {
//        try {
//
////Create the AccessTokenAuthentication object.
//            $authObj = new AccessTokenAuthentication();
//
//            $accessToken = $authObj->getTokens2($this->clientSecret, $this->authUrl);
////Create the authorization Header string.
//            $authHeader = "Authorization: Bearer ". $accessToken;
//
//            $contentType = 'text/plain';
//            $category = 'general';
//
//            $params = "text=".urlencode($this->phrase)."&to=".$this->targetLang."&from=".$this->sourceLang;
//
//            $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
//
////Get the curlResponse.
//            $curlResponse = $this->curlRequest($translateUrl, $authHeader);
//
////Interprets a string of XML into an object.
//            $xmlObj = simplexml_load_string($curlResponse);
//            foreach((array)$xmlObj[0] as $val){
//                $translatedStr = $val;
//            }
//
//            return $translatedStr;
////return $curlResponse;
//
//        } catch (Exception $e) {
//            return "";
////return $e->getMessage();
//        }
//    }
//
//    /*
//    * Create and execute the HTTP CURL request.
//    *
//    * @param string $url HTTP Url.
//    * @param string $authHeader Authorization Header string.
//    * @param string $postData Data to post.
//    *
//    * @return string.
//    *
//    */
//    function curlRequest($url, $authHeader, $postData=''){
////Initialize the Curl Session.
//        $ch = curl_init();
////Set the Curl url.
//        curl_setopt ($ch, CURLOPT_URL, $url);
////Set the HTTP HEADER Fields.
//        curl_setopt ($ch, CURLOPT_HTTPHEADER, array($authHeader,"Content-Type: text/xml"));
////CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
//        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
////CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
//        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, False);
//        if($postData) {
////Set HTTP POST Request.
//            curl_setopt($ch, CURLOPT_POST, TRUE);
////Set data to POST in HTTP "POST" Operation.
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
//        }
////Execute the cURL session.
//        $curlResponse = curl_exec($ch);
////Get the Error Code returned by Curl.
//        $curlErrno = curl_errno($ch);
//        if ($curlErrno) {
//            $curlError = curl_error($ch);
//            throw new Exception($curlError);
//        }
////Close a cURL session.
//        curl_close($ch);
//        return $curlResponse;
//    }
//}
//
//

}


