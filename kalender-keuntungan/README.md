# Kalender Keuntungan

Aplikasi pencatat keuntungan harian berbentuk kalender. Satu kode yang sama untuk:

- **Web app (PWA)** — folder `www/` bisa di-hosting statis dan di-"install" dari browser HP
- **Aplikasi Android (APK)** — dibungkus dengan Capacitor (folder `android/`)

Data tersimpan di **Supabase** (Postgres + Auth + RLS). Selama Supabase belum diisi,
aplikasi otomatis jalan dalam **Mode Lokal** (data di localStorage perangkat), jadi bisa
langsung dicoba tanpa setup apa pun.

```
kalender-keuntungan-app/
├── www/                     <- aplikasi web (yang dilihat pengguna)
│   ├── index.html           <- tampilan + logika kalender
│   ├── config.js            <- ISI INI: URL & anon key Supabase kamu
│   ├── manifest.webmanifest <- identitas PWA
│   ├── service-worker.js    <- cache offline
│   └── icons/               <- ikon aplikasi
├── supabase/
│   └── schema.sql           <- jalankan sekali di SQL Editor Supabase
├── android/                 <- proyek Android hasil Capacitor
├── capacitor.config.json
├── package.json
└── .github/workflows/build-apk.yml  <- build APK otomatis di GitHub
```

---

## 1. Siapkan Supabase (sekali saja, ±5 menit)

1. Buat proyek gratis di [supabase.com](https://supabase.com).
2. Buka **SQL Editor**, tempel isi `supabase/schema.sql`, klik **Run**.
3. Buka **Authentication → Sign In / Providers**, aktifkan **Allow anonymous sign-ins**
   (aplikasi masuk secara anonim per perangkat — tanpa form login).
4. Buka **Settings → API**, salin **Project URL** dan **anon public key**.
5. Tempel keduanya ke `www/config.js`.

> `anon key` aman berada di aplikasi karena semua baris dilindungi RLS
> (setiap pengguna hanya bisa membaca datanya sendiri).
> **Jangan pernah** menaruh `service_role key` di aplikasi.

---

## 2. Jalankan sebagai web app (PWA)

Hosting folder `www/` di layanan statis apa pun (Netlify, Vercel, Cloudflare Pages,
GitHub Pages). Buka alamatnya di Chrome HP → menu ⋮ → **Tambahkan ke Layar Utama**.
Aplikasi tampil layar penuh dengan ikon sendiri, seperti aplikasi biasa.

Untuk mencoba di komputer lokal:

```bash
npx serve www
```

---

## 3. Build APK

### Cara paling gampang — GitHub Actions (tanpa Android Studio)

1. Unggah folder proyek ini ke sebuah repo GitHub.
2. Buka tab **Actions → Build APK → Run workflow**.
3. Setelah selesai, unduh artifact **kalender-keuntungan-debug-apk**
   (berisi `app-debug.apk`) dan pasang di HP.

### Cara lokal — Android Studio

```bash
npm install
npx cap sync android
npx cap open android
```

Di Android Studio: **Build → Build APK(s)**. Hasilnya di
`android/app/build/outputs/apk/debug/app-debug.apk`.

Setiap kali mengubah isi `www/`, jalankan `npx cap sync android` lagi sebelum build.

> APK hasil build di atas adalah **debug build** — cocok untuk dipakai sendiri.
> Untuk rilis Play Store perlu **release build** yang ditandatangani keystore
> (menu **Build → Generate Signed Bundle/APK** di Android Studio).

---

## Cara data mengalir

| Lapisan | Isi |
|---|---|
| Tampilan & kalender | `www/index.html` (script UI biasa, jalan seketika) |
| Jembatan data | `window.__persistSave` / `__persistDelete` / `__applyProfits` |
| Supabase | tabel `profits` (user_id, date, amount) + login anonim + RLS |
| Cadangan | Mode Lokal (localStorage) bila config kosong / koneksi gagal |

Status sinkronisasi selalu terlihat di pojok kanan atas aplikasi:
**Tersimpan** (Supabase aktif) · **Mode Lokal** · **Offline — Lokal**.
