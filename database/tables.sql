/* 用户表 */
CREATE TABLE users (
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT, /* 用户编号  自增*/
  email VARCHAR(100) UNIQUE NOT NULL, /*用户邮箱 唯一*/
  phone_number VARCHAR(11) UNIQUE,/* 手机号码  唯一*/
  nickname VARCHAR(40) UNIQUE, /*用户昵称 唯一*/
  name VARCHAR(40), /*真实姓名*/
  gender ENUM('M','F','N') DEFAULT 'N', /* 性别 M 男 F 女 N 未知 */
  password CHAR(64), /*密码*/
  activated ENUM('E','P','A','N') DEFAULT 'N', /* 是否激活 E 邮箱激活, P 手机激活， A 都已激活，N 未激活*/
  created_at DATETIME NOT NULL, /* 创建时间 */
  updated_at DATETIME,  /* 更新时间 */
  activated_at DATETIME,/* 激活时间 */
  birthday DATETIME,/*生日*/
  state VARCHAR(20), /* 国家 */
  province VARCHAR(20), /* 省 */
  city VARCHAR(20), /* 城市 */
  district VARCHAR(20), /* 区县 */
  street VARCHAR(100), /*街区 详细*/
  postal_code VARCHAR(10) , /* 邮政编码 */
  auth_key CHAR(32) UNIQUE NOT NULL, /* auth_key  用户核对用户信息 生成激活码等等*/
  PRIMARY KEY (id)
);

/* 收货人 */
CREATE TABLE receivers (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT, /* 地址编号*/
  user_id MEDIUMINT UNSIGNED NOT NULL, /*用户编号*/
  receiver_name VARCHAR(40), /*收件人姓名*/
  phone_number VARCHAR(11), /* 收件人手机*/
  state VARCHAR(20) NOT NULL, /* 国家 */
  province VARCHAR(20) NOT NULL, /* 省 */
  city VARCHAR(20) NOT NULL, /* 城市 */
  district VARCHAR(20) NOT NULL, /* 区县 */
  street VARCHAR(100) NOT NULL, /*街区 详细*/
  postal_code VARCHAR(10) , /* 邮政编码 */
  is_default ENUM('T','F') DEFAULT 'F', /* 是否为默认地址 */
  PRIMARY key (id),/*主键*/
  FOREIGN KEY (user_id) REFERENCES users (id) /*外键*/
);

/*种类*/
CREATE TABLE categories(
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,/*种类ID*/
  name VARCHAR(20) NOT NULL UNIQUE, /*种类名称*/
  description VARCHAR(1000),/*种类描述*/
  PRIMARY KEY (id) /*主键*/
);

/*品种*/
CREATE TABLE varieties(
  id SMALLINT UNSIGNED AUTO_INCREMENT, /*品种ID*/
  name VARCHAR(20) NOT NULL UNIQUE, /*品种名称*/
  description VARCHAR(1000), /*品种描述*/
  category_id SMALLINT UNSIGNED NOT NULL, /*种类ID*/
  PRIMARY KEY (id), /*主键*/
  FOREIGN KEY (category_id) REFERENCES categories (id) /*外键*/
);

/*果园*/
CREATE TABLE orchards (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, /*果园ID*/
  orchard_name VARCHAR(40), /*果园名称*/
  description VARCHAR(1000), /*果园描述*/
  user_id MEDIUMINT UNSIGNED NOT NULL, /*果园拥有者*/
  state VARCHAR(20) NOT NULL, /* 国家 */
  province VARCHAR(20) NOT NULL, /* 省 */
  city VARCHAR(20) NOT NULL, /* 城市 */
  district VARCHAR(20) NOT NULL, /* 区县 */
  street VARCHAR(100) NOT NULL, /*街区 详细*/
  postal_code VARCHAR(10), /* 邮政编码 */
  PRIMARY KEY (id), /*主键*/
  FOREIGN KEY (user_id) REFERENCES users (id) /*外键*/
);
/*同质果树---组*/
CREATE TABLE groups(
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, /* 组ID */
  orchard_id SMALLINT UNSIGNED NOT NULL, /*果园ID*/
  variety_id SMALLINT UNSIGNED NOT NULL, /*品种ID*/
  planting_date DATETIME NOT NULL,/*种植日期*/
  PRIMARY KEY (id), /*主键*/
  FOREIGN KEY (orchard_id) REFERENCES orchards (id), /*外键*/
  FOREIGN KEY (variety_id) REFERENCES varieties (id) /*外键*/
);

/*果树*/
CREATE TABLE trees(
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  group_id SMALLINT UNSIGNED, /*组ID*/
  usable ENUM('T','F') DEFAULT 'F',/*是否可租赁*/
  position VARCHAR(100), /*位置描述*/
  status VARCHAR(20),/*状态*/
  PRIMARY KEY (id), /*主键*/
  FOREIGN KEY (group_id) REFERENCES groups (id) /*外键*/
);

/*采摘记录*/
CREATE TABLE harvests(
 id INT UNSIGNED NOT NULL AUTO_INCREMENT,
 tree_id MEDIUMINT UNSIGNED NOT NULL, /*果树ID*/
 harvest_date DATETIME NOT NULL, /*采摘时间*/
 output SMALLINT NOT NULL, /*采摘重量*/
 single_max SMALLINT,/*最大单果重*/
 single_min SMALLINT,/*最小单果重*/
 output_amount SMALLINT, /*采摘数量*/
 PRIMARY KEY (id), /*主键*/
 FOREIGN KEY (tree_id) REFERENCES trees (id) /*外键*/
);

/*预估信息*/
CREATE TABLE estimates(
  id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  group_id SMALLINT UNSIGNED NOT NULL, /*组ID*/
  estimate_date DATETIME NOT NULL,/*评估时间产出最大重量*/
  output_max SMALLINT NOT NULL,/*预估产出最大重量*/
  output_min SMALLINT NOT NULL,/*预估产出最小重量*/
  single_max SMALLINT,/*预估单果最大重量*/
  single_min SMALLINT, /*预估单果最小重量*/
  output_amount SMALLINT,/*预估产出数量*/
  remark VARCHAR(400),/*备注 变更原因*/
  pick_times TINYINT UNSIGNED NOT NULL, /*预估采摘次数*/
  PRIMARY KEY (id), /*主键*/
  FOREIGN KEY (group_id) REFERENCES groups (id) /*外键*/
);

/*登陆记录*/
CREATE TABLE login_records(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id MEDIUMINT UNSIGNED NOT NULL, /*用户编号*/
  date DATETIME NOT NULL, /*登陆时间*/
  ip varchar(20) NOT NULL,/*登陆IP*/
  browser varchar(20) NOT NULL,/*浏览器*/
  device varchar(20) NOT NULL,/*设备*/
  system varchar(20) NOT NULL,/*系统*/
  user_agent varchar(200) NOT NULL,/*浏览器标识*/
  PRIMARY KEY (id),/*主键*/
  FOREIGN KEY (user_id) REFERENCES users (id)/*外键*/
);

/*发货单*/
-- CREATE TABLE login_records(
--   id INT UNSIGNED AUTO_INCREMENT NOT NULL,
--   tree_id MEDIUMINT UNSIGNED ,
--   receiver_name VARCHAR(40), /*收件人姓名*/
--   receiver_phone VARCHAR(11), /* 收件人手机*/
--   state VARCHAR(20) NOT NULL, /* 国家 */
--   province VARCHAR(20) NOT NULL, /* 省 */
--   city VARCHAR(20) NOT NULL, /* 城市 */
--   district VARCHAR(20) NOT NULL, /* 区县 */
--   street VARCHAR(100) NOT NULL, /*街区 详细*/
--   postal_code VARCHAR(10) , /* 邮政编码 */
-- );


-- /*操作记录*/
-- CREATE TABLE operate(
--
-- );
-- /*公告*/
-- CREATE TABLE notice(
--
-- );
-- /*订单*/
-- CREATE TABLE order(
--   id INT UNSIGNED AUTO_INCREMENT,
--   user_id MEDIUMINT UNSIGNED, /*用户编号*/
--   order_date DATETIME NOT NULL,/*下单日期*/
--   total_cost MEDIUMINT NOT NULL, /*总金额*/
--   payment_date DATETIME /*支付日期*/
--   CONSTRAINT pk_order PRIMARY KEY (id), /*主键*/
--   CONSTRAINT fk_receiver_user_id FOREIGN KEY (user_id) REFERENCES user (id) /*外键*/
-- );
-- /*订单列表*/
-- CREATE TABLE list(
--   id,
--   order_id,
--   group_id,
--   amount,
--   price,
--
-- );

