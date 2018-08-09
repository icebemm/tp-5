<?php

namespace app\common\validate;


use \think\Validate;

/**
 * 公共验证器
 * Class PublicParams
 * @package app\common\validate
 * @Author lc
 */
class PublicParams extends Validate
{
    private $signAuthKey = ''; // 密钥
    private $expire = 5; // 签名有效期（单位：秒）
    private $validateSign = false; // 开启签名验证

    protected $rule = [
        'id'                    =>  'require',
        'id'                    =>  'array',
    ];

    protected $message = [
        'id.array' => 'asdf'
    ];

    protected $scene = [
    ];

    /**
     * @param mixed $value 验证数据
     * @param mixed $rule 验证规则
     * @param array $data 全部数据（数组）
     * @return string|boolean
     * @Author lc 
     */
    protected function Authentication($value, $rule, $data)
    {
        if (!$this->validateSign) {
            return true;
        }
        $time = time();
        // 时间戳过期
        if (!isset($data['params']['time']) || ($time - $data['params']['time']) > $this->expire) {
            return false;
        }
        $sign = $data['params']['sign'];
        unset($data['params']['sign']);
        $newArray = array_merge($data['head'], $data['params']);
        ksort($newArray);
        $realSign = md5(urldecode(http_build_query($newArray) . '&key=' . $this->signAuthKey));
        if ($sign != $realSign) {
            return false;
        }
        return true;
    }
}