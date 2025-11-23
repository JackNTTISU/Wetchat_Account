# 康立数字服务号 - 后端对接指南

## 📋 项目概述

本项目前端已完成开发，所有需要动态管理的内容已预留API接口。后端开发可参考本文档进行对接。

---

## 🗂️ 文档清单

| 文档 | 说明 |
|------|------|
| `API_DOCUMENTATION.md` | 完整的API接口文档 |
| `DATABASE_SCHEMA.md` | 数据库表结构设计 |
| `src/api/index.js` | 前端API调用封装 |
| `env.example` | 环境变量配置示例 |

---

## 🎯 需要后台管理的内容

### **1. 最新资讯**
- 文章的增删改查
- 富文本编辑器支持
- 上架/下架控制
- 浏览量统计

### **2. 视频中心**
- 视频文件上传（建议使用OSS）
- 视频信息管理
- 分类管理
- 推荐视频设置
- 播放次数统计

### **3. 产品中心**
- 产品信息管理
- 多图上传
- 产品参数配置
- 上架/下架

### **4. 技术方案**
- 方案内容管理
- JSON格式数据（痛点、解决方案、案例等）
- 行业分类

### **5. 前瞻技术**
- 4个页面内容管理（家纺MES、注塑MES、智能仓储、设备TPM）
- 每个页面包含：概述、痛点、方案、优势、流程、案例

### **6. 公司信息**
- 公司宣传册图片管理（多图上传、排序）
- 联系我们信息管理（多个联系点）

### **7. 留言管理**
- 客户留言查看
- 留言状态管理（待处理、处理中、已完成）
- 留言回复

### **8. 系统配置**
- Banner管理
- 系统参数配置（公司名称、Logo、ICP备案号等）

---

## 🚀 快速开始

### **第1步：创建数据库**

```bash
# 创建数据库
CREATE DATABASE kangli_digital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# 导入表结构（参考 DATABASE_SCHEMA.md）
```

### **第2步：开发API接口**

参考 `API_DOCUMENTATION.md`，实现以下API：

#### **基础接口（优先）**
- `GET /api/news` - 资讯列表
- `GET /api/news/:id` - 资讯详情
- `GET /api/videos` - 视频列表
- `GET /api/videos/:id` - 视频详情
- `POST /api/contact/submit` - 提交留言

#### **管理接口**
- `POST /api/admin/login` - 管理员登录
- `POST /api/admin/upload` - 文件上传
- `POST /api/admin/{resource}` - 创建内容
- `PUT /api/admin/{resource}/:id` - 更新内容
- `DELETE /api/admin/{resource}/:id` - 删除内容

### **第3步：配置CORS**

允许前端域名跨域访问：

```javascript
// Node.js Express示例
app.use(cors({
  origin: ['http://localhost:3000', 'https://your-domain.com'],
  credentials: true
}))
```

### **第4步：文件上传方案**

推荐使用阿里云OSS或腾讯云COS：

```javascript
// 上传流程
1. 前端通过 /api/admin/upload 上传文件
2. 后端接收文件，上传到OSS
3. 返回CDN地址给前端
4. 前端保存CDN地址到数据库
```

### **第5步：配置环境变量**

前端配置（`.env` 文件）：
```bash
VITE_API_BASE_URL=https://api.kangli-digital.com
VITE_CDN_URL=https://cdn.kangli-digital.com
```

---

## 📊 数据返回格式规范

### **成功响应**
```json
{
  "code": 200,
  "message": "success",
  "data": {
    // 业务数据
  }
}
```

### **列表响应**
```json
{
  "code": 200,
  "data": {
    "list": [...],
    "total": 100,
    "page": 1,
    "limit": 10
  }
}
```

### **错误响应**
```json
{
  "code": 400,
  "message": "参数错误",
  "data": null
}
```

---

## 🔐 认证机制

### **管理后台认证**
使用JWT Token：

1. 登录成功后返回token
2. 后续请求在Header中携带token：
   ```
   Authorization: Bearer {token}
   ```
3. 后端验证token有效性

### **前端用户访问**
无需认证，直接访问公开API

---

## 🧪 测试建议

### **开发阶段**
1. 使用Postman测试API
2. 提供Mock数据
3. 编写单元测试

### **联调阶段**
1. 前后端在同一网络环境
2. 配置API代理避免跨域
3. 使用真实数据测试

---

## 📦 部署建议

### **后端部署**
- 使用Docker容器化部署
- 配置Nginx反向代理
- 启用HTTPS（SSL证书）
- 配置日志和监控

### **数据库**
- 配置主从复制
- 定期备份数据
- 优化慢查询

### **文件存储**
- 使用OSS/COS存储静态资源
- 配置CDN加速
- 设置合理的缓存策略

---

## 🛠️ 技术栈建议

### **后端框架推荐**
- **Node.js**: Express / Koa / NestJS
- **Java**: Spring Boot
- **PHP**: Laravel / ThinkPHP
- **Python**: Django / Flask

### **数据库**
- MySQL 5.7+ 或 8.0+
- Redis（缓存）

### **文件存储**
- 阿里云OSS
- 腾讯云COS
- 七牛云

---

## ⚠️ 注意事项

### **1. 安全**
- 所有输入数据做严格验证
- 防止SQL注入、XSS攻击
- 管理后台访问限制IP白名单
- 敏感信息加密存储

### **2. 性能**
- 接口响应时间 < 500ms
- 使用Redis缓存热点数据
- 图片使用CDN加速
- 数据库连接池配置

### **3. 兼容性**
- 接口遵循RESTful规范
- 返回格式统一
- 版本控制（如 /api/v1/）

---

## 📞 联系方式

如有API对接问题，请联系前端开发团队。

**开发进度建议**：
1. Week 1: 搭建基础框架 + 资讯/视频API
2. Week 2: 产品/方案API + 管理后台登录
3. Week 3: 管理后台CRUD功能
4. Week 4: 文件上传 + 系统配置
5. Week 5: 测试 + 优化
6. Week 6: 部署上线

---

## 📚 参考资源

- [RESTful API设计指南](https://restfulapi.net/)
- [JWT认证原理](https://jwt.io/)
- [MySQL索引优化](https://dev.mysql.com/doc/)
- [阿里云OSS文档](https://help.aliyun.com/product/31815.html)


