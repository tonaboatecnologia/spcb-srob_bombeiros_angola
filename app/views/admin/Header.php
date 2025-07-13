<?php

use App\Models;

$user = new Models\UsuariosAdminModel(); ?>

<!-- Navbar-->
<header class="main-header-top hidden-print">
    <a href="index.html" class="logo"><img class="img-fluid able-logo" src="<?php echo DIRADMINIMG . 'logos/logospcb2.jpg'; ?>" style="width: 40px; height: 40px;" alt="Theme-logo"></a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <ul class="top-nav lft-nav">
            <li>
                <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                    <i class="ti-files"> </i><span> FILES</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                    <span><?php echo DATATIME; ?> </span><i class=" icofont icofont-simple-down"></i>
                </a>
                <ul class="dropdown-menu settings-menu">
                    <li><a href="#"><i class="icofont icofont-globe"></i> Região: <?php echo LOCALIZATION; ?></a></li>
                    <li><a href="#"><i class="icofont icofont-code"></i> Código: <?php echo COUNTRYCODE; ?></a></li>
                    <li><a href="#"><i class="icofont icofont-social-skype"></i> Latitude: <?php echo LATITUDE; ?></a></li>
                    <li><a href="#"><i class=" icofont icofont-ui-map"></i> Longitude: <?php echo LONGITUDE; ?></a></li>

                </ul>
            </li>
            <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
                    <i class="ti-search"></i>
                </a>
            </li>
        </ul>
        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu f-right">
            <?php if ($_SESSION['permition'] == "admin") : ?>
                <div class="upgrade-button">
                    <a href="<?php echo DIRPAGE . 'gerenciar-FichaCentral'; ?>" class="icon-circle txt-white btn btn-sm btn-primary upgrade-button">
                        <span><i class="icofont icofont-fire-extinguisher"></i>Nova Ocorrência<i class="icofont icofont-fire"></i></span>
                    </a>
                </div>
            <?php endif; ?>

            <ul class="top-nav">
                <!--Notification Menu-->
                <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                    <li class="dropdown notification-menu">
                        <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <i class="icon-bell"></i>
                            <span class="badge badge-danger header-badge">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media">
                                    <span class="media-left media-icon">
                                        <img class="img-circle" src="assets/images/avatar-1.png" alt="User Image">
                                    </span>
                                    <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
                                </a>
                            </li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media">
                                    <span class="media-left media-icon">
                                        <img class="img-circle" src="http://localhost/spcb/public/assets/uploads/pics/Fri-24-May-2024-06-11-23_spcb_66502f8b5fb13.jpg" alt="User Image">
                                    </span>
                                    <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
                                </a>
                            </li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media"><span class="media-left media-icon">
                                        <img class="img-circle" src="assets/images/avatar-3.png" alt="User Image">
                                    </span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div>
                                </a>
                            </li>
                            <li class="not-footer">
                                <a href="#!">ver Todas Notificações.</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- chat dropdown -->
                  <li class="pc-rheader-submenu ">
                     <a href="#!" class="drop icon-circle displayChatbox">
                        <i class="icon-bubbles"></i>
                        <span class="badge badge-danger header-badge">5</span>
                     </a>

                  </li>
                <!-- window screen -->
                <li class="pc-rheader-submenu">
                    <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                    </a>

                </li>
                <!-- User Menu-->
                <li class="dropdown">
                    <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <?php ?>
                        <span><img class="img-circle img-chat-profile" src="<?php foreach ($user->getEmail($_SESSION['email']) as $userList) : echo $userList['path'];
                                                                            endforeach; ?>" style="width:40px;" alt="User Image"></span>
                        <span> <b><?php foreach ($user->getEmail($_SESSION['email']) as $userList) : echo $userList['nome'];
                                    endforeach; ?></b> <i class=" icofont icofont-simple-down"></i></span>
                        <?php ?>
                    </a>
                    <ul class="dropdown-menu settings-menu">
                        <!-- <li><a href="#!"><i class="icon-settings"></i> Definições</a></li>-->
                        <li><a href="<?php echo DIRPAGE . 'gerenciar-Usuarios'; ?>"><i class="icon-user"></i>Perfil</a></li>
                        <li><a href="#"><i class="icon-envelope-open"></i> Mensagens</a></li>
                        <li class="p-0">
                            <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li class="sair"><a href="<?php echo DIRPAGE . 'sair-Sistema'; ?>"><i class="icon-logout"></i> Sair</a></li>

                    </ul>
                </li>
            </ul>

            <!-- search -->
            <div id="morphsearch" class="morphsearch">
                <form class="morphsearch-form">

                    <input class="morphsearch-input" type="search" placeholder="Search..." />

                    <button class="morphsearch-submit" type="submit">Search</button>

                </form>
                <div class="morphsearch-content">
                    <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="#!">
                            <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan" />
                            <h3>Sara Soueidan</h3>
                        </a>

                        <a class="dummy-media-object" href="#!">
                            <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona" />
                            <h3>Shaun Dona</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="#!">
                            <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect" />
                            <h3>Page Preloading Effect</h3>
                        </a>

                        <a class="dummy-media-object" href="#!">
                            <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow" />
                            <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="#!">
                            <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration" />
                            <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                            <img src="assets/images/avatar-1.png" alt="NotificationStyles" />
                            <h3>Notification Styles Inspiration</h3>
                        </a>
                    </div>
                </div>
                <!-- /morphsearch-content -->
                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
            </div>
            <!-- search end -->
        </div>
    </nav>
</header>
<!-- Side-Nav-->
<aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu" style="overflow: inherit;">
            <li class="nav-level">--- Navegação</li>

            <li class="active treeview">
                <a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'painel-Admin'; ?>">
                    <i class="icon-speedometer"></i><span> Painel de Controle</span>
                </a>
            </li>
            <li class="nav-level">--- Ocorrências</li>
            <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'visualizar-Ocorrencias'; ?>">
                        <i class="icon-eye"></i><span> Visualizar Ocorrências</span><!--<i class="icon-arrow-down"></i>-->
                    </a>
                    <!--<ul class="treeview-menu">
                      <li><a class="waves-effect waves-dark" href="view-occurrence.html"><i class="icon-arrow-right"></i> ver Detalhes</a></li>
                      <li><a class="waves-effect waves-dark" href="search-occurrence.html"><i class="icon-arrow-right"></i> Pesquisar Ocorrências</a></li>
                  </ul>-->
                </li>
            <?php endif; ?>
            <!--ficha Central-->
            <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="gerenciar-FichaCentral#!">
                        <i class="icon-folder-alt"></i><span> Gerir Ficha Central</span></a>
                    <!--<i class="icon-arrow-down"></i>
                    
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-FichaCentral'; ?>"><i class="icon-arrow-right"></i>Gerenciar & registrar Ocorrência</a></li>
                        <li><a class="waves-effect waves-dark" href="list-occurrences.html"><i class="icon-arrow-right"></i> Gerenciar Ocorrências</a></li>
                    </ul>-->
                </li>
            <?php endif; ?>
            <!--ficha secundária
                 <li class="treeview">
                   <a class="waves-effect waves-dark" href="#!">
                       <i class="icon-folder-alt"></i><span> Gerir Ficha Secundária</span><i class="icon-arrow-down"></i>
                   </a>
                   <ul class="treeview-menu">
                       <li><a class="waves-effect waves-dark" href="new-occurrence.html"><i class="icon-arrow-right"></i> Registrar Ocorrências</a></li>
                       <li><a class="waves-effect waves-dark" href="list-occurrences.html"><i class="icon-arrow-right"></i> Gerenciar Ocorrências</a></li>
                   </ul>
               </li>-->

            <!--ficha vitíma-->
            <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "coordenador") : ?>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="gerenciar-FichaVitima#!">
                        <i class="icon-user"></i><span> Gerir Ficha Vitíma</span> </a>
                    <!--<i class="icon-arrow-down"></i>
                   
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="new-occurrence.html"><i class="icon-arrow-right"></i> Registrar Ocorrências</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-FichaVitima'; ?>"><i class="icon-arrow-right"></i>Gerenciar & registrar Vítimas</a></li>
                    </ul>-->
                </li>
            <?php endif; ?>

            <!-- <li class="nav-level">--- Relatórios</li>
               <li class="treeview">
                   <a class="waves-effect waves-dark" href="#!">
                       <i class="icon-chart"></i><span> Relatórios Estatísticos</span><i class="icon-arrow-down"></i>
                   </a>
                   <ul class="treeview-menu">
                       <li><a class="waves-effect waves-dark" href="incident-reports.html"><i class="icon-arrow-right"></i> Relatórios de Emergência</a></li>
                       <li><a class="waves-effect waves-dark" href="incident-reports.html"><i class="icon-arrow-right"></i> Relatórios de Incidentes</a></li>
                       <li><a class="waves-effect waves-dark" href="performance-reports.html"><i class="icon-arrow-right"></i> Relatórios de Desempenho</a></li>
                   </ul>
               </li>-->
            <li class="nav-level">--- Configurações</li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="#!">
                    <i class="icon-settings"></i><span>Configurações</span><i class="icon-arrow-down"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if ($_SESSION['permition'] == "admin") : ?>

                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Usuarios'; ?>"><i class="icon-arrow-right"></i>Gerenciar Usuários</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Equipes'; ?>"><i class="icon-arrow-right"></i>Gerenciar Equipes</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-OrgaosApoio'; ?>"><i class="icon-arrow-right"></i>Orgão de Apoio</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Veiculos'; ?>"><i class="icon-arrow-right"></i>Gerenciar Veículos</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Horarios-Viaturas'; ?>"><i class="icon-arrow-right"></i>Gerenciar Horários Veículos</a></li>
                        <!--<li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-logs'; ?>"><i class="icon-arrow-right"></i>Gerenciar Logs</a></li>--->

                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'politícas-Privacidades'; ?>"><i class="icon-arrow-right"></i>Termos & Políticas</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sobre-Ajuda'; ?>"><i class="icon-arrow-right"></i>Sobre & Ajuda</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sair-Sistema'; ?>"><i class="icon-arrow-right"></i>Sair do Sistema</a></li>

                    <?php elseif ($_SESSION['permition'] == "coordenador") : ?>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Veiculos'; ?>"><i class="icon-arrow-right"></i>Gerenciar Veículos</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Equipes'; ?>"><i class="icon-arrow-right"></i>Gerenciar Equipes</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'politícas-Privacidades'; ?>"><i class="icon-arrow-right"></i>Termos & Políticas</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sobre-Ajuda'; ?>"><i class="icon-arrow-right"></i>Sobre & Ajuda</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sair-Sistema'; ?>"><i class="icon-arrow-right"></i>Sair do Sistema</a></li>
                    <?php elseif ($_SESSION['permition'] == "operador") : ?>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-Horarios-Viaturas'; ?>"><i class="icon-arrow-right"></i>Gerenciar Horários Veículos</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'gerenciar-OrgaosApoio'; ?>"><i class="icon-arrow-right"></i>Orgão de Apoio</a></li>
                        <!--<li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'politícas-Privacidades'; ?>"><i class="icon-arrow-right"></i>Termos & Políticas</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sobre-Ajuda'; ?>"><i class="icon-arrow-right"></i>Sobre & Ajuda</a></li>-->
                        <li><a class="waves-effect waves-dark" href="<?php echo DIRPAGE . 'sair-Sistema'; ?>"><i class="icon-arrow-right"></i>Sair do Sistema</a></li>

                    <?php endif; ?>
                </ul>
            </li>
        </ul>
        <!--<ul class="sidebar-menu">
                <li class="nav-level">--- Navigation</li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>                
                </li>
                <li class="nav-level">--- Components</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> UI Elements</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="accordion.html"><i class="icon-arrow-right"></i> Accordion</a></li>
                        <li><a class="waves-effect waves-dark" href="button.html"><i class="icon-arrow-right"></i> Button</a></li>
                        <li><a class="waves-effect waves-dark" href="label-badge.html"><i class="icon-arrow-right"></i> Label Badge</a></li>
                        <li><a class="waves-effect waves-dark" href="bootstrap-ui.html"><i class="icon-arrow-right"></i> Grid system</a></li>
                        <li><a class="waves-effect waves-dark" href="box-shadow.html"><i class="icon-arrow-right"></i> Box Shadow</a></li>
                        <li><a class="waves-effect waves-dark" href="color.html"><i class="icon-arrow-right"></i> Color</a></li>
                        <li><a class="waves-effect waves-dark" href="light-box.html"><i class="icon-arrow-right"></i> Light Box</a></li>
                        <li><a class="waves-effect waves-dark" href="notification.html"><i class="icon-arrow-right"></i> Notification</a></li>
                        <li><a class="waves-effect waves-dark" href="panels-wells.html"><i class="icon-arrow-right"></i> Panels-Wells</a></li>
                        <li><a class="waves-effect waves-dark" href="tabs.html"><i class="icon-arrow-right"></i> Tabs</a></li>
                        <li><a class="waves-effect waves-dark" href="tooltips.html"><i class="icon-arrow-right"></i> Tooltips</a></li>
                        <li><a class="waves-effect waves-dark" href="typography.html"><i class="icon-arrow-right"></i> Typography</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-chart"></i><span> Charts &amp; Maps</span><span class="label label-success menu-caption">New</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="float-chart.html"><i class="icon-arrow-right"></i> Float Charts</a></li>
                        <li><a class="waves-effect waves-dark" href="morris-chart.html"><i class="icon-arrow-right"></i> Morris Charts</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Forms</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="form-elements-bootstrap.html"><i class="icon-arrow-right"></i> Form Elements Bootstrap</a></li>
                        
                        <li><a class="waves-effect waves-dark" href="form-elements-advance.html"><i class="icon-arrow-right"></i> Form Elements Advance</a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="basic-table.html">
                        <i class="icon-list"></i><span> Table</span>
                    </a>                
                </li>


                <li class="nav-level">--- More</li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Pages</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="#!"><i class="icon-arrow-right"></i><span> Authentication</span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a class="waves-effect waves-dark" href="register1.html" target="_blank"><i class="icon-arrow-right"></i> Register 1</a></li>
                                
                                <li><a class="waves-effect waves-dark" href="login1.html" target="_blank"><i class="icon-arrow-right"></i><span> Login 1</span></a></li>
                                <li><a class="waves-effect waves-dark" href="forgot-password.html" target="_blank"><i class="icon-arrow-right"></i><span> Forgot Password</span></a></li>
                                
                            </ul>
                        </li>
                        
                        <li><a class="waves-effect waves-dark" href="404.html" target="_blank"><i class="icon-arrow-right"></i> Error 404</a></li>
                        <li><a class="waves-effect waves-dark" href="sample-page.html"><i class="icon-arrow-right"></i> Sample Page</a></li>
                        
                    </ul>
                </li>


                <li class="nav-level">--- Menu Level</li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>Menu Level 1</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                Level Two
                            </a>
                        </li>
                        <li class="treeview">
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                <span>Level Two</span>
                                <i class="icon-arrow-down"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        Level Three
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        <span>Level Three</span>
                                        <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>-->
    </section>
</aside>
<!-- Sidebar-->