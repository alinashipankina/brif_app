<div class="section">
    <div class="section-header">
        <div class="section-title">Детали аутстаффа</div>
    </div>

    <table class="data-table">
        @if (isset($data['specialists']) && count($data['specialists']) > 0)
            <tr>
                <td class="label">Специалисты:</td>
                <td class="value">
                    @foreach ($data['specialists'] as $specialist)
                        <div class="break-all">{{ $specialist }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['specialist_count']))
            <tr>
                <td class="label">Количество:</td>
                <td class="value">{{ $data['specialist_count'] }}</td>
            </tr>
        @endif

        @if (!empty($data['work_period']))
            <tr>
                <td class="label">Срок сотрудничества:</td>
                <td class="value">{{ $data['work_period'] }}</td>
            </tr>
        @endif

        @if (!empty($data['work_format']))
            <tr>
                <td class="label">Формат работы:</td>
                <td class="value">{{ $data['work_format'] }}</td>
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
