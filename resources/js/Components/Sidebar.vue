<template>
  <aside class="sidebar">
    <div class="logo">Ace Admin</div>
    <nav>
      <a href="#" class="nav-link">📊 Дашборд</a>
      <a href="#" class="nav-link">⚙️ Налаштування</a>
    </nav>
  </aside>
</template>

<style scoped>
.sidebar {
  width: 260px;
  background: #111827;
  color: white;
  padding: 1.5rem;
}
.logo {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 2rem;
  color: #6366f1;
}
.nav-link {
  display: block;
  padding: 0.75rem;
  color: #d1d5db;
  text-decoration: none;
}
.nav-link:hover {
  background: #1f2937;
  border-radius: 0.5rem;
}
</style>
