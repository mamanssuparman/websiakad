<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// Dashboard
$route['Dashboard']                                 = 'Admin';
// Kategori
$route['Kategori']                                  = 'Admin/Kategori';
$route['Kategori/Save']                             = 'Admin/Savekategori';
$route['Kategori/Get_id_kategori_hapus/(:num)']     = 'Admin/Get_id_kategori_hapus/$1';
$route['Kategori/hapus']                            = 'Admin/Hapus_kategori';
$route['Kategori/Edit/(:num)']                      = 'Admin/Edit_kategori/$1';
$route['Kategori/Update']                           = 'Admin/Update_kategori';
$route['Kategori/Nonaktif/(:num)']                  = 'Admin/Nonaktif_kategori/$1';
$route['Kategori/Aktif/(:num)']                     = 'Admin/Aktif_kategori/$1';
// Profil
$route['Profil']                                    = 'Admin/Profil';
$route['Profil/Save']                               = 'Admin/Simpan_Profil';
$route['Profil/Get_id_profil_hapus/(:num)']         = 'Admin/Get_id_profil_hapus/$1';
$route['Profil/hapus']                              = 'Admin/Hapus_profil';
$route['Profil/Edit/(:any)/(:num)']                 = 'Admin/Edit_profil/$2/$1';
$route['Profil/Update']                             = 'Admin/Update_profil';
$route['Profil/Nonaktif/(:num)']                    = 'Admin/Nonaktif_profil/$1';
$route['Profil/Aktif/(:num)']                       = 'Admin/Aktifkan_profil/$1';
// Proju
$route['Proju']                                     = 'Admin/Proju';
$route['Proju/Save']                                = 'Admin/Saveproju';
$route['Proju/Get_id_proju_hapus/(:num)']           = 'Admin/Get_id_proju_hapus/$1';
$route['Proju/Hapus']                               = 'Admin/Hapus_proju';
$route['Proju/Edit/(:any)/(:num)']                  = 'Admin/Edit_proju/$2/$1';
$route['Proju/Update']                              = 'Admin/Update_proju';
$route['Proju/Nonaktif/(:num)']                     = 'Admin/Nonaktif_proju/$1';
$route['Proju/Aktif/(:num)']                        = 'Admin/Aktif_proju/$1';
// Program Keahlian
$route['Program-Keahlian']                          = 'Admin/Program_keahlian';
$route['Program-Keahlian/Save']                     = 'Admin/Save_program_keahlian';
$route['Program-Keahlian/Get_id_program_keahlian_hapus/(:num)']    = 'Admin/Get_id_program_keahlian_hapus/$1';
$route['Program-Keahlian/Hapus']                    = 'Admin/Hapus_program_keahlian';
$route['Program-Keahlian/Edit/(:any)/(:num)']       = 'Admin/Edit_program_keahlian/$2/$1';
$route['Program-Keahlian/Update']                   = 'Admin/Update_program_keahlian';
$route['Program-Keahlian/Nonaktif/(:num)']          = 'Admin/Nonaktif_program_keahlian/$1';
$route['Program-Keahlian/Aktif/(:num)']             = 'Admin/Aktif_program_keahlian/$1';
// Pegawai
$route['Pegawai']                                   = 'Admin/Pegawai';
$route['Pegawai/Save']                              = 'Admin/Savepegawai';
$route['Pegawai/Detail/(:any)/(:num)']              = 'Admin/Detail_pegawai/$2/$1';
$route['Pegawai/Edit/(:any)/(:num)']                = 'Admin/Edit_pegawai/$2/$1';
$route['Pegawai/Update']                            = 'Admin/Update_pegawai';
$route['Pegawai/Account/(:any)/(:num)']             = 'Admin/Edit_account/$2/$1';
$route['Pegawai/Update_account']                    = 'Admin/Update_account';
$route['Pegawai/Update_foto/(:any)/(:num)']         = 'Admin/Update_foto/$2/$1';
$route['Pegawai/Foto_update']                       = 'Admin/Update_foto_account_new';
$route['Pegawai/Aktifkan/(:num)']                   = 'Admin/Aktifkan_pegawai/$1';
$route['Pegawai/Nonaktif/(:num)']                   = 'Admin/Nonaktifkan_pegawai/$1';
// Management
$route['Role']                                      = 'Admin/Role';
$route['Role/Simpan']                               = 'Admin/Save_role';
$route['Role/Get_id_role_edit/(:num)']              = 'Admin/Get_id_role_edit/$1';
$route['Role/Update']                               = 'Admin/Update_role';
$route['Role/Access/(:any)/(:num)']                 = 'Admin/Access_role/$2/$1';
$route['Role/Aktifkan/(:num)']                      = 'Admin/Aktif_menu/$1';
$route['Role/Nonaktif/(:num)']                      = 'Admin/Nonaktif_menu/$1';
$route['Menu']                                      = 'Menu';
$route['Menu/Simpan']                               = 'Menu/Simpan';
$route['Submenu']                                   = 'Menu/Submenu';
$route['Submenu/Access/(:any)/(:num)']              = 'Menu/Acess_submenu/$2/$1';
$route['Menu/Aktifkan/(:num)']                      = 'Menu/Aktifkan_menu/$1';
$route['Menu/Nonaktif/(:num)']                      = 'Menu/Nonaktif_menu/$1';

// Pengumuman
$route['Pengumuman']                                = 'Admin/Pengumuman';
$route['Pengumuman/Save']                           = 'Admin/Save_pengumuman';
$route['Pengumuman/Get_id_pengumuman_hapus/(:num)'] = 'Admin/Get_id_pengumuman/$1';
$route['Pengumuman/hapus']                          = 'Admin/Hapus_pengumuman';
$route['Pengumuman/Edit/(:any)/(:num)']             = 'Admin/Edit_pengumuman/$2/$1';
$route['Pengumuman/Update']                         = 'Admin/Update_pengumuman';
$route['Pengumuman/Nonaktif/(:num)']                = 'Admin/Nonaktif_pengumuman/$1';
$route['Pengumuman/Aktif/(:num)']                   = 'Admin/Aktif_pengumuman/$1';
// Login
$route['Login']                                     = 'Auth';
$route['Login/Verifikasi']                          = 'Auth/Login';
// Berita
$route['Berita']                                    = 'Admin/Berita';
$route['Berita/Save']                               = 'Admin/Save_berita';
$route['Berita/Detail/(:any)/(:num)']               = 'Admin/Detail_berita/$2/$1';
$route['Berita/Get_id_berita_status/(:num)']        = 'Admin/Get_id_berita_status/$1';
$route['Berita/Aktifkan']                           = 'Admin/Aktifkan_berita';
$route['Berita/nonaktifkan']                        = 'Admin/nonaktifkan_berita';
$route['Berita/Edit/(:any)/(:num)']                 = 'Admin/Edit_berita/$2/$1';
$route['Berita/Update']                             = 'Admin/Update_berita';
// Galery
$route['Photos']                                    = 'Admin/Galery';
$route['Photos/Add']                                = 'Admin/Add_galery';
$route['Photos/Simpan']                             = 'Admin/Save_photos';
$route['Photos/Aktifkan']                           = 'Admin/Aktifkan_photos';
$route['Photos/Get_photos_by_id_row/(:num)']        = 'Admin/Get_photos_by_id_row/$1';
$route['Photos/Nonaktifkan']                        = 'Admin/Nonaktifkan_photos';
$route['Photos/Edit/(:any)/(:num)']                 = 'Admin/Edit_photos/$2/$1';
$route['Photos/Update']                             = 'Admin/Update_galery';
// Videos
$route['Videos']                                    = 'Admin/Videos';
$route['Videos/Add']                                = 'Admin/Add_videos';
$route['Video/Simpan']                              = 'Admin/Save_videos';
$route['Videos/Get_videos_by_id_row/(:num)']        = 'Admin/Get_videos_by_id_row/$1';
$route['Videos/Nonaktifkan']                        = 'Admin/Nonaktifkan_videos';
$route['Videos/Aktifkan']                           = 'Admin/Aktifkan_videos';
$route['Videos/Edit/(:any)/(:num)']                 = 'Admin/Edit_videos/$2/$1';
$route['Video/Update']                              = 'Admin/Update_videos';

// Profile User
$route['Profile/(:any)']                            = 'Welcome/Profile/$2';
// Program Keahlian User
$route['Program-keahlian/(:any)']                   = 'Welcome/Prokeh/$2';
// Galery User
$route['Galery']                                    = 'Welcome/Galery';
// Video
$route['Video']                                     = 'Welcome/Video';
// Staff
$route['Staff']                                     = 'Welcome/Staff';
// Berita detail 
$route['Berita/(:any)']                             = 'Welcome/Berita/$2';
// Kategori User
$route['kategori/(:any)']                           = 'Welcome/Kategori/$2';
// Search
$route['Search/(:any)']                             ='Welcome/Search/$2';