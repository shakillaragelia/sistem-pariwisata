<img width="2422" height="4520" alt="127 0 0 1_8000_detail-wisata_jam-gadang" src="https://github.com/user-attachments/assets/8e8ffdd4-3d45-4659-9851-8e4a1b1a031f" /><img width="2435" height="4082" alt="127 0 0 1_8000_wisata" src="https://github.com/user-attachments/assets/be4013d6-e7cf-4e7b-bd8a-3a2ba0f8564b" /><img width="2434" height="4023" alt="127 0 0 1_8000_ (1)" src="https://github.com/user-attachments/assets/a5c55291-061a-48e1-97dc-bb450f5f5d41" /><img width="2430" height="3923" alt="127 0 0 1_8000_detail-hotel_grand-rocky-hotel" src="https://github.com/user-attachments/assets/36f0c292-33a9-4739-8801-a501fc4f40c9" /><img width="2430" height="3923" alt="127 0 0 1_8000_detail-hotel_grand-rocky-hotel" src="https://github.com/user-attachments/assets/a7c03dbf-717b-48b6-9c35-0e137cecb37a" /><img width="2438" height="1662" alt="mailtrap io_inboxes_4486980_messages_5407521113" src="https://github.com/user-attachments/assets/f6bd35ba-09e7-4569-8d08-fe33ebeedc44" /><img width="2426" height="1657" alt="localhost_8000_admin_wisatas" src="https://github.com/user-attachments/assets/7e76d365-0203-4af7-ad6c-e71456d05e05" /><img width="2440" height="1669" alt="localhost_8000_admin" src="https://github.com/user-attachments/assets/7edf2841-285b-4527-8439-1e4a9d7fe105" /><p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Sistem Informasi Pariwisata Kota Bukittinggi

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)
![Filament](https://img.shields.io/badge/Filament-3.x-FDAE4B?style=for-the-badge)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)

Sistem informasi pariwisata berbasis web untuk Dinas Pariwisata Kota Bukittinggi, Sumatera Barat. Dibangun menggunakan Laravel 12 dan Filament v3 sebagai admin panel.

---

## Fitur

### Pengunjung
- Jelajahi destinasi wisata berdasarkan kategori (Sejarah, Alam, Kuliner, Seni Budaya)
- Informasi hotel beserta rekomendasi wisata terdekat
- Jadwal event kota dengan status (Akan Datang / Berlangsung / Selesai)
- Rating dan komentar destinasi wisata
- Pencarian wisata dan hotel
- Koordinat otomatis via OpenCage Geocoding
- Kirim kritik & saran langsung ke admin

### Admin Panel (Filament v3)
- Dashboard dengan statistik pengunjung, wisata, hotel, event
- Kelola semua data wisata dalam satu panel (multi-kategori dinamis)
- Upload multiple gambar per destinasi/hotel/event
- Balas kritik & saran pengunjung via email (Mailtrap)
- Manajemen komentar pengunjung

---

## Tech Stack

| Teknologi | Versi |
|-----------|-------|
| PHP | 8.4 |
| Laravel | 12.x |
| Filament | v3.3 |
| MySQL | 8.0 |
| Bootstrap | 5.x |
| OpenCage API | - |

---

## Instalasi

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

---

## Akses
- **Admin Panel** — akses melalui route yang dikonfigurasi
- **Pengunjung** — halaman utama web

---

## Screenshots

> *Admin Panel Dashboard*
> <img width="2440" height="1669" alt="localhost_8000_admin" src="https://github.com/user-attachments/assets/77a34b5c-89d9-4a32-b1e5-23b6ff33a26c" />

> *Admin Panel Data Wisata*
> <img width="2426" height="1657" alt="localhost_8000_admin_wisatas" src="https://github.com/user-attachments/assets/546f4ced-86a2-4284-910a-a449e4dada1c" />

> *Admin Panel Create Data Wisata*
> <img width="2440" height="1664" alt="localhost_8000_admin_wisatas_create" src="https://github.com/user-attachments/assets/6a09f965-cf4f-4133-9ce0-70a76c4713b2" />

> *Admin Panel Data Hotel*
> <img width="2429" height="1661" alt="localhost_8000_admin_hotels" src="https://github.com/user-attachments/assets/1ef9ec51-1d3c-40d3-85c9-340b3bbf68ef" />

> *Admin Panel Create Data hotel*
> <img width="2430" height="1667" alt="localhost_8000_admin_hotels_create" src="https://github.com/user-attachments/assets/869749e0-59d4-40c9-95b4-8dc909c4f8e8" />

> *Admin Panel Data Event*
> <img width="2425" height="1660" alt="localhost_8000_admin_events" src="https://github.com/user-attachments/assets/f443e942-b6b7-423c-81aa-300c02d913ad" />

> *Admin Panel Create Data Event*
> <img width="2435" height="1664" alt="localhost_8000_admin_events_create" src="https://github.com/user-attachments/assets/c0564dc8-9b74-437c-84e4-d099bb9fe986" />

> *Admin Panel Data Kritik & Saran*
> <img width="2438" height="1649" alt="localhost_8000_admin_kritiksarans" src="https://github.com/user-attachments/assets/077f9f7d-7339-4f02-a745-ab418b2b65ae" />

> *Admin Panel Balas Kritik & Saran*
> <img width="2441" height="1663" alt="localhost_8000_admin_kritiksarans (1)" src="https://github.com/user-attachments/assets/e43649c5-b430-40e9-89d8-0f6d441a52fa" />


> *Admin Panel Data Komentar*
> <img width="2430" height="1665" alt="localhost_8000_admin_komentars" src="https://github.com/user-attachments/assets/e77891f6-9a3e-4c04-93c2-8863ce8f39a3" />

> *Admin Panel Data Kategori*
> <img width="2437" height="1664" alt="localhost_8000_admin_kategoris" src="https://github.com/user-attachments/assets/be1d6ccd-0536-4b4e-bc6e-2d9ae9e79571" />

> *Admin Panel Create Data Kategori*
> <img width="2443" height="1661" alt="localhost_8000_admin_kategoris_create" src="https://github.com/user-attachments/assets/923ba3f0-babb-4a54-b6ff-baacb741a03a" />

> *Admin Panel Data Email Terkirim*
> <img width="2438" height="1662" alt="mailtrap io_inboxes_4486980_messages_5407521113" src="https://github.com/user-attachments/assets/68bb10ba-ec8d-4049-a547-984dc9fd1eb4" />


> *Landing Page Index*
> <img width="2434" height="4023" alt="127 0 0 1_8000_ (1)" src="https://github.com/user-attachments/assets/4de2defb-5a31-4f22-82aa-d68e437f5573" />

> *Landing page About*
> <img width="2437" height="3969" alt="127 0 0 1_8000_about" src="https://github.com/user-attachments/assets/774389b8-1697-43e7-933b-187e00dc4c9a" />

> *Landing page Wisata*
> <img width="2435" height="4082" alt="127 0 0 1_8000_wisata" src="https://github.com/user-attachments/assets/47668475-4ef1-48c4-9001-582272289a36" />

> *Landing Page Detail Wisata*
> <img width="2422" height="4520" alt="127 0 0 1_8000_detail-wisata_jam-gadang" src="https://github.com/user-attachments/assets/640fd908-3646-4b09-a5f3-6bfb67dd0a80" />

> *Landing Page Hotel*
> <img width="2438" height="3489" alt="127 0 0 1_8000_hotel" src="https://github.com/user-attachments/assets/0f0e49a3-d865-43e7-b5aa-5f77bacc6ac5" />

> *Landing Page Detail Hotel*
> <img width="2430" height="3923" alt="127 0 0 1_8000_detail-hotel_grand-rocky-hotel" src="https://github.com/user-attachments/assets/e0cfd14c-c5e1-4df0-92ad-ca5835ca4893" />

> *Landing Page Event*
> <img width="2434" height="3363" alt="127 0 0 1_8000_event" src="https://github.com/user-attachments/assets/b00cb360-c045-4a60-ac73-bcc0f0795ebf" />
> <img width="2444" height="1658" alt="127 0 0 1_8000_event (1)" src="https://github.com/user-attachments/assets/250c9d2d-2afc-40ef-9f1f-ae7c03831d63" />

> *Landing Page Kritik & Saran*
> <img width="2402" height="1658" alt="127 0 0 1_8000_saran (1)" src="https://github.com/user-attachments/assets/fdec7cbd-b9b5-433e-bc47-ec3a057da96f" />


---

## Developer

**Shakilla Ragelia**  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-blue?style=flat&logo=linkedin)](https://linkedin.com/in/shakillaragelia)
[![GitHub](https://img.shields.io/badge/GitHub-Follow-black?style=flat&logo=github)](https://github.com/shakillaragelia)

---

## Lisensi

Project ini dibuat untuk keperluan portofolio.
