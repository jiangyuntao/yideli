<?php

use Illuminate\Support\Facades\Route;

// 1. 引入控制器命名空间 (必须步骤)
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Index\ProductController;
use App\Http\Controllers\Index\NewsController;
use App\Http\Controllers\Index\PageController;
use App\Http\Controllers\Index\InquireController;
use App\Http\Controllers\Index\FaqController;
use App\Http\Controllers\Index\LegalController;
use App\Http\Controllers\Api\ProductAccessController;
use App\Http\Controllers\Index\ProductionProcessController;

// 1. 根目录自动跳转到默认语言
Route::get('/', function () {
    return redirect('/en');
});

// 2. 带语言前缀的路由组
Route::prefix('{lang}')
    ->where(['lang' => 'en|zh|fr|es|ru|ar'])
    ->group(
        function () {
            // 首页
            Route::get('/', [IndexController::class, 'index'])->name('index');

            // 产品相关
            Route::get('/products/{slug?}', [ProductController::class, 'index'])->name('product.index');
            Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

            // 新闻相关
            Route::get('/news/{slug?}', [NewsController::class, 'index'])->name('news.index');
            Route::get('/news/show/{slug}', [NewsController::class, 'show'])->name('news.show');

            // 单页 (关于我们等)
            Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

            // 询盘/联系我们
            Route::get('/inquire', [InquireController::class, 'form'])->name('inquire.form');
            Route::post('/inquire', [InquireController::class, 'submit'])->name('inquire.submit');
            Route::get('/inquire/captcha/refresh', [InquireController::class, 'captchaRefresh'])->name('inquire.captcha.refresh');
            Route::get('/inquire/captcha/{captchaId}', [InquireController::class, 'captchaImage'])->name('inquire.captcha');

            // FAQ 页面
            Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

            // 合规页面
            Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
            Route::get('/terms-of-use', [LegalController::class, 'termsOfUse'])->name('terms-of-use');

            // 生产流程
            Route::get('/production-process', [ProductionProcessController::class, 'index'])->name('production-process');
        }
    );

Route::post('/api/verify-access-code', [ProductAccessController::class, 'verify'])->name('api.verify-access');
// 临时调试用：清除解锁状态
Route::get('/api/reset-access', function () {
    // 清除记录已解锁产品ID的 Session
    session()->forget('unlocked_product_ids');

    // 如果之前用过旧逻辑，也顺手清一下
    session()->forget('product_access_granted');

    return redirect('/en/products')->with('message', '测试状态已重置，产品已重新锁定！');
});
