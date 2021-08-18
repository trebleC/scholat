<template>
  <div id="nav">
    <navbar />
  </div>
  <router-view />
</template>

<script>
import { Navbar } from "./views/layout/components/index";
export default {
  components: {
    Navbar,
  },
};
</script>

<style>
#app{
  min-width: 1200px;
}
body,
h1,
h2,
h3,
h4,
h5,
h6,
p,
dl,
dd {
  margin: 0;
}
ul,
ol {
  margin: 0;
  padding: 0;
  list-style: none;
}
img {
  border: none;
  vertical-align: top;
}
a {
  text-decoration: none;
}
</style>
