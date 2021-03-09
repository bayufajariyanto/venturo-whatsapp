# Dokumentasi WhatsApp API

Hai, repository ini adalah implementasi untuk cek nomor yang terdaftar, dan kirim pesan di WhatsApp menggunakan library <a href="https://github.com/pedroslopez/whatsapp-web.js">whatsapp-web.js</a>

### Bagaimana cara menggunakan?

- Kunjungi dan buat client di https://venturo-whatsapp.herokuapp.com
- Isi ID terserah yang penting diawal dilarang pakai angka
- Isi deskripsi terserah
- Login dengan Scan QR Code WhatsApp
- Pergi ke https://belajar.landa.co.id/cek-nomor.php (untuk cek nomor WA)
- Pergi ke https://belajar.landa.co.id/kirim-pesan.php (untuk kirim pesan WA)
- Masukkan ID pada https://venturo-whatsapp.herokuapp.com sebagai sender
- Enjoy!

### Cek nomor menggunakan api

**Url:**

- `https://venturo-whatsapp.herokuapp.com`

**Method:**

- `post`

**Endpoint:**

- `/cek-nomor`

**Paramater Body:**

- `sender`: id pada https://venturo-whatsapp.herokuapp.com
- `nomor`: nomor telepon (gunakan 62 (kode negara tanpa +) atau 0 sebagai awalan nomor)

### Kirim pesan menggunakan api

**Url:**

- `https://venturo-whatsapp.herokuapp.com`

**Method:**

- `post`

**Endpoint:**

- `/kirim-pesan`

**Paramater Body:**

- `sender`: id pada https://venturo-whatsapp.herokuapp.com
- `nomor`: nomor telepon (gunakan 62 (kode negara tanpa +) atau 0 sebagai awalan nomor)
- `pesan`: pesan