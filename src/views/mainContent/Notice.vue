<template>
  <div class="notcie">
    <h2 style="margin-bottom:20px">公告</h2>
    <div class="notice-content">
        <ul>
            <li v-for="(item,index) in list" :key="'notice_'+index">
              <div class="title">{{item.title}}</div>
              <div class="content">{{item.content}}</div>
              <div class="author">{{item.author}}</div>
              <div class="time">{{item.time}}</div>
            </li>
        </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "notice",
  data(){
    return {
      list:[{
        title:'关于提前结课的通知',
        content:'三次作业:6,7,14章的截止提交时间改为2.4日',
        time:'2019/01/31 20:55',
        author:'王老师'
      },
      {
        title:'关于提前结课的通知',
        content:'三次作业:6,7,14章的截止提交时间改为2.4日',
        time:'2019/01/31 20:55',
        author:'王老师'
      },
      {
        title:'关于提前结课的通知',
        content:'三次作业:6,7,14章的截止提交时间改为2.4日',
        time:'2019/01/31 20:55',
        author:'王老师'
      },
      {
        title:'关于提前结课的通知',
        content:'三次作业:6,7,14章的截止提交时间改为2.4日',
        time:'2019/01/31 20:55',
        author:'王老师'
      }
      ]
    }
  }
};
</script>

<style>
.notice-content li{
  border-bottom: 1px solid #ebebeb;
  margin-bottom: 20px;
}
.notice-content li .title{
   font-size: 18px;
   margin-bottom: 10px;
}
.notice-content li .content{
  font-size: 14px;
  color: #666;
}
.notice-content li .author{
  font-size: 14px;
  text-align: right;
}
.notice-content li .time{
  font-size: 12px;
  text-align: right;
  margin-bottom: 20px;
}
</style>
