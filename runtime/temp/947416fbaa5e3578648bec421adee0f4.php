<?php /*a:5:{s:86:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/info_index.php";i:1573022849;s:82:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/layout.php";i:1568260049;s:87:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_head.php";i:1573024576;s:88:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_aside.php";i:1573013109;s:87:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\index/view/default/web/public_foot.php";i:1562260080;}*/ ?>
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






    <div id="main">
        <div id="soutab">
        </div>
        <!-- /header -->
        <div id="container">
            <?php $tag_nav_class = new \app\Common\dtcmstag\navTag(array('list_name'=>'category','row'=>'5','cache'=>'0','type'=>'run',));$category = $tag_nav_class->run();?>
            <nav id="mbx">当前位置: <a href="javascript:void(0);" onclick="window.history.go(-1);">返回</a> &gt; <a href="/?type=<?php echo htmlentities($info['type']); ?>"><?php echo htmlentities($category[$info['type']]); ?></a></nav>
            <?php if($info['is_md'] == 2): ?>
                <article class="content">
                    <header class="contenttitle">
                        <a href="javascript:;" class="count"></a>
                        <div class="mscc">
                            <h1 class="mscctitle">
                                <a><?php echo htmlentities($info['title']); ?></a></h1>
                            <address class="msccaddress ">
                                <time><?php echo htmlentities($info['c_time']); ?></time>
                            </address>
                        </div>
                    </header>
                </article>
                <div class="content-text">
                    <?php echo $info['content']; ?>
                </div>
                <?php else: ?>

                <article>
                    <header class="contenttitle">
                        <a href="javascript:;" class="count"></a>
                        <div class="mscc">
                            <h1 class="mscctitle">
                                <a><?php echo htmlentities($info['title']); ?></a></h1>
                            <address class="msccaddress ">
                                <time><?php echo htmlentities($info['c_time']); ?></time>
                            </address>
                        </div>
                    </header>
                </article>
                <div id="editormd">
                    　　<textarea><?php echo htmlentities($info['content']); ?></textarea>
                </div>
            <?php endif; ?>


                <!--content_text-->

            <!--content-->
            <div  class='button_to_top'>
                <button>返回顶部</button>
            </div>
            <!--百度分享-->
            <?php if (!checkWap()): ?>
                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                <script>
                    window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "24"}, "share": {}};
                    with (document)
                        0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = '/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
                </script>
            <?php endif; ?>
            <div class="comment" id="comments">
                <!--这里填写第三方评论代码-->
            </div>
            <!-- .nav-single -->
        </div>
        <!--Container End-->
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
<script src="/src/admin/editor/lib/marked.min.js"></script>
<script src="/src/admin/editor/lib/prettify.min.js"></script>
<script src="/src/admin/editor/lib/raphael.min.js"></script>
<script src="/src/admin/editor/lib/underscore.min.js"></script>
<script src="/src/admin/editor/lib/sequence-diagram.min.js"></script>
<script type="text/javascript" src="/src/admin/editor/lib/flowchart.min.js"></script>
<script type="text/javascript" src="/src/admin/editor/editormd.min.js"></script>
<script>
    $(function () {
        $('.button_to_top').click(function () {
            $('html,body').animate({scrollTop: '0px'}, 700);
        });
    });


    // 页面解析markdown为html进行显示
    editormd.markdownToHTML("editormd", {
       // markdown        : "",
        htmlDecode      : "style,script,iframe",
        emoji           : true,  // 解析表情
        taskList        : true,  // 解析列表
        tex             : true,  // 默认不解析
        flowChart       : true,  // 默认不解析
        sequenceDiagram : true  // 默认不解析
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