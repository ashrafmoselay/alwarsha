<?php

namespace App\Exports;

use App\Models\Modele;
use App\Models\Sparepart;
use App\Models\SparepartShop;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SparepartsShopExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping, WithEvents
{
    public $index = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SparepartShop::with(['shop','sparepart','sparepart.model','sparepart.model.manufacturer'])
                               ->get();
    }

    public function map($row): array
    {
        $this->index ++;
        $sparepart = optional($row->sparepart);
        $model = optional(optional($row->sparepart)->model);
        return [
            $this->index,
            $row->shope_id,
            optional($row->shope)->name,
            $row->sparepart_id,
            $sparepart->title,
            $model->manufacturer?->name,
            $model->name ?? '',
            $sparepart->code,
            $sparepart->tax,
            $sparepart->description,
            $row->cost,
            $row->price,
            $row->lowest_price,
            $row->quantity,
            $row->location,
            $row->notify_limit,
            $row->starting_stock,
        ];
    }

    public function headings(): array
    {
        return ['#', 'ShopID', 'ShopName' ,'SparepartID', 'SparepartName', 'Manufacturer', 'Model','Code', 'Tax','Description','Cost', 'Price', 'Lowest Price', 'Quantity', 'Location', 'Notify Limit', 'Starting Stock'];
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
                $sheet->getStyle('A1:Q1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 5, 'color' => ['rgb' => 'cccccc'],]);
                $sheet->getDelegate()->getRowDimension(1)->setRowHeight(40);
            },
        ];
    }
}
