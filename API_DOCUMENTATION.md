# 康立数字服务号 - API接口文档

## 基础信息

**Base URL**: `https://your-domain.com/api`

**通用响应格式**:
```json
{
  "code": 200,
  "message": "success",
  "data": {...}
}
```

**错误码说明**:
- `200`: 成功
- `400`: 参数错误
- `401`: 未授权
- `404`: 资源不存在
- `500`: 服务器错误

---

## 1. 资讯管理

### 1.1 获取资讯列表

**接口**: `GET /news`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| page | int | 否 | 页码，默认1 |
| limit | int | 否 | 每页数量，默认10 |
| keyword | string | 否 | 搜索关键词 |

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "list": [
      {
        "id": 1,
        "title": "康立数字与某集团达成战略合作",
        "cover": "https://cdn.example.com/news/cover1.jpg",
        "summary": "双方将在智能制造、工业互联网等领域开展深度合作",
        "date": "2025-01-15",
        "views": 156
      }
    ],
    "total": 50,
    "page": 1,
    "limit": 10
  }
}
```

### 1.2 获取资讯详情

**接口**: `GET /news/:id`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| id | int | 是 | 资讯ID |

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "id": 1,
    "title": "康立数字与某集团达成战略合作",
    "cover": "https://cdn.example.com/news/cover1.jpg",
    "summary": "双方将在智能制造、工业互联网等领域开展深度合作",
    "content": "<p>富文本内容...</p>",
    "date": "2025-01-15",
    "views": 156,
    "author": "康立数字",
    "created_at": "2025-01-15 10:00:00"
  }
}
```

### 1.3 增加浏览量

**接口**: `POST /news/:id/view`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| id | int | 是 | 资讯ID |

**响应**:
```json
{
  "code": 200,
  "message": "success"
}
```

---

## 2. 视频管理

### 2.1 获取视频列表

**接口**: `GET /videos`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| page | int | 否 | 页码，默认1 |
| limit | int | 否 | 每页数量，默认20 |
| category | string | 否 | 分类：product/case/tech/company |
| keyword | string | 否 | 搜索关键词 |
| is_featured | int | 否 | 是否推荐：0-否，1-是 |

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "list": [
      {
        "id": 1,
        "title": "康立智能MES系统产品演示",
        "thumbnail": "https://cdn.example.com/videos/thumb1.jpg",
        "duration": "05:32",
        "views": 12000,
        "date": "2024-01-15",
        "category": "product",
        "url": "https://cdn.example.com/videos/mes-demo.mp4"
      }
    ],
    "total": 100,
    "page": 1,
    "limit": 20
  }
}
```

### 2.2 获取视频详情

**接口**: `GET /videos/:id`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "id": 1,
    "title": "康立智能MES系统产品演示",
    "thumbnail": "https://cdn.example.com/videos/thumb1.jpg",
    "url": "https://cdn.example.com/videos/mes-demo.mp4",
    "duration": "05:32",
    "views": 12000,
    "date": "2024-01-15",
    "category": "product",
    "description": "本视频详细演示了康立智能MES系统的核心功能...",
    "created_at": "2024-01-15 10:00:00"
  }
}
```

### 2.3 记录视频播放

**接口**: `POST /videos/:id/play`

**响应**:
```json
{
  "code": 200,
  "message": "success"
}
```

---

## 3. 产品管理

### 3.1 获取产品列表

**接口**: `GET /products`

**参数**: 同资讯列表

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "list": [
      {
        "id": 1,
        "title": "康立智能MES系统",
        "cover": "https://cdn.example.com/products/mes.jpg",
        "summary": "制造执行系统，实现生产过程数字化管理",
        "category": "软件系统",
        "created_at": "2024-01-10"
      }
    ],
    "total": 20,
    "page": 1,
    "limit": 10
  }
}
```

### 3.2 获取产品详情

**接口**: `GET /products/:id`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "id": 1,
    "title": "康立智能MES系统",
    "cover": "https://cdn.example.com/products/mes.jpg",
    "summary": "制造执行系统",
    "description": "<p>详细介绍...</p>",
    "features": [
      "生产计划管理",
      "质量追溯",
      "数据分析"
    ],
    "specifications": {
      "部署方式": "云端/本地",
      "支持用户": "1000+",
      "响应时间": "< 1s"
    },
    "images": [
      "https://cdn.example.com/products/mes-1.jpg",
      "https://cdn.example.com/products/mes-2.jpg"
    ],
    "video_url": "https://cdn.example.com/videos/mes-demo.mp4"
  }
}
```

---

## 4. 技术方案管理

### 4.1 获取方案列表

**接口**: `GET /solutions`

**参数**: 同产品列表

### 4.2 获取方案详情

**接口**: `GET /solutions/:id`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "id": 1,
    "title": "家纺行业智能制造解决方案",
    "cover": "https://cdn.example.com/solutions/textile.jpg",
    "overview": "针对家纺行业特点，提供从订单到交付的全流程数字化解决方案",
    "pain_points": [
      {
        "title": "订单管理混乱",
        "description": "多品种小批量订单难以管理"
      }
    ],
    "solutions": [
      {
        "title": "智能排产系统",
        "description": "自动生成生产计划，优化产能"
      }
    ],
    "advantages": [
      "生产效率提升30%",
      "交货准时率提升至98%"
    ],
    "process": [
      {
        "step": 1,
        "title": "需求调研",
        "description": "深入了解客户现状"
      }
    ],
    "cases": [
      {
        "company": "某大型家纺企业",
        "description": "导入MES系统后效率提升40%",
        "image": "https://cdn.example.com/cases/case1.jpg"
      }
    ]
  }
}
```

---

## 5. 前瞻技术管理

### 5.1 获取技术页面内容

**接口**: `GET /technology/:type`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| type | string | 是 | textile-mes/injection-mes/smart-warehouse/equipment-tpm |

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "type": "textile-mes",
    "title": "家纺MES管理系统",
    "banner": "https://cdn.example.com/tech/textile-banner.jpg",
    "overview": "专为家纺行业设计的MES系统...",
    "pain_points": [...],
    "solutions": [...],
    "advantages": [...],
    "process": [...],
    "cases": [...]
  }
}
```

---

## 6. 公司信息管理

### 6.1 获取公司宣传册

**接口**: `GET /company/brochure`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "images": [
      {
        "id": 1,
        "url": "https://cdn.example.com/brochure/page1.jpg",
        "sort": 1
      },
      {
        "id": 2,
        "url": "https://cdn.example.com/brochure/page2.jpg",
        "sort": 2
      }
    ]
  }
}
```

### 6.2 获取联系信息

**接口**: `GET /company/contact`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "contacts": [
      {
        "id": 1,
        "name": "总部",
        "address": "江苏省苏州市工业园区xxx路xxx号",
        "phone": "0512-12345678",
        "email": "contact@kangli.com",
        "manager": "张经理",
        "mobile": "138-0000-0000",
        "description": "负责华东地区业务"
      }
    ]
  }
}
```

---

## 7. 留言管理

### 7.1 提交留言

**接口**: `POST /contact/submit`

**请求体**:
```json
{
  "name": "张三",
  "phone": "13800138000",
  "email": "zhangsan@example.com",
  "company": "某制造企业",
  "message": "咨询MES系统相关信息"
}
```

**响应**:
```json
{
  "code": 200,
  "message": "提交成功，我们会尽快与您联系"
}
```

---

## 8. Banner管理

### 8.1 获取Banner列表

**接口**: `GET /banners`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "banners": [
      {
        "id": 1,
        "title": "康立数字",
        "image": "https://cdn.example.com/banners/home.jpg",
        "link": "/about",
        "sort": 1
      }
    ]
  }
}
```

---

## 9. 系统配置

### 9.1 获取系统配置

**接口**: `GET /system/config`

**响应示例**:
```json
{
  "code": 200,
  "data": {
    "company_name": "康立数字科技有限公司",
    "logo": "https://cdn.example.com/logo.png",
    "icp": "苏ICP备xxxxxxxx号",
    "service_hotline": "400-xxx-xxxx",
    "wechat_qr": "https://cdn.example.com/wechat-qr.jpg"
  }
}
```

---

## 10. 管理后台接口（需要认证）

### 10.1 管理员登录

**接口**: `POST /admin/login`

**请求体**:
```json
{
  "username": "admin",
  "password": "password"
}
```

**响应**:
```json
{
  "code": 200,
  "data": {
    "token": "eyJhbGciOiJIUzI1NiIs...",
    "user": {
      "id": 1,
      "username": "admin",
      "name": "管理员"
    }
  }
}
```

### 10.2 上传文件

**接口**: `POST /admin/upload`

**Content-Type**: `multipart/form-data`

**参数**:
| 参数 | 类型 | 必填 | 说明 |
|------|------|------|------|
| file | File | 是 | 文件 |
| type | string | 是 | 类型：image/video/document |

**响应**:
```json
{
  "code": 200,
  "data": {
    "url": "https://cdn.example.com/uploads/xxx.jpg",
    "filename": "xxx.jpg",
    "size": 102400
  }
}
```

### 10.3 内容管理（CRUD）

所有内容管理接口格式统一：

- 创建: `POST /admin/{resource}`
- 更新: `PUT /admin/{resource}/:id`
- 删除: `DELETE /admin/{resource}/:id`
- 上架/下架: `PATCH /admin/{resource}/:id/publish`

**Headers**: 
```
Authorization: Bearer {token}
```

---

## 数据库表结构建议

详见：`DATABASE_SCHEMA.md`

---

## 附录

### 环境变量配置

创建 `.env` 文件：
```bash
# API基础地址
VITE_API_BASE_URL=https://api.kangli-digital.com

# CDN地址
VITE_CDN_URL=https://cdn.kangli-digital.com

# 环境
VITE_APP_ENV=production
```

### 跨域配置

后端需配置CORS允许前端域名访问。

### 认证机制

管理后台使用JWT认证，普通API无需认证。


