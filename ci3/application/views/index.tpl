{* Extend our master template *}
{extends file="master.tpl"}

{* This block is defined in the master.tpl template *}
{block name=title}TOP{/block}

{block name=javascript}
{/block}

{block name=body}
<header id="pagetop">
<div id="headerarea">
<h1 class="pc"><img src="/img/common/logo.png" alt="Tech Stylist" /></h1>
<img src="/img/contents/main.png" alt="なりたいワタシになれる！" class="pc" /><img src="/img/common/spmain.jpg" alt="Tech Stylist" class="sp" />
</div>

<div class="btntechstyle"><a href="http://line.me/ti/p/%40yds7587x"><img src="/img/common/icon_line.png" alt="LINE" /><br />
Tech Stylistに髪型相談！</a></div>
</header>

<main>
<section id="useCol">
<section class="contents">
<div class="subject"><h2>HOW TO USE??</h2></div>
<div class="wrap">
<article class="heightLine-group1"><img src="/img/contents/use01.png" alt="STEP 1" />
<div class="txt">LINEで『美の伝道師』と<br />お友達になる</div></article>
<article class="heightLine-group1"><img src="/img/contents/use02.png" alt="STEP 2" />
<div class="txt">自分の顔写真を送る</div></article>
<article class="heightLine-group1"><img src="/img/contents/use03.png" alt="STEP 3" />
<div class="txt">あなたに似合う髪型が<br />
おくられてきます</div></article>
</div>
</section>
</section>
<!--/useCol/-->
<section id="systemCol">
<section class="contents">
<div class="subject"><h2>SYSTEM</h2></div>
自分に似合うヘアスタイルをお探しではありませんか？安心してください！私たちのボットがお手伝いします！ <br />
私たちのボットとLINEで友達になって頂きますと、私たちのボット（Tech Stylist）があなたにお似合いのヘアスタイルをお探しします。<br />
顔の形のベースとなる5つのベクトルをディープラーニングで解析し最適な髪型を割り出します。<br />
<br />
<ul>
<li>対象エリアは日本国内になります。また初期設定では、表参道・青山エリアが指定されてありますので、変更の場合、位置メニューから場所を指定ください</li>
<li>若すぎる場合、男性の場合、認識されにくい顔の場合は現在解析できません</li>
<li>髪の毛の量・長さは現在考慮されておりません。今後対応予定です</li>
</ul>
<!--その基盤となる技術は下記を利用しております。<br />
<ol>
<li>“Microsoft Azure Project Oxford”（顔認識）</li>
<li>“Recruit HotPepper Beauty API”（ヘアサロンやヘアスタイリスト検索）</li>
</ol-->
{*<a href="/img/systemdetail.pdf" class="more" target="_blank">MORE SYSTEM DETAIL</a>*}
</section>
</section>
<!--/systemCol/-->
</main>

<div class="pagetop"><a href="#pagetop">PAGE TOP</a></div>
{/block}


