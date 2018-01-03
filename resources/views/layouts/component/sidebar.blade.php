<div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/home"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
          </li>

          <li class="nav-title">
            Manage
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-grid"></i> Master</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item"><a class="nav-link" href="{{ url('santri') }}"><i class="icon-user"></i> Santri </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('pengajar') }}"><i class="icon-user"></i> Pengajar </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('staff') }}"><i class="icon-user"></i> Staff </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('level') }}"><i class="icon-layers"></i> Level </a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('semester') }}"><i class="icon-star"></i> Semester </a></li>
              <li class="nav-item"><a class="nav-link" onclick="alert('coming soon')"><i class="icon-map"></i> Lokasi </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('kelas') }}"><i class="icon-home"></i> Kelas </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('peserta') }}"><i class="icon-people"></i> Peserta </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('infaq') }}"><i class="icon-calculator"></i> Infaq </a>
          </li>

          <li class="divider"></li>
          <li class="nav-title">
            Extras
          </li>
          <li class="nav-item">
            <a class="nav-link" href="widgets.html"><i class="icon-settings"></i> Settings </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="widgets.html"><i class="icon-logout"></i> Logout </a>
          </li>


        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>