<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
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

// Management
$route['Role']                                      ='Admin/Role';
$route['Role/Simpan']                               ='Admin/Save_role';
$route['Role/Get_id_role_edit/(:num)']              ='Admin/Get_id_role_edit/$1';
$route['Role/Update']                               ='Admin/Update_role';