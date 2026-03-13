<div class="section">
    <div class="section-header">
        <div class="section-title">Детали аутстаффа</div>
    </div>

    <table class="data-table">
        @if (isset($data['specialists']) && count($data['specialists']) > 0)
            <tr>
                <td class="label">Необходимые специалисты:</td>
                <td class="value">
                    @foreach ($data['specialists'] as $specialist)
                        <div class="break-all">{{ $specialist }}</div>
                    @endforeach
                </td>
            </tr>
        @endif

        @if (!empty($data['specialist_count']))
            <tr>
                <td class="label">Количество специалистов:</td>
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

        @if (!empty($data['has_experience']))
            <tr>
                <td class="label">Наличие опыта:</td>
                <td class="value">{{ $data['has_experience'] }}</td>
            </tr>
        @endif

        @if (!empty($data['project_budget']))
            <tr>
                <td class="label">Бюджет проекта:</td>
                <td class="value">{{ $data['project_budget'] }}</td>
            </tr>
        @endif
    </table>
</div>
