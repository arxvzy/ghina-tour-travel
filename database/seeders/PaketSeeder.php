<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    public function run()
    {
        /*
        =========================================
        PAKET 1 - JOGJA ONE DAY
        =========================================
        */
        $paket1 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Jogja One Day',
            'harga_paket' => 350000,
            'pax' => 50,
            'note' => 'Harga dapat berubah sewaktu-waktu',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $tempat1 = [
            'Keraton',
            'Taman Sari',
            'Parangtritis',
            'Malioboro'
        ];

        foreach ($tempat1 as $t) {
            DB::table('tempats')->insert([
                'nama_tempat' => $t,
                'id_paket' => $paket1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Transportasi
        DB::table('transportasis')->insert([
            ['fasilitas_transportasi' => 'Bus Pariwisata', 'id_paket' => $paket1],
            ['fasilitas_transportasi' => 'AC & Audio', 'id_paket' => $paket1],
            ['fasilitas_transportasi' => 'Reclining Seat', 'id_paket' => $paket1],
        ]);

        // Akomodasi
        DB::table('akomodasis')->insert([
            ['fasilitas_akomodasi' => 'Tour Leader', 'id_paket' => $paket1],
            ['fasilitas_akomodasi' => 'Tiket Masuk Wisata', 'id_paket' => $paket1],
            ['fasilitas_akomodasi' => 'Asuransi Wisata', 'id_paket' => $paket1],
            ['fasilitas_akomodasi' => 'Tol & Parkir', 'id_paket' => $paket1],
        ]);

        // Konsumsi
        DB::table('konsumsis')->insert([
            ['fasilitas_konsumsi' => 'Makan sesuai program', 'id_paket' => $paket1],
            ['fasilitas_konsumsi' => 'Snack', 'id_paket' => $paket1],
            ['fasilitas_konsumsi' => 'Air Mineral', 'id_paket' => $paket1],
        ]);

        /*
        =========================================
        PAKET 2 - JOGJA INAP
        =========================================
        */
        $paket2 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Jogja Inap',
            'harga_paket' => 700000,
            'pax' => 50,
            'note' => 'Termasuk hotel',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $tempat2 = [
            'Pantai',
            'Jeep Merapi',
            'Goa Pindul',
            'Malioboro'
        ];

        foreach ($tempat2 as $t) {
            DB::table('tempats')->insert([
                'nama_tempat' => $t,
                'id_paket' => $paket2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('akomodasis')->insert([
            ['fasilitas_akomodasi' => 'Hotel', 'id_paket' => $paket2],
            ['fasilitas_akomodasi' => 'Tour Leader', 'id_paket' => $paket2],
        ]);

        /*
        =========================================
        PAKET 3 - BALI (DEWATA)
        =========================================
        */
        $paket3 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Dewata Bali',
            'harga_paket' => 1900000,
            'pax' => 50,
            'note' => 'Hotel 2 malam',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('akomodasis')->insert([
            ['fasilitas_akomodasi' => 'Hotel 2 Malam', 'id_paket' => $paket3],
        ]);

        /*
        =========================================
        PAKET 4 - BATU MALANG
        =========================================
        */
        $paket4 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Batu Malang Inap',
            'harga_paket' => 1500000,
            'pax' => null,
            'note' => 'Hotel 1 malam',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $tempat4 = [
            'Jatim Park 1',
            'Museum Angkut',
            'De Laponte'
        ];

        foreach ($tempat4 as $t) {
            DB::table('tempats')->insert([
                'nama_tempat' => $t,
                'id_paket' => $paket4,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        /*
        =========================================
        PAKET 5 - BANDUNG ONE DAY
        =========================================
        */
        $paket5 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Bandung One Day',
            'harga_paket' => 600000,
            'pax' => null,
            'note' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $tempat5 = [
            'Farm House',
            'Floating Market',
            'Great Asia Afrika',
            'Pasar Baru'
        ];

        foreach ($tempat5 as $t) {
            DB::table('tempats')->insert([
                'nama_tempat' => $t,
                'id_paket' => $paket5,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        /*
        =========================================
        PAKET 6 - SEMARANG
        =========================================
        */
        $paket6 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Semarang Tour',
            'harga_paket' => 500000,
            'pax' => 50,
            'note' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $tempat6 = [
            'Lawang Sewu',
            'Kota Lama',
            'Sam Poo Kong',
            'Masjid Agung'
        ];

        foreach ($tempat6 as $t) {
            DB::table('tempats')->insert([
                'nama_tempat' => $t,
                'id_paket' => $paket6,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        /*
        =========================================
        PAKET 7 - DIENG
        =========================================
        */
        $paket7 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Dieng One Day',
            'harga_paket' => 425000,
            'pax' => 20,
            'note' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /*
        =========================================
        PAKET 8 - OUTBOUND
        =========================================
        */
        $paket8 = DB::table('pakets')->insertGetId([
            'nama_paket' => 'Outbound',
            'harga_paket' => 100000,
            'pax' => 100,
            'note' => 'Fun game & leadership',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
