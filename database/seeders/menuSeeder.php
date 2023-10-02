<?php
namespace Database\Seeders;
use App\Model\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class menuSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('menus')->truncate();
        $isi='[
          {
            "id": 10,
            "parent_id": null,
            "kode": "pengaturan",
            "nama": "Pengaturan",
            "link": "pengaturan",
            "icon": "fas fa-cogs",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 1,
            "parent_id": null,
            "kode": "pengaturanroot",
            "nama": "Pengaturan Root",
            "link": "pengaturanroot",
            "icon": "fab fa-android",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 24,
            "parent_id": null,
            "kode": "slider",
            "nama": "Slider",
            "link": "slider",
            "icon": "fas fa-sliders-h",
            "tampil": 1,
            "urut": 3,
            "status": 1,
            "detail": {
              "model": "foto",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 29,
            "parent_id": null,
            "kode": "kontak",
            "nama": "Kontak",
            "link": "kontak",
            "icon": "far fa-address-book",
            "tampil": 1,
            "urut": 4,
            "status": 1,
            "detail": {
              "model": "Kontak",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 35,
            "parent_id": null,
            "kode": "datamaster",
            "nama": "Data Master",
            "link": "datamaster",
            "icon": "fas fa-address-card",
            "tampil": 1,
            "urut": 5,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 39,
            "parent_id": null,
            "kode": "pendidikans",
            "nama": "Pendidikan",
            "link": "pendidikans",
            "icon": "fas fa-school",
            "tampil": 1,
            "urut": 6,
            "status": 1,
            "detail": {
              "model": "Pendidikan",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 41,
            "parent_id": null,
            "kode": "berkaspegawais",
            "nama": "Berkas Pegawai",
            "link": "berkaspegawais",
            "icon": "far fa-file-alt",
            "tampil": 1,
            "urut": 7,
            "status": 1,
            "detail": {
              "model": "BerkasPegawai",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 2,
            "parent_id": 1,
            "kode": "extra",
            "nama": "Extra",
            "link": "extra",
            "icon": "fas fa-expand-arrows-alt",
            "tampil": 1,
            "urut": 1,
            "status": 0,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 3,
            "parent_id": 1,
            "kode": "menu",
            "nama": "Menu",
            "link": "menu",
            "icon": "fas fa-th-list",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "Menu",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 4,
            "parent_id": 1,
            "kode": "aksesgrup",
            "nama": "Akses Grup",
            "link": "aksesgrup",
            "icon": "fas fa-universal-access",
            "tampil": 1,
            "urut": 3,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 6,
            "parent_id": 2,
            "kode": "aksesmenu",
            "nama": "Akses Menu",
            "link": "aksesmenu",
            "icon": "fab fa-accessible-icon",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 34,
            "parent_id": 10,
            "kode": "aplikasi",
            "nama": "Aplikasi",
            "link": "aplikasi",
            "icon": "fas fa-laptop",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "aplikasi",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 5,
            "parent_id": 10,
            "kode": "user",
            "nama": "User",
            "link": "user",
            "icon": "fas fa-users",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 42,
            "parent_id": 35,
            "kode": "bidangs",
            "nama": "Bidang",
            "link": "bidangs",
            "icon": "fas fa-list-ul",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "Bidang",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 37,
            "parent_id": 35,
            "kode": "jabatans",
            "nama": "Jabatan",
            "link": "jabatans",
            "icon": "fas fa-address-card",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "Jabatan",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 36,
            "parent_id": 35,
            "kode": "pegawais",
            "nama": "Pegawai",
            "link": "pegawais",
            "icon": "fas fa-address-book",
            "tampil": 1,
            "urut": 3,
            "status": 1,
            "detail": {
              "model": "Pegawai",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 38,
            "parent_id": 35,
            "kode": "riwayatjabatans",
            "nama": "RiwayatJabatan",
            "link": "riwayatjabatans",
            "icon": "fas fa-history",
            "tampil": 1,
            "urut": 4,
            "status": 1,
            "detail": {
              "model": "RiwayatJabatan",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 40,
            "parent_id": 35,
            "kode": "berkas",
            "nama": "Berkas",
            "link": "berkas",
            "icon": "fas fa-file",
            "tampil": 1,
            "urut": 5,
            "status": 1,
            "detail": {
              "model": "Berkas",
              "title": "",
              "keterangan": ""
            }
          }
        ]';
        foreach (json_decode($isi, TRUE) as $menu) {
            Menu::create($menu);
        }
        Schema::enableForeignKeyConstraints();
    }
}
