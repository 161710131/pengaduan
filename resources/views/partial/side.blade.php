<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            @role(['superadmin','admin','member'])
                            <li>
                                <a href="{{ Route('pertanyaan.index')}}" class="waves-effect"><i class="glyphicon glyphicon-inbox"></i><span> Pertanyaan </span></a>
                            </li>
                            @endrole
                            @role(['superadmin','admin','member'])
                            <li>
                                <a href="{{ Route('jawaban.index')}}" class="waves-effect"><i class="glyphicon glyphicon-send"></i><span> Jawaban </span></a>
                            </li>
                            @endrole
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                @role(['superadmin','admin'])
                                	<li class="nav-item">
                                    <a href="{{ Route('dataadmin.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o"></i>Data Admin</a>
                                    </li>
                                @endrole
                                @role(['superadmin','admin','member'])
                                    <li class="nav-item">
                                    <a href="{{ Route('datasiswa.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o"></i>Data Siswa</a>
                                    </li>
                                @endrole
                                @role(['superadmin','admin'])
                                    <li class="nav-item">
                                    <a href="{{ Route('kelas.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o"></i>Data Kelas</a>
                                    </li>
                                @endrole
                                @role(['superadmin','admin'])
                                    <li class="nav-item">
                                    <a href="{{ Route('jurusan.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o"></i>Data Jurusan</a>
                                    </li>
                                @endrole
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">For Help ?</h5>
                        <p class=""><span class="text-custom">Email:</span> <br/> fr12545@gmail.com</p>
                        <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+123) 123 456 789</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>