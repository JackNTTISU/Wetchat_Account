# 本地测试完整指南

## 🎯 目标

在本地环境完整测试前后端功能，确保一切正常后再部署到阿里云。

---

## 📋 准备工作

### 环境要求

1. **PHP环境**: PHP 7.4+（推荐使用 **phpStudy** 或 **XAMPP**）
2. **Node.js**: 14.0+
3. **MySQL**: 5.7+ / 8.0+
4. **Composer**: PHP包管理器
5. **浏览器**: Chrome / Edge

---

## 🚀 第一步：安装 phpStudy（推荐Windows用户）

### 1.1 下载phpStudy

访问：https://www.xp.cn/  
下载最新版phpStudy（小皮面板）

### 1.2 安装phpStudy

1. 运行安装程序
2. 选择安装路径（如：`D:\phpstudy_pro`）
3. 完成安装

### 1.3 启动服务

1. 打开phpStudy
2. 启动MySQL服务
3. 启动Nginx服务
4. PHP版本选择：7.4

---

## 📦 第二步：配置后端

### 2.1 放置后端代码

```
将 backend-php 文件夹复制到：
D:\phpstudy_pro\WWW\kangli-backend
```

### 2.2 安装Composer（如果没有）

在phpStudy中，工具 → Composer → 安装Composer

### 2.3 安装PHP依赖

打开命令行（cmd或PowerShell）：

```bash
cd D:\phpstudy_pro\WWW\kangli-backend
composer install
```

如果Composer很慢，使用阿里云镜像：
```bash
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

### 2.4 创建数据库

在phpStudy中：

1. 点击"数据库"
2. 创建数据库：
   - 名称：`kangli_digital`
   - 字符集：`utf8mb4`
   - 排序规则：`utf8mb4_unicode_ci`

### 2.5 导入数据库结构

方式1：使用phpStudy自带的phpMyAdmin
1. 点击"数据库" → "管理"
2. 选择 `kangli_digital` 数据库
3. 点击"导入"
4. 选择 `backend-php/database/database.sql`
5. 执行导入

方式2：使用命令行
```bash
mysql -u root -p kangli_digital < D:\phpstudy_pro\WWW\kangli-backend\database\database.sql
```

### 2.6 配置环境变量

在 `D:\phpstudy_pro\WWW\kangli-backend` 目录下：

1. 复制 `env.example` 为 `.env`
2. 编辑 `.env` 文件：

```env
APP_DEBUG=true

# 数据库配置
DATABASE_HOST=127.0.0.1
DATABASE_PORT=3306
DATABASE_NAME=kangli_digital
DATABASE_USERNAME=root
DATABASE_PASSWORD=root

# Redis配置（如果没装Redis可以暂时不用）
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

# JWT配置
JWT_SECRET=test_secret_key_for_local_development
JWT_EXPIRE=7200

# 跨域配置（允许所有来源）
CORS_ALLOW_ORIGIN=*
```

### 2.7 配置网站

在phpStudy中：

1. 点击"网站"
2. 创建网站：
   - 域名：`api.kangli.local`
   - 端口：`80`
   - 根目录：`D:\phpstudy_pro\WWW\kangli-backend\public`
   - PHP版本：`7.4`
3. 配置伪静态：
   ```
   if (!-e $request_filename) {
       rewrite ^(.*)$ /index.php?s=$1 last;
   }
   ```

### 2.8 配置本地hosts

编辑文件：`C:\Windows\System32\drivers\etc\hosts`

添加一行：
```
127.0.0.1  api.kangli.local
```

### 2.9 测试后端API

在浏览器访问：
```
http://api.kangli.local/api/news
```

应该看到JSON返回：
```json
{
  "code": 200,
  "message": "success",
  "data": {
    "list": [],
    "total": 0,
    "page": 1,
    "limit": 10
  }
}
```

---

## 💻 第三步：配置前端

### 3.1 安装前端依赖

打开命令行：

```bash
cd E:\myvue\companyP
npm install
```

### 3.2 配置API地址

创建或编辑 `.env` 文件：

```env
# API基础地址（指向本地后端）
VITE_API_BASE_URL=http://api.kangli.local

# 开发环境
VITE_APP_ENV=development
```

### 3.3 配置Vite代理（如果跨域）

编辑 `vite.config.js`：

```javascript
server: {
  port: 3000,
  open: true,
  proxy: {
    '/api': {
      target: 'http://api.kangli.local',
      changeOrigin: true
    }
  }
}
```

### 3.4 启动前端

```bash
npm run dev
```

浏览器会自动打开：`http://localhost:3000`

---

## 🧪 第四步：功能测试

### 4.1 测试资讯模块

#### 添加测试数据

在phpMyAdmin中执行：

```sql
INSERT INTO `news` (
    `title`, 
    `cover`, 
    `summary`, 
    `content`, 
    `author`, 
    `views`, 
    `is_published`, 
    `publish_time`
) VALUES (
    '康立数字与某集团达成战略合作',
    'https://via.placeholder.com/400x300/0066CC/ffffff?text=News+1',
    '双方将在智能制造、工业互联网等领域开展深度合作',
    '<p>2025年1月15日，康立数字科技有限公司与某大型制造集团正式签署战略合作协议。</p><p>根据协议，双方将在智能制造、工业互联网、数字化转型等领域开展深度合作。</p>',
    '康立数字',
    156,
    1,
    NOW()
);
```

#### 前端测试

1. 访问首页，查看资讯列表
2. 点击资讯，查看详情页
3. 检查浏览量是否增加

### 4.2 测试视频模块

#### 添加测试数据

```sql
INSERT INTO `videos` (
    `title`,
    `description`,
    `category`,
    `video_url`,
    `thumbnail_url`,
    `duration`,
    `views`,
    `is_published`,
    `is_featured`
) VALUES (
    '康立智能MES系统产品演示',
    '本视频详细演示了康立智能MES系统的核心功能',
    'product',
    'https://www.w3school.com.cn/example/html5/mov_bbb.mp4',
    'https://via.placeholder.com/400x225/0066CC/ffffff?text=MES系统演示',
    '05:32',
    1200,
    1,
    1
);
```

#### 前端测试

1. 首页查看精选视频
2. 点击"视频中心"查看列表
3. 点击视频播放
4. 测试分类筛选

### 4.3 测试管理员登录

#### 使用Postman或curl

```bash
curl -X POST http://api.kangli.local/api/admin/login \
  -H "Content-Type: application/json" \
  -d "{\"username\":\"admin\",\"password\":\"admin123\"}"
```

应该返回Token：
```json
{
  "code": 200,
  "message": "登录成功",
  "data": {
    "token": "eyJ0eXAiOiJKV1QiLCJhbG...",
    "user": {
      "id": 1,
      "username": "admin",
      "name": "超级管理员"
    }
  }
}
```

### 4.4 测试留言功能

1. 前端点击底部菜单"联系我们"
2. 点击键盘图标进入聊天
3. 发送消息
4. 点击"填写留言表单"
5. 填写并提交
6. 在数据库查看 `contact_messages` 表

---

## 🔍 第五步：调试技巧

### 5.1 查看PHP错误日志

phpStudy中：软件管理 → PHP → 日志

### 5.2 查看Nginx日志

phpStudy中：软件管理 → Nginx → 日志

### 5.3 前端调试

浏览器按F12，查看Network标签，检查API请求

### 5.4 数据库调试

使用phpMyAdmin查看数据变化

---

## ✅ 测试检查清单

### 后端
- [ ] phpStudy安装完成
- [ ] MySQL服务启动
- [ ] 数据库创建并导入
- [ ] Composer依赖安装
- [ ] .env配置正确
- [ ] 网站配置完成
- [ ] 测试API返回正常

### 前端
- [ ] npm依赖安装
- [ ] .env配置API地址
- [ ] 开发服务器启动
- [ ] 能访问首页

### 功能
- [ ] 资讯列表显示
- [ ] 资讯详情显示
- [ ] 视频列表显示
- [ ] 视频播放正常
- [ ] 聊天功能正常
- [ ] 留言提交成功
- [ ] 管理员登录成功

---

## 🐛 常见问题

### 1. API请求404

检查：
- phpStudy中网站配置的根目录是否指向 `public` 文件夹
- 伪静态规则是否配置
- hosts文件是否配置

### 2. 数据库连接失败

检查：
- MySQL服务是否启动
- `.env` 中数据库密码是否正确（默认是 `root`）

### 3. CORS跨域错误

方案1：在 `.env` 中设置：
```env
CORS_ALLOW_ORIGIN=*
```

方案2：使用Vite代理（前端 `vite.config.js`）

### 4. Composer安装慢

使用阿里云镜像：
```bash
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

### 5. 前端页面空白

检查浏览器控制台是否有错误，通常是API地址配置问题

---

## 📊 性能测试（可选）

### 1. API响应时间

使用Postman的"Tests"功能测试响应时间

### 2. 并发测试

使用Apache Bench工具：
```bash
ab -n 1000 -c 10 http://api.kangli.local/api/news
```

---

## 🎉 测试完成后

### 下一步：

1. ✅ 本地功能全部测试通过
2. 📦 准备真实内容（文字、图片、视频）
3. ☁️ 部署到阿里云（参考 `backend-php/DEPLOY_ALIYUN.md`）
4. 🎨 开发管理后台界面（可选）

---

## 📞 技术支持

如果遇到问题：

1. 检查PHP错误日志
2. 检查Nginx错误日志
3. 检查浏览器控制台
4. 查看数据库是否有数据

---

**预计本地环境搭建时间**: 30-60分钟

**祝测试顺利！** 🚀


