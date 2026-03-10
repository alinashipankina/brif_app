<?php
echo "Начинаем создавать примеры для обучения...\n\n";

$total_samples = 300;
$data = [];

$services = [
    'SEO-продвижение',
    'Зарубежное SEO',
    'GEO-продвижение',
    'Перформанс-маркетинг',
    'Контекстная реклама',
    'SERM (управление репутацией)',
    'Контент-поддержка',
    'Веб-аналитика',
    'Аутстафф'
];

$spheres = [
    'Интернет-магазин',
    'Услуги для бизнеса (B2B)',
    'Услуги для населения (B2C)',
    'Производство',
    'Образование',
    'Медицина',
    'Недвижимость',
    'Строительство',
    'Туризм и гостиницы',
    'Другое'
];

$budgets = [
    'от 30к до 50к рублей',
    'от 50к до 100к рублей',
    'от 100к до 200к рублей',
    'от 200к рублей',
    'от 40к до 100к рублей',
    'от 100к до 250к рублей',
    'от 250к до 500к рублей',
    'от 500к до 1 млн рублей',
    'от 1 млн рублей',
    'от 200к до 400к рублей',
    'от 400к рублей'
];

$sources = [
    'Поиск в Google/Yandex',
    'Рекомендация',
    'Социальные сети',
    'Контекстная или таргетированная реклама'
];

echo "Создаем $total_samples искусственных заявок...\n";

for ($i = 0; $i < $total_samples; $i++) {
    $service = $services[array_rand($services)];
    $sphere = $spheres[array_rand($spheres)];
    $budget = $budgets[array_rand($budgets)];
    $experience = rand(0,1);
    $segments_count = rand(1,3);
    $source = $sources[array_rand($sources)];
    $time = rand(60, 600);

    $day_of_week = rand(0, 6);

    $time_of_day = rand(9,18);

    $score = 0;

    if ($experience == 1) $score += 0.3;

    if (strpos($budget, '500к') !== false || strpos($budget, '1 млн') !== false) {
        $score += 0.3;
    }

    if ($time < 240) $score += 0.2;

    if ($source == 'Рекомендация') $score += 0.2;

    $score += ($segments_count - 1) * 0.1;

    $score += (rand(-10, 10) / 100);

    $converted = $score > 0.5 ? 1 : 0;

    $data[] = [
        'service_type' => $service,
        'business_sphere' => $sphere,
        'monthly_budget' => $budget,
        'has_experience' => $experience,
        'segments_count' => $segments_count,
        'marketing_source' => $source,
        'form_completion_time' => $time,
        'day_of_week' => $day_of_week,
        'time_of_day' => $time_of_day,
        'converted' => $converted
    ];

    if (($i + 1) % 50 == 0) {
        echo " ... создано " . ($i + 1) . " записей\n";
    }
}

$filename = 'ml_training_data.csv';
$fp = fopen($filename, 'w');

fputcsv($fp, [
    'service_type', 'business_sphere', 'monthly_budget', 'has_experience', 'segments_count',
    'marketing_source', 'form_completion_time', 'day_of_week', 'time_of_day', 'converted'
], ',', '"', '\\');

foreach ($data as $row) {
    fputcsv($fp, $row, ',', '"', '\\');
}

fclose($fp);

$converted_count = array_sum(array_column($data, 'converted'));
$converted_percent = round($converted_count / $total_samples * 100);

echo "\nГОТОВО! Создан файл: $filename\n\n";
echo "Статистика:\n";
echo "- Всего примеров: $total_samples\n";
echo "- Стали клиентами: $converted_count ($converted_percent%)\n";
echo "- Не стали клиентами: " . ($total_samples - $converted_count) . " (" . (100 - $converted_percent) . "%)\n";
echo "\nДанные для обучения модели готовы!\n";
