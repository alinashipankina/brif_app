<?php

namespace App\Livewire\Brif;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class Success extends Component
{
    public $brifData;
    public function mount() {
        $this->brifData = Session::get('brif_data');

        // logger('brif_data in Success:', (array)$this->brifData);
        // dd($this->brifData);

        if (!$this->brifData) {
            session()->flash('error', 'Данные брифа не найдены');
        }
    }

    public function downloadBrif()
    {
        if (!$this->brifData) {
            session()->flash('error', 'Нет данных для скачивания');
            return redirect()->back();
        }

        $pdf = Pdf::loadView('pdf.brif', ['form' => $this->brifData]);

        $pdf->setOptions([
            'defaultFont' => 'DejaVu Sans',
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true
        ]);

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->output();
            },
            'brif-' . now()->format('Y-m-d') . '.pdf'
        );
    }

    public function goBack()
    {
        Session::flush();

        return redirect()->to('/');
    }

    public function clearSession()
    {
        Session::flush();
    }
    public function render()
    {
        return view('livewire.brif.success');
    }
}
