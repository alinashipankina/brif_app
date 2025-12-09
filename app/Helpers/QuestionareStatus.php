<?php

namespace App\Helpers;


class QuestionareStatus {
    public static array $questionaresLabels = [
        'NewLead' => [
            'label' => 'Новый лид',
            'badge' => 'badge-neutral',
            'color' => 'neutral',
        ],
        'Qualified' => [
            'label' => 'Квалифицирован',
            'badge' => 'badge-primary',
            'color' => 'primary',
        ],
        'SentProposal' => [
            'label' => 'Выслано КП',
            'badge' => 'badge-accent',
            'color' => 'accent',
        ],
        'Negotiations' => [
            'label' => 'Переговоры',
            'badge' => 'badge-warning',
            'color' => 'warning',
        ],
        'ClosedIntoADeal' => [
            'label' => 'Закрыт в сделку',
            'badge' => 'badge-success',
            'color' => 'success',
        ],
        'ClosedInRefusal' => [
            'label' => 'Закрыт в отказ',
            'badge' => 'badge-error',
            'color' => 'error',
        ],
    ];

    public static function getStatusGroups(): array
    {
        return [
            'in_progress' => [
                'title' => 'В работе',
                'statuses' => ['Qualified', 'SentProposal'],
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
                'statuses' => ['ClosedIntoADeal', 'ClosedInRefusal'],
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
            'urls' => [
                'title' => 'Ссылки для продвижения',
                'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
                'icon_color' => 'blue',
                'is_link' => true,
            ],
            'usluga' => [
                'title' => 'Услуги',
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
            'summa' => [
                'title' => 'Бюджет на SEO',
                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'icon_color' => 'emerald',
                'is_link' => false,
            ],
            'concurents' => [
                'title' => 'Основные конкуренты',
                'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                'icon_color' => 'indigo',
                'is_link' => false,
            ],
            'marketing' => [
                'title' => 'Откуда узнали',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],
            'production' => [
                'title' => 'Продукция для продвижения',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'icon_color' => 'gray',
                'is_link' => false,
            ],
            'segments' => [
                'title' => 'Сегмент потребителей',
                'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                'icon_color' => 'orange',
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

        // Маппинг цветов Tailwind
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
