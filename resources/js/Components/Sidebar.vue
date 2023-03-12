<template>
    <nav class="sidebar">
        <div class="sidebar-header">
            <img src="../../../public/img/centro-paula-souza-logo.svg" alt="Logo CPS" class="sidebar-logo">
            <h3>Menu</h3>
        </div>
      <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
        <li><a href="#">Item 4</a></li>
        <li><a href="#">Item 5</a></li>
      </ul>
        <footer>
          <p>© 2023 - Leo Carv</p>
        </footer>
    </nav>
</template>

<script>
export default {
    name: "Sidebar"
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
}

.sidebar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  padding: 15px;
  font-size: 1.2rem;
}

.sidebar li:hover {
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

.sidebar a {
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
  line-height: 50px;
}

.sidebar footer p {
  margin: 0;
}
</style>