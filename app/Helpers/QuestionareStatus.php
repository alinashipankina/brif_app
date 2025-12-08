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
}
