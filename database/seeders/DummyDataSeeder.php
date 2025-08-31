<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Seeder untuk Kategori Berita
        $this->seedKategoriBerita($faker);

        // Seeder untuk Kategori Produk
        $this->seedKategoriProduk($faker);

        // Seeder untuk Kategori Galeri
        $this->seedKategoriGaleri($faker);

        // Seeder untuk Berita
        // $this->seedBerita($faker);

        // // Seeder untuk Produk Desa
        // $this->seedProdukDesa($faker);

        // // Seeder untuk Wisata Alam
        // $this->seedWisataAlam($faker);

        // // Seeder untuk Galeri
        // $this->seedGaleri($faker);

        // // Seeder untuk Banner
        // $this->seedBanner($faker);

        // // Seeder untuk Statistik
        // $this->seedStatistik($faker);

        // // Seeder untuk Administrasi Penduduk
        // $this->seedAdministrasiPenduduk($faker);

        // // Seeder untuk Struktur Organisasi
        // $this->seedStrukturOrganisasi($faker);

        // // Seeder untuk Sambutan Kepala Desa (harus setelah struktur organisasi)
        // $this->seedSambutanKepalaDesa($faker);

        // // Seeder untuk Profil Desa
        // $this->seedProfilDesa($faker);

        // // Seeder untuk Peta
        // $this->seedPeta($faker);

        // // Seeder untuk Chart Statistik
        // $this->seedChartStatistik($faker);

        // // Seeder untuk Data Chart
        // $this->seedDataChart($faker);
    }

    private function seedKategoriBerita($faker)
    {
        $kategoris = [
            ['nama' => 'Berita Desa', 'slug' => 'berita-desa', 'warna' => '#10B981', 'icon' => 'fas fa-newspaper'],
            ['nama' => 'Pengumuman', 'slug' => 'pengumuman', 'warna' => '#3B82F6', 'icon' => 'fas fa-bullhorn'],
            ['nama' => 'Kegiatan', 'slug' => 'kegiatan', 'warna' => '#F59E0B', 'icon' => 'fas fa-calendar'],
            ['nama' => 'Pembangunan', 'slug' => 'pembangunan', 'warna' => '#EF4444', 'icon' => 'fas fa-hammer'],
            ['nama' => 'Pemerintahan', 'slug' => 'pemerintahan', 'warna' => '#8B5CF6', 'icon' => 'fas fa-landmark'],
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategori_berita')->insert([
                'nama' => $kategori['nama'],
                'slug' => $kategori['slug'],
                'warna' => $kategori['warna'],
                'icon' => $kategori['icon'],
                'urutan' => rand(1, 10),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedKategoriProduk($faker)
    {
        $kategoris = [
            ['nama' => 'Makanan', 'slug' => 'makanan', 'warna' => '#10B981', 'icon' => 'fas fa-utensils'],
            ['nama' => 'Minuman', 'slug' => 'minuman', 'warna' => '#3B82F6', 'icon' => 'fas fa-coffee'],
            ['nama' => 'Kerajinan', 'slug' => 'kerajinan', 'warna' => '#F59E0B', 'icon' => 'fas fa-palette'],
            ['nama' => 'Pertanian', 'slug' => 'pertanian', 'warna' => '#22C55E', 'icon' => 'fas fa-seedling'],
            ['nama' => 'Peternakan', 'slug' => 'peternakan', 'warna' => '#8B5CF6', 'icon' => 'fas fa-cow'],
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategori_produk')->insert([
                'nama' => $kategori['nama'],
                'slug' => $kategori['slug'],
                'warna' => $kategori['warna'],
                'icon' => $kategori['icon'],
                'urutan' => rand(1, 10),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedKategoriGaleri($faker)
    {
        $kategoris = [
            ['nama' => 'Kegiatan Desa', 'slug' => 'kegiatan-desa', 'warna' => '#10B981', 'icon' => 'fas fa-images'],
            ['nama' => 'Pembangunan', 'slug' => 'pembangunan', 'warna' => '#3B82F6', 'icon' => 'fas fa-hammer'],
            ['nama' => 'Wisata', 'slug' => 'wisata', 'warna' => '#F59E0B', 'icon' => 'fas fa-mountain'],
            ['nama' => 'Pertanian', 'slug' => 'pertanian', 'warna' => '#22C55E', 'icon' => 'fas fa-seedling'],
            ['nama' => 'Budaya', 'slug' => 'budaya', 'warna' => '#8B5CF6', 'icon' => 'fas fa-theater-masks'],
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategori_galeri')->insert([
                'nama' => $kategori['nama'],
                'slug' => $kategori['slug'],
                'warna' => $kategori['warna'],
                'icon' => $kategori['icon'],
                'urutan' => rand(1, 10),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedBerita($faker)
    {
        $kategoriIds = DB::table('kategori_berita')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $judul = $faker->sentence(6);
            $slug = Str::slug($judul);

            DB::table('berita')->insert([
                'judul' => $judul,
                'slug' => $slug . '-' . $i,
                'ringkasan' => $faker->paragraph(2),
                'konten' => $faker->paragraphs(5, true),
                'gambar' => 'assets/img/default-image.jpg',
                'kategori_id' => $faker->randomElement($kategoriIds),
                'featured' => $faker->boolean(20),
                'aktif' => true,
                'tanggal_publikasi' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedProdukDesa($faker)
    {
        $kategoriIds = DB::table('kategori_produk')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $nama = $faker->words(3, true);
            $slug = Str::slug($nama);

            DB::table('produk_desa')->insert([
                'nama' => $nama,
                'slug' => $slug . '-' . $i,
                'deskripsi' => $faker->paragraph(3),
                'gambar' => 'assets/img/default-image.jpg',
                'kategori_id' => $faker->randomElement($kategoriIds),
                'harga' => $faker->numberBetween(10000, 500000),
                'satuan' => $faker->randomElement(['kg', 'pcs', 'pack', 'liter', 'buah']),
                'harga_diskon' => $faker->optional(0.3)->numberBetween(5000, 200000),
                'persentase_diskon' => $faker->optional(0.3)->numberBetween(10, 50),
                'nomor_wa' => '08' . $faker->numerify('##########'),
                'pesan_wa' => 'Saya tertarik dengan produk ' . $nama,
                'rating' => $faker->randomFloat(1, 3.0, 5.0),
                'terjual' => $faker->numberBetween(0, 100),
                'featured' => $faker->boolean(20),
                'best_seller' => $faker->boolean(15),
                'aktif' => true,
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedWisataAlam($faker)
    {
        $kategoris = ['Air Terjun', 'Gunung', 'Sungai', 'Danau', 'Hutan', 'Pantai', 'Bukit', 'Goa'];

        for ($i = 1; $i <= 50; $i++) {
            $nama = $faker->randomElement($kategoris) . ' ' . $faker->city;
            $slug = Str::slug($nama);

            DB::table('wisata_alam')->insert([
                'nama' => $nama,
                'slug' => $slug . '-' . $i,
                'deskripsi' => $faker->paragraphs(3, true),
                'gambar' => 'assets/img/default-image.jpg',
                'kategori' => $faker->randomElement($kategoris),
                'lokasi' => $faker->address,
                'fasilitas' => $faker->paragraph(2),
                'cara_menuju' => $faker->paragraph(2),
                'jam_operasional' => $faker->randomElement(['08:00-17:00', '06:00-18:00', '24 Jam']),
                'harga_tiket' => $faker->optional(0.7)->numberBetween(5000, 50000),
                'kontak' => $faker->optional(0.5)->phoneNumber,
                'featured' => $faker->boolean(20),
                'aktif' => true,
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedGaleri($faker)
    {
        $kategoriIds = DB::table('kategori_galeri')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $judul = $faker->sentence(4);

            DB::table('galeri')->insert([
                'judul' => $judul,
                'slug' => Str::slug($judul) . '-' . $i,
                'deskripsi' => $faker->paragraph(2),
                'gambar' => 'assets/img/default-image.jpg',
                'kategori_id' => $faker->randomElement($kategoriIds),
                'featured' => $faker->boolean(20),
                'aktif' => true,
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedBanner($faker)
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('banners')->insert([
                'judul' => $faker->sentence(4),
                'deskripsi' => $faker->paragraph(2),
                'gambar' => 'assets/img/default-image.jpg',
                'tombol_teks' => $faker->optional(0.7)->randomElement(['Selengkapnya', 'Lihat Detail', 'Kunjungi']),
                'tombol_link' => $faker->optional(0.7)->url,
                'aktif' => true,
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedStatistik($faker)
    {
        $kategoris = ['Penduduk', 'Ekonomi', 'Pendidikan', 'Kesehatan', 'Infrastruktur'];
        $icons = ['fas fa-users', 'fas fa-chart-line', 'fas fa-graduation-cap', 'fas fa-heartbeat', 'fas fa-road'];

        for ($i = 1; $i <= 50; $i++) {
            DB::table('statistik')->insert([
                'kategori' => $faker->randomElement($kategoris),
                'sub_kategori' => $faker->optional(0.5)->word,
                'judul' => $faker->sentence(3),
                'nilai' => $faker->numberBetween(100, 10000),
                'satuan' => $faker->randomElement(['orang', 'unit', 'persen', 'km', 'buah']),
                'deskripsi' => $faker->optional(0.7)->sentence,
                'warna' => $faker->randomElement(['green', 'blue', 'yellow', 'red', 'purple']),
                'icon' => $faker->randomElement($icons),
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedAdministrasiPenduduk($faker)
    {
        $jenis = ['total_penduduk', 'kepala_keluarga', 'penduduk_sementara', 'laki_laki', 'perempuan', 'mutasi_penduduk'];
        $deskripsi = [
            'total_penduduk' => 'Jumlah penduduk terdaftar di Desa Sungai Kayu Ara',
            'kepala_keluarga' => 'Jumlah kepala keluarga terdaftar',
            'penduduk_sementara' => 'Penduduk yang belum memiliki KTP',
            'laki_laki' => 'Jumlah penduduk laki-laki',
            'perempuan' => 'Jumlah penduduk perempuan',
            'mutasi_penduduk' => 'Data mutasi penduduk tahun 2024'
        ];
        $satuan = [
            'total_penduduk' => 'Jiwa',
            'kepala_keluarga' => 'KK',
            'penduduk_sementara' => 'Jiwa',
            'laki_laki' => 'Jiwa',
            'perempuan' => 'Jiwa',
            'mutasi_penduduk' => 'Tahun 2024'
        ];

        for ($i = 1; $i <= 6; $i++) {
            $jenisData = $jenis[$i - 1];
            DB::table('administrasi_penduduk')->insert([
                'jenis' => $jenisData,
                'nilai' => $faker->numberBetween(100, 5000),
                'satuan' => $satuan[$jenisData],
                'deskripsi' => $deskripsi[$jenisData],
                'warna_icon' => $faker->randomElement(['#10B981', '#3B82F6', '#F59E0B', '#EF4444', '#8B5CF6']),
                'icon' => 'fas fa-users',
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedStrukturOrganisasi($faker)
    {
        $jabatan = ['Kepala Desa', 'Sekretaris Desa', 'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kasi Pelayanan'];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('struktur_organisasi')->insert([
                'nama' => $faker->name,
                'jabatan' => $faker->randomElement($jabatan),
                'periode' => '2024-2029',
                'foto' => 'assets/img/default-image.jpg',
                'deskripsi_tugas' => $faker->paragraph(2),
                'warna_badge' => $faker->randomElement(['green', 'blue', 'yellow', 'red', 'purple']),
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedSambutanKepalaDesa($faker)
    {
        // Ambil ID struktur organisasi untuk kepala desa
        $kepalaDesaId = DB::table('struktur_organisasi')
            ->where('jabatan', 'Kepala Desa')
            ->first()->id ?? 1;

        DB::table('sambutan_kepala_desa')->insert([
            'struktur_organisasi_id' => $kepalaDesaId,
            'sambutan' => $faker->paragraphs(4, true),
            'quote' => $faker->optional(0.7)->sentence,
            'konten_lengkap' => $faker->paragraphs(6, true),
            'aktif' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedProfilDesa($faker)
    {
        $jenis = ['sejarah', 'visi_misi', 'geografis', 'demografis', 'potensi'];

        for ($i = 1; $i <= 5; $i++) {
            DB::table('profil_desa')->insert([
                'jenis' => $jenis[$i - 1],
                'judul' => ucfirst(str_replace('_', ' ', $jenis[$i - 1])) . ' Desa Sungai Kayu Ara',
                'konten' => $faker->paragraphs(5, true),
                'gambar' => 'assets/img/default-image.jpg',
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedPeta($faker)
    {
        DB::table('peta')->insert([
            'judul' => 'Peta Desa Sungai Kayu Ara',
            'deskripsi' => $faker->paragraph(2),
            'alamat' => 'Desa Sungai Kayu Ara, Kecamatan Sungai Apit, Kabupaten Siak, Riau',
            'koordinat_lat' => '-0.7893',
            'koordinat_lng' => '101.3433',
            'zoom_level' => '15',
            'gambar' => 'assets/img/default-image.jpg',
            'informasi_tambahan' => $faker->optional(0.7)->paragraph,
            'aktif' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedChartStatistik($faker)
    {
        $kategoris = ['Penduduk', 'Ekonomi', 'Pendidikan', 'Kesehatan'];

        for ($i = 1; $i <= 10; $i++) {
            $nama = $faker->randomElement($kategoris) . ' ' . $faker->word;
            $slug = Str::slug($nama);

            DB::table('chart_statistik')->insert([
                'nama' => $nama,
                'slug' => $slug . '-' . $i,
                'deskripsi' => $faker->paragraph(2),
                'tipe_chart' => $faker->randomElement(['bar', 'line', 'pie', 'doughnut']),
                'warna_primary' => $faker->randomElement(['#10B981', '#3B82F6', '#F59E0B', '#EF4444']),
                'warna_secondary' => $faker->randomElement(['#059669', '#2563EB', '#D97706', '#DC2626']),
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function seedDataChart($faker)
    {
        $chartIds = DB::table('chart_statistik')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('data_chart')->insert([
                'chart_id' => $faker->randomElement($chartIds),
                'label' => $faker->word,
                'nilai' => $faker->numberBetween(10, 1000),
                'warna' => $faker->randomElement(['#10B981', '#3B82F6', '#F59E0B', '#EF4444', '#8B5CF6']),
                'deskripsi' => $faker->optional(0.7)->sentence,
                'urutan' => $i,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
