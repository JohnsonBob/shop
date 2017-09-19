<?php
namespace Admin\Controller;
use Think\Controller;
/**
 *商品控制器
 */
class GoodsController extends Controller {
    /**
     *显示和处理表单
     */
    public function Add(){
        //判断用户是否提交表单
        if(IS_POST){
            //生成模型
            $mode = D('goods');
            //接收数据并保存到模型中
            /**
             * create 方法1、接收数据并保存到模型中 2、根据模型中定义的规则验证表单
             * 第一个参数 要接收的数据
             * 第二参数 表单的类型 当前是添加还是修改 1添加 2修改
             * */
            if($mode->create(I('post.'),1)){
                if($mode->add()){
                    //显示成功信息并2秒之后跳转
                    $this->success('操作成功！',U('lst'),2);
                    exit;
                }
            }
            //走到这里说面上面失败了 在这里处理失败请求
            //从模型提取失败信息
            $error = $mode->getError();
            //控制器显示打印失败信息 并3秒之后跳回到上一个界面
            $this->error($error);
        }
        //显示表单
        $this->display();
    }

    /**
     *商品列表页
     */
    public function lst(){
        echo '商品列表页';
    }
}