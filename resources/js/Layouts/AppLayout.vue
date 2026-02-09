<template>
  <div class="ace-admin-layout">
    <slot name="sidebar"></slot>
    <div class="main-wrapper">
      <slot name="header"></slot>
      <main class="content-area">
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<style scoped>
.ace-admin-layout {
  display: flex;
  min-height: 100vh;
  font-family: "Inter", sans-serif;
}
.main-wrapper {
  flex: 1;
  display: flex;
  flex-direction: column;
  background: #f9fafb;
}
.content-area {
  padding: 2rem;
}
</style>
