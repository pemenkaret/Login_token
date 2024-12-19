Penjelasan Alur Token
Register:

Ketika pengguna mendaftar (register), sistem akan membuat pengguna baru dan menghasilkan token akses untuk pengguna tersebut.
Token ini adalah token yang sah dan dapat digunakan untuk autentikasi sampai token tersebut dicabut atau kadaluarsa (jika ada pengaturan kadaluarsa).
Login:

Ketika pengguna masuk (login), sistem akan memverifikasi kredensial pengguna dan jika benar, menghasilkan token akses baru.
Token ini juga sah dan dapat digunakan untuk autentikasi seperti halnya token yang dihasilkan saat register.
Token yang Valid untuk Logout:

Setiap token yang valid dapat digunakan untuk logout. Token tersebut dihasilkan baik dari proses register maupun login.
Logout dalam konteks ini berarti mencabut (revoke) token yang sedang digunakan, sehingga tidak lagi valid untuk autentikasi setelah logout.

===================
Menggunakan Postman untuk Uji Coba
Register:

Method: POST

URL: http://localhost:8000/api/register

Body: { "name": "John Doe", "email": "john@example.com", "password": "password" }

Copy token dari respons register.

Login:

Method: POST

URL: http://localhost:8000/api/login

Body: { "email": "john@example.com", "password": "password" }

Copy token dari respons login.

Logout:

Method: POST
URL: http://localhost:8000/api/logout
Header: Authorization: Bearer {token} (gunakan token dari register atau login).

Jika token register bisa digunakan untuk logout, itu karena token tersebut sah dan belum dicabut. Token register maupun login berfungsi sama dalam konteks autentikasi, jadi keduanya bisa digunakan untuk mengakses rute-rute yang memerlukan autentikasi, termasuk logout.