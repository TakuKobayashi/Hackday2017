<?php

/**
 * Created by PhpStorm.
 * User: tama
 * Date: 2017/02/05
 * Time: 9:01
 */
class Tweet_model extends CI_Model
{

    private static $CONSUMER_KEY = 'ywtz6wgeoi7RuQVbnYv5TF1ks';
    private static $CONSUMER_SECRET = 'LkmIeClt6KLGL2S6wPqZw1yTucAMm7OQdXfzglGTo1aLPuztLi';
    private static $ACCESS_TOKEN = '取得したトークン';
    private static $ACCESS_TOKEN_SECRET = '取得したトークンシークレット';
    private static $TWITTER_API = 'https://api.twitter.com/1.1/statuses/update.json';


    public function post(){

        require_once('/var/www/Hackday2017/ci3/twitteroauth-master/src/TwitterOAuth.php');

        // 投稿する文言
        $postMsg = 'こんにちは世界';

        // OAuthオブジェクト生成
        $toa = new TwitterOAuth(self::$CONSUMER_KEY, self::$CONSUMER_SECRET, self::$ACCESS_TOKEN, self::$ACCESS_TOKEN_SECRET);

        //投稿
        $res = $toa->OAuthRequest(self::$TWITTER_API, "POST", array("status"=>"$postMsg"));

        // レスポンス表示
        var_dump($res);
    }


}