<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">PLC系统</div>
      <div class="page-subtitle">Programmable Logic Controller</div>
    </div>

    <!-- 产品介绍 -->
    <div class="card">
      <div class="card-title">🎛️ 产品概述</div>
      <div class="card-content">
        <p>康立PLC系统是一款工业级可编程逻辑控制器，采用模块化设计，支持多种工业协议，具备高可靠性、强抗干扰能力，广泛应用于自动化生产线、智能设备控制等场景。</p>
      </div>
    </div>

    <!-- 产品图片 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x400/667eea/ffffff?text=PLC+System" alt="PLC系统">
    </div>

    <!-- 核心功能 -->
    <div class="card">
      <div class="card-title">⚙️ 核心功能</div>
      <div class="function-list">
        <div class="function-item">
          <div class="function-badge">✓</div>
          <div class="function-text">
            <div class="function-title">实时控制</div>
            <div class="function-desc">毫秒级响应速度，精确控制设备运行</div>
          </div>
        </div>
        <div class="function-item">
          <div class="function-badge">✓</div>
          <div class="function-text">
            <div class="function-title">多协议支持</div>
            <div class="function-desc">支持Modbus、Profinet、EtherCAT等主流协议</div>
          </div>
        </div>
        <div class="function-item">
          <div class="function-badge">✓</div>
          <div class="function-text">
            <div class="function-title">可视化编程</div>
            <div class="function-desc">图形化编程界面，降低开发难度</div>
          </div>
        </div>
        <div class="function-item">
          <div class="function-badge">✓</div>
          <div class="function-text">
            <div class="function-title">远程监控</div>
            <div class="function-desc">支持云端远程监控和程序更新</div>
          </div>
        </div>
        <div class="function-item">
          <div class="function-badge">✓</div>
          <div class="function-text">
            <div class="function-title">故障诊断</div>
            <div class="function-desc">智能故障检测与报警机制</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 技术参数 -->
    <div class="card">
      <div class="card-title">📋 技术参数</div>
      <div class="spec-table">
        <div class="spec-row">
          <div class="spec-label">处理器</div>
          <div class="spec-value">32位ARM Cortex-M4</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">运行内存</div>
          <div class="spec-value">512MB DDR3</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">存储容量</div>
          <div class="spec-value">4GB eMMC</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">数字输入</div>
          <div class="spec-value">16路 24V DC</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">数字输出</div>
          <div class="spec-value">16路 继电器/晶体管</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">模拟输入</div>
          <div class="spec-value">8路 0-10V/4-20mA</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">通信接口</div>
          <div class="spec-value">Ethernet、RS485、CAN</div>
        </div>
        <div class="spec-row">
          <div class="spec-label">工作温度</div>
          <div class="spec-value">-20℃ ~ 60℃</div>
        </div>
      </div>
    </div>

    <!-- 应用案例 -->
    <div class="card">
      <div class="card-title">🏭 应用案例</div>
      <div class="case-grid">
        <div class="case-card">
          <div class="case-image">
            <img src="https://via.placeholder.com/400x250/667eea/ffffff?text=Production+Line" alt="自动化产线">
          </div>
          <div class="case-info">
            <div class="case-title">汽车零部件自动化产线</div>
            <div class="case-desc">实现生产全流程自动化控制，效率提升40%</div>
          </div>
        </div>
        <div class="case-card">
          <div class="case-image">
            <img src="https://via.placeholder.com/400x250/764ba2/ffffff?text=Robot+Control" alt="机器人控制">
          </div>
          <div class="case-info">
            <div class="case-title">工业机器人控制系统</div>
            <div class="case-desc">精准控制机器人运动轨迹，稳定性99.9%</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 产品视频 -->
    <div class="card">
      <div class="card-title">🎬 产品演示</div>
      <div class="media-container">
        <video controls poster="https://via.placeholder.com/800x450/667eea/ffffff?text=PLC+Demo+Video">
          <source src="" type="video/mp4">
          您的浏览器不支持视频标签。
        </video>
      </div>
    </div>

    <!-- 产品优势 -->
    <div class="advantage-card">
      <div class="card-title" style="color: white;">💪 产品优势</div>
      <div class="advantage-grid">
        <div class="advantage-item">
          <div class="advantage-icon">🚀</div>
          <div class="advantage-text">高性能处理</div>
        </div>
        <div class="advantage-item">
          <div class="advantage-icon">🛡️</div>
          <div class="advantage-text">稳定可靠</div>
        </div>
        <div class="advantage-item">
          <div class="advantage-icon">🔧</div>
          <div class="advantage-text">易于维护</div>
        </div>
        <div class="advantage-item">
          <div class="advantage-icon">💰</div>
          <div class="advantage-text">性价比高</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.function-list {
  margin-top: 15px;
}

.function-item {
  display: flex;
  align-items: flex-start;
  padding: 15px;
  margin-bottom: 12px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
}

.function-badge {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  font-weight: bold;
  margin-right: 12px;
  flex-shrink: 0;
}

.function-text {
  flex: 1;
}

.function-title {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 4px;
}

.function-desc {
  font-size: 13px;
  color: #666;
  line-height: 1.6;
}

.spec-table {
  margin-top: 15px;
}

.spec-row {
  display: flex;
  justify-content: space-between;
  padding: 12px 15px;
  border-bottom: 1px solid #f0f0f0;
}

.spec-row:last-child {
  border-bottom: none;
}

.spec-label {
  font-size: 14px;
  color: #666;
  font-weight: 500;
}

.spec-value {
  font-size: 14px;
  color: #333;
  font-weight: bold;
  text-align: right;
}

.case-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.case-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.case-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.case-image {
  width: 100%;
  height: 150px;
  overflow: hidden;
}

.case-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.case-info {
  padding: 15px;
}

.case-title {
  font-size: 15px;
  font-weight: bold;
  color: #333;
  margin-bottom: 8px;
}

.case-desc {
  font-size: 13px;
  color: #666;
  line-height: 1.5;
}

.advantage-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.advantage-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 20px;
}

.advantage-item {
  text-align: center;
  padding: 20px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.advantage-item:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateY(-3px);
}

.advantage-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.advantage-text {
  font-size: 15px;
  font-weight: 500;
}

@media (max-width: 480px) {
  .case-grid,
  .advantage-grid {
    grid-template-columns: 1fr;
  }
}
</style>

