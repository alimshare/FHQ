<div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="icon-speedometer"></i> Dashboard <!-- <span class="badge badge-primary">NEW</span> --></a>
          </li>

          <li class="nav-title">
            Manage
          </li>
          <!-- <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-grid"></i> Master</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item"><a class="nav-link" href="{{ url('santri') }}"><i class="icon-user"></i> Santri </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('pengajar') }}"><i class="icon-user"></i> Pengajar </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('staff') }}"><i class="icon-user"></i> Staff </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('level') }}"><i class="icon-layers"></i> Level </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('semester') }}"><i class="icon-graduation"></i> Semester </a></li>
              <li class="nav-item"><a class="nav-link" onclick="alert('coming soon')"><i class="icon-book-open"></i> Buku </a></li>
              <li class="nav-item"><a class="nav-link" onclick="alert('coming soon')"><i class="icon-map"></i> Lokasi </a></li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('master') }}"><i class="icon-grid"></i> Master </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('kelas') }}"><i class="icon-home"></i> Kelas </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('peserta') }}"><i class="icon-people"></i> Peserta </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('infaq/add') }}"><i class="icon-calculator"></i> Infaq </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('pembelian/add') }}"><i class="fa fa-cart-plus"></i> Pembelian </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('laporan') }}"><i class="fa fa-print"></i> Laporan </a>
          </li>

          <li class="divider"></li>

          <li class="nav-title">
            Extras
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('saran') }}"><i class="icon-notebook"></i> Kritik & Saran </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('testimoni') }}"><i class="icon-star"></i> Testimoni </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="widgets.html"><i class="icon-settings"></i> Settings </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-logout"></i> Logout </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>


        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>