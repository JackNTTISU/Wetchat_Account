<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">数采网关系统</div>
      <div class="page-subtitle">Data Acquisition Gateway</div>
    </div>

    <!-- 产品介绍 -->
    <div class="card">
      <div class="card-title">📡 产品概述</div>
      <div class="card-content">
        <p>康立数采网关系统是专为工业现场设计的数据采集与传输设备，支持多种工业协议转换，实现设备数据的实时采集、处理和上云，是工业物联网的核心组件。</p>
      </div>
    </div>

    <!-- 产品图片 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x400/f093fb/ffffff?text=Data+Gateway" alt="数采网关">
    </div>

    <!-- 核心功能 -->
    <div class="card">
      <div class="card-title">⚙️ 核心功能</div>
      <div class="feature-grid">
        <div class="feature-box">
          <div class="feature-icon">📊</div>
          <div class="feature-title">数据采集</div>
          <div class="feature-desc">支持多设备并发采集，采集频率可达毫秒级</div>
        </div>
        <div class="feature-box">
          <div class="feature-icon">🔄</div>
          <div class="feature-title">协议转换</div>
          <div class="feature-desc">支持100+种工业协议互转，无缝对接</div>
        </div>
        <div class="feature-box">
          <div class="feature-icon">☁️</div>
          <div class="feature-title">云端推送</div>
          <div class="feature-desc">数据实时推送到云平台，支持MQTT、HTTP</div>
        </div>
        <div class="feature-box">
          <div class="feature-icon">💾</div>
          <div class="feature-title">本地存储</div>
          <div class="feature-desc">断网续传，数据不丢失</div>
        </div>
        <div class="feature-box">
          <div class="feature-icon">🔐</div>
          <div class="feature-title">安全加密</div>
          <div class="feature-desc">数据传输加密，保障信息安全</div>
        </div>
        <div class="feature-box">
          <div class="feature-icon">📱</div>
          <div class="feature-title">远程配置</div>
          <div class="feature-desc">支持远程参数配置和固件升级</div>
        </div>
      </div>
    </div>

    <!-- 支持协议 -->
    <div class="card">
      <div class="card-title">🔗 支持协议</div>
      <div class="protocol-list">
        <span class="badge">Modbus TCP/RTU</span>
        <span class="badge">OPC UA</span>
        <span class="badge">Profinet</span>
        <span class="badge">EtherCAT</span>
        <span class="badge">MQTT</span>
        <span class="badge">HTTP/HTTPS</span>
        <span class="badge">S7-1200/1500</span>
        <span class="badge">Fins</span>
        <span class="badge">MC Protocol</span>
        <span class="badge">BACnet</span>
        <span class="badge">CAN/CANopen</span>
        <span class="badge">DNP3</span>
      </div>
    </div>

    <!-- 技术参数 -->
    <div class="card">
      <div class="card-title">📋 技术规格</div>
      <div class="spec-grid">
        <div class="spec-card">
          <div class="spec-icon">🖥️</div>
          <div class="spec-name">处理器</div>
          <div class="spec-detail">ARM Cortex-A7 双核</div>
        </div>
        <div class="spec-card">
          <div class="spec-icon">💿</div>
          <div class="spec-name">存储</div>
          <div class="spec-detail">1GB RAM + 8GB Flash</div>
        </div>
        <div class="spec-card">
          <div class="spec-icon">🌐</div>
          <div class="spec-name">网络</div>
          <div class="spec-detail">双网口 10/100/1000M</div>
        </div>
        <div class="spec-card">
          <div class="spec-icon">🔌</div>
          <div class="spec-name">串口</div>
          <div class="spec-detail">4路RS485 + 2路RS232</div>
        </div>
        <div class="spec-card">
          <div class="spec-icon">⚡</div>
          <div class="spec-name">供电</div>
          <div class="spec-detail">24V DC (9-36V宽压)</div>
        </div>
        <div class="spec-card">
          <div class="spec-icon">🌡️</div>
          <div class="spec-name">工作温度</div>
          <div class="spec-detail">-40℃ ~ 85℃</div>
        </div>
      </div>
    </div>

    <!-- 应用场景 -->
    <div class="card">
      <div class="card-title">🏭 应用场景</div>
      <div class="scene-cards">
        <div class="scene-card">
          <div class="scene-icon">🏢</div>
          <div class="scene-title">智能工厂</div>
          <div class="scene-desc">采集生产设备数据，实现产线可视化监控</div>
        </div>
        <div class="scene-card">
          <div class="scene-icon">⚙️</div>
          <div class="scene-title">设备互联</div>
          <div class="scene-desc">连接不同品牌设备，实现数据统一管理</div>
        </div>
        <div class="scene-card">
          <div class="scene-icon">📈</div>
          <div class="scene-title">能源管理</div>
          <div class="scene-desc">采集能耗数据，优化能源使用效率</div>
        </div>
        <div class="scene-card">
          <div class="scene-icon">🔧</div>
          <div class="scene-title">设备运维</div>
          <div class="scene-desc">实时监控设备状态，预测性维护</div>
        </div>
      </div>
    </div>

    <!-- 产品图集 -->
    <div class="card">
      <div class="card-title">📸 产品图集</div>
      <div class="gallery-grid">
        <div class="gallery-item">
          <img src="https://via.placeholder.com/400x300/f093fb/ffffff?text=Gateway+1" alt="网关外观">
        </div>
        <div class="gallery-item">
          <img src="https://via.placeholder.com/400x300/f5576c/ffffff?text=Gateway+2" alt="接口细节">
        </div>
        <div class="gallery-item">
          <img src="https://via.placeholder.com/400x300/ff6b9d/ffffff?text=Gateway+3" alt="安装现场">
        </div>
        <div class="gallery-item">
          <img src="https://via.placeholder.com/400x300/c471ed/ffffff?text=Gateway+4" alt="配置界面">
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.feature-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.feature-box {
  text-align: center;
  padding: 20px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.feature-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.feature-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.feature-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 8px;
}

.feature-desc {
  font-size: 12px;
  color: #666;
  line-height: 1.5;
}

.protocol-list {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 15px;
}

.spec-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.spec-card {
  text-align: center;
  padding: 20px 15px;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  border-radius: 12px;
  transition: all 0.3s ease;
}

.spec-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(240, 147, 251, 0.4);
}

.spec-icon {
  font-size: 32px;
  margin-bottom: 8px;
}

.spec-name {
  font-size: 14px;
  margin-bottom: 5px;
  opacity: 0.9;
}

.spec-detail {
  font-size: 15px;
  font-weight: bold;
}

.scene-cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.scene-card {
  text-align: center;
  padding: 25px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.scene-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.scene-icon {
  font-size: 40px;
  margin-bottom: 12px;
}

.scene-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 8px;
}

.scene-desc {
  font-size: 13px;
  color: #666;
  line-height: 1.5;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.gallery-item {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.gallery-item:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.gallery-item img {
  width: 100%;
  height: auto;
  display: block;
}

@media (max-width: 480px) {
  .feature-grid,
  .spec-grid,
  .scene-cards,
  .gallery-grid {
    grid-template-columns: 1fr;
  }
}
</style>

