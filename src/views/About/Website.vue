<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">康立官网</div>
      <div class="page-subtitle">Visit Our Official Website</div>
    </div>

    <!-- 官网信息 -->
    <div class="card">
      <div class="card-title">🌐 官方网站</div>
      <div class="website-info">
        <div class="website-logo">康立数字</div>
        <div class="website-url">www.kangli-digital.com</div>
        <div class="website-desc">
          访问康立数字官方网站，获取最新产品信息、行业动态、技术文档和企业资讯。
        </div>
        <button class="btn" @click="openWebsite">
          🔗 访问官网
        </button>
      </div>
    </div>

    <!-- 官网特色 -->
    <div class="card">
      <div class="card-title">✨ 官网特色</div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon">📱</div>
          <div class="feature-content">
            <div class="feature-title">响应式设计</div>
            <div class="feature-desc">支持PC、平板、手机多端访问</div>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">📚</div>
          <div class="feature-content">
            <div class="feature-title">丰富资源</div>
            <div class="feature-desc">产品手册、视频教程、白皮书下载</div>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">💬</div>
          <div class="feature-content">
            <div class="feature-title">在线咨询</div>
            <div class="feature-desc">实时客服支持，快速响应需求</div>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">📰</div>
          <div class="feature-content">
            <div class="feature-title">新闻动态</div>
            <div class="feature-desc">行业资讯、公司新闻实时更新</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 网站截图 -->
    <div class="card">
      <div class="card-title">📸 网站预览</div>
      <div class="media-container">
        <img src="https://via.placeholder.com/800x500/667eea/ffffff?text=Official+Website+Preview" alt="官网预览">
      </div>
    </div>

    <!-- 快速链接 -->
    <div class="card">
      <div class="card-title">🔗 快速链接</div>
      <div class="quick-links">
        <a href="#" class="link-item" @click.prevent="openPage('products')">
          <span class="link-icon">📦</span>
          <span class="link-text">产品中心</span>
          <span class="link-arrow">›</span>
        </a>
        <a href="#" class="link-item" @click.prevent="openPage('solutions')">
          <span class="link-icon">💡</span>
          <span class="link-text">解决方案</span>
          <span class="link-arrow">›</span>
        </a>
        <a href="#" class="link-item" @click.prevent="openPage('cases')">
          <span class="link-icon">🏆</span>
          <span class="link-text">成功案例</span>
          <span class="link-arrow">›</span>
        </a>
        <a href="#" class="link-item" @click.prevent="openPage('download')">
          <span class="link-icon">📥</span>
          <span class="link-text">资料下载</span>
          <span class="link-arrow">›</span>
        </a>
        <a href="#" class="link-item" @click.prevent="openPage('news')">
          <span class="link-icon">📰</span>
          <span class="link-text">新闻中心</span>
          <span class="link-arrow">›</span>
        </a>
        <a href="#" class="link-item" @click.prevent="openPage('about')">
          <span class="link-icon">ℹ️</span>
          <span class="link-text">关于我们</span>
          <span class="link-arrow">›</span>
        </a>
      </div>
    </div>

    <!-- 二维码 -->
    <div class="card">
      <div class="card-title">📱 扫码访问</div>
      <div class="qrcode-container">
        <div class="qrcode-box">
          <img src="https://via.placeholder.com/200x200/667eea/ffffff?text=QR+Code" alt="官网二维码">
          <div class="qrcode-label">官网二维码</div>
        </div>
        <div class="qrcode-tip">
          使用微信扫一扫，快速访问康立数字官方网站
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const openWebsite = () => {
  // 在实际应用中，这里应该打开真实的官网地址
  window.open('https://www.kangli-digital.com', '_blank')
}

const openPage = (page) => {
  console.log('打开页面:', page)
  // 实际应用中跳转到对应页面
}
</script>

<style scoped>
.website-info {
  text-align: center;
  padding: 20px 0;
}

.website-logo {
  font-size: 36px;
  font-weight: bold;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 15px;
}

.website-url {
  font-size: 18px;
  color: #667eea;
  margin-bottom: 15px;
  font-weight: 500;
}

.website-desc {
  font-size: 14px;
  color: #666;
  line-height: 1.8;
  margin-bottom: 25px;
  padding: 0 20px;
}

.feature-list {
  margin-top: 15px;
}

.feature-item {
  display: flex;
  align-items: center;
  padding: 15px;
  margin-bottom: 12px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.feature-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.feature-icon {
  font-size: 32px;
  margin-right: 15px;
}

.feature-content {
  flex: 1;
}

.feature-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 4px;
}

.feature-desc {
  font-size: 13px;
  color: #666;
}

.quick-links {
  margin-top: 15px;
}

.link-item {
  display: flex;
  align-items: center;
  padding: 15px;
  margin-bottom: 10px;
  background: white;
  border: 2px solid #e8e8e8;
  border-radius: 12px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.link-item:hover {
  border-color: #667eea;
  transform: translateX(5px);
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
}

.link-icon {
  font-size: 24px;
  margin-right: 12px;
}

.link-text {
  flex: 1;
  font-size: 15px;
  color: #333;
  font-weight: 500;
}

.link-arrow {
  font-size: 24px;
  color: #ccc;
}

.qrcode-container {
  text-align: center;
  padding: 20px 0;
}

.qrcode-box {
  display: inline-block;
  padding: 20px;
  background: white;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  margin-bottom: 15px;
}

.qrcode-box img {
  width: 200px;
  height: 200px;
  border-radius: 12px;
  display: block;
}

.qrcode-label {
  margin-top: 12px;
  font-size: 14px;
  color: #666;
  font-weight: 500;
}

.qrcode-tip {
  font-size: 13px;
  color: #999;
  padding: 0 20px;
}
</style>

