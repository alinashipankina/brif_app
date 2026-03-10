<div class="section">
    <div class="section-header">
        <div class="section-title">Детали GEO-продвижения</div>
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

        @if (!empty($data['client_questions']))
            <tr>
                <td class="label">Частые вопросы клиентов:</td>
                <td class="value">{{ $data['client_questions'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_expert_content']))
            <tr>
                <td class="label">Наличие экспертного контента:</td>
                <td class="value">{{ $data['has_expert_content'] }}</td>
            </tr>
        @endif

        @if (!empty($data['needs_geo_content']))
            <tr>
                <td class="label">Необходимость в специальном контенте:</td>
                <td class="value">{{ $data['needs_geo_content'] }}</td>
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
