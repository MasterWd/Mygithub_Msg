<?php

/**
 * Created by PhpStorm.
 * User: 12947
 * Date: 2018/10/6
 * Time: 20:19
 */
class input
{
    //定义函数对数据进行检查
    function post($content)
    {
        if ($content == '') {
            return false;
        }
        #禁止使用的用户名
        /*
        先循环读取禁止使用的用户名
        使用if语句一一的与提交的语言人进行对比
        任何一个相同，代表禁止使用的用户名
        */
        $n = ['张三', '李四', '王五'];
        foreach ($n as $name) {
            if ($content == $name) {
                return false;
            }
        }
        return true;
    }
}