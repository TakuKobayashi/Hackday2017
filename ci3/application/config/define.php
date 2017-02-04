<?php
/**
 * stylist.define.php
 *
 * @author: aida
 * @version: 2016-05-21 16:40
 */



// 固有定数値

// キャッシュ用
//define('MM_CACHE_NONE', 0); // キャッシュ無し
//define('MM_CACHE_APC', 1); // キャッシュにAPCを指定
//define('MM_CACHE_FILE', 2); // キャッシュにFILEを指定
//define('MM_CACHE_REDIS', 3); // キャッシュにRedisを指定
//define('MM_CACHE_MONGO', 4); // キャッシュにmongoDBを指定

// TTL設定用定数
//define('MM_CACHE_MINUTE', 60); // TTL設定用 1分
//define('MM_CACHE_TWO_MINUTE', 120); // TTL設定用 2分
//define('MM_CACHE_FIVE_MINUTE', 300); // TTL設定用 5分
//define('MM_CACHE_TEN_MINUTE', 600); // TTL設定用 10分
//define('MM_CACHE_HALF_HOUR', 1800); // TTL設定用 30分
//define('MM_CACHE_HOUR', 3600); // TTL設定用 1時間

// ログインステータス
//define('LOGIN_STATUS_CODE_NONE', 0);
//define('LOGIN_STATUS_CODE_SUCCESS', 1);
//define('LOGIN_STATUS_CODE_FAIL', 2);
// ステータスフラグ
define('STATUS_FLAG_ON', 1);
define('STATUS_FLAG_OFF', 0);

// ステータスコード
define('STATUS_CODE_NONE', 0);
define('STATUS_CODE_OK', 1);
define('STATUS_CODE_NG', 2);
define('STATUS_CODE_NO_ITEM', 3);
define('STATUS_CODE_AUTH_ERROR', 9);

//
define('FACE_TARGET_TYPE_NONE', 0);
define('FACE_TARGET_TYPE_BASE', 1);

define('FACE_TARGET_KEY_YEN', 1); // 1: 丸型
define('FACE_TARGET_KEY_EGG', 2); // 2: 卵型
define('FACE_TARGET_KEY_SQR', 3); // 3: 四角
define('FACE_TARGET_KEY_TRI', 4); // 4: 逆三角
define('FACE_TARGET_KEY_BSE', 5); // 5: ベース

define('FACE_CONFIDENCE_RESULT_SEX', 0); // 0: 性別
define('FACE_CONFIDENCE_RESULT_AGE', 9); // 9: 年齢


// PARAM  各種設定値
// キャッシュ設定
//define('MM_CACHE_STATUS', 1); // そもそもキャッシュを使うか使わないか？(0.未使用 1.使う)
//define('MM_CACHE_STATUS_APC', 1); // APCを使うか使わないか？(0.未使用 1.使う)
//define('MM_CACHE_PREFIX', 'MM_1:'); // キャッシュキー用の接頭辞
//define('MM_CACHE_DEFAULT_TTL', MM_CACHE_FIVE_MINUTE); // TTL未指定時に入れられるTTL(秒)

//// LINE 旧仕様
//define("LINE_BOT_CHANNEL_ID","1463695947");
//// LINE:チャンネルシークレット
//define("LINE_BOT_CHANNEL_SECRET","3d7c7f908d90e7c47488a3442adb7d31");
//// LINE:MID
//define("LINE_BOT_MID","ud285f07e6b397e1cc9b7c3d9c3738c69");



//define('API_DEFAULT_VALUE_USER_ID', 0); //
//define('API_DEFAULT_VALUE_NICK_NAME', "名無しさん"); //
//define('API_DEFAULT_VALUE_SEX', 0); //
//define('API_DEFAULT_VALUE_COUNTRY', 0); //
//define('API_DEFAULT_VALUE_BIRTHDAY', ""); //
//define('API_DEFAULT_VALUE_PHOTO_FILE', "noimage.jpg"); //
//define('API_DEFAULT_VALUE_USER_LEVEL', 1); //


// Likelihoodは、程度、度合いを示すコードです。セーフサーチ時の有害レベル、顔検出時の感情レベルなど、様々なデータのレベルを表現するために用いられます。
define('LIKELIHOOD_UNKNOWN', "UNKNOWN"); // UNKNOWN	判定不能。
define('LIKELIHOOD_VERY_UNLIKELY', "VERY_UNLIKELY"); // VERY_UNLIKELY	非常に低いレベル。
define('LIKELIHOOD_UNLIKELY', "UNLIKELY"); // UNLIKELY	低いレベル。
define('LIKELIHOOD_POSSIBLE', "POSSIBLE"); // POSSIBLE	そうだと言うことができるレベル。
define('LIKELIHOOD_LIKELY', "LIKELY"); //  LIKELY	高いレベル。
define('LIKELIHOOD_VERY_LIKELY', "VERY_LIKELY"); // VERY_LIKELY	非常に高いレベル。

//
define( "BEAUTY_KEY", "8be1673387fcd4ab" );
define( "VC_PDB_KEY_BEAUTY", "1-cc0d90e2d044141dd98ad64c0a132a5" );

// betaFace
define( "BETAFACE_API_KEY", "d45fd466-51e2-4701-8da8-04351c872236" );
define( "BETAFACE_SECRET", "171e8465-f548-401d-b63b-caf0dc28df5f" );

// MS project oxford
define( "FACE_KEY_PRIME", "e611cbef8b7449ba96133d9126c1ce30" );
define( "FACE_KEY_SECOND", "1d09495e8b0846ecba19b8bb24c0aff7" );

