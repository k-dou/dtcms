<div class="aright">
    <form class="layui-form" method="post" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="tp_name" required  lay-verify="required" placeholder="请输入模板名称(默认default)" autocomplete="off" class="layui-input" value="{$config_data.tp_name}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">颜色</label>
            <div class="layui-input-inline" style="width: 120px;">
                <input type="text" name="tp_color" value="{$config_data.tp_color}" placeholder="请选择颜色" class="layui-input" id="dt-tpl-input">
            </div>
            <div class="layui-inline" style="left: -11px;">
                <div id="dt-tpl-color"></div>
            </div>

        </div>

        <div class="dt-form-item">
            <div class="layui-form-item">
                <label class="layui-form-label">分页</label>
                <div class="layui-input-block">
                    <input type="text" name="tp_fy" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$config_data.tp_fy}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">列表</label>
                <div class="layui-input-block">
                    <input type="text" name="tp_list" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$config_data.tp_list}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">详情</label>
                <div class="layui-input-block">
                    <input type="text" name="tp_details" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$config_data.tp_details}">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">热门</label>
            <div class="layui-input-block">
                <input type="text" name="tp_pop"   lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$config_data.tp_pop}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">推荐</label>
            <div class="layui-input-block">
                <input type="text" name="tp_rec"   lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$config_data.tp_rec}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">置顶</label>
            <div class="layui-input-block">
                <input type="text" name="tp_top"  lay-verify="required" placeholder="关键字" autocomplete="off" class="layui-input" value="{$config_data.tp_top}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">LOGO</label>
            <button type="button" class="layui-btn" id="tp_logo">
                <i class="layui-icon">&#xe67c;</i>上传图片
            </button>
            <div class="layui-upload-list" style="margin-left:117px;">
                <img  class="dt-upload-img-1" id="tp_logo_view" src="{$config_data.tp_logo}"/>
                <input type="hidden" name="tp_logo"  class="layui-input" id="tp_logo_input" value="{$config_data.tp_logo}" />
                <p id="logo_res"></p>
            </div>

        </div>
        <div class="layui-form-item" style="margin-top:100px;">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        //Demo
        // layui.use('form', function(){
        //     var form = layui.form;
        //
        //     //监听提交
        //     form.on('submit(formDemo)', function(data){
        //         layer.msg(JSON.stringify(data.field));
        //         return false;
        //     });
        // });

        layui.use('colorpicker', function(){
            var $ = layui.$
                ,colorpicker = layui.colorpicker;
            //渲染
            colorpicker.render({
                elem: '#dt-tpl-color',
                color: '#355956',
                done: function(color){
                    $('#dt-tpl-input').val(color);
                }
            });
        });
        layui.use(['upload','jquery'], function(){
            var upload = layui.upload;
            var $ = layui.$;

            //执行实例
            var uploadInst = upload.render({
                elem: '#tp_logo', //绑定元素
                url: 'uploadLogo', //上传接口
                //*********************传输限制
                size: 100 ,                  //传输大小100k
                exts: 'jpg|png|gif|',        //可传输文件的后缀
                accept: 'file' ,             //video audio images
                before: function(obj){
                    obj.preview(function(index,file,result){
                        $('#tp_logo_view').attr('src',result);
                    });
                },
                done: function(res){
                    if(res.status == '1'){
                        $('#tp_logo_input').val(res.data.tp_logo);
                    }
                    return layer.msg(res.msg);
                }
                ,error: function(){
                    //请求异常回调
                    var logo_res = $('#logo_res');
                    logo_res.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs tp-img-reload">重试</a>');
                    logo_res.find('.tp-img-reload').on('click', function(){
                        uploadInst.upload();
                    })
                }
            });
        });
    </script>

</div>



