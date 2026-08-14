<?php

namespace Database\Seeders;

use App\Models\GardenChemical;
use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Fungisida
            [
                'name' => 'Dithane M-45',
                'type' => 'fungisida',
                'unit' => 'kg',
                'notes' => 'Untuk mengendalikan penyakit bercak daun dan busuk buah.',
            ],
            [
                'name' => 'Antracol 70 WP',
                'type' => 'fungisida',
                'unit' => 'kg',
                'notes' => 'Efektif untuk penyakit embun tepung pada daun apel.',
            ],
            [
                'name' => 'Score 250 EC',
                'type' => 'fungisida',
                'unit' => 'liter',
                'notes' => null,
            ],

            // Insektisida
            [
                'name' => 'Curacron 500 EC',
                'type' => 'insektisida',
                'unit' => 'liter',
                'notes' => 'Mengendalikan hama ulat dan kutu daun.',
            ],
            [
                'name' => 'Decis 25 EC',
                'type' => 'insektisida',
                'unit' => 'liter',
                'notes' => null,
            ],
            [
                'name' => 'Confidor 5 WP',
                'type' => 'insektisida',
                'unit' => 'kg',
                'notes' => 'Untuk hama penghisap seperti kutu kebul dan trips.',
            ],

            // Herbisida
            [
                'name' => 'Round Up 486 SL',
                'type' => 'herbisida',
                'unit' => 'liter',
                'notes' => 'Pengendalian gulma di sekitar area tanam.',
            ],
            [
                'name' => 'Gramoxone',
                'type' => 'herbisida',
                'unit' => 'liter',
                'notes' => null,
            ],

            // Pupuk cair
            [
                'name' => 'Gandasil D',
                'type' => 'pupuk_cair',
                'unit' => 'kg',
                'notes' => 'Pupuk daun untuk fase pertumbuhan vegetatif.',
            ],
            [
                'name' => 'Gandasil B',
                'type' => 'pupuk_cair',
                'unit' => 'kg',
                'notes' => 'Pupuk daun untuk fase pembungaan dan pembuahan.',
            ],
            [
                'name' => 'Growmore 32-10-10',
                'type' => 'pupuk_cair',
                'unit' => 'kg',
                'notes' => null,
            ],

            // Lainnya
            [
                'name' => 'Perekat Perata Agristick',
                'type' => 'lainnya',
                'unit' => 'ml',
                'notes' => 'Bahan tambahan agar larutan semprot menempel lebih baik di daun.',
            ],
        ];

        foreach ($data as $item) {
            GardenChemical::create($item);
        }
    }
}