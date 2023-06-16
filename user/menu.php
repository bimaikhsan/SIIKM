<ul class="menu-inner py-1">
            <li class="menu-item <?php if($_GET['page']=='home'){echo 'active';} ?>">
              <a href="./index.php?page=home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='informasi'){echo 'active';} ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Informasi</div>
              </a>

              <ul class="menu-sub">
              <?php 
				$kategori = $fungsi->tampil('kategori');
				foreach($kategori as $val){
			    ?>
    		
                <li class="menu-item">
                  <a href="./index.php?page=informasi&data=<?=$val['nama']?>" class="menu-link">
                    <div data-i18n="Without navbar"><?=$val['nama']?></div>
                  </a>
                </li>
                <?php 
	    			}
		    	?>
              </ul>
            </li>
            <li class="menu-item <?php if($_GET['page']=='contact'){echo 'active';} ?>">
              <a href="./index.php?page=contact" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Analytics">Contact</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='account'){echo 'active';} ?>">
              <a href="./index.php?page=account" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Account</div>
              </a>
            </li>
            <li class="menu-item <?php if($_GET['page']=='logout'){echo 'active';} ?>">
              <a href="./index.php?page=logout" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-log-out-circle"></i>

                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
</ul>