<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait ErrorHandler
{
   /**
    * Handle validation with custom error messages
    */
   protected function validateWithCustomMessages($request, $rules, $messages = [])
   {
      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
         throw new ValidationException($validator);
      }

      return $validator->validated();
   }

   /**
    * Handle file upload with validation
    */
   protected function handleFileUpload($file, $uploadPath, $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif', 'webp'], $maxSize = 2048)
   {
      try {
         // Cek ukuran file
         if ($file->getSize() > $maxSize * 1024) { // Convert KB to bytes
            throw new \Exception("Ukuran file terlalu besar. Maksimal " . ($maxSize / 1024) . "MB.");
         }

         // Cek ekstensi file
         $fileExtension = strtolower($file->getClientOriginalExtension());
         if (!in_array($fileExtension, $allowedExtensions)) {
            throw new \Exception("Format file tidak didukung. Gunakan: " . implode(', ', $allowedExtensions));
         }

         // Cek apakah direktori ada, jika tidak buat
         if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
         }

         $fileName = time() . '_' . Str::random(10) . '.' . $fileExtension;
         $file->move($uploadPath, $fileName);

         return $fileName;
      } catch (\Exception $e) {
         Log::error('File upload error: ' . $e->getMessage());
         throw $e;
      }
   }

   /**
    * Handle file deletion
    */
   protected function handleFileDeletion($filePath)
   {
      try {
         if ($filePath && file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
            return true;
         }
         return false;
      } catch (\Exception $e) {
         Log::warning('Gagal menghapus file: ' . $e->getMessage());
         return false;
      }
   }

   /**
    * Get common validation messages
    */
   protected function getCommonValidationMessages()
   {
      return [
         'required' => ':attribute wajib diisi',
         'string' => ':attribute harus berupa teks',
         'numeric' => ':attribute harus berupa angka',
         'integer' => ':attribute harus berupa angka bulat',
         'min' => ':attribute minimal :min',
         'max' => ':attribute maksimal :max karakter',
         'unique' => ':attribute sudah digunakan',
         'exists' => ':attribute tidak valid',
         'image' => 'File yang diupload harus berupa gambar',
         'mimes' => 'Format file harus: :values',
         'boolean' => ':attribute harus berupa true/false',
         'email' => ':attribute harus berupa email yang valid',
         'url' => ':attribute harus berupa URL yang valid',
         'date' => ':attribute harus berupa tanggal yang valid',
         'date_format' => ':attribute harus sesuai format: :format',
         'confirmed' => 'Konfirmasi :attribute tidak cocok',
         'different' => ':attribute dan :other harus berbeda',
         'digits' => ':attribute harus :digits digit',
         'digits_between' => ':attribute harus antara :min dan :max digit',
         'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid',
         'distinct' => ':attribute memiliki nilai duplikat',
         'file' => ':attribute harus berupa file',
         'filled' => ':attribute wajib diisi',
         'gt' => ':attribute harus lebih besar dari :value',
         'gte' => ':attribute harus lebih besar atau sama dengan :value',
         'lt' => ':attribute harus kurang dari :value',
         'lte' => ':attribute harus kurang atau sama dengan :value',
         'not_in' => ':attribute tidak valid',
         'present' => ':attribute wajib ada',
         'regex' => 'Format :attribute tidak valid',
         'required_if' => ':attribute wajib diisi jika :other adalah :value',
         'required_unless' => ':attribute wajib diisi kecuali :other adalah :values',
         'required_with' => ':attribute wajib diisi jika :values ada',
         'required_with_all' => ':attribute wajib diisi jika :values ada',
         'required_without' => ':attribute wajib diisi jika :values tidak ada',
         'required_without_all' => ':attribute wajib diisi jika tidak ada :values',
         'same' => ':attribute dan :other harus sama',
         'size' => ':attribute harus :size',
         'timezone' => ':attribute harus berupa zona waktu yang valid',
      ];
   }

   /**
    * Get common attribute names
    */
   protected function getCommonAttributeNames()
   {
      return [
         'nama' => 'Nama',
         'judul' => 'Judul',
         'deskripsi' => 'Deskripsi',
         'gambar' => 'Gambar',
         'foto' => 'Foto',
         'file' => 'File',
         'kategori_id' => 'Kategori',
         'harga' => 'Harga',
         'satuan' => 'Satuan',
         'slug' => 'Slug',
         'konten' => 'Konten',
         'alamat' => 'Alamat',
         'telepon' => 'Telepon',
         'email' => 'Email',
         'website' => 'Website',
         'urutan' => 'Urutan',
         'aktif' => 'Status aktif',
         'featured' => 'Status featured',
         'best_seller' => 'Status best seller',
         'rating' => 'Rating',
         'terjual' => 'Jumlah terjual',
         'likes' => 'Jumlah likes',
         'views' => 'Jumlah views',
         'nomor_wa' => 'Nomor WhatsApp',
         'pesan_wa' => 'Pesan WhatsApp',
         'harga_diskon' => 'Harga diskon',
         'persentase_diskon' => 'Persentase diskon',
         'periode' => 'Periode',
         'jabatan' => 'Jabatan',
         'jenis' => 'Jenis',
         'nilai' => 'Nilai',
         'label' => 'Label',
         'koordinat' => 'Koordinat',
         'latitude' => 'Latitude',
         'longitude' => 'Longitude',
         'zoom' => 'Zoom level',
         'password' => 'Password',
         'password_confirmation' => 'Konfirmasi password',
         'current_password' => 'Password saat ini',
         'new_password' => 'Password baru',
         'new_password_confirmation' => 'Konfirmasi password baru',
      ];
   }

   /**
    * Handle common exceptions
    */
   protected function handleException(\Exception $e, $context = '')
   {
      Log::error($context . ': ' . $e->getMessage(), [
         'file' => $e->getFile(),
         'line' => $e->getLine(),
         'trace' => $e->getTraceAsString()
      ]);

      if ($e instanceof ValidationException) {
         return redirect()->back()
            ->withErrors($e->validator)
            ->withInput()
            ->with('error', 'Mohon perbaiki kesalahan berikut:');
      }

      return redirect()->back()
         ->withInput()
         ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
   }
}
