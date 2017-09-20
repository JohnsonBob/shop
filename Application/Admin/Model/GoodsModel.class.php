<?php

/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 2017/9/19
 * Time: 23:28
 */
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    //添加时调用create方法允许接收的字段
    protected $insertFields='goods_name,market_price,shop_price,goods_desc,is_on_sale';
    //定义验证规则
    protected $_validate = array(
        array('goods_name','require','商品名称不能为空！',1),
        array('market_price','currency','市场价格必须是货币类型！',1),
        array('shop_price','currency','本店价格必须是货币类型！',1),
    );

    //这个方法在插入之前会被调用
    //$data要插入表中的数据
    protected function _before_insert(&$data, $options)
    {
        $data['addtime'] = date('Y-m-d H:i:s',time());
        //用自定义的过滤函数来有选择的过滤
        $data['goods_desc'] = removeXSS($_POST['goods_desc']);
    }
}