<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <!-- Menu -->
            <?php
            $id_role = $this->session->userdata('id_role');
            $this->db->where('id_role',$id_role);
            $this->db->where('status','1');
            $this->db->order_by('id_menu','ASC');
            $menu = $this->db->get('vw_role_access_menu')->result();
            foreach ($menu as $tampilkan_menu) :
            ?>
                <li><a><i class="<?php echo $tampilkan_menu->icon ?>"></i> <?php echo $tampilkan_menu->menu ?> <span class="fa fa-chevron-down"></span></a>
                    <!-- Sub Menu -->
                    <ul class="nav child_menu">
                        <?php
                        $id_menunya = $tampilkan_menu->id_menu;
                        $this->db->where('id_menu', $id_menunya);
                        $submenu = $this->db->get('vw_role_access_sub_menu')->result();
                        foreach ($submenu as $tampilkan_submenu) {
                        ?>
                            <li><a href="<?php echo base_url() ?><?php echo $tampilkan_submenu->url ?>"><?php echo $tampilkan_submenu->judul ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            endforeach;
            ?>

        </ul>
    </div>
    <div class="menu_section">
        <h3>Profil</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-user"></i> My Profile </a>
                <!-- <ul class="nav child_menu">
                    <li><a href="page_403.html">Managemen Menu</a></li>
                    <li><a href="page_404.html">managemen Sub Menu</a></li>
                </ul> -->
            </li>
            <li><a><i class="fa fa-user-md"></i> Edit Profile </a>
                <!-- <ul class="nav child_menu">
                    <li><a href="page_403.html">Managemen Menu</a></li>
                    <li><a href="page_404.html">managemen Sub Menu</a></li>
                </ul> -->
            </li>
            <li><a><i class="fa fa-unlock-alt"></i> Rubah Password </a>
                <!-- <ul class="nav child_menu">
                    <li><a href="page_403.html">Managemen Menu</a></li>
                    <li><a href="page_404.html">managemen Sub Menu</a></li>
                </ul> -->
            </li>
        </ul>
    </div>
</div>