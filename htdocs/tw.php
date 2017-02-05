<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 2017/02/05
 * Time: 10:01
 */


//ライブラリの読み込み
require_once "/var/www/Hackday2017/ci3/twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//APIを利用するための情報を入れる
$consumerKey = 'KfgLWriWZvDiSHYqd9ySOWGPc';
$consumerSecret = 'Todmr12GNxbYftD3Jn1CdDRbfc7djik83f4T0f2Ru9s0mkkHXB';
$accessToken = '828022796324253697-JvJkX9mJxZ4LiiGVVEB31O2KManqFES';
$accessTokenSecret = 'igQ63MWr3jYGmvQWH8PV42AZ4LBVBHsfKftyGCE1NiuRM';

//接続
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$text = array(
    "こんにちは世界",
);

foreach ($text as $value) {
    $re = $connection->post("statuses/update", array(
        "status" => $value,
    ));
}