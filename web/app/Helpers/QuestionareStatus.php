<?php

namespace App\Helpers;


class QuestionareStatus {
    public static array $questionaresLabels = [
        'NewLead' => [
            'label' => 'Новая заявка',
            'badge' => 'badge-neutral',
            'color' => '#00BAFE'
        ],
        'Qualified' => [
            'label' => 'Квалификация',
            'badge' => 'badge-primary',
            'color' => '#422AD5',
        ],
        'SentProposal' => [
            'label' => 'Подготовка КП',
            'badge' => 'badge-secondary',
            'color' => '#F43098',
        ],
        'ProposalPresented' => [
            'label' => 'Презентация КП',
            'badge' => 'badge-warning',
            'color' => '#FCB700',
        ],
        'Negotiations' => [
            'label' => 'Переговоры',
            'badge' => 'badge-warning',
            'color' => '#FCB700',
        ],
        'ContractSigning' => [
            'label' => 'Подписание договора',
            'badge' => 'badge-accent',
            'color' => '#00D3BB',
        ],
        'ClosedIntoADeal' => [
            'label' => 'Закрыта в сделку',
            'badge' => 'badge-success',
            'color' => '#00D390',
        ],
        'ClosedInRefusal' => [
            'label' => 'Закрыта в отказ',
            'badge' => 'badge-error',
            'color' => '#FF627D',
        ],
        'TransferredToPartner' => [
            'label' => 'Передана партнеру',
            'badge' => 'badge-neutral',
            'color' => '#09090B',
        ],
    ];

    public static function getStatusGroups(): array
    {
        return [
            'in_progress' => [
                'title' => 'В работе',
                'statuses' => ['Qualified', 'SentProposal', 'ProposalPresented', 'Negotiations', 'ContractSigning'],
                'icon_color' => 'secondary',
                'badge' => 'badge-secondary',
            ],
            'waiting' => [
                'title' => 'Ожидание',
                'statuses' => ['Negotiations'],
                'icon_color' => 'warning',
                'badge' => 'badge-warning',
            ],
            'completed' => [
                'title' => 'Завершено',
                'statuses' => ['ClosedIntoADeal', 'ClosedInRefusal', 'TransferredToPartner'],
                'icon_color' => 'success',
                'badge' => 'badge-success',
            ],
            'new' => [
                'title' => 'Новые',
                'statuses' => ['NewLead'],
                'icon_color' => 'primary',
                'badge' => 'badge-primary',
            ],
        ];
    }

    // Получить счетчик для группы
    public static function getGroupCount(string $groupKey): int
    {
        $groups = self::getStatusGroups();

        if (!isset($groups[$groupKey])) {
            return 0;
        }

        return \App\Models\Questionare::whereIn('status', $groups[$groupKey]['statuses'])->count();
    }

    public static function getFieldConfigs() {
        return [
            // SEO
            'urls' => [
                'title' => 'Ссылки на сайты',
                'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
                'icon_color' => 'blue',
                'is_link' => true,
            ],
            'business_sphere' => [
                'title' => 'Сфера деятельности',
                'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'icon_color' => 'purple',
                'is_link' => false,
            ],
            'year' => [
                'title' => 'Опыт на рынке',
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'icon_color' => 'amber',
                'is_link' => false,
            ],
            'geography' => [
                'title' => 'География продвижения',
                'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                'icon_color' => 'red',
                'is_link' => false,
            ],
            'monthly_budget' => [
                'title' => 'Ежемесячный бюджет',
                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'emerald',
                'is_link' => false,
            ],
            'has_experience' => [
                'title' => 'Наличие опыта',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'green',
                'is_link' => false,
            ],

            // Веб-аналитика
            'analytics_systems' => [
                'title' => 'Системы аналитики',
                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'tracking_goals' => [
                'title' => 'Цели отслеживания',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'green',
                'is_link' => false,
            ],
            'ecommerce_setup' => [
                'title' => 'Наличие e-commerce',
                'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                'icon_color' => 'orange',
                'is_link' => false,
            ],
            'has_ad_access' => [
                'title' => 'Доступ к рекламным кабинетам',
                'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],
            'desired_outcomes' => [
                'title' => 'Ожидаемые результаты',
                'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                'icon_color' => 'purple',
                'is_link' => false,
            ],

            // Контент-поддержка
            'content_types' => [
                'title' => 'Типы контента',
                'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
                'icon_color' => 'teal',
                'is_link' => false,
            ],
            'content_volume' => [
                'title' => 'Объем контента',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'has_content_plan' => [
                'title' => 'Наличие контент-плана',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'green',
                'is_link' => false,
            ],
            'needs_publishing' => [
                'title' => 'Необходимость публикации',
                'icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
                'icon_color' => 'orange',
                'is_link' => false,
            ],

            // Контекстная реклама
            'campaign_goals' => [
                'title' => 'Цели рекламной кампании',
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'icon_color' => 'red',
                'is_link' => false,
            ],
            'has_seasonality' => [
                'title' => 'Сезонность бизнеса',
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'icon_color' => 'amber',
                'is_link' => false,
            ],

            // GEO-продвижение
            'client_questions' => [
                'title' => 'Частые вопросы клиентов',
                'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'has_expert_content' => [
                'title' => 'Наличие экспертного контента',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'purple',
                'is_link' => false,
            ],
            'needs_geo_content' => [
                'title' => 'Необходимость GEO-контента',
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],

            // Аутстафф
            'specialists' => [
                'title' => 'Необходимые специалисты',
                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'icon_color' => 'purple',
                'is_link' => false,
            ],
            'specialist_count' => [
                'title' => 'Количество специалистов',
                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],
            'work_period' => [
                'title' => 'Срок сотрудничества',
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'icon_color' => 'amber',
                'is_link' => false,
            ],
            'work_format' => [
                'title' => 'Формат работы',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],
            'project_budget' => [
                'title' => 'Бюджет проекта',
                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'emerald',
                'is_link' => false,
            ],
            'tasks_description' => [
                'title' => 'Описание задач',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'specialist_level' => [
                'title' => 'Уровень специалистов',
                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'icon_color' => 'purple',
                'is_link' => false,
            ],
            'tech_stack' => [
                'title' => 'Технологический стек',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'icon_color' => 'green',
                'is_link' => false,
            ],
            'has_tz' => [
                'title' => 'Наличие ТЗ',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'amber',
                'is_link' => false,
            ],
            'team_integration' => [
                'title' => 'Интеграция с командой',
                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],
            'additional_info' => [
                'title' => 'Дополнительная информация',
                'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],

            // Перформанс-маркетинг
            'channels' => [
                'title' => 'Каналы продвижения',
                'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
                'icon_color' => 'pink',
                'is_link' => false,
            ],
            'priorities' => [
                'title' => 'Приоритетные направления',
                'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                'icon_color' => 'yellow',
                'is_link' => false,
            ],

            // Зарубежное SEO
            'countries' => [
                'title' => 'Страны для продвижения',
                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'languages' => [
                'title' => 'Языки продвижения сайта',
                'icon' => 'M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 3C11.783 10.77 8.07 15.61 3 18.129',
                'icon_color' => 'green',
                'is_link' => false,
            ],
            'has_localized' => [
                'title' => 'Наличие локализации',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'teal',
                'is_link' => false,
            ],

            // SERM
            'company_name' => [
                'title' => 'Название компании/бренда',
                'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                'icon_color' => 'blue',
                'is_link' => false,
            ],
            'social_links' => [
                'title' => 'Социальные сети',
                'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                'icon_color' => 'purple',
                'is_link' => true,
            ],
            'problems' => [
                'title' => 'Существующие проблемы',
                'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z',
                'icon_color' => 'red',
                'is_link' => false,
            ],
            'review_platforms' => [
                'title' => 'Платформы с отзывами',
                'icon' => 'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z',
                'icon_color' => 'teal',
                'is_link' => true,
            ],
            'has_positive_reviews' => [
                'title' => 'Наличие положительных отзывов',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'green',
                'is_link' => false,
            ],
            'priority_platforms' => [
                'title' => 'Приоритетные платформы',
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'icon_color' => 'yellow',
                'is_link' => false,
            ],

            // Шаг 3
            'production' => [
                'title' => 'Продукция для продвижения',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],
            'concurents' => [
                'title' => 'Основные конкуренты',
                'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],
            'segments' => [
                'title' => 'Сегменты потребителей',
                'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                'icon_color' => 'orange',
                'is_link' => false,
            ],
            'marketing' => [
                'title' => 'Откуда узнали',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],
        ];
    }

    public static function getTitle(string $fieldName): string
    {
        $configs = self::getFieldConfigs();
        return $configs[$fieldName]['title'] ?? ucfirst(str_replace('_', ' ', $fieldName));
    }

    public static function getIcon(string $fieldName): string
    {
        $configs = self::getFieldConfigs();
        return $configs[$fieldName]['icon'] ?? 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z';
    }

    public static function getIconColor(string $fieldName): string
    {
        $configs = self::getFieldConfigs();
        $color = $configs[$fieldName]['icon_color'] ?? 'gray';

        $colorMap = [
            'blue' => 'text-blue-500',
            'purple' => 'text-purple-500',
            'amber' => 'text-amber-500',
            'red' => 'text-red-500',
            'emerald' => 'text-emerald-500',
            'indigo' => 'text-indigo-500',
            'gray' => 'text-gray-500',
            'orange' => 'text-orange-500',
            'green' => 'text-green-500',
            'teal' => 'text-teal-500',
            'cyan' => 'text-cyan-500',
            'pink' => 'text-pink-500',
            'rose' => 'text-rose-500',
        ];

        return $colorMap[$color] ?? 'text-gray-400';
    }

    public static function isLink(string $fieldName): bool
    {
        $configs = self::getFieldConfigs();
        return $configs[$fieldName]['is_link'] ?? false;
    }
}
