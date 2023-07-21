<section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview active menu-open{{ (Request::segment(5) == 'master') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-home" aria-hidden="true"></i><span>Jasa Medika</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li
                    class="{{ (Request::path() == 'kelurahan') ? 'active' : '' }} menu-sidebar">
                    <a href="{{ url('kelurahan') }}"><i
                            class="fa fa-circle-o"></i>Data Kelurahan</a>
                </li>
                <li
                    class="{{ (Request::path() == 'pasien') ? 'active' : '' }} menu-sidebar">
                    <a href="{{ url('pasien') }}"><i
                            class="fa fa-circle-o"></i>Pasien</a>
                </li>
            </ul>
        </li>
    </ul>
</section>
