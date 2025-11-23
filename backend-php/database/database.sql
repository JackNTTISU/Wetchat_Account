-- 康立数字服务号数据库结构
-- MySQL 5.7+ / 8.0+

-- 创建数据库
CREATE DATABASE IF NOT EXISTS `kangli_digital` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `kangli_digital`;

-- 1. 资讯表
CREATE TABLE `news` (
  `id` INT PRIMARY KEY AUTO_INCREMENT COMMENT '主键',
  `title` VARCHAR(200) NOT NULL COMMENT '标题',
  `cover` VARCHAR(500) COMMENT '封面图URL',
  `summary` TEXT COMMENT '摘要',
  `content` LONGTEXT COMMENT '富文本内容',
  `author` VARCHAR(50) COMMENT '作者',
  `views` INT DEFAULT 0 COMMENT '浏览量',
  `is_published` TINYINT DEFAULT 0 COMMENT '上架状态：0-下架，1-上架',
  `is_top` TINYINT DEFAULT 0 COMMENT '是否置顶：0-否，1-是',
  `sort_order` INT DEFAULT 0 COMMENT '排序权重',
  `publish_time` DATETIME COMMENT '发布时间',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_published` (`is_published`, `sort_order`, `publish_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='资讯表';

-- 2. 视频表
CREATE TABLE `videos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL COMMENT '标题',
  `description` TEXT COMMENT '描述',
  `category` VARCHAR(50) COMMENT '分类：product/case/tech/company',
  `video_url` VARCHAR(500) NOT NULL COMMENT '视频文件URL',
  `thumbnail_url` VARCHAR(500) COMMENT '缩略图URL',
  `duration` VARCHAR(10) COMMENT '时长 如：05:32',
  `file_size` BIGINT COMMENT '文件大小(字节)',
  `views` INT DEFAULT 0 COMMENT '观看次数',
  `is_published` TINYINT DEFAULT 0 COMMENT '上架状态：0-下架，1-上架',
  `is_featured` TINYINT DEFAULT 0 COMMENT '是否推荐：0-否，1-是',
  `sort_order` INT DEFAULT 0 COMMENT '排序权重',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_category` (`category`, `is_published`),
  INDEX `idx_featured` (`is_featured`, `is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='视频表';

-- 3. 产品表
CREATE TABLE `products` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL COMMENT '产品名称',
  `cover` VARCHAR(500) COMMENT '封面图',
  `summary` TEXT COMMENT '简介',
  `description` LONGTEXT COMMENT '详细介绍(富文本)',
  `category` VARCHAR(50) COMMENT '分类',
  `features` JSON COMMENT '功能特点',
  `specifications` JSON COMMENT '技术参数',
  `images` JSON COMMENT '产品图片数组',
  `video_url` VARCHAR(500) COMMENT '演示视频',
  `price_range` VARCHAR(50) COMMENT '价格区间',
  `is_published` TINYINT DEFAULT 0,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_published` (`is_published`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='产品表';

-- 4. 技术方案表
CREATE TABLE `solutions` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL COMMENT '方案名称',
  `cover` VARCHAR(500) COMMENT '封面图',
  `industry` VARCHAR(50) COMMENT '行业',
  `overview` TEXT COMMENT '概述',
  `pain_points` JSON COMMENT '痛点分析',
  `solutions` JSON COMMENT '解决方案',
  `advantages` JSON COMMENT '方案优势',
  `process` JSON COMMENT '实施流程',
  `cases` JSON COMMENT '成功案例',
  `is_published` TINYINT DEFAULT 0,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='技术方案表';

-- 5. 前瞻技术内容表
CREATE TABLE `technology_pages` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `type` VARCHAR(50) UNIQUE NOT NULL COMMENT '类型：textile-mes/injection-mes/smart-warehouse/equipment-tpm',
  `title` VARCHAR(200) NOT NULL COMMENT '标题',
  `banner` VARCHAR(500) COMMENT 'Banner图',
  `overview` TEXT COMMENT '概述',
  `pain_points` JSON COMMENT '痛点',
  `solutions` JSON COMMENT '解决方案',
  `advantages` JSON COMMENT '优势',
  `process` JSON COMMENT '实施流程',
  `cases` JSON COMMENT '案例',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='前瞻技术页面内容';

-- 6. 公司宣传册表
CREATE TABLE `company_brochure` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `image_url` VARCHAR(500) NOT NULL COMMENT '图片URL',
  `sort_order` INT DEFAULT 0 COMMENT '排序',
  `is_active` TINYINT DEFAULT 1 COMMENT '是否启用',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_sort` (`is_active`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='公司宣传册';

-- 7. 联系信息表
CREATE TABLE `contact_points` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT '名称(如：总部、华东分公司)',
  `address` VARCHAR(500) COMMENT '地址',
  `phone` VARCHAR(50) COMMENT '电话',
  `email` VARCHAR(100) COMMENT '邮箱',
  `manager` VARCHAR(50) COMMENT '负责人',
  `mobile` VARCHAR(20) COMMENT '手机',
  `description` TEXT COMMENT '说明',
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='联系信息';

-- 8. 留言表
CREATE TABLE `contact_messages` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COMMENT '姓名',
  `phone` VARCHAR(20) NOT NULL COMMENT '手机号',
  `email` VARCHAR(100) COMMENT '邮箱',
  `company` VARCHAR(200) COMMENT '公司',
  `message` TEXT NOT NULL COMMENT '留言内容',
  `status` TINYINT DEFAULT 0 COMMENT '处理状态：0-待处理，1-处理中，2-已完成',
  `reply` TEXT COMMENT '回复内容',
  `handler` VARCHAR(50) COMMENT '处理人',
  `ip_address` VARCHAR(50) COMMENT 'IP地址',
  `user_agent` VARCHAR(500) COMMENT '用户代理',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='留言记录';

-- 9. Banner表
CREATE TABLE `banners` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(200) COMMENT '标题',
  `image_url` VARCHAR(500) NOT NULL COMMENT '图片URL',
  `link` VARCHAR(500) COMMENT '跳转链接',
  `link_type` VARCHAR(20) COMMENT '链接类型：internal/external',
  `position` VARCHAR(50) COMMENT '位置：home/news/products',
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT DEFAULT 1,
  `start_time` DATETIME COMMENT '开始时间',
  `end_time` DATETIME COMMENT '结束时间',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Banner管理';

-- 10. 系统配置表
CREATE TABLE `system_config` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `config_key` VARCHAR(100) UNIQUE NOT NULL COMMENT '配置键',
  `config_value` TEXT COMMENT '配置值',
  `description` VARCHAR(200) COMMENT '说明',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统配置';

-- 初始化系统配置
INSERT INTO `system_config` (`config_key`, `config_value`, `description`) VALUES
('company_name', '康立数字科技有限公司', '公司名称'),
('logo_url', '', 'Logo URL'),
('icp', '苏ICP备xxxxxxxx号', 'ICP备案号'),
('service_hotline', '400-xxx-xxxx', '服务热线'),
('wechat_qr', '', '微信二维码');

-- 11. 管理员表
CREATE TABLE `admins` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(50) UNIQUE NOT NULL COMMENT '用户名',
  `password` VARCHAR(255) NOT NULL COMMENT '密码(加密)',
  `name` VARCHAR(50) COMMENT '姓名',
  `email` VARCHAR(100) COMMENT '邮箱',
  `role` VARCHAR(20) DEFAULT 'admin' COMMENT '角色',
  `is_active` TINYINT DEFAULT 1 COMMENT '是否启用',
  `last_login_at` DATETIME COMMENT '最后登录时间',
  `last_login_ip` VARCHAR(50) COMMENT '最后登录IP',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员';

-- 创建默认管理员 (用户名: admin, 密码: admin123)
-- 密码使用 password_hash('admin123', PASSWORD_DEFAULT) 生成
INSERT INTO `admins` (`username`, `password`, `name`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '超级管理员');

-- 12. 操作日志表
CREATE TABLE `operation_logs` (
  `id` BIGINT PRIMARY KEY AUTO_INCREMENT,
  `admin_id` INT COMMENT '管理员ID',
  `action` VARCHAR(50) COMMENT '操作类型',
  `resource` VARCHAR(100) COMMENT '资源类型',
  `resource_id` INT COMMENT '资源ID',
  `description` TEXT COMMENT '操作描述',
  `ip_address` VARCHAR(50),
  `user_agent` VARCHAR(500),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_admin` (`admin_id`, `created_at`),
  INDEX `idx_resource` (`resource`, `resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='操作日志';

-- 13. 文件上传记录表
CREATE TABLE `uploads` (
  `id` BIGINT PRIMARY KEY AUTO_INCREMENT,
  `filename` VARCHAR(255) NOT NULL COMMENT '原始文件名',
  `file_path` VARCHAR(500) NOT NULL COMMENT '存储路径',
  `file_url` VARCHAR(500) NOT NULL COMMENT '访问URL',
  `file_type` VARCHAR(50) COMMENT '文件类型：image/video/document',
  `mime_type` VARCHAR(100) COMMENT 'MIME类型',
  `file_size` BIGINT COMMENT '文件大小(字节)',
  `width` INT COMMENT '图片宽度',
  `height` INT COMMENT '图片高度',
  `uploaded_by` INT COMMENT '上传人ID',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_type` (`file_type`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文件上传记录';


