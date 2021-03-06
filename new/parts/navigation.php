      <!-- BEGIN NAVBAR-->
      <div id="header-nav-offset"></div>
      <nav id="header-nav" class="navbar navbar--header <?php if ($active=='home'){ echo 'navbar--overlay';}?>">
        <div class="container">
          <div class="navbar__row js-navbar-row"><a href="/<?=$tempurl?>" class="navbar__brand">
              <img class="navbar__brand-logo" src="/<?=$tempurl?>assets/img/logo<?php if($active!='home'){echo '3';} else echo '2'; ?>.png">
<!--               <svg class="navbar__brand-logo">
                <use xlink:href="#icon-logo"></use>
              </svg> -->
              </a>
            <div id="navbar-collapse-1" class="navbar__wrap">
              <ul class="navbar__nav">
                <li class="navbar__item <?php if ($active=='home'){ echo 'active';}?>"><a href="/<?=$tempurl?>" class="navbar__link"><?=$lang['navigation.home']?></a></li>
                <li class="navbar__item <?php if ($active=='rent'){ echo 'active';}?>"><a href="/<?=$tempurl?>izdavanje-izaberite/" class="navbar__link"><?=$lang['navigation.rent']?></a></li>
                <li class="navbar__item <?php if ($active=='sell'){ echo 'active';}?>"><a href="/<?=$tempurl?>prodaja-izaberite/" class="navbar__link"><?=$lang['navigation.sell']?></a></li>
                <li class="navbar__item <?php if ($active=='submit'){ echo 'active';}?>"><a href="/<?=$tempurl?>dodajte-nekretninu/" class="navbar__link"><?=$lang['navigation.submit']?></a></li>
                <li class="navbar__item navbar__item--mob"><a href="/<?=$tempurl?>omiljene-nekretnine/" class="navbar__link"><?=$lang['navigation.favorites']?></a></li>
               <li class="navbar__item js-dropdown <?php if ($active=='about'){ echo 'active';}?>"><a class="navbar__link" href="/<?=$tempurl?>o-nama/"><?=$lang['navigation.about']?>
                    <svg class="navbar__arrow">
                      <use xlink:href="#icon-arrow-right"></use>
                    </svg></a>
                  <div role="menu" class="js-dropdown-menu navbar__dropdown">
                    <button class="navbar__back js-navbar-submenu-back">
                      <svg class="navbar__arrow">
                        <use xlink:href="#icon-arrow-left"></use>
                      </svg><?=$lang['navigation.back']?>
                    </button>

                    <div class="navbar__submenu">
                      <ul class="navbar__subnav">
                        <li class="navbar__subitem"><a href="/<?=$tempurl?>nas-tim/" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['navigation.about.team']?></a></li>
                        <li class="navbar__subitem navbar__subitem-dropdown js-dropdown"><a class="navbar__sublink js-navbar-sublink"><?=$lang['navigation.about.terms']?>
                            <svg class="navbar__arrow">
                              <use xlink:href="#icon-arrow-right"></use>
                            </svg></a>
                          <div class="navbar__submenu navbar__submenu--level">
                            <button class="navbar__back js-navbar-submenu-back">
                              <svg class="navbar__arrow">
                                <use xlink:href="#icon-arrow-left"></use>
                              </svg><?=$lang['navigation.back']?>
                            </button>
                            <ul class="navbar__subnav">
                              <li class="navbar__subitem"><a href="/<?=$tempurl?>ugovori/opsti_uslovi_poslovanja_jevtic_nekretnine.pdf" target="_blank" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['navigation.about.terms.general']?></a></li>
                            </ul>
                          </div>
                        </li>
                        <li class="navbar__subitem"><a href="/<?=$tempurl?>ugovori/" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['navigation.about.contracts']?></a></li>
                        <li class="navbar__subitem"><a href="/<?=$tempurl?>zakoni/" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['navigation.about.laws']?></a></li>
                        <li class="navbar__subitem"><a href="/<?=$tempurl?>reference/" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['navigation.references']?></a></li>
                        <li class="navbar__subitem"><a href="/<?=$tempurl?>partneri/" class="navbar__sublink js-navbar-sub-sublink"><?=$lang['home.partners']?></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="navbar__item <?php if ($active=='biznis'){ echo 'active';}?>"><a href="/<?=$tempurl?>biznis-paket-plus/" class="navbar__link"><?=$lang['navigation.biznis']?></a></li>
                <li class="navbar__item <?php if ($active=='career'){ echo 'active';}?>"><a href="/<?=$tempurl?>karijera/" class="navbar__link"><?=$lang['navigation.career']?></a></li>
                <li class="navbar__item <?php if ($active=='contact'){ echo 'active';}?>"><a href="/<?=$tempurl?>kontakt/" class="navbar__link"><?=$lang['navigation.contact']?></a></li>
                <li class="navbar__item navbar__item--mob js-dropdown"><a class="navbar__link"><?=$lang['navigation.language']?>
                    <svg class="navbar__arrow">
                      <use xlink:href="#icon-arrow-right"></use>
                    </svg></a>
                  <div role="menu" class="js-dropdown-menu navbar__dropdown navbar__dropdown--right">
                    <button class="navbar__back js-navbar-submenu-back">
                      <svg class="navbar__arrow">
                        <use xlink:href="#icon-arrow-left"></use>
                      </svg><?=$lang['navigation.back']?>
                    </button>
                    <div class="navbar__submenu">
                      <ul class="navbar__subnav">
                        <li class="navbar__subitem <?php if($lang['lang'] == 'rs'){echo 'active';} ?>"><a href="#" class="lang-rs navbar__sublink js-navbar-sublink">Srpski</a></li>
                        <li class="navbar__subitem <?php if($lang['lang'] == 'en'){echo 'active';} ?>"><a href="#" class="lang-en navbar__sublink js-navbar-sublink">English</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
              <!-- end of block  navbar__nav-->
            </div>
          </div>
        </div>
      </nav>
      <!-- END NAVBAR-->