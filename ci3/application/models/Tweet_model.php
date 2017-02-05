<?php

/**
 * Created by PhpStorm.
 * User: tama
 * Date: 2017/02/05
 * Time: 9:01
 */
class Tweet_model extends CI_Model
{

    private static $CONSUMER_KEY = 'KfgLWriWZvDiSHYqd9ySOWGPc';
    private static $CONSUMER_SECRET = 'Todmr12GNxbYftD3Jn1CdDRbfc7djik83f4T0f2Ru9s0mkkHXB';
    private static $ACCESS_TOKEN = '828022796324253697-JvJkX9mJxZ4LiiGVVEB31O2KManqFES';
    private static $ACCESS_TOKEN_SECRET = 'igQ63MWr3jYGmvQWH8PV42AZ4LBVBHsfKftyGCE1NiuRM';
    private static $TWITTER_API = 'https://api.twitter.com/1.1/statuses/update.json';


    public function post($word = ""){

        require_once('/var/www/Hackday2017/ci3/twitteroauth-master/src/TwitterOAuth.php');

        // 投稿する文言
        if($word == ""){
            $postMsg = 'こんにちは世界';
        }else{
            $postMsg = $word;
        }

        // OAuthオブジェクト生成
        $toa = new TwitterOAuth(self::$CONSUMER_KEY, self::$CONSUMER_SECRET, self::$ACCESS_TOKEN, self::$ACCESS_TOKEN_SECRET);

        //投稿
        $res = $toa->OAuthRequest(self::$TWITTER_API, "POST", array("status"=>"$postMsg"));

        // レスポンス表示
        var_dump($res);
    }


}