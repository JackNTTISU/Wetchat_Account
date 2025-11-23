# 康立数字服务号 - PHP后端

## 技术栈

- **框架**: ThinkPHP 6.0+
- **数据库**: MySQL 5.7+ / 8.0+
- **缓存**: Redis
- **文件存储**: 阿里云OSS
- **服务器**: 阿里云ECS

---

## 快速开始

### 1. 安装依赖

```bash
# 进入后端目录
cd backend-php

# 安装Composer依赖
composer install
```

### 2. 配置数据库

复制 `.env.example` 为 `.env`，修改数据库配置：

```env
# 数据库配置
DATABASE_TYPE=mysql
DATABASE_HOST=127.0.0.1
DATABASE_PORT=3306
DATABASE_NAME=kangli_digital
DATABASE_USERNAME=root
DATABASE_PASSWORD=your_password

# Redis配置
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_PASSWORD=

# 阿里云OSS配置
OSS_ACCESS_KEY_ID=your_access_key
OSS_ACCESS_KEY_SECRET=your_secret_key
OSS_ENDPOINT=oss-cn-shanghai.aliyuncs.com
OSS_BUCKET=kangli-digital
OSS_CDN_DOMAIN=https://cdn.kangli-digital.com

# JWT配置
JWT_SECRET=your_jwt_secret_key_here
JWT_EXPIRE=7200
```

### 3. 创建数据库

```bash
# 创建数据库
mysql -u root -p
CREATE DATABASE kangli_digital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# 导入表结构
mysql -u root -p kangli_digital < database.sql
```

### 4. 启动服务

```bash
# 开发环境
php think run -p 8080

# 访问
http://localhost:8080
```

---

## 项目结构

```
backend-php/
├── app/
│   ├── controller/          # 控制器
│   │   ├── api/            # 前端API
│   │   │   ├── News.php
│   │   │   ├── Videos.php
│   │   │   ├── Products.php
│   │   │   └── ...
│   │   └── admin/          # 管理后台API
│   │       ├── Auth.php
│   │       ├── Upload.php
│   │       └── ...
│   ├── model/              # 模型
│   │   ├── News.php
│   │   ├── Videos.php
│   │   └── ...
│   ├── middleware/         # 中间件
│   │   ├── Auth.php       # JWT认证
│   │   └── Cors.php       # 跨域处理
│   ├── validate/           # 验证器
│   └── common.php          # 公共函数
├── config/                 # 配置文件
├── database/              # 数据库文件
│   └── database.sql
├── route/                 # 路由
│   ├── api.php           # 前端API路由
│   └── admin.php         # 管理后台路由
├── public/               # 入口文件
├── .env.example          # 环境变量示例
├── composer.json         # Composer配置
└── README.md
```

---

## API文档

详见根目录 `API_DOCUMENTATION.md`

---

## 部署到阿里云

### 1. 服务器环境

- **操作系统**: CentOS 7+ / Ubuntu 18.04+
- **PHP**: 7.4+ / 8.0+
- **MySQL**: 5.7+ / 8.0+
- **Nginx**: 1.18+
- **Redis**: 5.0+

### 2. 安装环境（使用宝塔面板，推荐）

```bash
# 安装宝塔面板
wget -O install.sh http://download.bt.cn/install/install_6.0.sh
sh install.sh

# 访问宝塔面板
http://your_server_ip:8888

# 在宝塔面板中安装：
- Nginx 1.20+
- MySQL 5.7+
- PHP 7.4+ (安装扩展: redis, fileinfo, opcache)
- Redis
```

### 3. 配置Nginx

```nginx
server {
    listen 80;
    server_name api.kangli-digital.com;
    
    root /www/wwwroot/kangli-backend/public;
    index index.php index.html;

    # 开启CORS
    add_header 'Access-Control-Allow-Origin' '*' always;
    add_header 'Access-Control-Allow-Methods' 'GET, POST, PUT, DELETE, OPTIONS' always;
    add_header 'Access-Control-Allow-Headers' 'DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization' always;

    # 处理OPTIONS请求
    if ($request_method = 'OPTIONS') {
        return 204;
    }

    location / {
        if (!-e $request_filename) {
            rewrite ^(.*)$ /index.php?s=$1 last;
        }
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # 禁止访问敏感文件
    location ~ /\.(ht|env) {
        deny all;
    }
}
```

### 4. 配置SSL证书（推荐）

在宝塔面板中，可以一键申请Let's Encrypt免费SSL证书。

### 5. 配置阿里云OSS

1. 登录阿里云控制台
2. 开通OSS服务
3. 创建Bucket: `kangli-digital`
4. 配置跨域规则（允许前端域名访问）
5. 配置CDN加速（可选）
6. 获取AccessKey和SecretKey

---

## 常用命令

```bash
# 清除缓存
php think clear

# 生成API文档
php think build-api-docs

# 数据库迁移
php think migrate:run
```

---

## 开发进度

- [ ] Week 1: 基础框架搭建 + 资讯/视频API
- [ ] Week 2: 产品/方案API + 管理后台登录
- [ ] Week 3: 管理后台CRUD功能
- [ ] Week 4: 文件上传OSS + 系统配置
- [ ] Week 5: 测试 + 优化
- [ ] Week 6: 部署上线

---

## 安全建议

1. 使用HTTPS
2. JWT Token认证
3. SQL注入防护（使用ORM）
4. XSS防护
5. 文件上传类型验证
6. API限流
7. 日志记录

---

## 技术支持

如有问题，请联系前端开发团队。


