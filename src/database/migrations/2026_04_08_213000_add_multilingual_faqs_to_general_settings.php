<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    private array $seedFaqs = [
        [
            'question' => [
                'en' => 'What is your minimum order quantity (MOQ)?',
                'zh' => '你们的最小起订量（MOQ）是多少？',
                'fr' => 'Quelle est votre quantite minimale de commande (MOQ) ?',
                'es' => 'Cual es su cantidad minima de pedido (MOQ)?',
                'ru' => 'Какой у вас минимальный объем заказа (MOQ)?',
                'ar' => 'ما هو الحد الادنى لكمية الطلب (MOQ)؟',
            ],
            'answer' => [
                'en' => 'MOQ depends on notebook size, cover material, and process. Standard OEM orders usually start from 500 to 1000 pieces.',
                'zh' => 'MOQ 取决于笔记本尺寸、封面材质和工艺。常规 OEM 订单通常从 500 到 1000 本起。',
                'fr' => 'Le MOQ depend du format, du materiau de couverture et du procede. Les commandes OEM standard commencent generalement entre 500 et 1000 pieces.',
                'es' => 'El MOQ depende del tamano, material de portada y proceso. Los pedidos OEM estandar suelen comenzar entre 500 y 1000 unidades.',
                'ru' => 'MOQ зависит от формата блокнота, материала обложки и технологии. Стандартные OEM-заказы обычно начинаются от 500 до 1000 штук.',
                'ar' => 'يعتمد الحد الادنى للطلب على المقاس ومادة الغلاف وعملية التصنيع. عادة تبدا طلبات OEM القياسية من 500 إلى 1000 قطعة.',
            ],
        ],
        [
            'question' => [
                'en' => 'How fast can you provide samples?',
                'zh' => '你们最快多久可以提供样品？',
                'fr' => 'En combien de temps pouvez-vous fournir des echantillons ?',
                'es' => 'Que tan rapido pueden proporcionar muestras?',
                'ru' => 'Как быстро вы можете предоставить образцы?',
                'ar' => 'ما مدى سرعة تقديم العينات؟',
            ],
            'answer' => [
                'en' => 'For most custom notebook projects, we can provide samples within 7 days after confirming specifications and artwork.',
                'zh' => '对于大多数定制笔记本项目，在确认规格和设计稿后，我们可在 7 天内提供样品。',
                'fr' => 'Pour la plupart des projets de carnets personnalises, nous pouvons fournir des echantillons sous 7 jours apres confirmation des specifications et du visuel.',
                'es' => 'Para la mayoria de proyectos de cuadernos personalizados, podemos entregar muestras en 7 dias despues de confirmar especificaciones y arte.',
                'ru' => 'Для большинства кастомных проектов мы предоставляем образцы в течение 7 дней после подтверждения спецификаций и макета.',
                'ar' => 'بالنسبة لمعظم مشاريع الدفاتر المخصصة، يمكننا تقديم العينات خلال 7 ايام بعد تاكيد المواصفات والتصميم.',
            ],
        ],
        [
            'question' => [
                'en' => 'Do you support REACH and FSC compliance?',
                'zh' => '你们是否支持 REACH 和 FSC 合规？',
                'fr' => 'Prenez-vous en charge la conformite REACH et FSC ?',
                'es' => 'Soportan cumplimiento REACH y FSC?',
                'ru' => 'Поддерживаете ли вы соответствие REACH и FSC?',
                'ar' => 'هل تدعمون التوافق مع REACH وFSC؟',
            ],
            'answer' => [
                'en' => 'Yes. We can arrange production with REACH-compliant materials and FSC-certified paper based on your market requirements.',
                'zh' => '是的。我们可根据目标市场要求，安排使用符合 REACH 标准的材料及 FSC 认证纸张进行生产。',
                'fr' => 'Oui. Nous pouvons organiser la production avec des materiaux conformes REACH et du papier certifie FSC selon vos exigences de marche.',
                'es' => 'Si. Podemos organizar produccion con materiales conformes a REACH y papel certificado FSC segun los requisitos de su mercado.',
                'ru' => 'Да. Мы можем организовать производство с материалами, соответствующими REACH, и бумагой с сертификацией FSC по требованиям вашего рынка.',
                'ar' => 'نعم. يمكننا ترتيب الانتاج بمواد متوافقة مع REACH وورق معتمد من FSC وفق متطلبات سوقكم.',
            ],
        ],
        [
            'question' => [
                'en' => 'What custom options are available for OEM/ODM notebooks?',
                'zh' => 'OEM/ODM 笔记本可定制哪些选项？',
                'fr' => 'Quelles options de personnalisation sont disponibles pour les carnets OEM/ODM ?',
                'es' => 'Que opciones de personalizacion estan disponibles para cuadernos OEM/ODM?',
                'ru' => 'Какие варианты кастомизации доступны для OEM/ODM блокнотов?',
                'ar' => 'ما خيارات التخصيص المتاحة لدفاتر OEM/ODM؟',
            ],
            'answer' => [
                'en' => 'You can customize size, cover materials, binding, inner pages, printing effects, packaging, and private labeling.',
                'zh' => '可定制尺寸、封面材质、装订方式、内页、印刷工艺、包装及私有品牌标识。',
                'fr' => 'Vous pouvez personnaliser le format, les materiaux de couverture, la reliure, les pages interieures, les effets d impression, l emballage et le marquage prive.',
                'es' => 'Puede personalizar tamano, materiales de portada, encuadernacion, paginas interiores, efectos de impresion, empaque y marca privada.',
                'ru' => 'Можно настроить формат, материалы обложки, переплет, внутренние страницы, печатные эффекты, упаковку и private label.',
                'ar' => 'يمكن تخصيص المقاس ومواد الغلاف والتجليد والصفحات الداخلية وتاثيرات الطباعة والتغليف والهوية الخاصة.',
            ],
        ],
    ];

    public function up(): void
    {
        if (!$this->migrator->exists('general.faqs')) {
            $this->migrator->add('general.faqs', $this->seedFaqs);

            return;
        }

        $this->migrator->update('general.faqs', function ($payload) {
            $existing = is_array($payload) ? $payload : [];
            $existingQuestions = [];

            foreach ($existing as $item) {
                $normalized = $this->normalizeEnglishQuestion($item);
                if ($normalized !== '') {
                    $existingQuestions[$normalized] = true;
                }
            }

            foreach ($this->seedFaqs as $faq) {
                $question = strtolower(trim((string) ($faq['question']['en'] ?? '')));
                if ($question === '' || isset($existingQuestions[$question])) {
                    continue;
                }

                $existing[] = $faq;
                $existingQuestions[$question] = true;
            }

            return array_values($existing);
        });
    }

    public function down(): void
    {
        if (!$this->migrator->exists('general.faqs')) {
            return;
        }

        $seedQuestions = $this->seedQuestionIndex();

        $this->migrator->update('general.faqs', function ($payload) use ($seedQuestions) {
            $existing = is_array($payload) ? $payload : [];

            $filtered = array_filter($existing, function ($item) use ($seedQuestions) {
                $normalized = $this->normalizeEnglishQuestion($item);

                return $normalized === '' || !isset($seedQuestions[$normalized]);
            });

            return array_values($filtered);
        });
    }

    private function seedQuestionIndex(): array
    {
        $index = [];

        foreach ($this->seedFaqs as $faq) {
            $question = strtolower(trim((string) ($faq['question']['en'] ?? '')));
            if ($question !== '') {
                $index[$question] = true;
            }
        }

        return $index;
    }

    private function normalizeEnglishQuestion($item): string
    {
        if (!is_array($item)) {
            return '';
        }

        $question = $item['question'] ?? null;

        if (is_array($question)) {
            return strtolower(trim((string) ($question['en'] ?? '')));
        }

        if (is_string($question)) {
            return strtolower(trim($question));
        }

        return '';
    }
};
