<!DOCTYPE html><html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>みん電占い</title>
  <link rel="shortcut icon" href="">
  <link rel="apple-touch-icon-precomposed" href="">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image:src" content="">
  <meta name="twitter:url" content="">
  <meta name="twitter:site" content="">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head><body>
<header class="renewal_header" data-scroll-header>
  <div class="header_wrap" id="js-header-wrap">
    <div class="wrap_left"><a class="left_menu" href="javascript:void(0);"><i class="fas fa-th menu_icon"></i></a><a class="left_logo" href="">
        <h1><img src="/v1/renewal/logo.png" alt=""><span class="site-title"><span class="site-catch">当たると評判の電話占い</span><br>「みん電占い」</span></h1></a></div>
    <div class="wrap_right">
      <div class="right_rightMenu"><a class="rightMenu_menuIcon mypage_nav" href=""><i class="far fa-user-circle menuIcon_icon"></i><span class="menuIcon_spanStyle mypage"></span></a>
        <button class="rightMenu_buttonArea"><span class="buttonArea_top">-</span><span class="buttonArea_middle">-</span><span class="buttonArea_bottom">-</span></button>
      </div>
    </div>
  </div>
  <div class="header_subMenu">
    <nav class="subMenu_right">
      <div class="right_formArea" id="js-right-formArea">
        <div class="formArea_left">
          <div class="left_regist"><a class="regist_link" href="user/signup/"><i class="fas fa-pen link_icon"></i></a></div>
        </div>
        <div class="formArea_right">
          <div class="right_login"><a class="login_link" href="login/"><i class="far fa-user-circle link_icon"></i></a></div>
        </div>
      </div>
      <ul class="right_listStyle" id="js-right-listStyle">
        <li><a href="search/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="page/howtouse/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="ranking/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="shaman/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="news/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="page/htu.index/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="review/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="page/payment/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="page/faq.index/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="lp/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="lp_5/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
        <li><a href="lp_6/"><i class="fas fa-angle-right spanStyle_icon"></i></a></li>
      </ul>
    </nav>
  </div>
</header>@yield('content')
<footer></footer>
<script src="{{ asset('/js/build.js') }}"></script></body>
</html>