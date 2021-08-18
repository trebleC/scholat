<template>
  <div>
    <div class="main-container">
      <sidebar />
      <app-main />
    </div>
  </div>
</template>

<script>
import { Sidebar, AppMain } from "./components/index.js";
export default {
  name: "Layout",
  components: {
    Sidebar,
    AppMain,
  },
};
</script>

<style scoped>
.main-container {
  width: 100vw;
  height: calc(100vh - 70px);
  display: flex;
  background-color: #eee;
}
</style>
