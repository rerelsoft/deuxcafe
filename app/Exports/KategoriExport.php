<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class KategoriExport implements FromCollection, withHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kategori::all();
    }

    public function headings():array{
        return[
            'No',
            'Kategori',
            'Created At',
            'Updated At'
        ];
    }

    public function registerEvents(): array
    {
        return [

            // BeforeExport::class  => function(BeforeExport $event) {
            //     $event->writer->setCreator('Rerel');
            // },
            AfterSheet::class    => function(AfterSheet $event) {
            $event->sheet->getColumnDimension('A')->setAutoSize(true);
            $event->sheet->getColumnDimension('B')->setAutoSize(true);
            $event->sheet->getColumnDimension('C')->setAutoSize(true);
            $event->sheet->getColumnDimension('D')->setAutoSize(true);
            // $event->sheet->getColumnDimension('E')->setAutoSize(true);
            // $event->sheet->getColumnDimension('F')->setAutoSize(true);
            // $event->sheet->getColumnDimension('G')->setAutoSize(true);

            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:D1');
            $event->sheet->setCellValue('A1', 'Data Kategori');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $event->sheet->getStyle('A3:D'.$event->sheet->getHighestRow())->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000']
                    ]
                ]
            
                 ]);
            },
        ];
    }
}
