# Proyek Manajemen Tugas - EduPlanner

EduPlanner adalah aplikasi berbasis Laravel untuk manajemen tugas kuliah. Proyek ini mencakup fitur untuk membuat, mengedit, menghapus, dan menampilkan tugas beserta status dan tenggat waktu.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

- PHP >= 8.x
- Composer
- Node.js dan NPM
- MySQL atau SQLite (tergantung pada konfigurasi Anda)

## Langkah-langkah Menjalankan Proyek

### 1. **Clone Repositori**

Clone repositori ini ke komputer Anda:

git clone https://github.com/username/repository-name.git
cd repository-name
2. Instalasi Dependensi
2.1 Instalasi PHP (Composer)
Untuk menginstal dependensi PHP (Laravel dan lainnya), jalankan perintah berikut di direktori proyek Anda:


composer install
Perintah ini akan menginstal semua dependensi yang diperlukan untuk menjalankan aplikasi Laravel.

2.2 Instalasi NPM
Untuk menginstal dependensi JavaScript (termasuk Bootstrap, Vue, atau dependensi front-end lainnya), jalankan:


npm install

3. Konfigurasi File .env
Salin file .env.example menjadi file .env:


cp .env.example .env
Kemudian, buka file .env dan sesuaikan pengaturan koneksi database serta pengaturan lainnya sesuai kebutuhan Anda.

Contoh konfigurasi database untuk SQLite:


DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
Contoh konfigurasi database untuk MySQL:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=nama_pengguna
DB_PASSWORD=password_anda

4. Generate Key Aplikasi
Laravel membutuhkan key aplikasi yang unik. Anda dapat membuatnya dengan menjalankan perintah berikut:
php artisan key:generate

5. Menjalankan Migrasi dan Seeder
Jika Anda ingin mengisi database dengan data dummy, jalankan migrasi dan seeder untuk tabel tasks:
php artisan migrate --seed
Perintah ini akan menjalankan migrasi untuk membuat tabel di database dan seeder untuk mengisi tabel tasks dengan 100 data dummy.

6. Menjalankan Server Laravel
Setelah semua dependensi terinstal dan konfigurasi selesai, Anda dapat menjalankan server Laravel menggunakan perintah:
php artisan serve
Server Laravel akan dijalankan di http://127.0.0.1:8000 atau alamat lain yang ditunjukkan di terminal.

7. Menjalankan Front-End (Optional)
Jika Anda melakukan perubahan pada front-end dan perlu mengompilasi aset seperti CSS dan JavaScript, jalankan perintah berikut untuk membangun file aset menggunakan NPM:
npm run dev


8. Akses Aplikasi
Setelah server berjalan, buka aplikasi di browser Anda di alamat http://127.0.0.1:8000. Anda dapat mulai menggunakan aplikasi manajemen tugas ini.

Fitur yang Tersedia
CRUD Tugas: Buat, baca, perbarui, dan hapus tugas.
Filter dan Pencarian: Cari tugas berdasarkan nama atau tenggat waktu.
Pengelompokan Tugas: Tugas dapat dikelompokkan berdasarkan status selesai atau belum selesai.
Notifikasi Deadline: Tugas akan diberi tahu jika mendekati tenggat waktu.
Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, harap lakukan fork repositori ini, buat cabang (branch) baru, dan kirim pull request Anda.

Lisensi
Proyek ini menggunakan lisensi MIT.

markdown
Salin kode

### Penjelasan:

- **Langkah 1: Clone Repositori**: Menyediakan instruksi untuk meng-clone repositori dan masuk ke direktori proyek.
- **Langkah 2: Instalasi Dependensi**:
  - **Composer**: Menyediakan perintah `composer install` untuk menginstal dependensi PHP.
  - **NPM**: Menyediakan perintah `npm install` untuk menginstal dependensi JavaScript.
- **Langkah 3: Konfigurasi File `.env`**: Menginstruksikan pengguna untuk menyalin file `.env.example` menjadi `.env` dan mengonfigurasi pengaturan database sesuai kebutuhan.
- **Langkah 4: Generate Key Aplikasi**: Menyediakan perintah untuk menghasilkan key aplikasi yang diperlukan oleh Laravel.
- **Langkah 5: Migrasi dan Seeder**: Memberikan instruksi untuk menjalankan migrasi dan mengisi database dengan data dummy menggunakan `php artisan migrate --seed`.
- **Langkah 6: Menjalankan Server Laravel**: Memberikan perintah untuk menjalankan server dengan `php artisan serve`.
- **Langkah 7: Menjalankan Front-End**: Menyediakan perintah untuk membangun aset front-end menggunakan `npm run dev` atau `npm run prod`.
- **Langkah 8: Akses Aplikasi**: Memberikan informasi tentang cara mengakses aplikasi setelah server dijalankan.

Dengan mengikuti langkah-langkah ini, Anda dapat menjalankan aplikasi Laravel EduPlanner di lingkungan lokal Anda dengan mudah.










#   E d u p l a n n e r  
 