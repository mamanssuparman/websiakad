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