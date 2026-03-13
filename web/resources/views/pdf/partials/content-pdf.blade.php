<div class="section">
    <div class="section-header">
        <div class="section-title">Детали контент-поддержки</div>
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

        @if (isset($data['content_types']) && count($data['content_types']) > 0)
            <tr>
                <td class="label">Типы контента:</td>
                <td class="value">
                    @foreach ($data['content_types'] as $content_type)
                        <div class="break-all">{{ $content_type }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['content_volume']))
            <tr>
                <td class="label">Объем контента:</td>
                <td class="value">{{ $data['content_volume'] }}</td>
            </tr>
        @endif

        @if (!empty($data['has_content_plan']))
            <tr>
                <td class="label">Наличие контент-плана:</td>
                <td class="value">{{ $data['has_content_plan'] }}</td>
            </tr>
        @endif

        @if (!empty($data['needs_publishing']))
            <tr>
                <td class="label">Необходимость публикации:</td>
                <td class="value">{{ $data['needs_publishing'] }}</td>
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
                <td class="label">Ежемесячный бюджет:</td>
                <td class="value">{{ $data['monthly_budget'] }}</td>
            </tr>
        @endif
    </table>
</div>
