<?php
namespace Common\Model;
use Common\Model\CommonModel;
class StoreModel extends CommonModel
{
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('store_name', 'require', '站点名称不能为空！', 1, 'regex', CommonModel:: MODEL_INSERT  ),
        array('domain', 'require', '站点地址不能为空！', 1, 'regex', CommonModel:: MODEL_INSERT  ),
        array('store_name','','站点名称已经存在！',0,'unique',CommonModel:: MODEL_BOTH ), // 验证store_name字段是否唯一
        array('domain','','站点地址已经存在！',0,'unique',CommonModel:: MODEL_BOTH ), // 验证store_name字段是否唯一
        
    );
}

?>