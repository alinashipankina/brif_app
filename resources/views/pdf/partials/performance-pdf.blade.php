<div class="section">
    <div class="section-header">
        <div class="section-title">Детали перформанс-маркетинга</div>
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

        @if (!empty($data['geography']))
            <tr>
                <td class="label">География:</td>
                <td class="value">{{ $data['geography'] }}</td>
            </tr>
        @endif

        @if (isset($data['channels']) && count($data['channels']) > 0)
            <tr>
                <td class="label">Каналы продвижения:</td>
                <td class="value">
                    @foreach ($data['channels'] as $channel)
                        <div class="break-all">{{ $channel }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['has_experience']))
            <tr>
                <td class="label">Был опыт:</td>
                <td class="value">{{ $data['has_experience'] }}</td>
            </tr>
        @endif

        @if (isset($data['priorities']) && count($data['priorities']) > 0)
            <tr>
                <td class="label">Важные составляющие:</td>
                <td class="value">
                    @foreach ($data['priorities'] as $prioritet)
                        <div class="break-all">{{ $prioritet }}</div>
                    @endforeach
                </td>
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
