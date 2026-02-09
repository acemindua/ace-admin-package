import { createApp } from "vue";
import "../css/app.css"; // Імпортуємо стилі тут
import Dashboard from "./Pages/Dashboard.vue";

const app = createApp(Dashboard);
app.mount("#admin-root");
