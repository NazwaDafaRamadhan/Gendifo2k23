<!-- Sidebar -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ '/dashboard' }}" target="_blank">
          <img src="" class="navbar-brand-img h-100" alt="">
          <span class="ms-1 font-weight-bold">Gendro Digital Platform</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="{{ '/dashboard' }}" onclick="sidebarColor(this)">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ '/budaya-admin' }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-palette text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data Budaya</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ '/produk-admin' }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-cart text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ '/wisata-admin' }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-square-pin text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data Wisata</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ '/kegiatan-admin' }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data Kegiatan</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-85 mx-auto" src="../img/logo-gendifo-besar.png" alt="logo-gendifo">
          <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
              <h6 class="mb-0"></h6>
              <p class="text-xs font-weight-bold mb-0"></p>
              <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm w-100 mb-3">Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </aside>
<!-- End Sidebar -->