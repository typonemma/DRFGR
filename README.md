Hello, ini adalah website yang dipergunakan untuk proses Dispatch Request Form (DRF) dan Goods Receive (GR/IVSP)

Dibangun dan digunakan untuk kepentingan YOKOGAWA INDONESIA!

Harap cloning terlebih dahulu github ini !

Setelah selesai saya akan menjelaskan kegunaan view serta controller dari project ini ya!
Project ini adalah menggunakan backend Laravel dan frontend css framework bootstrap!

Pada Controllers, terdapat beberapa folder dan file, diantaranya adalah:
1. Auth untuk melakukan verifikasi pendaftaran, login, register dan lainnya..
2. Controller sendiri dibedakan sesuai dengan stakeholdernya contohnya GL, Admin, SuperAdmin, User, dan Manager.
3. Controller Dashboard digunakan untuk membangun function dashboard yang sesuai dengan stake holder.
4. DRF dan IVSP Contoller untuk membuat function yang berkaitan dengan form tersebut.
5. Middleware digunakan untuk verifikasi apakah dashboard yang ada masuk sesuai dengan rolenya.
6. Request digunakan untuk kepentingan store, put, delete dokumen (CRUD)


Pada View, terdapat beberapa folder yang sesuai dengan pengelompokannya, diantaranya adalah:
1. add drf admin ataupun super admin, digunakan sebelum ack untuk menambahkan dokumen yang perlu diupload admin ataupun superadmin.
2. addstakeholder digunakan untuk menambah serta menghapus akun stakeholder lain, orang yang menggunakan ini adalah superadmin.
3. auth digunakan untuk login, register, dan verifikasi pendafatran.
4. dashboard, digunakan untuk melihat dashboard sesuai dengan nama dan stakeholdernya ya 
5. form digunakan sebagai tampilan untuk mengupload form.
6. history untuk melihat riwayat terbentuknya DRF dan IVSP, didalam file ini ada SuperAdmin, Admin, dan GL sesuai dengan peruntukannya.
7. layouts digunakan untuk membuat navbar karena setiap user mempunyai navbar yang berbeda.
8. sop drf dan sop gr digunakan untuk approval setiap proses sop

