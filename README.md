
# Registrasi, login dan dashboard pages

Gambaran untuk membuat halaman registrasi, login, dan dashboard sederhana menggunakan PHP dan MySql


## Penginstallan
Yang anda butuhkan :
*  XAMPP
*  VSCode
*  Web Browser

Ikuti kode dibawah ini untuk mengclone repository ini
```bash
  git clone https://github.com/AugustAgung05/Register-Login-Dashboard.git
```
Simpan hasil clone di dalam folder xampp kemudian htdocs
```bash
  xampp -> htdocs
```
Buka XAMPP, kemudian start Apache dan MySql anda.

Tekan action "Admin" pada MySql lalu akan terbuka dashboard PHPMYADMIN. Kemudian
1. Buat database baru dengan nama 
```bash
  login_php
```
2. Buat table dengan nama
```bash
  users
```
3. Isi baris dengan
```bash
  Baris 1
    Name  : id
    Type  : INT
    Length: 10
    Index : Primary
    A_I   : Ceklis
  Baris 2
    Name  : username
    Type  : VARCHAR
    Length: 100
    Index : Unique
  Baris 3
    Name  : password
    Type  : VARCHAR
    Length: 255
  Baris 4
    Name    : created_at
    Type    : DATETIME
    Default : CURRENT_TIME
```
Buka Web Browser anda dan ketikkan
```bash
  localhost/Register-Login-Dashboard/login.php
```
## Screenshots
![Register Page](Screenshot/Screenshot%202024-03-02%20151434.png)
![Register Successfully](Screenshot/Screenshot%202024-03-02%20151445.png)
![Login Page](Screenshot/Screenshot%202024-03-02%20151510.png)
![Dashboard Page](Screenshot/Screenshot%202024-03-02%20151542.png)
## Struktur File
```bash
📦PHP
 ┣ 📂Resource
 ┃ ┗ 📜zyro-image.png
 ┣ 📂Screenshot
 ┃ ┣ 📜Screenshot 2024-03-02 151434.png
 ┃ ┣ 📜Screenshot 2024-03-02 151445.png
 ┃ ┣ 📜Screenshot 2024-03-02 151510.png
 ┃ ┗ 📜Screenshot 2024-03-02 151542.png
 ┣ 📂Service
 ┃ ┗ 📜database.php
 ┣ 📜dashboard.php
 ┣ 📜login.php
 ┣ 📜README.md
 ┣ 📜register.php
 ┗ 📜style.css
 ```

## Authors

- [@AugustAgung05](https://github.com/AugustAgung05)

