<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">设备上云解决方案</div>
      <div class="page-subtitle">Device Cloud Connection Solutions</div>
    </div>

    <!-- 方案介绍 -->
    <div class="card">
      <div class="card-title">☁️ 方案概述</div>
      <div class="card-content">
        <p>康立设备上云解决方案，通过工业网关实现设备数据采集上云，结合云平台实现设备远程监控、数据分析、预测性维护等功能，帮助企业实现设备管理的数字化转型。</p>
      </div>
    </div>

    <!-- 方案架构 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x500/f093fb/ffffff?text=Cloud+Architecture" alt="云架构图">
    </div>

    <!-- 方案架构层级 -->
    <div class="card">
      <div class="card-title">🏗️ 架构层级</div>
      <div class="architecture-stack">
        <div class="arch-layer" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
          <div class="arch-level">应用层</div>
          <div class="arch-content">Web/APP | 数据分析 | 报表系统 | 远程运维</div>
        </div>
        <div class="arch-arrow">↕️</div>
        <div class="arch-layer" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
          <div class="arch-level">平台层</div>
          <div class="arch-content">云平台 | 数据存储 | 消息队列 | API服务</div>
        </div>
        <div class="arch-arrow">↕️</div>
        <div class="arch-layer" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
          <div class="arch-level">边缘层</div>
          <div class="arch-content">边缘网关 | 数据采集 | 协议转换 | 边缘计算</div>
        </div>
        <div class="arch-arrow">↕️</div>
        <div class="arch-layer" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
          <div class="arch-level">设备层</div>
          <div class="arch-content">PLC | 传感器 | 仪表 | 机床 | 其他设备</div>
        </div>
      </div>
    </div>

    <!-- 核心功能 -->
    <div class="card">
      <div class="card-title">⚙️ 核心功能</div>
      <div class="function-grid">
        <div class="function-card">
          <div class="function-icon">📊</div>
          <div class="function-title">实时监控</div>
          <div class="function-desc">设备状态、运行参数实时展示</div>
        </div>
        <div class="function-card">
          <div class="function-icon">📈</div>
          <div class="function-title">数据分析</div>
          <div class="function-desc">历史数据统计分析与可视化</div>
        </div>
        <div class="function-card">
          <div class="function-icon">🔔</div>
          <div class="function-title">报警管理</div>
          <div class="function-desc">异常报警、多种通知方式</div>
        </div>
        <div class="function-card">
          <div class="function-icon">⚡</div>
          <div class="function-title">远程控制</div>
          <div class="function-desc">远程启停、参数调整</div>
        </div>
        <div class="function-card">
          <div class="function-icon">🤖</div>
          <div class="function-title">智能诊断</div>
          <div class="function-desc">AI算法故障预测诊断</div>
        </div>
        <div class="function-card">
          <div class="function-icon">📱</div>
          <div class="function-title">移动应用</div>
          <div class="function-desc">手机端随时随地查看</div>
        </div>
      </div>
    </div>

    <!-- 方案优势 -->
    <div class="advantage-section">
      <div class="card-title" style="color: white; margin-bottom: 20px;">💪 方案优势</div>
      <div class="advantage-cards">
        <div class="adv-card">
          <div class="adv-icon">🚀</div>
          <div class="adv-title">快速部署</div>
          <div class="adv-desc">无需改造设备，网关即插即用，1天完成部署</div>
        </div>
        <div class="adv-card">
          <div class="adv-icon">💰</div>
          <div class="adv-title">成本优化</div>
          <div class="adv-desc">降低IT基础设施投入，按需付费模式</div>
        </div>
        <div class="adv-card">
          <div class="adv-icon">🔐</div>
          <div class="adv-title">安全可靠</div>
          <div class="adv-desc">数据加密传输，多重安全防护机制</div>
        </div>
        <div class="adv-card">
          <div class="adv-icon">📊</div>
          <div class="adv-title">海量数据</div>
          <div class="adv-desc">支持海量设备接入，PB级数据存储</div>
        </div>
        <div class="adv-card">
          <div class="adv-icon">🔧</div>
          <div class="adv-title">灵活扩展</div>
          <div class="adv-desc">支持水平扩展，随业务增长弹性扩容</div>
        </div>
        <div class="adv-card">
          <div class="adv-icon">🌐</div>
          <div class="adv-title">多端访问</div>
          <div class="adv-desc">Web、APP、大屏多终端支持</div>
        </div>
      </div>
    </div>

    <!-- 应用价值 -->
    <div class="card">
      <div class="card-title">💎 应用价值</div>
      <div class="value-list">
        <div class="value-item">
          <div class="value-badge">1</div>
          <div class="value-content">
            <div class="value-title">提升设备利用率</div>
            <div class="value-desc">实时监控设备运行状态，减少停机时间，提升OEE 10-15%</div>
          </div>
          <div class="value-number">↑ 15%</div>
        </div>
        <div class="value-item">
          <div class="value-badge">2</div>
          <div class="value-content">
            <div class="value-title">降低维护成本</div>
            <div class="value-desc">预测性维护，减少突发故障，降低维修费用30%以上</div>
          </div>
          <div class="value-number">↓ 30%</div>
        </div>
        <div class="value-item">
          <div class="value-badge">3</div>
          <div class="value-content">
            <div class="value-title">优化能源消耗</div>
            <div class="value-desc">能耗数据分析，找出浪费环节，能源成本降低20%</div>
          </div>
          <div class="value-number">↓ 20%</div>
        </div>
        <div class="value-item">
          <div class="value-badge">4</div>
          <div class="value-content">
            <div class="value-title">提升决策效率</div>
            <div class="value-desc">数据可视化分析，为管理决策提供数据支撑</div>
          </div>
          <div class="value-number">↑ 50%</div>
        </div>
      </div>
    </div>

    <!-- 成功案例 -->
    <div class="card">
      <div class="card-title">🏆 成功案例</div>
      <div class="case-cards">
        <div class="case-item">
          <div class="case-header">
            <div class="case-icon">🏭</div>
            <div class="case-name">某机械制造企业</div>
          </div>
          <div class="case-detail">
            <div class="detail-row">
              <span class="detail-label">接入设备：</span>
              <span class="detail-value">200台设备</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">部署时间：</span>
              <span class="detail-value">3天完成</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">实施效果：</span>
              <span class="detail-value">设备利用率提升18%，故障率下降45%</span>
            </div>
          </div>
        </div>
        <div class="case-item">
          <div class="case-header">
            <div class="case-icon">⚙️</div>
            <div class="case-name">某注塑加工厂</div>
          </div>
          <div class="case-detail">
            <div class="detail-row">
              <span class="detail-label">接入设备：</span>
              <span class="detail-value">50台注塑机</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">部署时间：</span>
              <span class="detail-value">2天完成</span>
            </div>
            <div class="detail-row">
              <span class="detail-label">实施效果：</span>
              <span class="detail-value">能耗降低22%，产能提升12%</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 实施步骤 -->
    <div class="card">
      <div class="card-title">📋 实施步骤</div>
      <div class="step-grid">
        <div class="step-card">
          <div class="step-number">1</div>
          <div class="step-title">现场调研</div>
          <div class="step-desc">了解设备类型、通讯协议、网络环境</div>
        </div>
        <div class="step-card">
          <div class="step-number">2</div>
          <div class="step-title">方案设计</div>
          <div class="step-desc">设计网关配置方案，规划数据点位</div>
        </div>
        <div class="step-card">
          <div class="step-number">3</div>
          <div class="step-title">网关安装</div>
          <div class="step-desc">安装工业网关，配置采集参数</div>
        </div>
        <div class="step-card">
          <div class="step-number">4</div>
          <div class="step-title">云平台配置</div>
          <div class="step-desc">配置设备模型，设置报警规则</div>
        </div>
        <div class="step-card">
          <div class="step-number">5</div>
          <div class="step-title">调试验收</div>
          <div class="step-desc">系统联调，数据验证，用户培训</div>
        </div>
        <div class="step-card">
          <div class="step-number">6</div>
          <div class="step-title">运维支持</div>
          <div class="step-desc">7×24技术支持，持续优化</div>
        </div>
      </div>
    </div>

    <!-- 演示视频 -->
    <div class="card">
      <div class="card-title">🎬 方案演示</div>
      <div class="media-container">
        <video controls poster="https://via.placeholder.com/800x450/f093fb/ffffff?text=Cloud+Solution+Demo">
          <source src="" type="video/mp4">
          您的浏览器不支持视频标签。
        </video>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.architecture-stack {
  margin-top: 20px;
}

.arch-layer {
  color: white;
  padding: 20px;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.arch-level {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.arch-content {
  font-size: 13px;
  opacity: 0.95;
}

.arch-arrow {
  text-align: center;
  font-size: 24px;
  padding: 10px 0;
}

.function-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.function-card {
  text-align: center;
  padding: 20px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.function-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.function-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.function-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 8px;
}

.function-desc {
  font-size: 12px;
  color: #666;
}

.advantage-section {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  border-radius: 16px;
  padding: 25px 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(240, 147, 251, 0.3);
}

.advantage-cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
}

.adv-card {
  text-align: center;
  padding: 20px 15px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.adv-card:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateY(-3px);
}

.adv-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.adv-title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 8px;
}

.adv-desc {
  font-size: 12px;
  opacity: 0.9;
  line-height: 1.5;
}

.value-list {
  display: grid;
  gap: 15px;
  margin-top: 15px;
}

.value-item {
  display: flex;
  align-items: center;
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.value-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.value-badge {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  font-weight: bold;
  margin-right: 15px;
  flex-shrink: 0;
}

.value-content {
  flex: 1;
}

.value-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.value-desc {
  font-size: 13px;
  color: #666;
  line-height: 1.6;
}

.value-number {
  font-size: 24px;
  font-weight: bold;
  color: #f093fb;
  margin-left: 15px;
  flex-shrink: 0;
}

.case-cards {
  display: grid;
  gap: 15px;
  margin-top: 15px;
}

.case-item {
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.case-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

.case-header {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  padding-bottom: 15px;
  border-bottom: 2px solid #e0e0e0;
}

.case-icon {
  font-size: 40px;
  margin-right: 12px;
}

.case-name {
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

.case-detail {
  display: grid;
  gap: 10px;
}

.detail-row {
  display: flex;
  font-size: 14px;
}

.detail-label {
  color: #999;
  min-width: 80px;
}

.detail-value {
  color: #666;
  flex: 1;
}

.step-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.step-card {
  text-align: center;
  padding: 25px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
  position: relative;
}

.step-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.step-number {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  font-weight: bold;
  margin: 0 auto 15px;
}

.step-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 8px;
}

.step-desc {
  font-size: 12px;
  color: #666;
  line-height: 1.5;
}

@media (max-width: 768px) {
  .function-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .step-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 480px) {
  .function-grid,
  .advantage-cards,
  .step-grid {
    grid-template-columns: 1fr;
  }
}
</style>

