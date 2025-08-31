<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Peta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Seed peta data
        // Peta::create([
        //     'judul' => 'Kantor Desa Sungai Kayu Ara',
        //     'deskripsi' => 'Pusat pemerintahan desa yang melayani administrasi warga dan berbagai layanan publik',
        //     'alamat' => 'Jl. Raya Sungai Kayu Ara, Desa Sungai Kayu Ara, Kecamatan Sungai Apit, Kabupaten Siak',
        //     'koordinat_lat' => '1.1735',
        //     'koordinat_lng' => '102.1939',
        //     'zoom_level' => '15',
        //     'informasi_tambahan' => 'Jam operasional: Senin-Jumat 08:00-16:00 WIB',
        //     'aktif' => true,
        // ]);

        // Peta::create([
        //     'judul' => 'Ekowisata Mangrove Tanjung Kuras',
        //     'deskripsi' => 'Objek wisata alam berupa hutan mangrove yang terletak di Desa Tanjung Kuras dengan pemandangan alam yang indah',
        //     'alamat' => 'Desa Tanjung Kuras, Kecamatan Sungai Apit, Kabupaten Siak',
        //     'koordinat_lat' => '1.230415',
        //     'koordinat_lng' => '102.178030',
        //     'zoom_level' => '14',
        //     'informasi_tambahan' => 'Tiket masuk: Rp 10.000/orang, Jam buka: 08:00-17:00 WIB',
        //     'aktif' => true,
        // ]);

        // Peta::create([
        //     'judul' => 'Mangrove Sungai Bersejarah Permai',
        //     'deskripsi' => 'Ekowisata Mangrove Sungai Bersejarah (MSB) atau Wisata Edukasi Mangrove yang terletak di Kampung Kayu Ara Permai',
        //     'alamat' => 'Kampung Kayu Ara Permai, Desa Sungai Kayu Ara, Kecamatan Sungai Apit, Kabupaten Siak',
        //     'koordinat_lat' => '1.116041',
        //     'koordinat_lng' => '102.189869',
        //     'zoom_level' => '14',
        //     'informasi_tambahan' => 'Wisata edukasi mangrove dengan berbagai aktivitas seperti susur sungai dan pengamatan burung',
        //     'aktif' => true,
        // ]);

        // Peta::create([
        //     'judul' => 'Masjid Al-Ikhlas',
        //     'deskripsi' => 'Masjid utama desa yang menjadi pusat kegiatan keagamaan dan sosial masyarakat',
        //     'alamat' => 'Jl. Raya Sungai Kayu Ara, Desa Sungai Kayu Ara, Kecamatan Sungai Apit, Kabupaten Siak',
        //     'koordinat_lat' => '1.1750',
        //     'koordinat_lng' => '102.1945',
        //     'zoom_level' => '16',
        //     'informasi_tambahan' => 'Kapasitas: 500 jamaah, Fasilitas: Tempat wudhu, Parkir luas',
        //     'aktif' => true,
        // ]);

        // Peta::create([
        //     'judul' => 'SDN 001 Sungai Kayu Ara',
        //     'deskripsi' => 'Sekolah Dasar Negeri yang menjadi pusat pendidikan dasar bagi anak-anak desa',
        //     'alamat' => 'Jl. Pendidikan No. 1, Desa Sungai Kayu Ara, Kecamatan Sungai Apit, Kabupaten Siak',
        //     'koordinat_lat' => '1.1720',
        //     'koordinat_lng' => '102.1920',
        //     'zoom_level' => '16',
        //     'informasi_tambahan' => 'Jam belajar: 07:00-12:00 WIB, Jumlah siswa: 150 orang',
        //     'aktif' => true,
        // ]);

        // Call DummyDataSeeder
        $this->call([
            DummyDataSeeder::class,
        ]);
    }
}
