<?php /*a:5:{s:87:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/index_index.php";i:1572940709;s:82:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/layout.php";i:1568260049;s:87:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_head.php";i:1573024576;s:88:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_aside.php";i:1573013109;s:87:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_foot.php";i:1562260080;}*/ ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
        <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:WEB_TITLE)); ?></title>
        <link rel="stylesheet" href="/src/blog/css/blog-style.css?v=1.53" />
        <link rel="stylesheet" href="/src/blog/css/blog-pc.css?v=2.38" />
        <link rel="stylesheet" href="/src/blog/css/blog-ipad.css?v=1.85" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone.css?v=2.32" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone2.css?v=1.70" />
        <link rel="stylesheet" href="/src/blog/css/blog-head.css" />
        <link rel="stylesheet" href="/src/admin/editor/css/editormd.css">
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <script src="https://apps.bdimg.com/libs/jquery/2.0.3/jquery.js" type="text/javascript"></script>
        <style><?php if(($backimg['head_back_img']) AND ( $backimg['is_head']==1)): ?>#header-web{background-image: url(<?php echo str_replace("\\", "/", $backimg['head_back_img']) ?>) !important;background-size:100%;background-repeat:no-repeat;}<?php endif; if(($backimg['main_back_img']) AND ( $backimg['is_main']==1)): ?>body{background: url(<?php echo str_replace("\\", "/", $backimg['main_back_img']) ?>) !important;background-repeat: repeat-x;}<?php endif; ?>
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
                            <?php $tag_nav_class = new \app\Common\dtcmstag\navTag(array('list_name'=>'category','row'=>'5','cache'=>'0','type'=>'run',));$category = $tag_nav_class->run();if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                    <a href="/?type=<?php echo htmlentities($key); ?>" <?php if (isset($type) && $type == $key): ?>class="current"<?php endif; ?>><?php echo htmlentities($v); ?></a>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
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






<link type="text/css" href="/src/blog/css/jcarousel.css?v=1.08" rel="stylesheet"
      xmlns:dtcms="http://www.w3.org/1999/html"/>
<script type="text/javascript" src="/src/blog/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="/src/blog/js/jquery.pikachoose.min.js"></script>
<script type="text/javascript" src="/src/blog/js/jquery.touchwipe.min.js"></script>
<div id="main">
    <div id="soutab">
    </div>
    <!-- /header -->
    
    <div id="container">
        <?php if ($tops): ?>
            <div class="pikachoose ">
                <div class="showthispika">
                    <ul id="pikame" class="jcarousel-skin-pika">
                        <?php if(is_array($tops) || $tops instanceof \think\Collection || $tops instanceof \think\Paginator): $i = 0; $__LIST__ = $tops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <a href="/info/<?php echo htmlentities($vo['id']); ?>/">
                                    <img src="<?php echo htmlentities($vo['img']); ?>"/>
                                </a>
                                <span><?php echo htmlentities($vo['title']); ?></span>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <section class="list">
                <?php if ($vo['img']): ?>
                    <span class="titleimg">
                        <a href="/info/<?php echo htmlentities($vo['id']); ?>/">
                            <img width="270" height="165" src="/src/blog/image/default.png" data-original="<?php echo htmlentities((isset($vo['img']) && ($vo['img'] !== '')?$vo['img']:'/src/blog/image/default.png')); ?>" class="attachment-thumbnail wp-post-image" />
                        </a>
                    </span>
                <?php endif; ?>
                <div class="mecc">
                    <h2 class="mecctitle">
                        <a href="/info/<?php echo htmlentities($vo['id']); ?>/"><?php echo htmlentities($vo['title']); ?></a> </h2>
                    <address class="meccaddress">
                        <time><?php echo htmlentities($vo['c_time']); ?></time>
                        <?php $tag_nav_class = new \app\Common\dtcmstag\navTag(array('list_name'=>'category','row'=>'5','cache'=>'0','type'=>'run',));$category = $tag_nav_class->run();?>
                        <a href='/?type=<?php echo htmlentities($vo['type']); ?>'><?php echo htmlentities($category[$vo['type']]); ?></a>
                    </address>
                    <a href="/info/<?php echo htmlentities($vo['id']); ?>/">
                        <p>
                            <?php echo $vo['desc'] ? htmlspecialchars_decode($vo['desc']) : '暂无简介'; ?>...
                            [查看全文]
                        </p>
                        <div class="readmore">
                            <a class="me_articleItem_readMore" href="/info/<?php echo htmlentities($vo['id']); ?>/">
                                Read More –&gt;
                            </a>
                        </div>
                    </a>
                </div>
                <div class="clear"></div>
            </section>
        <?php endforeach; endif; else: echo "" ;endif; ?>

<!--        <taglib name = "Demo" />-->
<!--        <Demo:sitename name='新浪微博'/>-->
<!--        <Demo:keyword key='新浪,微博'>-->
<!--        我在关键词后面。-->
<!--        </Demo:keyword>-->



        <?php $tag_article_class = new \app\Common\dtcmstag\articleTag(array('list_name'=>'article','row'=>'7','alias'=>'DT_art','cache'=>'0','type'=>'run',));$article = $tag_article_class->run();?>

<!--        <?php  echo 546 ?>-->

        <div class="clear"></div>
        <!-- page start -->
        <div class="pageshow">
            <?php echo $page; ?>
        </div>
        <!-- page end -->
    </div>
    
    <!--Container-->
    
    <aside id="sitebar">
    <!--erweima-->
    <div class="sitebar_list">
        <h4 class="sitebar_title">我的相关网站</h4>
        <p>
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2845890303&amp;site=qq&amp;menu=yes">
                <img border="0" src="http://wpa.qq.com/pa?p=1:2845890303:13" alt="有事您Q我" title="有事您Q我">
            </a>
        </p>
        <p>
            <a href="https://blog.k-dou.com" target="_blank">作者 — — Janko</a>
        </p>
    </div>
    <div class="mydiv" id="mydiv">

        <object height="166" width="200"  type="application/x-shockwave-flash" style="outline:none;" data="http://cdn.abowman.com/widgets/hamster/hamster.swf?" width="300" height="225">
            <param name="movie" value="http://cdn.abowman.com/widgets/hamster/hamster.swf?"></param>
            <param name="AllowScriptAccess" value="always"></param><param name="wmode" value="opaque"></param>
        </object>
<!--        <a href="javascript:void(0);"><img src="/src/blog/image/about.jpg" ></a>-->
    </div>
</aside>
    
    <!-- /right -->
    <div class="clear"></div>
</div>
<!--main-->
<!--内容结束-->

<script>
    $(function () {
        setTimeout(function () {
        $('.showthispika').fadeIn('slow');
//            $('.pikachoose').removeClass('pikaloadimg');
        }, 100);
        $("#pikame").PikaChoose({carousel: true, carouselVertical: true});
    });
</script>


<div class='actGotop'>
    <a href='javascript:void(0);'><img src='/src/blog/image/top.png' /></a>
</div>
<footer id="dibu">
    <div class="about">
        <div class="right">
            <ul id="menu-bottom-nav" class="menu">
                <!--<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="#">友链1</a></li>-->
            </ul>
            <p class="banquan">
                笔记！
            </p>
        </div>
        <div class="left">
            <ul class="bottomlist">
            </ul>
        </div>
    </div>
    <!--about-->
    <div class="bottom">
        <a href="javascript:;" target="_blank">Copyright &copy; <?php echo date('Y'); ?></a>
        &nbsp;&nbsp;&nbsp;
        <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow"><?php echo WEB_ICP; ?></a>
        &nbsp;&nbsp;&nbsp;
        <a href="http://www.thinkphp.cn/" target="_blank" rel="nofollow">基于 Thinkphp<?php echo think\App::VERSION; ?></a>
        <div class="tongji">
            <!-- 添加站长统计代码 -->
        </div>
    </div>
    <!--bottom-->
</footer>
<!-- /footer -->
<input type='hidden' class='iswap' value="<?php echo checkWap() ? 1 : 0; ?>">
<script type="text/javascript" src="/src/blog/js/blog.js?v=1.0"></script>
<script type="text/javascript" src="https://apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.js"></script>
</body>
</html>