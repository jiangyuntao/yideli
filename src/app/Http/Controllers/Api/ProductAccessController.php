<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductAccessCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductAccessController extends Controller
{
    public function verify(Request $request)
    {
        // 1. 验证必须包含 product_id
        $request->validate([
            'code' => 'required|string',
            'product_id' => 'required|integer',
        ]);

        $inputCode = $request->input('code');
        $productId = $request->input('product_id');

        // 2. 查询 Code 并预加载关联的产品
        $accessCode = ProductAccessCode::with('products')
            ->where('code', $inputCode)
            ->first();

        // 3. 基础验证
        if (!$accessCode) {
            return response()->json(['valid' => false, 'message' => 'Invalid access code.'], 422);
        }

        // 4. 关键验证：检查这个码是否适用于当前请求的产品
        // contains 方法检查集合中是否包含某个主键 ID
        if (!$accessCode->products->contains($productId)) {
            return response()->json(['valid' => false, 'message' => 'This code is not valid for this specific product.'], 422);
        }

        // 5. 过期验证
        if ($accessCode->expires_at && Carbon::now()->gt($accessCode->expires_at)) {
            return response()->json(['valid' => false, 'message' => 'This code has expired.'], 422);
        }

        // 6. 次数验证
        if (!is_null($accessCode->usage_limit) && $accessCode->used_count >= $accessCode->usage_limit) {
            return response()->json(['valid' => false, 'message' => 'Usage limit exceeded.'], 422);
        }

        // 7. 验证通过：获取该码绑定的所有产品 ID (一次性解锁该码下的所有产品)
        $linkedProductIds = $accessCode->products->pluck('id')->toArray();

        // 更新 Session
        $currentUnlocked = session('unlocked_product_ids', []);
        $newUnlocked = array_unique(array_merge($currentUnlocked, $linkedProductIds));
        session(['unlocked_product_ids' => $newUnlocked]);

        // 8. 更新数据库计数
        $accessCode->increment('used_count');

        return response()->json([
            'valid' => true,
            'message' => 'Access granted.'
        ]);
    }
}
