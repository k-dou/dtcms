<extend name="layout">


<block name="info">
<link type="text/css" href="/src/blog/css/jcarousel.css?v=1.08" rel="stylesheet"
      xmlns:dtcms="http://www.w3.org/1999/html"/>
<script type="text/javascript" src="/src/blog/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="/src/blog/js/jquery.pikachoose.min.js"></script>
<script type="text/javascript" src="/src/blog/js/jquery.touchwipe.min.js"></script>
<div id="main">
    <div id="soutab">
    </div>
    <!-- /header -->
    <block name="container">
    <div id="container">
        <?php if ($tops): ?>
            <div class="pikachoose ">
                <div class="showthispika">
                    <ul id="pikame" class="jcarousel-skin-pika">
                        <volist name='tops' id='vo'>
                            <li>
                                <a href="/info/{$vo.id}/">
                                    <img src="{$vo.img}"/>
                                </a>
                                <span>{$vo.title}</span>
                            </li>
                        </volist>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <volist name='list' id='vo'>
            <section class="list">
                <?php if ($vo['img']): ?>
                    <span class="titleimg">
                        <a href="/info/{$vo.id}/">
                            <img width="270" height="165" src="/src/blog/image/default.png" data-original="{$vo.img|default='/src/blog/image/default.png'}" class="attachment-thumbnail wp-post-image" />
                        </a>
                    </span>
                <?php endif; ?>
                <div class="mecc">
                    <h2 class="mecctitle">
                        <a href="/info/{$vo.id}/">{$vo.title}</a> </h2>
                    <address class="meccaddress">
                        <time>{$vo.c_time}</time>
                        <Dtcms:nav list_name="category" row="5" />
                        <a href='/?type={$vo.type}'>{$category[$vo['type']]}</a>
                    </address>
                    <a href="/info/{$vo.id}/">
                        <p>
                            <?php echo $vo['desc'] ? htmlspecialchars_decode($vo['desc']) : '暂无简介'; ?>...
                            [查看全文]
                        </p>
                        <div class="readmore">
                            <a class="me_articleItem_readMore" href="/info/{$vo.id}/">
                                Read More –&gt;
                            </a>
                        </div>
                    </a>
                </div>
                <div class="clear"></div>
            </section>
        </volist>

<!--        <taglib name = "Demo" />-->
<!--        <Demo:sitename name='新浪微博'/>-->
<!--        <Demo:keyword key='新浪,微博'>-->
<!--        我在关键词后面。-->
<!--        </Demo:keyword>-->



        <Dtcms:article list_name="article" row="7" alias="DT_art" />

<!--        <Cx:php> echo 546</Cx:php>-->

        <div class="clear"></div>
        <!-- page start -->
        <div class="pageshow">
            {$page|raw}
        </div>
        <!-- page end -->
    </div>
    </block>
    <!--Container-->
    <block name="sitebar">
    <include file="public:aside" />
    </block>
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
</block>