<div class="aright">

    <fieldset class="layui-elem-field layui-field-title">
        <lagend>标签配置</lagend>
    </fieldset>
    <form class="layui-form" method="post" action="">
        <div id="dt-tag">
            <input type="hidden" name="tag" id="dt-h-tag"  value="{$config_tag_str}"  />
            <span style="margin: 0 0 5px 110px;float: left;" id="dt-tag-m">

            </span>

            <div class="layui-form-item">
                <label class="layui-form-label">标签</label>
                <div class="layui-input-block">
                    <input id="dt-input" type="text" value="" autocomplete="off" class="layui-input" style="width: 400px;float: left;margin-right: 20px;">
                    <button class="layui-btn" id="dt-btn" type="button" style="background: #FF5722;">添加标签</button>
                </div>
            </div>

        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formData">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </form>

    <script>
        layui.use(['form','jquery', 'layer'], function(){
            var form = layui.form,
                $ = layui.$,
                layer = layui.layer;
            tag_arr = new Array();
            var tag_str = $('#dt-h-tag').val();
            var tag_arr = tag_str.split(',');
            var html = '';

            html = delData(tag_arr);
            $('#dt-tag-m').html(html);

            var new_tag_str = '';
            $('#dt-btn').click(function(){
                tag_arr = new Array();
                var tag_str = $('#dt-h-tag').val();
                var tag_arr = tag_str.split(',');
                var e = $.trim($("#dt-input").val());
                if(e.length == 0){
                    layer.msg('输入正确标签！');
                }else{
                    if($.inArray(e,tag_arr) == -1){
                        tag_arr.push(e);
                    }else{
                        layer.msg('已有此标签！');
                    }
                }
                new_tag_str = tag_arr.join(',');
                $("#dt-h-tag").val(new_tag_str)

                html = delData(tag_arr);
                $('#dt-tag-m').html(html);

            });

            //监听提交
            form.on('submit(formData)', function(data){
                loading = layer.load(2,{
                    shade:[0.2,'#000']
                });

                $.post('/admin/set_config/tag.html',data.field,function(data){
                    var data = jQuery.parseJSON(data);
                    if(data.code == '0'){
                        layer.close(loading);
                        layer.msg(data.msg,{
                            icon:1,
                            time:1000
                        },function(){
                            location.reload();
                        });
                    }else{
                        layer.close(loading);
                        layer.msg(data.msg,{
                            icon:2,
                            anim:6,
                            time:1000
                        });
                    }
                });

                layer.msg(JSON.stringify(data.field));
                return false;
            });

            $('#dt-tag').on('click','a>em',function(){
                var tag = $(this).parent().text();
                $(this).parent().remove();
                var tags = new Array();
                $("#dt-tag").find('a').each(function() {
                    tags.push($(this).text());
                });
                $('#dt-h-tag').val(tags.join(","));
            });

        });

        function delData(tag_arr)
        {
            var html = '';
            $.each(tag_arr,function(index,value){
                html += '<a href="javascript:;">';
                html += value;
                html += '<em></em>';
                html += '</a>';
            });

            return html;
        }
    </script>

</div>
