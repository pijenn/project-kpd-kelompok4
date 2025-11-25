**Sistem Unggah Dokumen Aman – KDP Final Case**

**👥 Identitas Kelompok** : 

Alva Shaquilla Rayhan	              (235150707111033)

Rafie Ramadhan Al Aziz Zein	          (235150700111035)

Muhammad Dion Raditya	              (235150707111039)

Muhammad Rizqullah Almadinah	      (235150707111041)

Kelas : KDP – TI A
Dosen Pengampu : Hariz Farisi, S.Kom., M.T

**📌 Deskripsi Case: Sistem Unggah Dokumen Aman**

Pada layanan fintech seperti P2P Lending, pengguna diwajibkan mengunggah dokumen sensitif untuk keperluan Know Your Customer (KYC). Dokumen seperti KTP dan Slip Gaji memiliki risiko tinggi terhadap pencurian data, sehingga proses unggah harus dirancang secara aman.

Sistem ini mengimplementasikan beberapa aspek keamanan, yaitu:

**🔐 Data In-Transit**

Seluruh proses unggah file dilakukan melalui HTTPS/TLS untuk mencegah intersepsi data.

Validasi file pada server (tipe file, ukuran, MIME detection).

Pemisahan metadata dan file agar data sensitif tidak tersimpan di tempat yang tidak relevan.

**🛡️ Data At-Rest**

Penyimpanan file pada object storage yang dilindungi Server-Side Encryption (SSE).

Akses diatur menggunakan kredensial khusus sehingga file tidak dapat diakses publik.

Metadata dan log disimpan aman pada database.

**🔎 Bukti Keamanan**

Percobaan akses file tanpa kredensial menghasilkan kegagalan.

File yang disimpan terbukti tidak bisa dibuka tanpa proses dekripsi backend.

Traffic upload telah diamankan dan tidak dapat dibaca melalui packet capture.

**🧰 Tech Stack**
Backend & Framework

<img width="280" height="280" alt="Laravel svg" src="https://github.com/user-attachments/assets/5af5555b-c0d3-4d94-8a3b-102234b25b96" />


<img width="280" height="280" alt="63051368" src="https://github.com/user-attachments/assets/c003f319-569e-4b46-92ac-919f72915737" />

Laravel – API backend untuk upload, enkripsi, validasi, dan akses file

Blade – Template sederhana untuk antarmuka dasar

Database & Storage
![MySQL-Logo](https://github.com/user-attachments/assets/ab955de9-ab04-4f15-8dbd-1a67a4e9e891)

MySQL (via XAMPP) – Penyimpanan metadata file dan log

Local Storage / Object Storage – Menyimpan file terenkripsi

Tools Pendukung

<img width="225" height="225" alt="images (2)" src="https://github.com/user-attachments/assets/344ef359-4ab2-46a1-95bb-ba90b295ae65" />

XAMPP – Web server + MySQL

**🚀 Fitur Utama**

Upload file sensitif yang aman

Validasi file (tipe, ukuran, MIME)

Penyimpanan terenkripsi

Kontrol akses berbasis kredensial

Dokumentasi arsitektur dan threat model (STRIDE)

Bukti keamanan melalui pengujian



