<template>
    <nav class="sidebar">
        <div class="sidebar-header">
            <!-- <img src="../../../public/img/centro-paula-souza-logo.svg" alt="Logo CPS" class="sidebar-logo"> -->
            <h3>Menu</h3>
        </div>
      <ul class="d-flex flex-column">
        <!-- Validar publicações -->
        <li class="btn_sidebar nav-item">
          <button @click.prevent="toggleSubmenu" data-bs-toggle="collapse" data-bs-target="#submenu" aria-expanded="false" aria-controls="submenu">Validar Publicações</button>
            <ul v-if="isSubmenuOpen" class="nav flex-column">
              <li class="nav-item ms-3 my-3"><Link href="#">Publicações</Link></li>
              <li class="nav-item ms-3"><Link href="#">Validar</Link></li>
            </ul>
        </li>

        <!-- Cursos -->
        <li class="btn_sidebar nav-item">
          <button @click.prevent="toggleSubmenu" data-bs-toggle="collapse" data-bs-target="#submenu" aria-expanded="false" aria-controls="submenu">Cursos</button>
            <ul v-if="isSubmenuOpen" class="nav flex-column">
              <li class="nav-item ms-3 my-3"><Link href="#">Publicações</Link></li>
              <li class="nav-item ms-3"><Link href="#">Validar</Link></li>
            </ul>
        </li>
        <li class="btn_sidebar"><Link href="#">Criar Usuários</Link></li>
        <li class="btn_sidebar"><Link href="#">Item 4</Link></li>
        <li class="btn_sidebar"><Link href="#">Item 5</Link></li>
      </ul>

        <footer>
          <div class="dropdown dropup">
              <button class="btn btn-secondary btn-l dropdown-toggle border border-0 dropup me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class='bx bx-user'></i>
              {{ $page.props.auth.user.name }}
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                  <li><Link class="dropdown-item" :href="route('profile.edit')"><i class='bx bx-user me-2'></i>Perfil</Link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><Link class="dropdown-item" :href="route('inicial.index')"><i class='bx bx-cog me-2'></i>Início</Link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><Link class="dropdown-item" :href="route('postagens.store')"><i class='bx bx-edit-alt me-2'></i>Criar publicação</Link></li>
                  <li><hr class="dropdown-divider"></li>
                  <Link method="POST" class="dropdown-item" as="button" :href="route('logout')">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Sair</span>
                  </Link>
              </ul> 
          </div>
        </footer>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "Sidebar",
    components: {
      Link
    },
    data() {
      return {
        isSubmenuOpen: false
      }
    },
    methods: {
      toggleSubmenu() {
        this.isSubmenuOpen = !this.isSubmenuOpen;
      }
  }
}
</script>

<style>
.sidebar {
  background-color: #b20000;
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  padding-top: 20px;
  color: #fff;
  max-width: calc(100% - 20px); /* limite de 20px para a margem esquerda */
}

.btn_sidebar {
  text-align: left;
  padding: 0;
}

.sidebar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.d-flex > li {
  padding: 15px;
  font-size: 1.2rem;
  /* background-color: #36413E; */
  margin-bottom: 5px;
}

.d-flex > li:hover {
  background-color: #555;
}

.sidebar-header {
  text-align: center;
  margin-bottom: 30px;
}

.sidebar-header h3 {
  margin: 0;
  font-size: 1.8rem;
  font-weight: 600;
}

.d-flex > a {
  color: #fff;
  text-decoration: none;
}

.sidebar-logo {
  max-width: 80%;
  margin-bottom: 20px;
}

.sidebar footer {
  background-color: #b20000;
  color: #fff;
  text-align: center;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 50px;
  line-height: 30px;
}

.sidebar footer p {
  margin: 0;
}

a {
  text-decoration: none;
}
</style>