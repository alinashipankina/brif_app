<div class="section">
    <div class="section-header">
        <div class="section-title">Детали управления репутацией</div>
    </div>

    <table class="data-table">
        @if (!empty($data['company_name']))
            <tr>
                <td class="label">Название компании/бренда:</td>
                <td class="value">{{ $data['company_name'] }}</td>
            </tr>
        @endif

        @if (isset($data['urls']) && count($data['urls']) > 0)
            <tr>
                <td class="label">Сайты:</td>
                <td class="value">
                    @foreach ($data['urls'] as $url)
                        <div class="break-all">{{ $url }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (isset($data['social_links']) && count($data['social_links']) > 0)
            <tr>
                <td class="label">Соцсети:</td>
                <td class="value">
                    @foreach ($data['social_links'] as $social_link)
                        <div class="break-all">{{ $social_link }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (isset($data['problems']) && count($data['problems']) > 0)
            <tr>
                <td class="label">Проблемы:</td>
                <td class="value">
                    @foreach ($data['problems'] as $problem)
                        <div class="break-all">{{ $problem }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['review_platforms']))
            <tr>
                <td class="label">Имеются отзывы:</td>
                <td class="value">{{ $data['review_platforms'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_positive_reviews']))
            <tr>
                <td class="label">Наличие готовых отзывов:</td>
                <td class="value">{{ $data['has_positive_reviews'] }}</td>
            </tr>
        @endif

        @if (!empty($data['priority_platforms']))
            <tr>
                <td class="label">Приоритетные платформы:</td>
                <td class="value">{{ $data['priority_platforms'] }}</td>
            </tr>
        @endif

        @if (!empty($data['monthly_budget']))
            <tr>
                <td class="label">Бюджет:</td>
                <td class="value">{{ $data['monthly_budget'] }}</td>
            </tr>
        @endif
    </table>
</div>
