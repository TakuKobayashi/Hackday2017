<?php

/**
 * Created by PhpStorm.
 * User: eye
 * Date: 2017/02/04
 * Time: 22:55
 */
class Api_post extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

        $this->load->model('Speak_model', 'speakModel');
        $this->load->model('Tweet_model', 'tweetModel');
    }

    function index()
    {
        $this->load->view('upload_form', array('error' => ' '));
    }

    function conv(){
        $key = 'AIzaSyDRC0-wdBWTd3-OB122Vx9pXFB8SXs0ifY';
       $url = sprintf('https://www.googleapis.com/language/translate/v2?key=%s&q=hello&source=en&target=ja',$key);
        $res =  file_get_contents($url);
        print_r(json_decode($res,true));
    }

    function up_txt($word=""){

        $something = $this->input->get('word');
        if(strlen($something) > 2){
            $word = $something;
        }

        $file_name = date("YmdHis").'.wav';

        $cv_w = $this->speakModel->trgr($word);
        // 音声変換
//        $voice = $this->speakModel->getVoiceInfo($cv_w);
//        @file_put_contents(sprintf("/var/www/Hackday2017/htdocs/convert/%s",$file_name),$voice);

        $array = array(
            "base_text"=>$word,
            "conv_text"=>$cv_w,
//          "base_file" => sprintf("http://kimini.xyz/uploads/%s",$file_name),
          "conv_file" => sprintf("http://kimini.xyz/convert/%s",$file_name),
        );

        file_get_contents("http://kimini.xyz/tw.php?wd=".urlencode($cv_w));

        print json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    function up_voice()
    {

        $file_name = date("YmdHis").'.wav';
        $config['upload_path'] = '/var/www/Hackday2017/htdocs/uploads/';
        $config['allowed_types'] = 'mp4|ogg|wav';
        $config['max_size'] = '300';
        $config['file_name'] = $file_name;

//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('upload')) {
            $error = array('error' => $this->upload->display_errors());
            print json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
//            $this->load->view('upload_form', $error);
        } else {
//            $data = array('upload_data' => $this->upload->data());
//            print_r( $data);
            $array = array(
                "base_text"=>"ようこそ世界",
                "conv_text"=>"hello world",
                "base_file" => sprintf("http://kimini.xyz/uploads/%s",$file_name),
                "conv_file" => sprintf("http://kimini.xyz/convert/%s",$file_name),
            );

            print json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

//            $this->load->view('upload_success', $data);
        }
    }


    function twit(){
        $word = "";
        $voice = $this->tweetModel->post($word);
    }


    function twit_call(){
        print "OK";
    }

    function voice(){
        $word = "はろーわーるど";
        $voice = $this->speakModel->getVoiceInfo($word);
        file_put_contents(sprintf("/var/www/Hackday2017/htdocs/convert/%s.wav",date("YmdHis")),$voice);
    }


    function trtest()
    {
        $azure_key = "80ff081d32654875b59d1a63e6ada561";  // !!! TODO: secret key here !!!
        $fromLanguage = "en";  // Translator Language Codes: https://msdn.microsoft.com/en-us/library/hh456380.aspx
        $toLanguage = "ja";
        $inputStr = "AZURE - The official documentation and examples for PHP are useless.";

        // Get the translation
        $accessToken = $this->getToken($azure_key);
        print $accessToken;

        $params = "text=" . urlencode($inputStr) . "&to=" . $toLanguage . "&from=" . $fromLanguage . "&appId=Bearer+" . $accessToken;
        $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
//        print $translateUrl;

        $curlResponse = $this->curlRequest($translateUrl);
        $translatedStr = simplexml_load_string($curlResponse);
// Display the translated text on the web page:
        echo "<p>From " . $fromLanguage . ": " . $inputStr . "<br>";
        echo "To " . $toLanguage . ": " . $translatedStr . "<br>";
        echo date("r") . "</p>";

    }
// and leave the rest of the code as it is ;-)
// Get the AZURE token
    function getToken($azure_key)
    {
        $url = 'https://api.cognitive.microsoft.com/sts/v1.0/issueToken';
        $ch = curl_init();
        $data_string = json_encode('{body}');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'Ocp-Apim-Subscription-Key: ' . $azure_key
            )
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $strResponse = curl_exec($ch);
        curl_close($ch);
        return $strResponse;
    }

// Request the translation
    function curlRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, "Content-Type: text/xml");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $curlResponse = curl_exec($ch);
        curl_close($ch);
        return $curlResponse;
    }


}
