# Mingle v1.0.2 created by Nate Nasution 

Mingle adalah aplikasi media sosial sederhana yang memungkinkan pengguna untuk berbagi posting, menyukai posting orang lain, dan berinteraksi dalam bentuk komentar.
Proyek ini masih terus dikembangkan,

## Fitur Utama
- Beranda untuk melihat posting terbaru dari pengguna lain
- Kemampuan untuk membuat posting baru dengan teks dan gambar
- Sistem like untuk menyukai posting orang lain
- Fitur komentar untuk berinteraksi dengan posting

## Fitur Baru
- Edit & Delete post

## PR Yang Akan Datang
- (Fixed) Urutan postingan harusnya yang terbaru paling atas, orderBy('created_at', 'desc').
- (Fixed) Tombol share sudah mencatat ke database, namun belum ditampilkan ke profil yang membagikan
- (Fixed) Nama di beranda belum clickable ke profil masing-masing
- Setiap posting komentar / memberi like / share, masih reload, menyebabkan tampilan kembali ke atas. Repot kalau lagi kasih komentar saat scroll dibawah menyebbakan ngulang scroll lagi kebawah :D 
- Melihat detil postingan dalam 1 halaman / zoom foto
- Chat satu arah
- Dark mode

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

## Dukungan / Donasi

Halo semua! 👋

Terima kasih telah mengunjungi repositori saya. Senang jika proyek ini bisa bermanfaat untuk Anda. Jika Anda merasa proyek ini membantu, Anda dapat mendukung saya melalui donasi.

Setiap donasi yang Anda berikan akan berarti, sebagai bentuk dukungan untuk terus mengembangkan proyek ini serta membuat lebih banyak lagi proyek open source yang bermanfaat.

<a href="https://saweria.co/bhottu" target="_blank">
    <img src="https://github.com/bhottu/nate-social-media/assets/35356275/b0a6053d-4033-467f-8578-e99abed81710" alt="Saweria" width="200" />
</a>

Terima kasih banyak atas dukungan dan apresiasinya! 🙏
