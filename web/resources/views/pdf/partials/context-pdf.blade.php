<div class="section">
    <div class="section-header">
        <div class="section-title">Детали контекстной рекламы</div>
    </div>

    <table class="data-table">
        @if (isset($data['urls']) && count($data['urls']) > 0)
            <tr>
                <td class="label">Ссылки на сайты:</td>
                <td class="value">
                    @foreach ($data['urls'] as $url)
                        <div class="break-all">{{ $url }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['business_sphere']))
            <tr>
                <td class="label">Сфера деятельности:</td>
                <td class="value">{{ $data['business_sphere'] }}</td>
            </tr>
        @endif

        @if (!empty($data['geography']))
            <tr>
                <td class="label">География продвижения:</td>
                <td class="value">{{ $data['geography'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_experience']))
            <tr>
                <td class="label">Наличие опыта:</td>
                <td class="value">{{ $data['has_experience'] }}</td>
            </tr>
        @endif

        @if (isset($data['campaign_goals']) && count($data['campaign_goals']) > 0)
            <tr>
                <td class="label">Цели рекламной кампании:</td>
                <td class="value">
                    @foreach ($data['campaign_goals'] as $campaign_goal)
                        <div class="break-all">{{ $campaign_goal }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['has_seasonality']))
            <tr>
                <td class="label">Сезонность бизнеса:</td>
                <td class="value">{{ $data['has_seasonality'] }}</td>
            </tr>
        @endif

        @if (!empty($data['monthly_budget']))
            <tr>
                <td class="label">Ежемесячный бюджет:</td>
                <td class="value">{{ $data['monthly_budget'] }}</td>
            </tr>
        @endif
    </table>
</div>
