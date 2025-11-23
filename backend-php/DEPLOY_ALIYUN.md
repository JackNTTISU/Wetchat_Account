# 阿里云部署指南

## 📋 准备工作

### 1. 购买阿里云服务器（ECS）

- **配置推荐**：
  - CPU: 2核
  - 内存: 4GB
  - 带宽: 5Mbps
  - 系统盘: 40GB
  - 操作系统: CentOS 7.6 / Ubuntu 20.04

### 2. 购买域名并备案

- 在阿里云购买域名
- 完成ICP备案（必须）
- 域名解析：
  - `api.kangli-digital.com` → ECS公网IP
  - `www.kangli-digital.com` → 前端服务器IP

### 3. 开通阿里云OSS

- 登录阿里云控制台
- 开通对象存储OSS
- 创建Bucket: `kangli-digital`
- 设置为公共读
- 开通CDN加速（可选）

---

## 🚀 部署步骤

### 第一步：使用宝塔面板（推荐）

#### 1.1 安装宝塔面板

```bash
# 连接服务器
ssh root@your_server_ip

# 安装宝塔面板
yum install -y wget && wget -O install.sh http://download.bt.cn/install/install_6.0.sh && sh install.sh

# 记录安装完成后显示的：
# - 宝塔面板地址: http://your_ip:8888
# - 用户名: xxxxx
# - 密码: xxxxx
```

#### 1.2 登录宝塔面板

```
访问: http://your_server_ip:8888
输入用户名密码登录
```

#### 1.3 安装软件

在宝塔面板的"软件商店"中安装：

1. **Nginx** 1.20+ 
2. **MySQL** 5.7+
3. **PHP** 7.4
   - 安装扩展：
     - redis
     - fileinfo
     - opcache
     - mysqli
     - pdo_mysql
4. **Redis** 5.0+
5. **Composer**

---

### 第二步：配置数据库

#### 2.1 创建数据库

在宝塔面板 → 数据库 → 添加数据库

- 数据库名: `kangli_digital`
- 用户名: `kangli`
- 密码: 自动生成（记录下来）
- 权限: 所有人

#### 2.2 导入数据库结构

1. 在宝塔面板找到刚创建的数据库
2. 点击"导入"
3. 上传 `database/database.sql` 文件
4. 执行导入

---

### 第三步：上传代码

#### 3.1 创建网站

在宝塔面板 → 网站 → 添加站点

- 域名: `api.kangli-digital.com`
- 根目录: `/www/wwwroot/kangli-backend`
- PHP版本: 7.4
- 数据库: 选择刚创建的数据库

#### 3.2 上传代码

方式1：使用宝塔面板上传
- 将整个 `backend-php` 文件夹压缩成zip
- 在宝塔面板文件管理中上传
- 解压到 `/www/wwwroot/kangli-backend`

方式2：使用Git（推荐）
```bash
cd /www/wwwroot/
git clone your-repo-url kangli-backend
cd kangli-backend
composer install
```

#### 3.3 设置权限

```bash
cd /www/wwwroot/kangli-backend
chmod -R 755 ./
chown -R www:www ./
chmod -R 777 runtime/
```

---

### 第四步：配置环境

#### 4.1 创建.env文件

```bash
cd /www/wwwroot/kangli-backend
cp env.example .env
```

#### 4.2 编辑.env文件

在宝塔面板文件管理中编辑 `.env`：

```env
APP_DEBUG=false

# 数据库配置（使用宝塔创建的数据库信息）
DATABASE_HOST=127.0.0.1
DATABASE_PORT=3306
DATABASE_NAME=kangli_digital
DATABASE_USERNAME=kangli
DATABASE_PASSWORD=your_db_password

# Redis配置
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

# 阿里云OSS配置
OSS_ACCESS_KEY_ID=your_access_key_id
OSS_ACCESS_KEY_SECRET=your_access_key_secret
OSS_ENDPOINT=oss-cn-shanghai.aliyuncs.com
OSS_BUCKET=kangli-digital
OSS_CDN_DOMAIN=https://cdn.kangli-digital.com

# JWT配置
JWT_SECRET=your_random_secret_key_change_this
JWT_EXPIRE=7200

# 跨域配置
CORS_ALLOW_ORIGIN=https://www.kangli-digital.com
```

---

### 第五步：配置Nginx

#### 5.1 修改网站配置

在宝塔面板 → 网站 → api.kangli-digital.com → 设置 → 配置文件

```nginx
server {
    listen 80;
    server_name api.kangli-digital.com;
    root /www/wwwroot/kangli-backend/public;
    index index.php index.html;

    # 日志
    access_log /www/wwwlogs/api.kangli-digital.com.log;
    error_log /www/wwwlogs/api.kangli-digital.com.error.log;

    # CORS跨域配置
    add_header 'Access-Control-Allow-Origin' 'https://www.kangli-digital.com' always;
    add_header 'Access-Control-Allow-Methods' 'GET, POST, PUT, DELETE, OPTIONS' always;
    add_header 'Access-Control-Allow-Headers' 'DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization' always;
    add_header 'Access-Control-Allow-Credentials' 'true' always;

    # 处理OPTIONS请求
    if ($request_method = 'OPTIONS') {
        return 204;
    }

    # ThinkPHP URL重写
    location / {
        if (!-e $request_filename) {
            rewrite ^(.*)$ /index.php?s=$1 last;
        }
    }

    # PHP配置
    location ~ \.php$ {
        fastcgi_pass unix:/tmp/php-cgi-74.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # 禁止访问敏感文件
    location ~ /\.(ht|env|git) {
        deny all;
    }

    # 禁止访问runtime目录
    location ^~ /runtime/ {
        deny all;
    }
}
```

---

### 第六步：配置SSL证书（HTTPS）

#### 6.1 申请免费SSL证书

在宝塔面板 → 网站 → api.kangli-digital.com → SSL

1. 选择"Let's Encrypt"
2. 输入邮箱
3. 勾选域名
4. 点击"申请"
5. 开启"强制HTTPS"

#### 6.2 验证HTTPS

访问：`https://api.kangli-digital.com`

---

### 第七步：配置阿里云OSS

#### 7.1 开通OSS服务

1. 登录阿里云控制台
2. 搜索"对象存储OSS"
3. 点击"立即开通"

#### 7.2 创建Bucket

1. 进入OSS管理控制台
2. 创建Bucket：
   - Bucket名称: `kangli-digital`
   - 区域: 华东2（上海）
   - 存储类型: 标准存储
   - 读写权限: 公共读
   - 服务端加密: 无

#### 7.3 配置跨域规则

1. 进入Bucket设置
2. 跨域设置 → 创建规则：
   - 来源: `https://www.kangli-digital.com`
   - 允许Methods: `GET, POST, PUT, DELETE`
   - 允许Headers: `*`
   - 暴露Headers: `ETag`

#### 7.4 获取AccessKey

1. 点击右上角头像 → AccessKey管理
2. 创建AccessKey
3. 记录 `AccessKeyId` 和 `AccessKeySecret`
4. 填入 `.env` 文件

#### 7.5 配置CDN加速（可选）

1. 开通阿里云CDN服务
2. 添加域名加速: `cdn.kangli-digital.com`
3. 源站类型: OSS域名
4. 选择刚创建的Bucket
5. 配置CNAME解析

---

### 第八步：测试API

#### 8.1 测试基础接口

```bash
# 测试资讯列表
curl https://api.kangli-digital.com/api/news

# 测试视频列表
curl https://api.kangli-digital.com/api/videos
```

#### 8.2 测试管理员登录

```bash
curl -X POST https://api.kangli-digital.com/api/admin/login \
  -H "Content-Type: application/json" \
  -d '{"username":"admin","password":"admin123"}'
```

---

## 🛡️ 安全加固

### 1. 修改默认密码

```sql
-- 登录MySQL
mysql -u root -p

-- 使用数据库
USE kangli_digital;

-- 修改管理员密码（密码: new_password_123）
UPDATE admins SET password='$2y$10$...' WHERE username='admin';
```

使用PHP生成新密码：
```php
echo password_hash('new_password_123', PASSWORD_DEFAULT);
```

### 2. 配置防火墙

在宝塔面板 → 安全 → 端口规则

- 开放: 80, 443
- 关闭: 8888（宝塔面板端口，改成其他端口）
- 关闭: 3306（MySQL端口，只允许本地访问）

### 3. 配置SSH安全

```bash
# 修改SSH端口
vi /etc/ssh/sshd_config
# Port 22 改为 Port 10022

# 禁用root远程登录
# PermitRootLogin yes 改为 PermitRootLogin no

# 重启SSH服务
systemctl restart sshd
```

---

## 📊 性能优化

### 1. 开启PHP OpCache

在宝塔面板 → PHP 7.4 → 配置文件

确保以下配置开启：
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
```

### 2. 配置Redis缓存

在 `.env` 中配置Redis，ThinkPHP会自动使用Redis缓存

### 3. 开启Nginx Gzip压缩

在宝塔面板 → 网站 → 配置文件中添加：
```nginx
gzip on;
gzip_min_length 1k;
gzip_comp_level 5;
gzip_types text/plain text/css application/json application/javascript;
```

---

## 📝 维护

### 日志查看

```bash
# 查看Nginx日志
tail -f /www/wwwlogs/api.kangli-digital.com.log

# 查看PHP错误日志
tail -f /www/wwwroot/kangli-backend/runtime/log/error.log
```

### 数据库备份

在宝塔面板 → 计划任务 → 添加任务

- 类型: 备份数据库
- 数据库: kangli_digital
- 执行周期: 每天凌晨3点
- 保留: 7天

---

## 🆘 常见问题

### 1. 404错误

检查Nginx配置中的URL重写规则是否正确

### 2. 跨域错误

检查 `.env` 中的 `CORS_ALLOW_ORIGIN` 配置

### 3. 文件上传失败

检查：
- OSS配置是否正确
- PHP `upload_max_filesize` 和 `post_max_size` 限制
- 目录权限

### 4. JWT Token验证失败

检查 `.env` 中的 `JWT_SECRET` 是否配置

---

## ✅ 部署检查清单

- [ ] ECS服务器购买并配置
- [ ] 域名购买并完成备案
- [ ] 域名解析配置
- [ ] 宝塔面板安装
- [ ] Nginx、MySQL、PHP、Redis安装
- [ ] 数据库创建并导入结构
- [ ] 代码上传并配置
- [ ] .env环境变量配置
- [ ] Nginx配置
- [ ] SSL证书配置
- [ ] 阿里云OSS开通并配置
- [ ] API接口测试
- [ ] 修改默认密码
- [ ] 安全加固
- [ ] 性能优化
- [ ] 自动备份配置

---

**预计部署时间**: 2-3小时

**技术支持**: 如有问题请联系前端开发团队

