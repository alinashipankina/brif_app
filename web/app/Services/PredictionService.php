<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PredictionService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('ML_API_URL', 'http://localhost:5000');
    }

    public function predict(array $leadData)
    {
        try {
            $data = $this->prepareData($leadData);

            $response = Http::timeout(5)->post($this->apiUrl . '/predict', $data);

            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('ML API error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return null;

        } catch (\Exception $e) {
            Log::error('ML API connection failed', [
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    protected function prepareData(array $leadData)
    {
        $budget = $leadData['monthly_budget'] ?? $leadData['project_budget'] ?? '';

        $hasExperience = 0;
        if (isset($leadData['has_experience'])) {
            $hasExperience = ($leadData['has_experience'] == 'Да' || $leadData['has_experience'] == '1') ? 1 : 0;
        }

        $segmentsCount = 0;
        if (isset($leadData['segments']) && is_array($leadData['segments'])) {
            $segmentsCount = count($leadData['segments']);
        }

        $marketingSource = $leadData['marketing'] ?? 'Поиск в Google/Yandex';

        return [
            'service_type' => $leadData['service_type'] ?? 'SEO-продвижение',
            'business_sphere' => $leadData['business_sphere'] ?? 'Другое',
            'monthly_budget' => $budget,
            'has_experience' => $hasExperience,
            'segments_count' => $segmentsCount,
            'marketing_source' => $marketingSource,
            'form_completion_time' => $leadData['form_completion_time'] ?? 300,
            'day_of_week' => $leadData['day_of_week'] ?? (int)now()->dayOfWeek,
            'time_of_day' => $leadData['time_of_day'] ?? (int)now()->hour,
        ];
    }

    public function healthCheck()
    {
        try {
            $response = Http::timeout(3)->get($this->apiUrl . '/health');
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }
}
