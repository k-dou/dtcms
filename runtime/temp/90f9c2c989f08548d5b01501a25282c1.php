<?php /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\public_head.php";i:1571392445;s:79:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\setconfig_index.php";i:1570681534;}*/ ?>
<div class="aright">

    <form class="layui-form" method="post" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题（博客主题）" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">域名</label>
            <div class="layui-input-inline">
                <input type="text" name="domain" required lay-verify="required" placeholder="请输入域名" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['domain']); ?>">
            </div>
<!--            <div class="layui-form-mid layui-word-aux">辅助文字</div>-->
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">作者</label>
            <div class="layui-input-block">
                <input type="text" name="author" required  lay-verify="required" placeholder="请输入标题（博客主题）" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['author']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">备案号</label>
            <div class="layui-input-block">
                <input type="text" name="record" required  lay-verify="required" placeholder="京ICP备10000000号" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['record']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关键字</label>
            <div class="layui-input-block">
                <input type="text" name="keyword" required  lay-verify="required" placeholder="关键字" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['keyword']); ?>">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea" ><?php echo htmlentities($config_data['desc']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data){
                layer.msg(JSON.stringify(data.field));
                return false;
            });
        });
    </script>

</div>
