<div class="section">
    <div class="section-header">
        <div class="section-title">Детали веб-аналитики</div>
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

        @if (isset($data['analytics_systems']) && count($data['analytics_systems']) > 0)
            <tr>
                <td class="label">Системы аналитики:</td>
                <td class="value">
                    @foreach ($data['analytics_systems'] as $analytics_system)
                        <div class="break-all">{{ $analytics_system }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['tracking_goals']))
            <tr>
                <td class="label">Цели отслеживания:</td>
                <td class="value">{{ $data['tracking_goals'] }}</td>
            </tr>
        @endif

        @if (!empty($data['ecommerce_setup']))
            <tr>
                <td class="label">Наличие e-commerce:</td>
                <td class="value">{{ $data['ecommerce_setup'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_ad_access']))
            <tr>
                <td class="label">Доступ к рекламным кабинетам:</td>
                <td class="value">{{ $data['has_ad_access'] }}</td>
            </tr>
        @endif

        @if (isset($data['desired_outcomes']) && count($data['desired_outcomes']) > 0)
            <tr>
                <td class="label">Ожидаемые результаты:</td>
                <td class="value">
                    @foreach ($data['desired_outcomes'] as $desired_outcome)
                        <div class="break-all">{{ $desired_outcome }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['has_experience']))
            <tr>
                <td class="label">Наличие опыта:</td>
                <td class="value">{{ $data['has_experience'] }}</td>
            </tr>
        @endif

        @if (!empty($data['monthly_budget']))
            <tr>
                <td class="label">Бюджет на настройку:</td>
                <td class="value">{{ $data['monthly_budget'] }}</td>
            </tr>
        @endif
    </table>
</div>
