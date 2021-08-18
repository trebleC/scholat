<template>
  <div class="sidebar">
    <div class="sidebar-content">
      <img class="lesson_logo" src="@/assets/lesson_logo.jpeg" alt="" />
      <ul>
        <li
          v-for="(tab, index) in tabs"
          :key="'sideTab_' + index"
          :class="{ active: activeIndex == index }"
          @click="clickSideTab(tab, index)"
        >
          {{ tab.name }}
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  name: "sidebar",
  data() {
    return {
      activeIndex: 0,
      tabs: [
        {
          name: "公告",
          value: "notice",
        },
        {
          name: "评分标准",
          value: "sorceRule",
        },
        {
          name: "课件",
          value: "sources",
        },
        {
          name: "测验与作业",
          value: "task",
        },
        {
          name: "考试",
          value: "exam",
        },
        {
          name: "讨论区",
          value: "discussion",
        },
      ],
    };
  },
  methods: {
    clickSideTab(tab, index) {
      this.activeIndex = index;
      this.$router.push(tab.value)
      console.lob(tab);
    },
  },
};
</script>

<style scoped>
.sidebar {
  width: 240px;
  height: 100%;
}
.sidebar-content {
  margin-left: 10px;
  margin-top: 15px;
}
.lesson_logo {
  width: 230px;
  height: 130px;
  border-radius: 6px;
}
ul {
  width: 230px;
  background-color: #fff;
  margin-top: 10px;
}
li {
  padding: 16px 20px;
  box-sizing: border-box;
  border-bottom: 1px solid #f7f7f7;
  cursor: pointer;
  color: #343d42;
}
li:last-child {
  border-bottom: 0;
}
li:hover {
  background-color: #f8f8f8;
  color: #00cc7e;
}
.active:hover {
  background-color: #00cc7e;
  color: #ffffff;
}
.active {
  background-color: #00cc7e;
  color: #ffffff;
}
</style>
