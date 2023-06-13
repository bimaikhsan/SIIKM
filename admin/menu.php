<ul class="menu-inner py-1">
            <li class="menu-item <?php if($_GET['page']=='home'){echo 'active';} ?>">
              <a href="./index.php?page=home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='datakategori' or $_GET['page']=='tambah_kategori'){echo 'active';} ?>">
              <a href="./index.php?page=datakategori" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Analytics">Data Kategori</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='datainformasi' or $_GET['page']=='tambah'){echo 'active';} ?>">
              <a href="./index.php?page=datainformasi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Data Informasi</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='datamahasiswa'){echo 'active';} ?>">
              <a href="./index.php?page=datamahasiswa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Data Mahasiswa</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='contact'){echo 'active';} ?>">
              <a href="./index.php?page=contact" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Analytics">Contact</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='logout'){echo 'active';} ?>">
              <a href="./index.php?page=logout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
          </ul>