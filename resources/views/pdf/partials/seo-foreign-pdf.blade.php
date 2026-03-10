<div class="section">
    <div class="section-header">
        <div class="section-title">Детали зарубежного SEO</div>
    </div>

    <table class="data-table">
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

        @if (!empty($data['business_sphere']))
            <tr>
                <td class="label">Сфера деятельности:</td>
                <td class="value">{{ $data['business_sphere'] }}</td>
            </tr>
        @endif

        @if (!empty($data['year']))
            <tr>
                <td class="label">Опыт на рынке:</td>
                <td class="value">{{ $data['year'] }}</td>
            </tr>
        @endif

        @if (!empty($data['countries']))
            <tr>
                <td class="label">Страны:</td>
                <td class="value">{{ $data['countries'] }}</td>
            </tr>
        @endif

        @if (!empty($data['languages']))
            <tr>
                <td class="label">Языки:</td>
                <td class="value">{{ $data['languages'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_localized']))
            <tr>
                <td class="label">Локализация:</td>
                <td class="value">{{ $data['has_localized'] }}</td>
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
