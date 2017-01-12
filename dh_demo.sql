-- 建立 Database
CREATE DATABASE dh_demo
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

-- 建立 homestead 使用者，密碼為 secret
CREATE USER 'homestead'@'%' identified by 'secret';

-- 賦予 homestead 使用者存取 dh_demo 資料庫所有權限
GRANT ALL PRIVILEGES ON dh_demo.* TO 'homestead'@'%' IDENTIFIED BY 'secret';