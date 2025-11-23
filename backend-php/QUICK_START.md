# 快速开始 - PHP后端

## 🎯 5分钟快速部署（本地开发）

### 1. 安装PHP环境

**Windows**: 推荐使用 phpstudy 或 xampp  
**Mac**: 推荐使用 MAMP 或 Homebrew  
**Linux**: 使用系统包管理器

```bash
# Ubuntu/Debian
sudo apt install php7.4 php7.4-mysql php7.4-redis composer

# CentOS
sudo yum install php74 php74-mysql php74-redis composer
```

### 2. 克隆代码

```bash
git clone your-repo-url
cd backend-php
```

### 3. 安装依赖

```bash
composer install
```

### 4. 配置数据库

```bash
# 创建数据库
mysql -u root -p
CREATE DATABASE kangli_digital CHARACTER SET utf8mb4;

# 导入表结构
mysql -u root -p kangli_digital < database/database.sql
```

### 5. 配置环境

```bash
# 复制环境配置
cp env.example .env

# 编辑 .env 文件，修改数据库配置
DATABASE_HOST=127.0.0.1
DATABASE_NAME=kangli_digital
DATABASE_USERNAME=root
DATABASE_PASSWORD=your_password
```

### 6. 启动服务

```bash
php think run -p 8080
```

### 7. 测试接口

访问：`http://localhost:8080/api/news`

---

## 📝 快速测试

### 测试资讯列表

```bash
curl http://localhost:8080/api/news
```

### 测试视频列表

```bash
curl http://localhost:8080/api/videos
```

### 测试管理员登录

```bash
curl -X POST http://localhost:8080/api/admin/login \
  -H "Content-Type: application/json" \
  -d '{"username":"admin","password":"admin123"}'
```

### 测试文件上传

```bash
curl -X POST http://localhost:8080/api/admin/upload \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -F "file=@/path/to/image.jpg" \
  -F "type=image"
```

---

## 🚀 下一步

1. 插入测试数据（参考 `database/test_data.sql`）
2. 配置阿里云OSS（文件上传功能）
3. 配置Redis（缓存功能）
4. 开发管理后台前端
5. 部署到阿里云（参考 `DEPLOY_ALIYUN.md`）

---

## 📚 文档

- [完整README](README.md)
- [API文档](../API_DOCUMENTATION.md)
- [数据库设计](../DATABASE_SCHEMA.md)
- [阿里云部署](DEPLOY_ALIYUN.md)

---

## 🆘 常见问题

### 1. Composer安装依赖失败

```bash
# 使用阿里云镜像
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

### 2. 端口被占用

```bash
# 使用其他端口
php think run -p 8081
```

### 3. 数据库连接失败

检查 `.env` 中的数据库配置是否正确

---

**开发愉快！** 🎉


