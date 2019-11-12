<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
        <title>{$title|default=WEB_TITLE}</title>
        <link rel="stylesheet" href="/src/blog/css/blog-style.css?v=1.53" />
        <link rel="stylesheet" href="/src/blog/css/blog-pc.css?v=2.38" />
        <link rel="stylesheet" href="/src/blog/css/blog-ipad.css?v=1.85" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone.css?v=2.32" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone2.css?v=1.70" />
        <link rel="stylesheet" href="/src/blog/css/blog-head.css" />
        <link rel="stylesheet" href="/src/admin/editor/css/editormd.css">
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <script src="https://apps.bdimg.com/libs/jquery/2.0.3/jquery.js" type="text/javascript"></script>
        <style><if ($backimg.head_back_img) AND ( $backimg.is_head==1)>#header-web{background-image: url(<?php echo str_replace("\\", "/", $backimg['head_back_img']) ?>) !important;background-size:100%;background-repeat:no-repeat;}</if>
            <if ($backimg.main_back_img) AND ( $backimg.is_main==1)>body{background: url(<?php echo str_replace("\\", "/", $backimg['main_back_img']) ?>) !important;background-repeat: repeat-x;}</if>
        </style>
    </head>
    <body>


    <div class="header">

        <div class="inner-header flex">

            <header>
                <div class="header-main">
                    <hgroup class="logo">
                        <h1><a href="/" rel="home"><img src="/src/blog/image/logo.jpg" /></a></h1>
                    </hgroup>

                    <!--logo-->
                    <nav class="header-nav">
                        <ul id="menu-nav" class="menu">
                            <li class="nav-logo">
                                <a href="/" rel="home"><img src="/src/blog/image/logo.jpg" /></a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
                                <a href="/">首页</a>
                            </li>
                            <Dtcms:nav list_name="category" row="5" />
                            <volist name="category" id="v">
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                    <a href="/?type={$key}" <?php if (isset($type) && $type == $key): ?>class="current"<?php endif; ?>>{$v}</a>
                                </li>
                            </volist>
                        </ul>
                    </nav>
                    <!--header-nav-->
                    <!--header-main-->
                </div>
            </header>

        </div>

        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
    <!--Header ends-->



