<template>
  <!-- 导航栏 -->
  <div class="navbar">
    <router-link to="/">
      <img class="header-logo" src="@/assets/header_logo.png" alt="" />
    </router-link>
    <div class="nav-container">
      <div class="tab-container">
        <div
          v-for="(tab, index) in tabs"
          :class="['nav-tab', activeIndex == index ? 'active' : '']"
          :key="'tab' + index"
        >
          <span class="tab-name" @click="clickTab(tab, index)">
            {{ tab.name }}
          </span>
        </div>
      </div>
      <div class="info-container">
        <el-badge is-dot class="msg">消息</el-badge>

        <el-dropdown @command="handleCommand">
          <div class="info">
            <img class="profile" src="@/assets/profile.jpeg" alt="" />
            <div class="name">派小星</div>
            <i class="el-icon-arrow-down el-icon--right"></i>
          </div>
          <template #dropdown>
            <el-dropdown-menu>
              <el-dropdown-item icon="el-icon-user" command="personInfo"
                >个人中心</el-dropdown-item
              >
              <el-dropdown-item icon="el-icon-setting" command="personSetting"
                >设置</el-dropdown-item
              >
              <el-dropdown-item icon="el-icon-switch-button" command="logout"
                >退出</el-dropdown-item
              >
            </el-dropdown-menu>
          </template>
        </el-dropdown>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "navbar",
  data() {
    return {
      activeIndex: 0,
      tabs: [
        {
          name: "首页",
          value: "",
        },
        {
          name: "行业信息",
          value: "industryInfo",
        },
        {
          name: "成绩查询",
          value: "queryScore",
        },
        {
          name: "留言板",
          value: "msgBoard",
        },
      ],
    };
  },
  created() {},
  mounted() {},
  methods: {
    clickTab(tab, index) {
      this.activeIndex = index;
      this.$router.push("/" + tab.value);
    },
    handleCommand(command) {
      console.log(command);
    },
  },
};
</script>

<style scoped>
.navbar {
  width: 100vw;
  height: 70px;
  background: #ebebeb;
  display: flex;
  display: flex;
  align-items: center;
  padding: 0 20px;
  box-sizing: border-box;
}
.header-logo {
  width: 120px;
  margin-right: 50px;
}
.tab-container {
  display: flex;
  height: 100%;
  line-height: 40px;
  width: 410px;
  align-items: center;
}
.nav-tab {
  text-align: center;
  width: 25%;
  font-size: 14px;
  font-weight: bold;
  position: relative;
}
.tab-name {
  cursor: pointer;
}
.active::after {
  content: "";
  display: inline-block;
  position: absolute;
  width: 20px;
  height: 2px;
  background: #ff8135;
  bottom: 0;
  left: 40px;
}
.nav-container {
  width: 80%;
  height: 100%;
  display: flex;
  justify-content: space-between;
}
.info-container {
  display: flex;
  justify-content: flex-end;
}
.info-container .msg {
  height: 100%;
  display: flex;
  align-items: center;
  /* line-height: 70px; */
  font-size: 14px;
  margin-right: 30px;
  cursor: pointer;
}
.info {
  height: 100%;
  display: flex;
  align-items: center;
  cursor: pointer;
  justify-content: flex-end;
}
.profile {
  width: 40px;
  height: 40px;
  border-radius: 5px;
}
.info .name {
  font-size: 14px;
  margin-left: 10px;
  max-width: 60px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
.navbar /deep/ .el-badge__content.is-fixed.is-dot {
  right: 0;
  top: 25px;
}
.navbar /deep/ .el-badge__content--primary {
  background-color: #ff8135;
}
.navbar /deep/ .el-badge__content {
  border: 0;
}
</style>
<style></style>
