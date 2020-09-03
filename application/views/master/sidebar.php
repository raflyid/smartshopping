
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Smartshop</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SS</a>
          </div>
          <ul class="sidebar-menu">

          <!-- Query Menu -->
          <?php
              $role_id = $this->session->userdata('role_id');
              $queryMenu = "SELECT `users_menu`.`id`, `menu`
                            FROM `users_menu` JOIN `users_access_menu`
                              ON `users_menu`.`id` = `users_access_menu`.`menu_id`
                          WHERE `users_access_menu`.`role_id` = $role_id
                          ORDER BY `users_access_menu`.`menu_id` ASC
                          ";
              $menu = $this->db->query($queryMenu)->result_array();
          ?>

          <?php foreach ($menu as $m) : ?>
            <li class="menu-header"><?= $m['menu']; ?>
            </li>

          <!-- Sub Menu-->
          <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                              FROM `users_sub_menu` JOIN `users_menu`
                                ON `users_sub_menu`.`menu_id` = `users_menu`.`id`
                              WHERE `users_sub_menu`.`menu_id` = '$menuId'
                                AND `users_sub_menu`.`is_active` = 1
                            ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>  

          <?php foreach ($subMenu as $sm) : ?>
          <!-- Nav Item - Dashboard -->
          <?php if ($title == $sm['title']) : ?>
            <li class=active>
            <?php else : ?>
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url($sm['url']) ?>">
            <i class="<?= $sm['icon']; ?>"></i> 
            <span><?= $sm['title']; ?></span></a>
            </li>
            <?php endforeach ?>
            <?php endforeach; ?>
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
              <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Contact</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                <li><a href="utilities-subscribe.html">Subscribe</a></li>
              </ul>
            </li>            
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>        </aside>
      </div>
