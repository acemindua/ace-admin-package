import { createApp } from "vue";
const app = createApp({
  data() {
    return { message: "Ace Admin працює!" };
  },
  template: "<h1>{{ message }}</h1>",
});
app.mount("#admin-root");
