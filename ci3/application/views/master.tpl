{header('X-FRAME-OPTIONS: DENY')}{header("X-Content-Type-Options: nosniff")}
{* ↑フレームセットの一部として表示される事を禁止 *}{* ↑XSS対策 *}
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6, user-scalable=1" />
<title>Tech Stylist</title>
<meta name="description" content="なりたいワタシになれる！Tech Stylist" />
<meta name="keywords" content="Tech Stylist,TechStylist,テックスタイリスト,髪型,美容院,アフロ,アフロちゃん,アフロちゃんの性別は不明です。" />
<meta property="og:title" content="Tech Stylist"/>
<meta property="og:image" content="http://stylist.tech/img/common/ogp.jpg"/>
<meta property="og:site_name" content="Tech Stylist"/>
<meta property="og:description" content="なりたいワタシになれる！Tech Stylist"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="Content-Script-Type" content="text/javascript"/>
<link rel="stylesheet" type="text/css" href="/css/low.css">
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/screen.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/smoothScroll.js"></script>
<script type="text/javascript" src="/js/heightLine.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link rel="shortcut icon" href="/img/common/favicon.ico">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="/js/html5shiv.js"></script>
<![endif]-->
	{literal}
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '1074772389275943',
					xfbml      : true,
					version    : 'v2.6'
				});
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	{/literal}
</head>

<body id="top">
	{block name=body}{/block}


<footer>
	<div class="logo"><img src="/img/common/logo2.png"></div>
<small>Powered by <a href="http://webservice.recruit.co.jp/">ホットペッパーBeauty Webサービス</a><br />
TechStylist by Team KAMI</small>
	<br />
	<a href="/privacy/">Privacy Policy</a> <a href="/terms/">Terms of Use</a><br />
</footer>
</body>
</html>