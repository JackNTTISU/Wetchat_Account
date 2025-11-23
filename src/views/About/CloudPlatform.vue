<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">康立云平台</div>
      <div class="page-subtitle">Smart Manufacturing Cloud Platform</div>
    </div>

    <!-- 平台介绍 -->
    <div class="card platform-intro">
      <div class="platform-logo">☁️</div>
      <div class="platform-name">康立智能制造云平台</div>
      <div class="platform-slogan">连接设备 · 数据驱动 · 智能决策</div>
      <button class="btn" @click="login">
        🚀 立即登录
      </button>
    </div>

    <!-- 平台功能 -->
    <div class="card">
      <div class="card-title">💎 核心功能</div>
      <div class="function-grid">
        <div class="function-item">
          <div class="function-icon">📊</div>
          <div class="function-title">实时监控</div>
          <div class="function-desc">设备状态实时展示</div>
        </div>
        <div class="function-item">
          <div class="function-icon">📈</div>
          <div class="function-title">数据分析</div>
          <div class="function-desc">生产数据智能分析</div>
        </div>
        <div class="function-item">
          <div class="function-icon">⚡</div>
          <div class="function-title">远程控制</div>
          <div class="function-desc">设备远程操作管理</div>
        </div>
        <div class="function-item">
          <div class="function-icon">🔔</div>
          <div class="function-title">报警预警</div>
          <div class="function-desc">异常情况及时通知</div>
        </div>
        <div class="function-item">
          <div class="function-icon">📱</div>
          <div class="function-title">移动应用</div>
          <div class="function-desc">随时随地移动办公</div>
        </div>
        <div class="function-item">
          <div class="function-icon">🔐</div>
          <div class="function-title">安全可靠</div>
          <div class="function-desc">企业级安全保障</div>
        </div>
      </div>
    </div>

    <!-- 平台优势 -->
    <div class="card">
      <div class="card-title">🌟 平台优势</div>
      <div class="advantage-list">
        <div class="advantage-item">
          <div class="advantage-badge">1</div>
          <div class="advantage-content">
            <div class="advantage-title">云端部署，轻松接入</div>
            <div class="advantage-desc">无需复杂配置，快速接入设备，降低IT成本</div>
          </div>
        </div>
        <div class="advantage-item">
          <div class="advantage-badge">2</div>
          <div class="advantage-content">
            <div class="advantage-title">海量数据，安全存储</div>
            <div class="advantage-desc">支持PB级数据存储，多重备份保障数据安全</div>
          </div>
        </div>
        <div class="advantage-item">
          <div class="advantage-badge">3</div>
          <div class="advantage-content">
            <div class="advantage-title">智能算法，精准分析</div>
            <div class="advantage-desc">AI算法加持，提供智能决策支持</div>
          </div>
        </div>
        <div class="advantage-item">
          <div class="advantage-badge">4</div>
          <div class="advantage-content">
            <div class="advantage-title">开放接口，灵活扩展</div>
            <div class="advantage-desc">提供标准API，支持第三方系统对接</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 平台截图 -->
    <div class="card">
      <div class="card-title">📸 平台展示</div>
      <div class="screenshot-grid">
        <div class="screenshot-item">
          <img src="https://via.placeholder.com/400x300/667eea/ffffff?text=Dashboard" alt="仪表盘">
          <div class="screenshot-label">智能仪表盘</div>
        </div>
        <div class="screenshot-item">
          <img src="https://via.placeholder.com/400x300/764ba2/ffffff?text=Device+Monitor" alt="设备监控">
          <div class="screenshot-label">设备监控</div>
        </div>
        <div class="screenshot-item">
          <img src="https://via.placeholder.com/400x300/f093fb/ffffff?text=Data+Analysis" alt="数据分析">
          <div class="screenshot-label">数据分析</div>
        </div>
        <div class="screenshot-item">
          <img src="https://via.placeholder.com/400x300/4facfe/ffffff?text=Report+Center" alt="报表中心">
          <div class="screenshot-label">报表中心</div>
        </div>
      </div>
    </div>

    <!-- 使用统计 -->
    <div class="stats-card">
      <div class="card-title" style="color: white;">📊 平台数据</div>
      <div class="cloud-stats">
        <div class="cloud-stat-item">
          <div class="cloud-stat-number">10,000+</div>
          <div class="cloud-stat-label">接入设备</div>
        </div>
        <div class="cloud-stat-item">
          <div class="cloud-stat-number">500+</div>
          <div class="cloud-stat-label">企业用户</div>
        </div>
        <div class="cloud-stat-item">
          <div class="cloud-stat-number">99.9%</div>
          <div class="cloud-stat-label">在线率</div>
        </div>
        <div class="cloud-stat-item">
          <div class="cloud-stat-number">1PB+</div>
          <div class="cloud-stat-label">数据存储</div>
        </div>
      </div>
    </div>

    <!-- 登录入口 -->
    <div class="card">
      <div class="card-title">🔑 快速登录</div>
      <div class="login-options">
        <button class="login-btn primary" @click="login">
          <span class="login-icon">🖥️</span>
          <span class="login-text">Web端登录</span>
        </button>
        <button class="login-btn" @click="downloadApp">
          <span class="login-icon">📱</span>
          <span class="login-text">移动端下载</span>
        </button>
      </div>
      <div class="login-tip">
        💡 提示：首次使用请联系管理员开通账号
      </div>
    </div>
  </div>
</template>

<script setup>
const login = () => {
  // 实际应用中跳转到登录页面
  console.log('跳转到云平台登录')
  window.open('https://cloud.kangli-digital.com', '_blank')
}

const downloadApp = () => {
  console.log('下载移动端应用')
}
</script>

<style scoped>
.platform-intro {
  text-align: center;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 40px 20px;
}

.platform-logo {
  font-size: 64px;
  margin-bottom: 20px;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.platform-name {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.platform-slogan {
  font-size: 14px;
  opacity: 0.9;
  margin-bottom: 25px;
}

.function-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.function-item {
  text-align: center;
  padding: 20px 10px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.function-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.function-icon {
  font-size: 32px;
  margin-bottom: 10px;
}

.function-title {
  font-size: 15px;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.function-desc {
  font-size: 12px;
  color: #666;
}

.advantage-list {
  margin-top: 15px;
}

.advantage-item {
  display: flex;
  align-items: flex-start;
  padding: 15px;
  margin-bottom: 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
}

.advantage-badge {
  width: 32px;
  height: 32px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 16px;
  margin-right: 15px;
  flex-shrink: 0;
}

.advantage-content {
  flex: 1;
}

.advantage-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.advantage-desc {
  font-size: 13px;
  color: #666;
  line-height: 1.6;
}

.screenshot-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.screenshot-item {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.screenshot-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.screenshot-item img {
  width: 100%;
  height: auto;
  display: block;
}

.screenshot-label {
  padding: 10px;
  text-align: center;
  background: white;
  font-size: 13px;
  color: #666;
}

.stats-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.cloud-stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-top: 20px;
}

.cloud-stat-item {
  text-align: center;
  padding: 20px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
}

.cloud-stat-number {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 8px;
}

.cloud-stat-label {
  font-size: 13px;
  opacity: 0.9;
}

.login-options {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin: 20px 0;
}

.login-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border: 2px solid #e8e8e8;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.login-btn.primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
}

.login-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.login-icon {
  font-size: 32px;
  margin-bottom: 10px;
}

.login-text {
  font-size: 14px;
  font-weight: 500;
}

.login-tip {
  text-align: center;
  font-size: 13px;
  color: #999;
  padding: 15px;
  background: #f5f7fa;
  border-radius: 8px;
}

@media (max-width: 768px) {
  .function-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 480px) {
  .function-grid,
  .screenshot-grid,
  .cloud-stats,
  .login-options {
    grid-template-columns: 1fr;
  }
}
</style>

