<?php

namespace App\Exports;

use App\Models\Modele;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ModelsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping, WithEvents
{
    public $index = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Modele::with('manufacturer:id,name')->get();
    }

    public function map($row): array
    {
        $this->index ++;
        return [
            $this->index,
            $row->name,
            $row->manufacturer->name ?? '',
        ];
    }

    public function headings(): array
    {
        return ['#', 'Name', 'Manufacturer'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'italic' => true, 'size' => 11],
                'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '666666'],
                    ],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->getStyle('A1:D1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 5, 'color' => ['rgb' => 'cccccc'],]);
                $sheet->getDelegate()->getRowDimension(1)->setRowHeight(40);
            },
        ];
    }
}
