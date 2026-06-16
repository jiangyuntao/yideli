<?php

namespace App\Services\YoudaoTranslate;

use App\Exceptions\TranslationException;
use Illuminate\Support\Facades\Log;

class Text
{
    protected $appKey;

    protected $appSecret;

    protected $apiUrl = 'https://openapi.youdao.com/api';

    public function __construct()
    {
        $this->appKey = config('services.youdao.app_key');
        $this->appSecret = config('services.youdao.app_secret');
    }

    public function translate($text, $from, $to)
    {
        $params = [
            'q' => $text,
            'from' => $from,
            'to' => $to,
        ];

        $params = add_auth_params($params, $this->appKey, $this->appSecret);
        $response = do_call($this->apiUrl, 'post', [], $params, 'application/json');
        $result = json_decode($response, true);

        if (! is_array($result)) {
            Log::error('Youdao text translation returned an invalid payload.', [
                'from' => $from,
                'to' => $to,
                'response' => $response,
            ]);

            throw new TranslationException('翻译服务暂时不可用，请稍后重试。');
        }

        if ((string) ($result['errorCode'] ?? '') !== '0') {
            Log::error('Youdao text translation failed.', [
                'from' => $from,
                'to' => $to,
                'error_code' => $result['errorCode'] ?? null,
                'response' => $result,
            ]);

            throw new TranslationException('翻译服务暂时不可用，请稍后重试。');
        }

        $translations = $result['translation'] ?? null;

        if (! is_array($translations)) {
            Log::error('Youdao text translation payload is missing the translation field.', [
                'from' => $from,
                'to' => $to,
                'response' => $result,
            ]);

            throw new TranslationException('翻译服务返回异常，请稍后重试。');
        }

        return implode('', $translations);
    }
}

// 以下为有道翻译接口调用代码
function do_call($url, $method, $header, $param, $expectContentType, $timeout = 3000)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if (! empty($header)) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    }
    $data = http_build_query($param);
    if ($method == 'post') {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } elseif ($method == 'get') {
        $url = $url.'?'.$data;
    } else {
        echo 'http method not support';

        return null;
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    $r = curl_exec($curl);
    $contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
    if (strpos($contentType, $expectContentType) === false) {
        echo $r;
        $r = null;
    }
    curl_close($curl);

    return $r;
}

function add_auth_params($param, $appKey, $appSecret)
{
    if (array_key_exists('q', $param)) {
        $q = $param['q'];
    } else {
        $q = $param['img'];
    }
    $salt = create_uuid();
    $curtime = strtotime('now');
    $sign = calculate_sign($appKey, $appSecret, $q, $salt, $curtime);
    $param['appKey'] = $appKey;
    $param['salt'] = $salt;
    $param['curtime'] = $curtime;
    $param['signType'] = 'v3';
    $param['sign'] = $sign;

    return $param;
}

function create_uuid()
{
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 8).'-';
    $uuid .= substr($str, 8, 4).'-';
    $uuid .= substr($str, 12, 4).'-';
    $uuid .= substr($str, 16, 4).'-';
    $uuid .= substr($str, 20, 12);

    return $uuid;
}

function calculate_sign($appKey, $appSecret, $q, $salt, $curtime)
{
    $strSrc = $appKey.get_input($q).$salt.$curtime.$appSecret;

    return hash('sha256', $strSrc);
}

function get_input($q)
{
    if (empty($q)) {
        return null;
    }
    $len = mb_strlen($q, 'utf-8');

    return $len <= 20 ? $q : (mb_substr($q, 0, 10).$len.mb_substr($q, $len - 10, $len));
}
