<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale == 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <title>Product Catalog</title>
</head>

<body style="font-family: sans-serif; line-height: 1.6;">

  {{-- 中文 --}}
  @if($locale == 'zh')
    <p>尊敬的客户：</p>
    <p>附件是我们为您准备的产品目录，请查收。</p>
    <p>如果您有任何问题，请随时联系我们。</p>
    <br>
    <p>祝好，<br>{{ $settings->company_name['zh'] }}</p>

    {{-- 法语 --}}
  @elseif($locale == 'fr')
    <p>Cher client,</p>
    <p>Veuillez trouver ci-joint le catalogue de produits que vous avez demandé.</p>
    <p>N'hésitez pas à nous contacter si vous avez des questions.</p>
    <br>
    <p>Cordialement,<br>{{ $settings->company_name['fr'] }}</p>

    {{-- 西班牙语 --}}
  @elseif($locale == 'es')
    <p>Estimado cliente,</p>
    <p>Adjunto encontrará el catálogo de productos solicitado.</p>
    <p>No dude en contactarnos si tiene alguna pregunta.</p>
    <br>
    <p>Saludos cordiales,<br>{{ $settings->company_name['es'] }}</p>

    {{-- 俄语 --}}
  @elseif($locale == 'ru')
    <p>Уважаемый клиент,</p>
    <p>Пожалуйста, ознакомьтесь с приложенным каталогом продукции.</p>
    <p>Если у вас возникнут вопросы, пожалуйста, свяжитесь с нами.</p>
    <br>
    <p>С уважением,<br>{{ $settings->company_name['ru'] }}</p>

    {{-- 阿拉伯语 --}}
  @elseif($locale == 'ar')
    <div style="direction: rtl; text-align: right;">
      <p>عزيزي العميل،</p>
      <p>تجدون مرفقاً كتالوج المنتجات الذي طلبتموه.</p>
      <p>لا تترددوا في الاتصال بنا إذا كان لديكم أي أسئلة.</p>
      <br>
      <p>مع أطيب التحيات،<br>{{ $settings->company_name['ar'] }}</p>
    </div>

    {{-- 默认：英语 --}}
  @else
    <p>Dear Customer,</p>
    <p>Please find the attached product catalog as requested.</p>
    <p>Feel free to contact us if you have any questions.</p>
    <br>
    <p>Best regards,<br>{{ $settings->company_name['en'] }}</p>
  @endif

</body>

</html>