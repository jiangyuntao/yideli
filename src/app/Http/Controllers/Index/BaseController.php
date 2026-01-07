<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Settings\GeneralSettings;

class BaseController extends Controller
{
    protected $data = [];

    // 定义允许的语言列表 (和您前端配置保持一致)
    protected array $supportedLocales = ['en', 'zh', 'fr', 'es', 'ru', 'ar'];

    public function callAction($method, $parameters)
    {
        // 1. 获取 URL 第一段作为语言代码
        $locale = request()->segment(1);

        // 2. 验证语言是否支持
        // 如果 URL 里的语言不在支持列表中（或者为空），强制回退到 'en'
        if (!in_array($locale, $this->supportedLocales)) {
            $locale = 'en';
        }

        // 3. 设置 Laravel 应用语言
        App::setLocale($locale);

        // 4. 设置 Carbon 时间语言 (处理日期格式化，如 'diffForHumans')
        // 注意：Carbon 的中文包通常是 'zh' 或 'zh_CN'，这里做个简单兼容
        Carbon::setLocale($locale === 'zh' ? 'zh_CN' : $locale);

        // 判断是否为 RTL 语言 (阿拉伯语 ar, 希伯来语 he, 波斯语 fa, 乌尔都语 ur)
        $direction = in_array($locale, ['ar', 'he', 'fa', 'ur']) ? 'rtl' : 'ltr';

        // 5. 全局共享数据给所有视图 (View Share)
        // 这样在任何 Blade 模板中都可以直接使用 $lang 和 $settings，无需在每个控制器重复传递
        View::share('lang', $locale);
        View::share('dir', $direction); // 共享方向变量
        View::share('settings', app(GeneralSettings::class));

        // 6. 继续执行原本的控制器方法
        return $this->{$method}(...array_values($parameters));
    }
}
