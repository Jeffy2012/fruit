/* 用户表 */
CREATE TABLE user (
 user_id MEDIUMINT UNSIGNED AUTO_INCREMENT, /* 用户编号  自增*/
 email VARCHAR(100) UNIQUE NOT NULL, /*用户邮箱 唯一*/
 phone_number VARCHAR(11) UNIQUE,/* 手机号码  唯一*/
 nickname VARCHAR(20) UNIQUE, /*用户昵称 唯一*/
 gender ENUM('M','F','N') DEFAULT 'N', /* 性别 M 男 F 女 N 未知 */
 password CHAR(64), /*密码*/
 activated ENUM('E','P','A','N') DEFAULT 'N', /* 是否激活 E 邮箱激活, P 手机激活， A 都已激活，N 未激活*/
 created_at DATETIME NOT NULL, /* 创建时间 */
 updated_at DATETIME,  /* 更新时间 */
 activated_at DATETIME,/* 激活时间 */
 auth_key CHAR(32) UNIQUE NOT NULL, /* auth_key  用户核对用户信息 生成激活码等等*/
 CONSTRAINT pk_user PRIMARY KEY (user_id)
)

/* 收获地址 */
CREATE TABLE destination (
 address_id MEDIUMINT UNSIGNED AUTO_INCREMENT, /* 地址编号*/
 user_id MEDIUMINT UNSIGNED, /*用户编号*/
 receiver VARCHAR(100), /*收件人姓名*/
 gender ENUM('M','F','N') DEFAULT 'N', /* 收件人性别 M 男 F 女 N 未知 */
 receiver_phone VARCHAR(11), /* 收件人电话 手机*/
 receiver_number VARCHAR(11), /* 收件人电话 座机 */
 district VARCHAR(20), /* 区县 */
 city VARCHAR(20), /* 城市 */
 province VARCHAR(20), /* 省 */
 state VARCHAR(20), /* 国家 */
 street VARCHAR(400), /*街区 详细*/
 postal_code VARCHAR(20), /* 邮政编码 */
 default ENUM('T','F') DEFAULT 'F', /* 是否为默认地址 */
 counter SMALLINT UNSIGNED, /* 使用次数 计算使用频率 */
 CONSTRAINT pk_address FOREIGN KEY (address_id),
 CONSTRAINT fk_address_user_id FOREIGN KEY (person_id)
)