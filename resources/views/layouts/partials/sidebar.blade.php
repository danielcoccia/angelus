 <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                        @php
                            $perfis = session()->get('usuario.perfis');
                            $perfil_adm = str_contains($perfis, '1');
                            $perfil_ger = str_contains($perfis, '2');
                            $perfil_aux = str_contains($perfis, '3');
                            $perfil_vol = !($perfil_adm || $perfil_ger || $perfil_aux);
                        @endphp

                        {{-- Controle de Acceso --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-key-outline"></i>
                                <span>Controle e Acesso</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/gerenciar-pessoa" class="waves-effect"><span>Pessoa</span></a></li>
                                @if(!$perfil_vol)
                                    <li><a href="/gerenciar-entidade" class="waves-effect"><span>Entidade</span></a></li>
                                    @endif
                                @if($perfil_adm)
                                    <li><a href="/gerenciar-usuario" class="waves-effect"><span>Usuario</span></a></li>
                                @endif
                            </ul>
                        </li>

                        {{-- Catalogo --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-file-document-edit-outline"></i>
                                <span>Catalogo</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/gerenciar-item-catalogo" class="waves-effect"><span>Item Catalogo</span></a></li>
                                <li><a href="/gerenciar-composicao" class="waves-effect"><span>Composição</span></a></li>
                           </ul>
                        </li>

                        {{-- Configurações --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-wrench"></i>
                                <span>Configurações</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <!-- <li><a href="/produtos/cad-inicial-prod" class="waves-effect"><span>Inicial</span></a></li> -->
                                <li><a href="/cad-cat-material" class="waves-effect"><span>Categoria Material</span></a></li>
                                @if($perfil_adm || $perfil_ger)
                                    <li><a href="/cad-tipo-estoque" class="waves-effect"><span>Tipo Estoque</span></a></li>
                                @endif
                                @if(!$perfil_vol)
                                    <li><a href="/deposito" class="waves-effect"><span>Depósito</span></a></li>
                                    <li><a href="/localizador" class="waves-effect"><span>Localizador</span></a></li>
                                    <li><a href="/cad-pagamento" class="waves-effect"><span>Pagamento</span></a></li>
                                    <li><a href="/cad-valor-avariado" class="waves-effect"><span>Valor Item Avariado</span></a></li>
                                @endif
                                <li><a href="/cad-embalagem" class="waves-effect"><span>Embalagem</span></a></li>
                                <li><a href="/unidade-medida" class="waves-effect"><span>Unidade de Medida</span></a></li>
                                <li><a href="/cad-tipo-material" class="waves-effect"><span>Tipo de Material</span></a></li>
                                <li><a href="/marca" class="waves-effect"><span>Marca</span></a></li>
                                <li><a href="/tamanho" class="waves-effect"><span>Tamanho</span></a></li>
                                <li><a href="/cor" class="waves-effect"><span>Cor</span></a></li>
                                <li><a href="/fase-etaria" class="waves-effect"><span>Fase Etária</span></a></li>
                                <li><a href="/cad-genero" class="waves-effect"><span>Genero</span></a></li>
                                @if(!$perfil_vol)
                                    <li><a href="/cad-sit-doacao" class="waves-effect"><span>Situação Doação </span></a></li>
                                @endif
                            </ul>
                        </li>

                        {{-- Cadastro inicial --}}
                        <li>
                            <a href="/gerenciar-cadastro-inicial" class="waves-effect">
                                <i class="mdi mdi-stack-overflow"></i>
                                <span>Cadastro inicial</span>
                            </a>
                        </li>


                        {{-- Vendas de material --}}

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-cart-outline"></i>
                                <span>Vendas de material</span>
                            </a>

                            <ul class="sub-menu" aria-expanded="false">
                               @if(!$perfil_vol)
                               <li><a href="/gerenciar-vendas" class="waves-effect"><span>Gerenciar vendas</span></a></li>
                               <li><a href="/registrar-venda" class="waves-effect"><span>Registrar Venda</span></a></li>
                               @endif
                               @if($perfil_ger)
                               <li><a href="/gerenciar-desconto" class="waves-effect"><span>Gerenciar Descontos</span></a></li>
                               @endif
                            </ul>
                        </li>

                        {{-- Documentos --}}
                        @if(!$perfil_vol)
                        <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-library-books"></i>
                                <span>Documentos</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/inventarios" class="waves-effect"><span>Inventário de material</span></a></li>
                                <li><a href="/relatorio-vendas" class="waves-effect"><span>Relatório de Vendas</span></a></li>
                                <li><a href="/relatorio-entrada" class="waves-effect"><span>Relatório de Entradas</span></a></li>
                            </ul>
                        </li>
                        @endif



                        <!-- <li>
                            <a href="/cadastro/usuario" class="waves-effect">
                                <i class="mdi mdi-account-multiple-plus-outline"></i><span class="badge badge-pill badge-primary float-right"></span>
                                <span>Cadastrar Usuario</span>
                            </a>
                        </li> -->



                        <!-- <li>
                            <a href="/calendar/calendar" class=" waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span>Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-email-outline"></i>
                                <span>Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/email/email-inbox">Inbox</a></li>
                                <li><a href="/email/email-read">Email Read</a></li>
                                <li><a href="/email/email-compose">Email Compose</a></li>
                            </ul>
                        </li> -->

                        <!-- <li class="menu-title">Components</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-buffer"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/ui/ui-alerts">Alerts</a></li>
                                    <li><a href="/ui/ui-buttons">Buttons</a></li>
                                    <li><a href="/ui/ui-badge">Badge</a></li>
                                    <li><a href="/ui/ui-cards">Cards</a></li>
                                    <li><a href="/ui/ui-carousel">Carousel</a></li>
                                    <li><a href="/ui/ui-dropdowns">Dropdowns</a></li>
                                    <li><a href="/ui/ui-grid">Grid</a></li>
                                    <li><a href="/ui/ui-images">Images</a></li>
                                    <li><a href="/ui/ui-lightbox">Lightbox</a></li>
                                    <li><a href="/ui/ui-modals">Modals</a></li>
                                    <li><a href="/ui/ui-pagination">Pagination</a></li>
                                    <li><a href="/ui/ui-popover-tooltips">Popover &amp; Tooltips</a></li>
                                    <li><a href="/ui/ui-rangeslider">Range Slider</a></li>
                                    <li><a href="/ui/ui-session-timeout">Session Timeout</a></li>
                                    <li><a href="/ui/ui-progressbars">Progress Bars</a></li>
                                    <li><a href="/ui/ui-sweet-alert">Sweet-Alert</a></li>
                                    <li><a href="/ui/ui-tabs-accordions">Tabs &amp; Accordions</a></li>
                                    <li><a href="/ui/ui-typography">Typography</a></li>
                                    <li><a href="/ui/ui-video">Video</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-clipboard-outline"></i>
                                <span class="badge badge-pill badge-success float-right">6</span>
                                <span>Forms</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/form/form-elements">Form Elements</a></li>
                                <li><a href="/form/form-validation">Form Validation</a></li>
                                <li><a href="/form/form-advanced">Form Advanced</a></li>
                                <li><a href="/form/form-editors">Form Editors</a></li>
                                <li><a href="/form/form-uploads">Form File Upload</a></li>
                                <li><a href="/form/form-xeditable">Form Xeditable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/charts/charts-morris">Morris Chart</a></li>
                                <li><a href="/charts/charts-chartist">Chartist Chart</a></li>
                                <li><a href="/charts/charts-chartjs">Chartjs Chart</a></li>
                                <li><a href="/charts/charts-flot">Flot Chart</a></li>
                                <li><a href="/charts/charts-c3">C3 Chart</a></li>
                                <li><a href="/charts/charts-other">Jquery Knob Chart</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-format-list-bulleted-type"></i>
                                <span>Tables</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/tables/tables-basic">Basic Tables</a></li>
                                <li><a href="/tables/tables-datatable">Data Table</a></li>
                                <li><a href="/tables/tables-responsive">Responsive Table</a></li>
                                <li><a href="/tables/tables-editable">Editable Table</a></li>
                            </ul>
                        </li>



                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-album"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/icons/icons-material">Material Design</a></li>
                                <li><a href="/icons/icons-ion">Ion Icons</a></li>
                                <li><a href="/icons/icons-fontawesome">Font Awesome</a></li>
                                <li><a href="/icons/icons-themify">Themify Icons</a></li>
                                <li><a href="/icons/icons-dripicons">Dripicons</a></li>
                                <li><a href="/icons/icons-typicons">Typicons Icons</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <span class="badge badge-pill badge-danger float-right">2</span>
                                <i class="mdi mdi-google-maps"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/maps/maps-google"> Google Map</a></li>
                                <li><a href="/maps/maps-vector"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Extras</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-responsive"></i>
                                <span> Layouts </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/pagelayouts/layouts-horizontal">Horizontal</a></li>
                                <li><a href="/pagelayouts/layouts-light-sidebar">Light Sidebar</a></li>
                                <li><a href="/pagelayouts/layouts-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="/pagelayouts/layouts-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="/pagelayouts/layouts-boxed">Boxed Layout</a></li>
                                <li><a href="/pagelayouts/layouts-preloader">Preloader</a></li>
                                <li><a href="/pagelayouts/layouts-colored-sidebar">Colored Sidebar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-account-box"></i>
                                <span> Authentication </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/pages/pages-login">Login</a></li>
                                <li><a href="/pages/pages-register">Register</a></li>
                                <li><a href="/pages/pages-recoverpw">Recover Password</a></li>
                                <li><a href="/pages/pages-lock-screen">Lock Screen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-google-pages"></i>
                                <span> Extra Pages </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/pages/pages-timeline">Timeline</a></li>
                                <li><a href="/pages/pages-invoice">Invoice</a></li>
                                <li><a href="/pages/pages-directory">Directory</a></li>
                                <li><a href="/pages/pages-blank">Blank Page</a></li>
                                <li><a href="/pages/pages-404">Error 404</a></li>
                                <li><a href="/pages/pages-500">Error 500</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-share-variant"></i>
                                <span>Multi Level</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 1.1</a></li>
                                <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="javascript: void(0);">Level 2.1</a></li>
                                        <li><a href="javascript: void(0);">Level 2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
