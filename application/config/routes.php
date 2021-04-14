<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// Dashboard
$route['Dashboard']                                 ='Admin';
// Kategori
$route['Kategori']                                  ='Admin/Kategori';
$route['Kategori/Save']                             ='Admin/Savekategori';
$route['Kategori/Get_id_kategori_hapus/(:num)']     ='Admin/Get_id_kategori_hapus/$1';
$route['Kategori/hapus']                            ='Admin/Hapus_kategori';
$route['Kategori/Edit/(:num)']                      ='Admin/Edit_kategori/$1';
$route['Kategori/Update']                           ='Admin/Update_kategori';
// Profil
$route['Profil']                                    ='Admin/Profil';
$route['Profil/Save']                               ='Admin/Simpan_Profil';
$route['Profil/Get_id_profil_hapus/(:num)']         ='Admin/Get_id_profil_hapus/$1';
$route['Profil/hapus']                              ='Admin/Hapus_profil';
$route['Profil/Edit/(:num)']                        ='Admin/Edit_profil/$1';
$route['Profil/Update']                             ='Admin/Update_profil';
// Proju
$route['Proju']                                     ='Admin/Proju';
$route['Proju/Save']                                ='Admin/Saveproju';
$route['Proju/Get_id_proju_hapus/(:num)']           ='Admin/Get_id_proju_hapus/$1';  
$route['Proju/Hapus']                               ='Admin/Hapus_proju';
$route['Proju/Edit/(:num)']                         ='Admin/Edit_proju/$1';
$route['Proju/Update']                              ='Admin/Update_proju';
// Program Keahlian
$route['Program-Keahlian']                          ='Admin/Program_keahlian';
$route['Program_keahlian/Save']                     ='Admin/Save_program_keahlian';
$route['Program-Keahlian/Get_id_program_keahlian_hapus/(:num)']    ='Admin/Get_id_program_keahlian_hapus/$1';
$route['Program-Keahlian/Hapus']                    ='Admin/Hapus_program_keahlian';
$route['Program-Keahlian/Edit/(:num)']              ='Admin/Edit_program_keahlian/$1';
$route['Program-keahlian/Update']                   ='Admin/Update_program_keahlian';
// Pegawai
$route['Pegawai']                                   ='Admin/Pegawai';
$route['Pegawai/Save']                              ='Admin/Savepegawai';
$route['Pegawai/Detail/(:any)/(:num)']              ='Admin/Detail_pegawai/$2/$1';
$route['Pegawai/Edit/(:any)/(:num)']                ='Admin/Edit_pegawai/$2/$1';
$route['Pegawai/Update']                            ='Admin/Update_pegawai';
$route['Pegawai/Account/(:any)/(:num)']             ='Admin/Edit_account/$2/$1';
$route['Pegawai/Update_account']                    ='Admin/Update_account';
$route['Pegawai/Update_foto/(:any)/(:num)']         ='Admin/Update_foto/$2/$1';
// Management
$route['Role']                                      ='Admin/Role';
$route['Role/Simpan']                               ='Admin/Save_role';
$route['Role/Get_id_role_edit/(:num)']              ='Admin/Get_id_role_edit/$1';
$route['Role/Update']                               ='Admin/Update_role';
// Pengumuman
$route['Pengumuman']                                ='Admin/Pengumuman';
$route['Pengumuman/Save']                           ='Admin/Save_pengumuman';
$route['Pengumuman/Get_id_pengumuman_hapus/(:num)'] ='Admin/Get_id_pengumuman/$1';
$route['Pengumuman/hapus']                          ='Admin/Hapus_pengumuman';
$route['Pengumuman/Edit/(:any)/(:num)']             ='Admin/Edit_pengumuman/$2/$1';
$route['Pengumuman/Update']                         ='Admin/Update_pengumuman';
// Login
$route['Login']                                     ='Auth';
$route['Login/Verifikasi']                          ='Auth/Login';
// Berita
$route['Berita']                                    ='Admin/Berita';
$route['Berita/Save']                               ='Admin/Save_berita';
$route['Berita/Detail/(:any)/(:num)']               ='Admin/Detail_berita/$2/$1';
$route['Berita/Get_id_berita_status/(:num)']        ='Admin/Get_id_berita_status/$1';
$route['Berita/Aktifkan']                           ='Admin/Aktifkan_berita';
$route['Berita/nonaktifkan']                        ='Admin/nonaktifkan_berita';
$route['Berita/Edit/(:any)/(:num)']                 ='Admin/Edit_berita/$2/$1';
$route['Berita/Update']                             ='Admin/Update_berita';
// Galery
$route['Photos']                                    ='Admin/Galery';
$route['Photos/Add']                                ='Admin/Add_galery';
$route['Photos/Simpan']                             ='Admin/Save_photos';