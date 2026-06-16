<?php

namespace App\Services\YoudaoTranslate;

use App\Exceptions\TranslationException;
use Illuminate\Support\Facades\Log;

class Html
{
    protected $appKey;

    protected $appSecret;

    protected $apiUrl = 'https://openapi.youdao.com/translate_html';

    public function __construct()
    {
        $this->appKey = config('services.youdao.app_key');
        $this->appSecret = config('services.youdao.app_secret');
    }

    public function translate($text, $from, $to)
    {
        $salt = create_guid();
        $args = [
            'q' => $text,
            'appKey' => $this->appKey,
            'salt' => $salt,
        ];
        $args['from'] = $from;
        $args['to'] = $to;
        $args['signType'] = 'v3';
        $curtime = strtotime('now');
        $args['curtime'] = $curtime;
        $signStr = $this->appKey.truncate($text).$salt.$curtime.$this->appSecret;
        $args['sign'] = hash('sha256', $signStr);
        $response = call($this->apiUrl, $args);
        $result = json_decode($response, true);

        if (! is_array($result)) {
            Log::error('Youdao html translation returned an invalid payload.', [
                'from' => $from,
                'to' => $to,
                'response' => $response,
            ]);

            throw new TranslationException('翻译服务暂时不可用，请稍后重试。');
        }

        if ((string) ($result['errorCode'] ?? '') !== '0') {
            Log::error('Youdao html translation failed.', [
                'from' => $from,
                'to' => $to,
                'error_code' => $result['errorCode'] ?? null,
                'response' => $result,
            ]);

            throw new TranslationException('翻译服务暂时不可用，请稍后重试。');
        }

        $translation = data_get($result, 'data.translation');

        if (! is_string($translation)) {
            Log::error('Youdao html translation payload is missing the translation field.', [
                'from' => $from,
                'to' => $to,
                'response' => $result,
            ]);

            throw new TranslationException('翻译服务返回异常，请稍后重试。');
        }

        return $translation;
    }
}

// 发起网络请求
function call($url, $args = null, $method = 'post', $testflag = 0, $timeout = 2000, $headers = [])
{
    $ret = false;
    $i = 0;
    while ($ret === false) {
        if ($i > 1) {
            break;
        }
        if ($i > 0) {
            sleep(1);
        }
        $ret = callOnce($url, $args, $method, false, $timeout, $headers);
        $i++;
    }

    return $ret;
}

function callOnce($url, $args = null, $method = 'post', $withCookie = false, $timeout = 2000, $headers = [])
{
    $ch = curl_init();
    if ($method == 'post') {
        $data = convert($args);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
    } else {
        $data = convert($args);
        if ($data) {
            if (stripos($url, '?') > 0) {
                $url .= "&$data";
            } else {
                $url .= "?$data";
            }
        }
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (! empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if ($withCookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $_COOKIE);
    }
    $r = curl_exec($ch);
    curl_close($ch);

    return $r;
}

function convert(&$args)
{
    $data = '';
    if (is_array($args)) {
        foreach ($args as $key => $val) {
            if (is_array($val)) {
                foreach ($val as $k => $v) {
                    $data .= $key.'['.$k.']='.rawurlencode($v).'&';
                }
            } else {
                $data .= "$key=".rawurlencode($val).'&';
            }
        }

        return trim($data, '&');
    }

    return $args;
}

// uuid generator
function create_guid()
{
    $microTime = microtime();
    [$a_dec, $a_sec] = explode(' ', $microTime);
    $dec_hex = dechex($a_dec * 1000000);
    $sec_hex = dechex($a_sec);
    ensure_length($dec_hex, 5);
    ensure_length($sec_hex, 6);
    $guid = '';
    $guid .= $dec_hex;
    $guid .= create_guid_section(3);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= $sec_hex;
    $guid .= create_guid_section(6);

    return $guid;
}

function create_guid_section($characters)
{
    $return = '';
    for ($i = 0; $i < $characters; $i++) {
        $return .= dechex(mt_rand(0, 15));
    }

    return $return;
}

function truncate($q)
{
    $len = abslength($q);

    return $len <= 20 ? $q : (mb_substr($q, 0, 10).$len.mb_substr($q, $len - 10, $len));
}

function abslength($str)
{
    if (empty($str)) {
        return 0;
    }
    if (function_exists('mb_strlen')) {
        return mb_strlen($str, 'utf-8');
    } else {
        preg_match_all('/./u', $str, $ar);

        return count($ar[0]);
    }
}

function ensure_length(&$string, $length)
{
    $strlen = strlen($string);
    if ($strlen < $length) {
        $string = str_pad($string, $length, '0');
    } elseif ($strlen > $length) {
        $string = substr($string, 0, $length);
    }
}
