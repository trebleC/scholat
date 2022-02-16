/*
Navicat MySQL Data Transfer

Source Server         : eng
Source Server Version : 50724
Source Host           : 127.0.0.1:3308
Source Database       : software_eng

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-06-26 18:59:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for anouncement
-- ----------------------------
DROP TABLE IF EXISTS `anouncement`;
CREATE TABLE `anouncement` (
  `anid` int(8) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '1',
  `coid` int(11) NOT NULL DEFAULT '1',
  `adate` datetime NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(100) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'n',
  `read_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`anid`),
  KEY `anounce_refer_teacher` (`tid`),
  KEY `anounce_refer_course` (`coid`),
  CONSTRAINT `anounce_refer_course` FOREIGN KEY (`coid`) REFERENCES `course` (`coid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anounce_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anouncement
-- ----------------------------
INSERT INTO `anouncement` VALUES ('2', '1', '1', '2016-12-08 00:00:00', '课程资料已经上传', '同学们快下载', 'n', '0');
INSERT INTO `anouncement` VALUES ('3', '3', '3', '2016-12-30 00:00:00', '课程资料已经上传', '同学们快下载', 'e', '0');
INSERT INTO `anouncement` VALUES ('4', '3', '2', '2016-12-29 00:00:00', '课程时间变了', '注意注意', 'e', '0');
INSERT INTO `anouncement` VALUES ('5', '2', '2', '2019-04-12 20:06:41', '测试2', '测试内容2', 'n', '0');
INSERT INTO `anouncement` VALUES ('13', '2', '2', '2019-04-12 20:06:41', 'title1', '1111', 'n', '0');
INSERT INTO `anouncement` VALUES ('32', '2', '1', '2016-12-16 00:00:00', '很高兴', '我成为了你的教师啊哈哈哈哈哈哈', 'n', '0');
INSERT INTO `anouncement` VALUES ('42', '1', '1', '2019-05-28 10:55:00', '0.23.1235', '563', 'n', '0');
INSERT INTO `anouncement` VALUES ('43', '1', '1', '2019-06-01 18:13:00', '今天天气', '很好啊.', 'n', '0');

-- ----------------------------
-- Table structure for attend
-- ----------------------------
DROP TABLE IF EXISTS `attend`;
CREATE TABLE `attend` (
  `sid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  KEY `attent_refer_student` (`sid`),
  KEY `attend_refer_class` (`clid`),
  KEY `attend_refer_group` (`gid`),
  CONSTRAINT `attend_refer_class` FOREIGN KEY (`clid`) REFERENCES `class` (`clid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attend_refer_group` FOREIGN KEY (`gid`) REFERENCES `study_group` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attent_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attend
-- ----------------------------
INSERT INTO `attend` VALUES ('10001', '1', '1');
INSERT INTO `attend` VALUES ('10003', '1', '1');
INSERT INTO `attend` VALUES ('10004', '1', '1');
INSERT INTO `attend` VALUES ('10002', '1', '2');
INSERT INTO `attend` VALUES ('10005', '1', '2');
INSERT INTO `attend` VALUES ('10006', '1', '2');
INSERT INTO `attend` VALUES ('10002', '5', '3');
INSERT INTO `attend` VALUES ('10005', '5', '3');
INSERT INTO `attend` VALUES ('10004', '5', '4');
INSERT INTO `attend` VALUES ('10001', '4', '5');
INSERT INTO `attend` VALUES ('10005', '4', '5');
INSERT INTO `attend` VALUES ('10006', '4', '5');
INSERT INTO `attend` VALUES ('10002', '4', '6');
INSERT INTO `attend` VALUES ('10004', '4', '6');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `clid` int(11) NOT NULL AUTO_INCREMENT,
  `coid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cltime` varchar(40) NOT NULL,
  `place` varchar(30) NOT NULL,
  `student_num` int(11) NOT NULL,
  PRIMARY KEY (`clid`),
  KEY `class_refer_course` (`coid`),
  KEY `class_refer_teacher` (`tid`),
  CONSTRAINT `class_refer_course` FOREIGN KEY (`coid`) REFERENCES `course` (`coid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `class_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '1', '1', '周四12', '1-101', '80');
INSERT INTO `class` VALUES ('2', '1', '2', '周一678', '2-202', '28');
INSERT INTO `class` VALUES ('3', '1', '1', '周五678', '3-301', '12');
INSERT INTO `class` VALUES ('4', '2', '2', '不用时间', '30舍232', '20');
INSERT INTO `class` VALUES ('5', '2', '3', '两年', '中国·北京·三里屯', '42');
INSERT INTO `class` VALUES ('6', '3', '3', '周日21893', '埃菲尔铁塔', '29');
INSERT INTO `class` VALUES ('7', '1', '1', '周五12-13', ' 没有', '30');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `coid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `comid` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `from_id` varchar(255) DEFAULT '10001',
  `to_id` varchar(255) DEFAULT '10001',
  `likes` int(200) unsigned DEFAULT '0',
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`typeid`,`comid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '0', '这是评论正文', '10001', '10001', '71', '2019-06-20 08:57:16');
INSERT INTO `comment` VALUES ('1', '1', '1', '二楼', '10002', '10001', '22', '2019-04-28 10:14:30');
INSERT INTO `comment` VALUES ('1', '2', '0', '111', '10003', '10002', '11', '2019-04-30 22:16:52');
INSERT INTO `comment` VALUES ('1', '3', '0', '1', '10004', '10003', '3', '2019-05-28 20:09:54');
INSERT INTO `comment` VALUES ('1', '2', '1', '2', '10002', '10004', '3', '2019-04-30 22:16:56');
INSERT INTO `comment` VALUES ('1', '1', '2', '0正文', '10001', '10001', '1', '2019-04-28 10:14:41');
INSERT INTO `comment` VALUES ('1', '1', '3', 'zaizheli', '10001', '10002', '4', '2019-04-30 22:11:15');
INSERT INTO `comment` VALUES ('1', '1', '4', '@3140102352:', '10001', '10001', '0', '2019-05-04 23:03:07');
INSERT INTO `comment` VALUES ('1', '1', '5', 'xcxcv cv ', '10001', '10001', '0', '2019-05-04 23:05:00');
INSERT INTO `comment` VALUES ('1', '1', '6', '我是这节课的呀', '10001', '10001', '0', '2019-05-04 23:05:00');
INSERT INTO `comment` VALUES ('1', '1', '7', '@小明:你的', '10001', '10001', '0', '2019-05-04 23:06:00');
INSERT INTO `comment` VALUES ('1', '2', '2', '下次许', '10001', '10001', '0', '2019-05-04 23:06:00');
INSERT INTO `comment` VALUES ('1', '1', '8', '@张二2:45454645', '10001', '10001', '0', '2019-05-28 20:08:00');
INSERT INTO `comment` VALUES ('1', '1', '9', '@王一1:6456456', '10001', '10001', '0', '2019-05-28 20:09:00');
INSERT INTO `comment` VALUES ('1', '3', '1', '546456456', '10001', '10001', '0', '2019-05-28 20:09:00');
INSERT INTO `comment` VALUES ('1', '3', '2', '546456456', '10001', '10001', '0', '2019-05-28 20:09:00');
INSERT INTO `comment` VALUES ('1', '3', '3', '123132', '10001', '10001', '0', '2019-05-28 20:10:00');
INSERT INTO `comment` VALUES ('1', '1', '10', 'ss', '10001', '10001', '0', '2019-06-19 21:20:00');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `coname` varchar(20) NOT NULL,
  `score_standard` varchar(255) DEFAULT NULL,
  `textbook` varchar(40) DEFAULT NULL,
  `cocode` varchar(10) NOT NULL,
  `cotype` varchar(20) NOT NULL,
  `semster` varchar(10) NOT NULL,
  `coname_en` varchar(60) NOT NULL,
  `college` varchar(30) NOT NULL,
  `credit` float(2,1) NOT NULL,
  `week_learn_time` int(11) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `pre_learning` varchar(200) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `background` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `project_info` varchar(100) NOT NULL,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '软件项目管理', null, '《软件项目管理》', '21010211', '专业课', '秋冬', 'SRE', '计算机学院', '4.0', '5', '1.0-1.0', '软件工程基础、C语言程序设计', '函数在一点连续的概念，间断点的分类，单侧连续性。连续函数的四则运算，复合函数的连续性。反函数的连续性（可不证）。初等函数的连续性。利用连续性计算极限。闭区间上连续函数的重要性质：有界性定理、介值定理和最大最小值定理（不证）', '   《微积分》是以函数为研究对象，运用极限手段（如无穷小与无穷逼近等极限过程），分析处理问题的一门数学学科，学时数为80学时。课程将采用讲授与讨论相结合的方法。', '教学内容有：函数极限与连续、一元函数的微分学、一元函数的积分学、无穷级数。', 'http://10.2nsun&courseWebsiteId=1ask了都塞一个了肯定就噶似的雾化器的好');
INSERT INTO `course` VALUES ('2', '茶与自然', null, '《周易妈妈的话》', 'M1010211', '通识课', '冬', 'Tea&Nature', '浙大茶学院', '1.0', '3', '0.0-1.0', '没有哦', '红茶绿茶黑茶大白茶啊哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈', '改配合你演出的我演视而不见改配合你演出的我演视而不见改配合你演出的我演视而不见改配合你演出的我演视而不见改配合你演出的我演视而不见改配合你演出的我演视而不见', '教学内容有：好多好多好多哦', '我没什么好说的');
INSERT INTO `course` VALUES ('3', '计算机网络', null, '《网络实践》', '2KFJ0211', '专业课', '秋', 'NETWORK', '计算机学院', '2.0', '5', '1.0-1.0', 'C语言程序设计，Java语言程序设计', '这里好像应该写得很长...', '代理会做CACHE哦，我要怎么憋出100字啊哈哈哈哈哈开洒机会啊是的噢3のuiu个对啊是孤独日文是怎么打出来的？？？！', '我们就不做多大的要求了，动态媒体JPEG压缩基础', 'lksdjfguew=3294832894了都塞一个了肯定就噶似的雾化器的好');
INSERT INTO `course` VALUES ('4', '软件工程', null, null, '20190101', '专业课', '秋', 'softwarem', '电气', '2.0', '3', '1', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for course_rule
-- ----------------------------
DROP TABLE IF EXISTS `course_rule`;
CREATE TABLE `course_rule` (
  `ruleID` int(11) NOT NULL AUTO_INCREMENT,
  `coid` int(11) NOT NULL,
  `hw_punish_type` char(1) NOT NULL DEFAULT 'N',
  `hw_punish_weight` float(3,2) DEFAULT NULL,
  `total_material_space` int(11) DEFAULT NULL,
  PRIMARY KEY (`ruleID`),
  KEY `rule_refer_course` (`coid`),
  CONSTRAINT `rule_refer_course` FOREIGN KEY (`coid`) REFERENCES `course` (`coid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course_rule
-- ----------------------------
INSERT INTO `course_rule` VALUES ('1', '1', 'N', '3.00', '1073741824');
INSERT INTO `course_rule` VALUES ('2', '2', 'R', '2.00', '1073741824');
INSERT INTO `course_rule` VALUES ('3', '3', 'M', '9.00', '1073741824');

-- ----------------------------
-- Table structure for cou_attend
-- ----------------------------
DROP TABLE IF EXISTS `cou_attend`;
CREATE TABLE `cou_attend` (
  `coid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `type` int(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cou_attend
-- ----------------------------
INSERT INTO `cou_attend` VALUES ('1', '1', '10001', null, '王一1');
INSERT INTO `cou_attend` VALUES ('1', '1', '10002', null, '张二2');
INSERT INTO `cou_attend` VALUES ('1', '1', '10003', null, '卢三3');
INSERT INTO `cou_attend` VALUES ('1', '1', '10004', null, '刘四4');
INSERT INTO `cou_attend` VALUES ('2', '1', '10001', null, '李五5');
INSERT INTO `cou_attend` VALUES ('3', '1', '10002', null, '张六6');
INSERT INTO `cou_attend` VALUES ('1', '1', '10002', null, '张二2');
INSERT INTO `cou_attend` VALUES ('1', '1', '11115', null, '古小8');
INSERT INTO `cou_attend` VALUES ('1', '1', '23334', null, '李大9');
INSERT INTO `cou_attend` VALUES ('1', '1', '1', null, '11');

-- ----------------------------
-- Table structure for group_post
-- ----------------------------
DROP TABLE IF EXISTS `group_post`;
CREATE TABLE `group_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `frozon` bit(1) NOT NULL,
  `hotness` int(11) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `gpost_refer_group` (`gid`),
  KEY `gpost_refer_student` (`sid`),
  CONSTRAINT `gpost_refer_group` FOREIGN KEY (`gid`) REFERENCES `study_group` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gpost_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_post
-- ----------------------------
INSERT INTO `group_post` VALUES ('1', '1', '10001', '软需第一次作业好难啊！', '2016-12-15 00:00:00', '\0', '0', '2333333333333333好难好难怎么学');
INSERT INTO `group_post` VALUES ('2', '1', '10001', '明天要上课吗', '2016-12-02 00:00:00', '\0', '0', '求问教师明天上不上课xxxxxx');
INSERT INTO `group_post` VALUES ('3', '2', '10002', 'xxxxxxxxxxxxsssssss', '2016-12-22 00:00:00', '\0', '0', '12345');
INSERT INTO `group_post` VALUES ('4', '1', '10001', '这是A', '2016-12-01 00:00:00', '\0', '0', 'AAAAAAAAAAAAAAAAAA');
INSERT INTO `group_post` VALUES ('5', '2', '10002', '这是B', '2016-12-10 00:00:00', '\0', '0', 'BBBBBBBBBBBBBBb');

-- ----------------------------
-- Table structure for group_post_floor
-- ----------------------------
DROP TABLE IF EXISTS `group_post_floor`;
CREATE TABLE `group_post_floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `utype` char(1) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `taid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `content` varchar(500) NOT NULL,
  `ref_fid` int(11) DEFAULT NULL,
  `ref_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`floor_id`),
  KEY `gpfloor_refer_floor` (`ref_fid`),
  KEY `gpfloor_refer_post` (`post_id`),
  KEY `gpfloor_refer_teacher` (`tid`),
  KEY `gpfloor_refer_student` (`sid`),
  KEY `gpfloor_refer_ta` (`taid`),
  CONSTRAINT `gpfloor_refer_floor` FOREIGN KEY (`ref_fid`) REFERENCES `group_post_floor` (`floor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gpfloor_refer_post` FOREIGN KEY (`post_id`) REFERENCES `group_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gpfloor_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gpfloor_refer_ta` FOREIGN KEY (`taid`) REFERENCES `ta_assist` (`taid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gpfloor_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_post_floor
-- ----------------------------
INSERT INTO `group_post_floor` VALUES ('1', '1', 'T', '1', null, null, '2016-12-29 00:00:00', '回去认真看看教材怎么说的', null, '0');
INSERT INTO `group_post_floor` VALUES ('2', '1', 'S', null, null, '10001', '2016-12-30 00:00:00', '教师我还没买教材', '1', '0');

-- ----------------------------
-- Table structure for homework
-- ----------------------------
DROP TABLE IF EXISTS `homework`;
CREATE TABLE `homework` (
  `coid` int(11) NOT NULL,
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `clid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `tid` int(11) DEFAULT '1',
  `is_fix` int(11) DEFAULT '0',
  `end_t` datetime NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `hw_req` varchar(255) DEFAULT '',
  `hard_ddl` datetime DEFAULT NULL,
  `begin_t` datetime DEFAULT NULL,
  `punish_weight` float(3,2) DEFAULT NULL,
  `score_face` int(11) DEFAULT '0',
  `score_weight` float(3,2) DEFAULT NULL,
  `finish_number` int(11) DEFAULT '0',
  PRIMARY KEY (`hid`,`coid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homework
-- ----------------------------
INSERT INTO `homework` VALUES ('1', '1', '1', '0', '第1次个人在线作业', 'content1', '1', '0', '2016-10-10 00:00:00', 'Zhongshan 23', '完成书本第一章。', '2016-10-11 00:00:00', '2016-09-01 00:00:00', '3.00', '100', '0.10', '3');
INSERT INTO `homework` VALUES ('1', '2', '1', '1', '第2次个人在线作业', 'content2', '1', '1', '2016-12-12 00:00:00', '//2.com', '完成书本第二章。', '2017-01-08 22:22:22', '2016-09-01 00:00:00', '3.00', '100', '0.10', '2');
INSERT INTO `homework` VALUES ('1', '3', '1', '1', '第3次个人在线作业', 'content3', '2', '1', '2017-01-22 00:00:00', null, '完成书本第三章。', '2017-01-23 11:11:11', '2016-09-01 00:00:00', '3.00', '100', '0.20', '1');
INSERT INTO `homework` VALUES ('1', '4', '1', '0', '第4次个人离线作业', 'content4', '3', '0', '2017-01-12 23:59:59', null, '', '2017-01-23 11:11:11', '2016-09-01 00:00:00', '3.00', '100', '0.30', '2');
INSERT INTO `homework` VALUES ('1', '5', '1', '0', '第5次小组作业', 'content5', '1', '1', '2017-01-20 23:59:59', null, '', '2017-01-20 23:59:59', '2016-09-01 00:00:00', '3.00', '100', '0.30', '1');
INSERT INTO `homework` VALUES ('1', '6', '2', '0', '第6次个人在线作业', 'content6', '1', '0', '2017-01-22 00:00:00', null, '', '2017-01-23 11:11:11', '2016-09-01 00:00:00', '3.00', '100', '0.30', '2');
INSERT INTO `homework` VALUES ('1', '7', '2', '0', '第7次个人在线作业', 'content6', '1', '0', '2017-01-22 00:00:00', null, '', '2017-01-23 11:11:11', '2016-09-01 00:00:00', '3.00', '100', '0.30', '2');
INSERT INTO `homework` VALUES ('1', '8', '3', '0', '第8次小组作业', 'content8', '1', '0', '2019-06-12 23:36:50', null, '', null, null, null, '0', null, '0');
INSERT INTO `homework` VALUES ('1', '11', '3', '1', 'aaa', 'aaa', '1', '0', '2019-06-03 23:38:00', null, '', null, null, null, '0', null, '0');
INSERT INTO `homework` VALUES ('1', '14', '1', '0', '期末作业', '完成综合实验报告', '1', '0', '2019-06-09 18:37:00', null, '', null, null, null, '0', null, '0');
INSERT INTO `homework` VALUES ('1', '15', '2', '0', '期末作业', '完成综合实验报告', '1', '0', '2019-06-09 18:37:00', null, '', null, null, null, '0', null, '0');
INSERT INTO `homework` VALUES ('1', '16', '3', '0', '期末作业', '完成综合实验报告', '1', '0', '2019-06-09 18:37:00', null, '', null, null, null, '0', null, '0');

-- ----------------------------
-- Table structure for homework_post
-- ----------------------------
DROP TABLE IF EXISTS `homework_post`;
CREATE TABLE `homework_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `coid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `frozon` bit(1) NOT NULL,
  `hotness` int(11) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `hpost_refer_course` (`coid`),
  KEY `hpost_refer_teacher` (`tid`),
  CONSTRAINT `hpost_refer_course` FOREIGN KEY (`coid`) REFERENCES `course` (`coid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hpost_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homework_post
-- ----------------------------
INSERT INTO `homework_post` VALUES ('1', '1', '1', '第一次作业讨论', '2016-12-02 00:00:00', '\0', '0', '请学术一点');
INSERT INTO `homework_post` VALUES ('2', '1', '1', '第二次作业', '2016-12-30 00:00:00', '\0', '0', '请认真一点');

-- ----------------------------
-- Table structure for homework_post_floor
-- ----------------------------
DROP TABLE IF EXISTS `homework_post_floor`;
CREATE TABLE `homework_post_floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `utype` char(1) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `taid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `content` varchar(500) NOT NULL,
  `ref_fid` int(11) DEFAULT NULL,
  `ref_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`floor_id`),
  KEY `hpfloor_refer_floor` (`ref_fid`),
  KEY `hpfloor_refer_post` (`post_id`),
  KEY `hpfloor_refer_teacher` (`tid`),
  KEY `hpfloor_refer_student` (`sid`),
  KEY `hpfloor_refer_ta` (`taid`),
  CONSTRAINT `hpfloor_refer_floor` FOREIGN KEY (`ref_fid`) REFERENCES `homework_post_floor` (`floor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hpfloor_refer_post` FOREIGN KEY (`post_id`) REFERENCES `homework_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hpfloor_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hpfloor_refer_ta` FOREIGN KEY (`taid`) REFERENCES `ta_assist` (`taid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hpfloor_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homework_post_floor
-- ----------------------------
INSERT INTO `homework_post_floor` VALUES ('1', '1', 'S', null, null, '10002', '2016-12-23 00:00:00', '第一小题什么意思', null, '0');
INSERT INTO `homework_post_floor` VALUES ('2', '1', 'S', null, null, '10001', '2016-12-29 00:00:00', 'AAAAXXXXX', '1', '0');

-- ----------------------------
-- Table structure for hw_ma
-- ----------------------------
DROP TABLE IF EXISTS `hw_ma`;
CREATE TABLE `hw_ma` (
  `hid` int(11) NOT NULL DEFAULT '1',
  `sid` int(11) DEFAULT '10001',
  `clid` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hw_ma
-- ----------------------------
INSERT INTO `hw_ma` VALUES ('1', '10002', '1');
INSERT INTO `hw_ma` VALUES ('1', '10003', '1');
INSERT INTO `hw_ma` VALUES ('2', '10001', '1');
INSERT INTO `hw_ma` VALUES ('3', '10001', '1');
INSERT INTO `hw_ma` VALUES ('5', '10002', '1');
INSERT INTO `hw_ma` VALUES ('4', '10001', '1');
INSERT INTO `hw_ma` VALUES ('1', '10001', '1');
INSERT INTO `hw_ma` VALUES ('2', '10002', '1');

-- ----------------------------
-- Table structure for hw_result
-- ----------------------------
DROP TABLE IF EXISTS `hw_result`;
CREATE TABLE `hw_result` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `ifcorrected` bit(1) NOT NULL DEFAULT b'0',
  `score` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`rid`),
  KEY `hresult_refer_student` (`sid`),
  KEY `hresult_refer_homework` (`hid`),
  CONSTRAINT `hresult_refer_homework` FOREIGN KEY (`hid`) REFERENCES `homework` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hresult_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hw_result
-- ----------------------------
INSERT INTO `hw_result` VALUES ('1', '1', '10001', 'O', '2016-10-10 10:10:10', '', '61', '写得什么玩意？？', 'Q.XML');
INSERT INTO `hw_result` VALUES ('2', '1', '10002', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'W.XML');
INSERT INTO `hw_result` VALUES ('3', '1', '10003', 'O', '2016-10-10 10:10:10', '', '80', '继续努力2333', 'E.XML');
INSERT INTO `hw_result` VALUES ('4', '2', '10004', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'R.XML');
INSERT INTO `hw_result` VALUES ('5', '2', '10005', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'T.XML');
INSERT INTO `hw_result` VALUES ('6', '3', '10002', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'Y.XML');
INSERT INTO `hw_result` VALUES ('7', '4', '10002', 'F', '2016-10-10 10:10:10', '\0', '0', '', '期末报告提交要求2016.pdf');
INSERT INTO `hw_result` VALUES ('8', '4', '10006', 'F', '2016-10-10 10:10:10', '\0', '0', '', 'KJSADIU898.pdf');
INSERT INTO `hw_result` VALUES ('9', '5', '10001', 'G', '2016-10-10 10:10:10', '\0', '0', '', 'al.rar');
INSERT INTO `hw_result` VALUES ('10', '6', '10001', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'U.XML');
INSERT INTO `hw_result` VALUES ('11', '6', '10001', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'I.XML');
INSERT INTO `hw_result` VALUES ('12', '7', '10001', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'O.XML');
INSERT INTO `hw_result` VALUES ('13', '7', '10001', 'O', '2016-10-10 10:10:10', '\0', '0', '', 'P.XML');
INSERT INTO `hw_result` VALUES ('14', '14', '10001', 'O', '2019-06-19 13:26:01', '\0', '80', '', 'wbs.jpg');
INSERT INTO `hw_result` VALUES ('15', '14', '10002', 'O', '2019-06-19 13:28:21', '\0', '0', '', '1.txt');
INSERT INTO `hw_result` VALUES ('16', '14', '10003', 'G', null, '\0', '0', '', '');

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mtype` int(10) DEFAULT '1',
  `type` varchar(10) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `tid` int(11) DEFAULT '1',
  `coid` int(11) DEFAULT '1',
  `download` int(11) DEFAULT '0',
  PRIMARY KEY (`mid`),
  KEY `material_refer_teacher` (`tid`),
  KEY `material_refer_course` (`coid`),
  CONSTRAINT `material_refer_course` FOREIGN KEY (`coid`) REFERENCES `course` (`coid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `material_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of material
-- ----------------------------
INSERT INTO `material` VALUES ('1', '1', 'txt', 'down', '10', '2019-03-26 15:39:52', null, '1', '1', '6');
INSERT INTO `material` VALUES ('3', '1', 'txt', '2', '10', '2019-04-04 15:40:17', null, '1', '1', '0');
INSERT INTO `material` VALUES ('4', '1', 'txt', '3', '10', '2019-04-05 15:40:21', null, '1', '1', '0');
INSERT INTO `material` VALUES ('5', '1', 'txt', '4', '10', '2019-04-06 15:40:25', null, '1', '1', '0');
INSERT INTO `material` VALUES ('6', '2', 'txt', '5', '44', '2019-04-07 15:40:29', null, '1', '1', '0');
INSERT INTO `material` VALUES ('7', '1', 'txt', '6', '5', '2019-04-09 15:40:33', null, '1', '1', '10');
INSERT INTO `material` VALUES ('8', '1', 'txt', '7', '7', '2019-04-18 15:40:38', null, '1', '1', '43');
INSERT INTO `material` VALUES ('20', '2', 'PNG', '1', '171525', '2019-05-13 21:37:00', null, '1', '1', '4');
INSERT INTO `material` VALUES ('21', '1', 'docx', '电气与计算机工程学院作业纸（学生用）', '46268', '2019-06-06 21:24:00', null, '1', '1', '3');
INSERT INTO `material` VALUES ('23', '0', 'pdf', '教学大纲', '597586', '2019-06-21 20:36:00', null, '1', '1', '1');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `refer_mid` int(11) DEFAULT NULL,
  `fromid` int(11) DEFAULT NULL,
  `toid` int(11) DEFAULT NULL,
  `fromtype` int(11) DEFAULT NULL,
  `totype` int(11) DEFAULT NULL,
  `mdate` datetime NOT NULL,
  `content` varchar(200) NOT NULL,
  `title` varchar(40) NOT NULL,
  `ifread` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`mid`),
  KEY `rmid_refer_mid` (`refer_mid`),
  CONSTRAINT `rmid_refer_mid` FOREIGN KEY (`refer_mid`) REFERENCES `message` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', null, '10001', '1', '0', '1', '2016-12-01 00:00:00', '教师我忘记密码了', '教师求重置密码', '');
INSERT INTO `message` VALUES ('2', '1', '1', '10001', '1', '0', '2016-12-07 00:00:00', '那你是怎么发我信息的？', '蛤蛤蛤？', '');
INSERT INTO `message` VALUES ('3', '2', '10001', '1', '0', '1', '2016-12-07 00:00:00', '啊 对哦', '23333', '');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `reset_time` datetime DEFAULT NULL,
  `verified_email` bit(1) DEFAULT NULL,
  `verified_phone` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=162011199 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('10001', '王一1', '000', null, null, '', '');
INSERT INTO `student` VALUES ('10002', '张二2', 'e', null, null, '', '');
INSERT INTO `student` VALUES ('10003', '卢三3', '456', null, null, '', '');
INSERT INTO `student` VALUES ('10004', '刘四4', '123', null, null, '', '');
INSERT INTO `student` VALUES ('10005', '李五5', 'qwi', null, null, '', '');
INSERT INTO `student` VALUES ('10006', '张六6', 'uuhwie', null, null, '', '');
INSERT INTO `student` VALUES ('162011118', '黄杰锋', '123', '1561120204', '2019-06-06 04:56:03', '', '');
INSERT INTO `student` VALUES ('162011198', '李轩', '123', null, null, '', '');

-- ----------------------------
-- Table structure for student_info
-- ----------------------------
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `sid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `college` varchar(30) NOT NULL,
  `major` varchar(30) NOT NULL,
  KEY `sinfo_refer_student` (`sid`),
  CONSTRAINT `sinfo_refer_student` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_info
-- ----------------------------
INSERT INTO `student_info` VALUES ('10001', '王二1', 'M', null, null, '计算机学院', '软件工程');
INSERT INTO `student_info` VALUES ('10002', '张三2', 'M', null, null, '计算机学院', '计算机科学');
INSERT INTO `student_info` VALUES ('10003', '卢四3', 'F', null, null, '农学院', '施肥系');
INSERT INTO `student_info` VALUES ('10004', '刘五4', 'F', null, null, '茶学院', '养殖系');
INSERT INTO `student_info` VALUES ('10005', '边五5', 'F', null, null, '激光学院', '天文系');
INSERT INTO `student_info` VALUES ('10006', '邢小六6', 'F', null, null, '人文学院', '诗歌系');
INSERT INTO `student_info` VALUES ('162011118', '黄杰锋', 'M', '13725900272', '947512302@qq.com', '电气学院', '电气学院');
INSERT INTO `student_info` VALUES ('162011198', '李轩', 'M', '123', '911@qq.com', '电气学院', '电气学院');

-- ----------------------------
-- Table structure for study_group
-- ----------------------------
DROP TABLE IF EXISTS `study_group`;
CREATE TABLE `study_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `clid` int(11) NOT NULL,
  `gname` varchar(20) NOT NULL,
  `teamleader_id` int(11) NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `group_refer_class` (`clid`),
  KEY `group_refer_student` (`teamleader_id`),
  CONSTRAINT `group_refer_class` FOREIGN KEY (`clid`) REFERENCES `class` (`clid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_refer_student` FOREIGN KEY (`teamleader_id`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of study_group
-- ----------------------------
INSERT INTO `study_group` VALUES ('1', '1', 'CL1G1菊花队', '10001');
INSERT INTO `study_group` VALUES ('2', '1', 'CL1G1桃花队', '10002');
INSERT INTO `study_group` VALUES ('3', '5', 'CL2G3杏花队', '10005');
INSERT INTO `study_group` VALUES ('4', '5', 'CL2G4烟花队', '10004');
INSERT INTO `study_group` VALUES ('5', '4', 'CL4G5昙花队', '10006');
INSERT INTO `study_group` VALUES ('6', '4', 'CL4G6兰花队', '10002');

-- ----------------------------
-- Table structure for ta_assist
-- ----------------------------
DROP TABLE IF EXISTS `ta_assist`;
CREATE TABLE `ta_assist` (
  `taid` int(11) NOT NULL AUTO_INCREMENT,
  `clid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`taid`),
  KEY `ta_refer_class` (`clid`),
  CONSTRAINT `ta_refer_class` FOREIGN KEY (`clid`) REFERENCES `class` (`clid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_assist
-- ----------------------------

-- ----------------------------
-- Table structure for ta_info
-- ----------------------------
DROP TABLE IF EXISTS `ta_info`;
CREATE TABLE `ta_info` (
  `taid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `id` varchar(11) NOT NULL,
  `college` varchar(30) NOT NULL,
  `major` varchar(30) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  KEY `tainfo_refer_ta` (`taid`),
  CONSTRAINT `tainfo_refer_ta` FOREIGN KEY (`taid`) REFERENCES `ta_assist` (`taid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_info
-- ----------------------------

-- ----------------------------
-- Table structure for ta_permission
-- ----------------------------
DROP TABLE IF EXISTS `ta_permission`;
CREATE TABLE `ta_permission` (
  `clid` int(11) NOT NULL,
  `p_ma_upload` bit(1) NOT NULL,
  `p_ma_modify` bit(1) NOT NULL,
  `p_ma_delete` bit(1) NOT NULL,
  `p_hw_deliver` bit(1) NOT NULL,
  `p_hw_modify` bit(1) NOT NULL,
  `p_hw_review` bit(1) NOT NULL,
  `p_BBS_reply` bit(1) NOT NULL,
  `p_nt_deliver` bit(1) NOT NULL,
  `p_nt_modify` bit(1) NOT NULL,
  `p_nt_delete` bit(1) NOT NULL,
  `p_ta_info` bit(1) NOT NULL,
  KEY `tapermiss_refer_class` (`clid`),
  CONSTRAINT `tapermiss_refer_class` FOREIGN KEY (`clid`) REFERENCES `class` (`clid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_permission
-- ----------------------------

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `class` int(11) DEFAULT '1',
  `verified_email` bit(1) DEFAULT NULL,
  `verified_phone` bit(1) DEFAULT NULL,
  `pl` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `college` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `education` varchar(20) DEFAULT NULL,
  `direction` varchar(30) DEFAULT NULL,
  `past_evaluation` varchar(100) DEFAULT NULL,
  `desc_achive` varchar(200) DEFAULT NULL,
  `desc_teach_type` varchar(100) DEFAULT NULL,
  `desc_publish` varchar(100) DEFAULT NULL,
  `desc_honor` varchar(100) DEFAULT NULL,
  `desc_more` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 't1', '123', '1', '\0', '\0', '0', 'A教师', 'F', null, null, '电气学院', '计算机科学与技术', '教师', '教授', '软件开发', '高质量', 'IEEE论文10000篇', '风趣幽默', '《成为系主任的一百种方法》', '“竺可祯和平奖”，“周树人杯作文大赛冠军”', '好好学习，天天向上！');
INSERT INTO `teacher` VALUES ('2', 't2', 'rem_jbhhh', '1', '\0', '\0', '0', 'B教师', 'M', null, null, '电气学院', '软件工程', '教师', '教授', '软件管理', '讲不来', 'SRS写报告大赛冠军', '和蔼', '《我还想写100本书》', '“林俊杰歌唱大赛第二名”', '全都怪我，不该沉默时沉没');
INSERT INTO `teacher` VALUES ('3', 't3', 'rem_jbhhh', '1', '\0', '\0', '0', 'C教师', 'M', null, null, '电气学院', '计算机网路', '教师', '应该教授', '计网', '666', 'web服务器编写大赛冠军', '厉害厉害', '《Http Caching》', '403，无法访问！', '这个东西你给我保存至少20天，不要来问我了');
INSERT INTO `teacher` VALUES ('4', 't4', '123', '0', '\0', '\0', '-1', 'D教师', 'M', '', null, '电气学院', '嵌入式', '教师', null, '嵌入式', null, null, null, null, null, null);
INSERT INTO `teacher` VALUES ('5', 't5', '123', '0', '\0', '\0', '0', 'E教师', 'M', null, null, '电气学院', '软件', null, null, '数据挖掘', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for teacher_info
-- ----------------------------
DROP TABLE IF EXISTS `teacher_info`;
CREATE TABLE `teacher_info` (
  `tid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `college` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  `education` varchar(20) NOT NULL,
  `direction` varchar(30) NOT NULL,
  `past_evaluation` varchar(100) NOT NULL,
  `desc_achive` varchar(200) NOT NULL,
  `desc_teach_type` varchar(100) NOT NULL,
  `desc_publish` varchar(100) NOT NULL,
  `desc_honor` varchar(100) NOT NULL,
  `desc_more` varchar(100) NOT NULL,
  KEY `tinfo_refer_teacher` (`tid`),
  CONSTRAINT `tinfo_refer_teacher` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher_info
-- ----------------------------

-- ----------------------------
-- Table structure for vote_task
-- ----------------------------
DROP TABLE IF EXISTS `vote_task`;
CREATE TABLE `vote_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) DEFAULT NULL,
  `voteid` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `optionData` text,
  `date` varchar(16) DEFAULT NULL,
  `time` varchar(16) DEFAULT NULL,
  `noName` varchar(8) DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vote_task
-- ----------------------------
INSERT INTO `vote_task` VALUES ('1', '1', '1', '投票1', '不知所谓', '[{ unique: 0, content: \'yes\', number: 0, percent: 0, joiner: [] },{ unique: 1, content: \'no\', number: 0, percent: 0,joiner: [] }]', '2019-6-1', '11:31', 'false', '0');
DROP TRIGGER IF EXISTS `ME_DeleteStudent`;
DELIMITER ;;
CREATE TRIGGER `ME_DeleteStudent` BEFORE DELETE ON `student` FOR EACH ROW BEGIN
  Delete FROM message WHERE totype=0 and toid= old.sid ;
  DELETE FROM message WHERE fromtype=0 and fromid=old.sid;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ME_DeleteTa`;
DELIMITER ;;
CREATE TRIGGER `ME_DeleteTa` BEFORE DELETE ON `ta_assist` FOR EACH ROW BEGIN
  Delete FROM message WHERE totype=2 and toid= old.taid ;
  DELETE FROM message WHERE fromtype=2 and fromid=old.taid;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ME_DeleteTeacher`;
DELIMITER ;;
CREATE TRIGGER `ME_DeleteTeacher` BEFORE DELETE ON `teacher` FOR EACH ROW BEGIN
  Delete FROM message WHERE totype=1 and toid= old.tid ;
  DELETE FROM message WHERE fromtype=1 and fromid=old.tid;
END
;;
DELIMITER ;
