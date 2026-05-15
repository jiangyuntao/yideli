@extends('index.layout')

@section('title')
  {{ [
      'en' => 'Submission Successful',
      'zh' => '提交成功',
      'fr' => 'Envoi reussi',
      'es' => 'Envio exitoso',
      'ru' => 'Отправка успешна',
      'ar' => 'تم الارسال بنجاح',
  ][$lang] ?? 'Submission Successful' }}
@endsection

@section('head')
  @if (filled($settings->google_event_code ?? null))
    {!! $settings->google_event_code !!}
  @endif
@endsection

@section('main')
  @php
    $messages = [
        'headline' => [
            'en' => 'Submission Successful',
            'zh' => '提交成功',
            'fr' => 'Envoi reussi',
            'es' => 'Envio exitoso',
            'ru' => 'Заявка успешно отправлена',
            'ar' => 'تم ارسال الطلب بنجاح',
        ],
        'body' => [
            'en' => 'Your inquiry has been submitted successfully. Our team will contact you as soon as possible.',
            'zh' => '您的寻单信息已提交成功，工作人员会尽快与您联系。',
            'fr' => 'Votre demande a ete envoyee avec succes. Notre equipe vous contactera des que possible.',
            'es' => 'Su consulta se envio correctamente. Nuestro equipo se pondra en contacto con usted lo antes posible.',
            'ru' => 'Ваш запрос успешно отправлен. Наши сотрудники свяжутся с вами как можно скорее.',
            'ar' => 'تم ارسال استفسارك بنجاح. سيتواصل معك فريق العمل في اقرب وقت ممكن.',
        ],
        'return_now' => [
            'en' => 'Return Now',
            'zh' => '立即返回',
            'fr' => 'Retourner maintenant',
            'es' => 'Volver ahora',
            'ru' => 'Вернуться сейчас',
            'ar' => 'العودة الان',
        ],
        'countdown_prefix' => [
            'en' => 'Returning in',
            'zh' => '将在',
            'fr' => 'Retour dans',
            'es' => 'Regresando en',
            'ru' => 'Возврат через',
            'ar' => 'ستتم العودة خلال',
        ],
        'countdown_suffix' => [
            'en' => 'seconds',
            'zh' => '秒后返回',
            'fr' => 'secondes',
            'es' => 'segundos',
            'ru' => 'сек.',
            'ar' => 'ثوان',
        ],
    ];
  @endphp

  <section class="min-h-[calc(100vh-10rem)] bg-[radial-gradient(circle_at_top,#f7fbf4_0%,#edf5ea_45%,#e4efe6_100%)] px-6 py-16 lg:px-12"
           x-data="{
               seconds: {{ (int) $autoRedirectSeconds }},
               returnTo: @js($returnTo),
               start() {
                   const timer = setInterval(() => {
                       if (this.seconds <= 1) {
                           clearInterval(timer);
                           window.location.href = this.returnTo;
                           return;
                       }

                       this.seconds -= 1;
                   }, 1000);
               }
           }"
           x-init="start()">
    <div class="mx-auto flex min-h-[60vh] max-w-[760px] items-center justify-center">
      <div class="w-full rounded-sm border border-yideli-line bg-white/90 p-8 text-center shadow-[0_24px_80px_rgba(0,107,95,0.12)] backdrop-blur sm:p-12">
        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-yideli-dark text-white">
          <svg class="h-8 w-8"
               viewBox="0 0 24 24"
               fill="none"
               stroke="currentColor"
               stroke-width="2.5"
               stroke-linecap="round"
               stroke-linejoin="round"
               aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
        </div>

        <h1 class="text-3xl font-serif text-yideli-dark sm:text-4xl">
          {{ $messages['headline'][$lang] ?? $messages['headline']['en'] }}
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-gray-600 sm:text-lg">
          {{ $messages['body'][$lang] ?? $messages['body']['en'] }}
        </p>

        <div class="mt-8 flex flex-col items-center gap-4">
          <a class="inline-flex min-w-40 items-center justify-center bg-yideli-dark px-6 py-3 text-sm font-bold uppercase tracking-[0.18em] text-white transition hover:bg-yideli-hover"
             href="{{ $returnTo }}">
            {{ $messages['return_now'][$lang] ?? $messages['return_now']['en'] }}
          </a>

          <p class="text-sm text-gray-500">
            <span>{{ $messages['countdown_prefix'][$lang] ?? $messages['countdown_prefix']['en'] }}</span>
            <span class="mx-1 font-semibold text-yideli-dark"
                  x-text="seconds"></span>
            <span>{{ $messages['countdown_suffix'][$lang] ?? $messages['countdown_suffix']['en'] }}</span>
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
