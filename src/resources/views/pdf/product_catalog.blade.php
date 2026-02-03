<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    /* 全局重置 */
    body {
      font-size: 14px;
      line-height: 1.5;
      color: #333;
    }

    /* === 字体适配区域 === */
    /* 请确保 storage/fonts 下有对应字体，或使用 CDN/系统字体 */

    @if($locale == 'zh')
      /* 中文：使用支持中文的字体 */
      body {
        font-family: 'Noto Sans SC', 'msyh', 'DejaVu Sans', sans-serif;
        src: url('{{ storage_path('fonts/NotoSansSC-Regular.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
      }

    @elseif($locale == 'ru')
      /* 俄语：DejaVu Sans 原生支持西里尔字母 */
      body {
        font-family: 'DejaVu Sans', sans-serif;
      }

    @elseif($locale == 'ar')
      /* 阿拉伯语：RTL 布局 + 字体 */
      body {
        font-family: 'DejaVu Sans', sans-serif;
        direction: rtl;
        text-align: right;
      }

      .product-info {
        padding-right: 15px;
        padding-left: 0;
      }

    @else

      /* 英语/法语/西语 */
      body {
        font-family: 'Helvetica', 'Arial', sans-serif;
      }

    @endif

    /* === 布局 === */
    .header {
      text-align: center;
      margin-bottom: 30px;
      border-bottom: 2px solid #333;
      padding-bottom: 10px;
    }

    .product {
      margin-bottom: 20px;
      border-bottom: 1px solid #eee;
      padding-bottom: 15px;
      page-break-inside: avoid;
    }

    /* Flexbox 在 DomPDF 支持有限，建议用 Table 布局或者简单的 block 布局 */
    .product-img {
      width: 150px;
      float:
        {{ $locale == 'ar' ? 'right' : 'left' }}
      ;
      margin-{{ $locale == 'ar' ? 'left' : 'right' }}: 20px;
    }

    .product-info {
      overflow: hidden;
    }

    /* 清除浮动影响 */

    .title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
      color: #000;
    }

    .meta {
      color: #666;
      font-size: 12px;
      margin-bottom: 10px;
    }

    .label {
      font-weight: bold;
      color: #444;
    }

    .description {
      font-size: 13px;
      margin-top: 10px;
      clear: both;
    }

    /* 清除浮动 */
    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>

<body>
  @php
    // 在视图中定义简单的翻译字典，避免创建大量 JSON 文件
    // 也可以使用 Laravel 的 __('key')，前提是你已经建立了语言包
    $trans = [
      'en' => ['title' => 'Product Catalog', 'cat' => 'Category', 'code' => 'Code', 'mat' => 'Material'],
      'zh' => ['title' => '产品目录', 'cat' => '分类', 'code' => '编码', 'mat' => '材质'],
      'fr' => ['title' => 'Catalogue', 'cat' => 'Catégorie', 'code' => 'Code', 'mat' => 'Matériel'],
      'es' => ['title' => 'Catálogo', 'cat' => 'Categoría', 'code' => 'Código', 'mat' => 'Material'],
      'ru' => ['title' => 'Каталог', 'cat' => 'Категория', 'code' => 'Код', 'mat' => 'Материал'],
      'ar' => ['title' => 'كتالوج المنتجات', 'cat' => 'الفئة', 'code' => 'الرمز', 'mat' => 'المادة'],
    ];
    // 获取当前语言的文本，默认英语
    $t = $trans[$locale] ?? $trans['en'];
  @endphp

  <div class="header">
    <h1>{{ $t['title'] }}</h1>
    <p>{{ config('app.name') }} - {{ date('Y-m-d') }}</p>
  </div>

  @foreach($products as $product)
    <div class="product clearfix">
      @if($product->cover_image)
        <img src="{{ public_path('storage/' . $product->cover_image) }}" class="product-img">
      @endif

      <div class="product-info">
        {{-- 产品名称：会自动根据 App::getLocale() 读取对应的语言 --}}
        <div class="title">{{ $product->name }}</div>

        <div class="meta">
          <span class="label">{{ $t['code'] }}:</span> {{ $product->code ?? 'N/A' }} <br>
          <span class="label">{{ $t['cat'] }}:</span> {{ $product->category->name ?? '-' }} <br>
          @if($product->material)
            <span class="label">{{ $t['mat'] }}:</span> {{ $product->material }}
          @endif
        </div>
      </div>

      <div class="description">
        {{ strip_tags($product->description) }}
      </div>
    </div>
  @endforeach
</body>

</html>