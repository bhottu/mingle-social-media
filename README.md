# Nate Social Media

Nate Social Media adalah aplikasi media sosial sederhana yang memungkinkan pengguna untuk berbagi posting, menyukai posting orang lain, dan berinteraksi dalam bentuk komentar.

## Fitur Utama
- Beranda untuk melihat posting terbaru dari pengguna lain
- Kemampuan untuk membuat posting baru dengan teks dan gambar
- Sistem like untuk menyukai posting orang lain
- Fitur komentar untuk berinteraksi dengan posting

## PR Yang Akan Datang
- Urutan postingan harusnya yang terbaru paling atas, orderBy('created_at', 'desc').
- Tombol share sudah mencatat ke database, namun belum ditampilkan ke profil yang membagikan
- Nama di beranda belum clickable ke profil masing-masing
- Setiap posting komentar / memberi like / share, masih reload, menyebabkan tampilan kembali ke atas. Repot kalau lagi kasih komentar saat scroll dibawah menyebbakan ngulang scroll lagi kebawah :D 

## Instalasi
1. Clone repository ini ke komputer lokal Anda.
2. Buka terminal dan arahkan ke direktori proyek.
3. Jalankan `composer install` untuk menginstal dependencies.
4. Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database.
5. Jalankan `php artisan key:generate` untuk menghasilkan kunci aplikasi.
6. Jalankan `php artisan migrate` untuk menjalankan migrasi database.
7. Jalankan `php artisan serve` untuk memulai server lokal.

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan buka *Issues* untuk melihat daftar tugas yang perlu dikerjakan. Anda juga dapat mengirimkan *Pull Request* dengan perubahan yang diusulkan.

## Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT. Lihat file `LICENSE` untuk detail lebih lanjut.
