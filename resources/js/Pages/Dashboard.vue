<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import Sidebar from "../Components/Sidebar.vue";
</script>

<template>
  <AppLayout>
    <template #sidebar>
      <Sidebar />
    </template>

    <template #header>
      <header class="top-header">Панель керування</header>
    </template>

    <div class="card">
      <h1>Ласкаво просимо!</h1>
      <p>Це ваш автономний шаблон адмінки на Vue-компонентах.</p>
    </div>
  </AppLayout>
</template>

<style scoped>
.top-header {
  background: white;
  padding: 1rem 2rem;
  border-bottom: 1px solid #e5e7eb;
  font-weight: 600;
}
.card {
  background: white;
  padding: 2rem;
  border-radius: 0.75rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
</style>
