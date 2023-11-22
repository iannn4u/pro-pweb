<nav class="navbar navbar-expand-lg px-5" style="background: rgba(255, 255, 255, .6);">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-flex gap-3">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'fw-bold' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('guru')) ? 'fw-bold' : '' }}" href="/guru">Guru</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('mapel')) ? 'fw-bold' : '' }}" href="/mapel">Mapel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('kelas')) ? 'fw-bold' : '' }}" href="/kelas">Kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('siswa')) ? 'fw-bold' : '' }}" href="/siswa">Siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('nilai')) ? 'fw-bold' : '' }}" href="/nilai">Nilai</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>