<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Бриф {{ $form->name ?? 'на оказание услуг' }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #1A1A1A;
            line-height: 1.4;
            margin: 30px auto;
            max-width: 700px;
            padding: 0 20px;
            background: white;
            font-size: 12px;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 24px;
            font-weight: 300;
            color: #1A1A1A;
            letter-spacing: -0.5px;
            margin: 0 0 8px 0;
            text-transform: uppercase;
            text-align: center;
        }

        .divider {
            width: 80px;
            height: 1px;
            background-color: #1A1A1A;
            margin: 0 auto 30px auto;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            border-bottom: 1px solid #E8E8E8;
            padding-bottom: 8px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 500;
            color: #1A1A1A;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .data-table {
            width: 100%;
            margin-left: 38px;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 6px 0;
            vertical-align: top;
        }

        .data-table .label {
            width: 130px;
            color: #6B6B6B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 10px;
            font-weight: normal;
        }

        .data-table .value {
            color: #1A1A1A;
            font-size: 12px;
            padding-left: 15px;
        }

        .data-table .value-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .data-table .value-list li {
            margin-bottom: 3px;
        }

        .competitor-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .competitor-list li {
            margin-bottom: 5px;
            font-size: 12px;
        }

        .competitor-url {
            color: #6B6B6B;
            font-size: 10px;
            text-decoration: underline;
            margin-left: 5px;
        }

        /* Сегменты */
        .segments-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 2px;
        }

        .segment-tag {
            padding: 3px 8px;
            font-size: 10px;
            background-color: #F5F5F5;
            color: #1A1A1A;
            border: 1px solid #E8E8E8;
            display: inline-block;
        }

        /* Футер */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #E8E8E8;
            text-align: center;
        }

        .footer p {
            color: #8A8D94;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .footer .mt-1 {
            margin-top: 4px;
        }

        .break-all {
            word-break: break-all;
        }
    </style>
</head>

<body>

    <div class="logo-wrapper">
        <h1>Бриф на оказание услуг</h1>
        <div class="divider"></div>
    </div>

    <div class="section">
        <div class="section-header">
            <div class="section-title">Основная информация</div>
        </div>

        <table class="data-table">
            <tr>
                <td class="label">ФИО, компания:</td>
                <td class="value">{{ $form['name'] ?? 'Не указано' }}</td>
            </tr>
            <tr>
                <td class="label">Должность:</td>
                <td class="value">{{ $form['role'] ?? 'Не указано' }}</td>
            </tr>
            <tr>
                <td class="label">Телефон:</td>
                <td class="value">{{ $form['phone'] ?? 'Не указано' }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td class="value">{{ $form['email'] ?? 'Не указано' }}</td>
            </tr>
            <tr>
                <td class="label">Услуга:</td>
                <td class="value">{{ $form['service_type'] ?? 'Не указано' }}</td>
            </tr>
        </table>
    </div>

    @php $serviceType = $form['service_type'] ?? ''; @endphp
    @switch($serviceType)
        @case('SEO-продвижение')
            @include('pdf.partials.seo-pdf', ['data' => $form])
        @break

        @case('Зарубежное SEO')
            @include('pdf.partials.seo-foreign-pdf', ['data' => $form])
        @break

        @case('GEO-продвижение')
            @include('pdf.partials.geo-pdf', ['data' => $form])
        @break

        @case('Перформанс-маркетинг')
            @include('pdf.partials.performance-pdf', ['data' => $form])
        @break

        @case('Контекстная реклама')
            @include('pdf.partials.context-pdf', ['data' => $form])
        @break

        @case('SERM (управление репутацией)')
            @include('pdf.partials.serm-pdf', ['data' => $form])
        @break

        @case('Контент-поддержка')
            @include('pdf.partials.content-pdf', ['data' => $form])
        @break

        @case('Веб-аналитика')
            @include('pdf.partials.analytics-pdf', ['data' => $form])
        @break

        @case('Аутстафф')
            @include('pdf.partials.outstaff-pdf', ['data' => $form])
        @break

        @default
            @include('pdf.partials.default-pdf', ['data' => $form])
    @endswitch

    @if (
        !empty($form['production']) ||
            !empty($form['tasks_description']) ||
            !empty($form['specialist_level']) ||
            !empty($form['tech_stack']) ||
            !empty($form['has_tz']) ||
            !empty($form['team_integration']) ||
            !empty($form['additional_info']) ||
            (isset($form['concurents']) && count($form['concurents']) > 0 && $serviceType !== 'Аутстафф') ||
            (isset($form['segments']) && count($form['segments']) > 0) ||
            !empty($form['marketing']))
        <div class="section">
            <div class="section-header">
                <div class="section-title">Детали проекта</div>
            </div>

            <table class="data-table">
                {{-- Для маркетинговых услуг --}}
                @if (!empty($form['production']))
                    <tr>
                        <td class="label">Продукция для продвижения:</td>
                        <td class="value">{{ $form['production'] }}</td>
                    </tr>
                @endif

                {{-- Конкуренты (для всех, кроме аутстаффа) --}}
                @if (isset($form['concurents']) && count($form['concurents']) > 0 && $serviceType !== 'Аутстафф')
                    <tr>
                        <td class="label">Основные конкуренты:</td>
                        <td class="value">
                            @foreach ($form['concurents'] as $concurent)
                                <div>
                                    {{ $concurent['name'] ?? '' }}
                                    @if (isset($concurent['url']) && !empty($concurent['url']))
                                        <span class="competitor-url">({{ $concurent['url'] }})</span>
                                    @endif
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endif

                {{-- Для аутстаффа --}}
                @if (!empty($form['tasks_description']))
                    <tr>
                        <td class="label">Описание задач:</td>
                        <td class="value">{{ $form['tasks_description'] }}</td>
                    </tr>
                @endif

                @if (!empty($form['specialist_level']))
                    <tr>
                        <td class="label">Уровень специалистов:</td>
                        <td class="value">{{ $form['specialist_level'] }}</td>
                    </tr>
                @endif

                @if (!empty($form['tech_stack']))
                    <tr>
                        <td class="label">Технологический стек:</td>
                        <td class="value">{{ $form['tech_stack'] }}</td>
                    </tr>
                @endif

                @if (!empty($form['has_tz']))
                    <tr>
                        <td class="label">Наличие ТЗ:</td>
                        <td class="value">{{ $form['has_tz'] }}</td>
                    </tr>
                @endif

                @if (!empty($form['team_integration']))
                    <tr>
                        <td class="label">Интеграция с командой:</td>
                        <td class="value">{{ $form['team_integration'] }}</td>
                    </tr>
                @endif

                @if (!empty($form['additional_info']))
                    <tr>
                        <td class="label">Дополнительная информация:</td>
                        <td class="value">{{ $form['additional_info'] }}</td>
                    </tr>
                @endif

                {{-- Общие поля для всех --}}
                @if (isset($form['segments']) && count($form['segments']) > 0)
                    <tr>
                        <td class="label">Сегменты потребителей:</td>
                        <td class="value">
                            <div class="segments-wrapper">
                                @foreach ($form['segments'] as $segment)
                                    <span class="segment-tag">{{ $segment }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endif

                @if (!empty($form['marketing']))
                    <tr>
                        <td class="label">Откуда узнали о нас:</td>
                        <td class="value">{{ $form['marketing'] }}</td>
                    </tr>
                @endif
            </table>
        </div>
    @endif

    <div class="footer">
        <p>Сгенерировано {{ date('d.m.Y H:i') }}</p>
        <p class="mt-1">Rocket Business</p>
    </div>
</body>

</html>
