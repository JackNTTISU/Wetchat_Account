<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">注塑机系统方案</div>
      <div class="page-subtitle">Injection Molding System Solutions</div>
    </div>

    <!-- 方案介绍 -->
    <div class="card">
      <div class="card-title">🏭 方案概述</div>
      <div class="card-content">
        <p>康立注塑机系统解决方案，针对注塑行业特点，提供注塑机联网监控、模具管理、生产排程、能耗管理等功能，实现注塑车间的数字化、智能化管理，提升设备利用率和生产效率。</p>
      </div>
    </div>

    <!-- 方案架构图 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x500/43e97b/ffffff?text=Injection+System+Architecture" alt="系统架构">
    </div>

    <!-- 核心功能 -->
    <div class="card">
      <div class="card-title">⚙️ 核心功能</div>
      <div class="function-grid">
        <div class="function-card">
          <div class="function-icon">📊</div>
          <div class="function-name">实时监控</div>
          <div class="function-list">
            <div class="function-item">• 设备运行状态</div>
            <div class="function-item">• 工艺参数监控</div>
            <div class="function-item">• 生产数量统计</div>
            <div class="function-item">• 报警信息推送</div>
          </div>
        </div>
        <div class="function-card">
          <div class="function-icon">🔧</div>
          <div class="function-name">模具管理</div>
          <div class="function-list">
            <div class="function-item">• 模具档案管理</div>
            <div class="function-item">• 模具寿命跟踪</div>
            <div class="function-item">• 保养计划提醒</div>
            <div class="function-item">• 备件库存管理</div>
          </div>
        </div>
        <div class="function-card">
          <div class="function-icon">📅</div>
          <div class="function-name">生产排程</div>
          <div class="function-list">
            <div class="function-item">• 智能排产计划</div>
            <div class="function-item">• 机台负载均衡</div>
            <div class="function-item">• 换模优化建议</div>
            <div class="function-item">• 交期预警提醒</div>
          </div>
        </div>
        <div class="function-card">
          <div class="function-icon">⚡</div>
          <div class="function-name">能耗管理</div>
          <div class="function-list">
            <div class="function-item">• 电能实时监测</div>
            <div class="function-item">• 单件能耗分析</div>
            <div class="function-item">• 能耗对比统计</div>
            <div class="function-item">• 节能方案建议</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 系统特色 -->
    <div class="highlight-section">
      <div class="card-title" style="color: white; margin-bottom: 20px;">🌟 系统特色</div>
      <div class="highlight-list">
        <div class="highlight-item">
          <div class="highlight-icon">🔗</div>
          <div class="highlight-content">
            <div class="highlight-title">兼容性强</div>
            <div class="highlight-desc">支持海天、震雄、伊之密等主流品牌注塑机数据采集</div>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon">📱</div>
          <div class="highlight-content">
            <div class="highlight-title">移动看板</div>
            <div class="highlight-desc">手机端实时查看车间生产状况，随时随地掌控全局</div>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon">🤖</div>
          <div class="highlight-content">
            <div class="highlight-title">AI预警</div>
            <div class="highlight-desc">智能算法预测模具寿命，提前预警避免停机</div>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon">💡</div>
          <div class="highlight-content">
            <div class="highlight-title">节能优化</div>
            <div class="highlight-desc">能耗数据分析，找出高耗能环节，提供优化建议</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 监控指标 -->
    <div class="card">
      <div class="card-title">📈 关键监控指标</div>
      <div class="indicator-grid">
        <div class="indicator-card">
          <div class="indicator-icon">⚙️</div>
          <div class="indicator-name">设备状态</div>
          <div class="indicator-items">
            <span class="status-badge running">运行中</span>
            <span class="status-badge standby">待机</span>
            <span class="status-badge alarm">报警</span>
            <span class="status-badge offline">离线</span>
          </div>
        </div>
        <div class="indicator-card">
          <div class="indicator-icon">📊</div>
          <div class="indicator-name">生产数据</div>
          <div class="indicator-items">
            <div class="data-item">
              <span class="data-label">计划产量</span>
              <span class="data-value">10000件</span>
            </div>
            <div class="data-item">
              <span class="data-label">实际产量</span>
              <span class="data-value">8500件</span>
            </div>
          </div>
        </div>
        <div class="indicator-card">
          <div class="indicator-icon">📉</div>
          <div class="indicator-name">综合效率</div>
          <div class="indicator-items">
            <div class="oee-chart">
              <div class="oee-item">
                <div class="oee-label">时间稼动率</div>
                <div class="oee-bar">
                  <div class="oee-fill" style="width: 85%; background: #43e97b;"></div>
                  <div class="oee-value">85%</div>
                </div>
              </div>
              <div class="oee-item">
                <div class="oee-label">性能稼动率</div>
                <div class="oee-bar">
                  <div class="oee-fill" style="width: 92%; background: #4facfe;"></div>
                  <div class="oee-value">92%</div>
                </div>
              </div>
              <div class="oee-item">
                <div class="oee-label">良品率</div>
                <div class="oee-bar">
                  <div class="oee-fill" style="width: 98%; background: #667eea;"></div>
                  <div class="oee-value">98%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="indicator-card">
          <div class="indicator-icon">⚡</div>
          <div class="indicator-name">能耗统计</div>
          <div class="indicator-items">
            <div class="energy-display">
              <div class="energy-value">125.6</div>
              <div class="energy-unit">kWh</div>
              <div class="energy-label">今日总能耗</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 应用价值 -->
    <div class="value-section">
      <div class="card-title" style="color: white; margin-bottom: 20px;">💎 应用价值</div>
      <div class="value-cards">
        <div class="val-card">
          <div class="val-icon">↑</div>
          <div class="val-number">20%</div>
          <div class="val-text">设备利用率提升</div>
        </div>
        <div class="val-card">
          <div class="val-icon">↓</div>
          <div class="val-number">15%</div>
          <div class="val-text">能源成本降低</div>
        </div>
        <div class="val-card">
          <div class="val-icon">↑</div>
          <div class="val-number">30%</div>
          <div class="val-text">管理效率提升</div>
        </div>
        <div class="val-card">
          <div class="val-icon">↓</div>
          <div class="val-number">50%</div>
          <div class="val-text">模具损坏率降低</div>
        </div>
      </div>
    </div>

    <!-- 成功案例 -->
    <div class="card">
      <div class="card-title">🏆 成功案例</div>
      <div class="case-grid">
        <div class="case-card">
          <div class="case-header">
            <div class="case-badge">标杆案例</div>
            <div class="case-title">某汽车零部件注塑厂</div>
          </div>
          <div class="case-body">
            <div class="case-stat">
              <div class="stat-label">接入设备</div>
              <div class="stat-value">120台注塑机</div>
            </div>
            <div class="case-stat">
              <div class="stat-label">实施周期</div>
              <div class="stat-value">2周完成</div>
            </div>
            <div class="divider"></div>
            <div class="case-benefits">
              <div class="benefit-title">实施效果：</div>
              <div class="benefit-item">✓ OEE从68%提升至82%</div>
              <div class="benefit-item">✓ 能耗降低18%，年节约80万</div>
              <div class="benefit-item">✓ 模具寿命延长25%</div>
              <div class="benefit-item">✓ 管理效率提升40%</div>
            </div>
          </div>
        </div>
        <div class="case-card">
          <div class="case-header">
            <div class="case-badge">典型案例</div>
            <div class="case-title">某家电配件生产企业</div>
          </div>
          <div class="case-body">
            <div class="case-stat">
              <div class="stat-label">接入设备</div>
              <div class="stat-value">60台注塑机</div>
            </div>
            <div class="case-stat">
              <div class="stat-label">实施周期</div>
              <div class="stat-value">10天完成</div>
            </div>
            <div class="divider"></div>
            <div class="case-benefits">
              <div class="benefit-title">实施效果：</div>
              <div class="benefit-item">✓ 设备利用率提升22%</div>
              <div class="benefit-item">✓ 交期准确率达95%</div>
              <div class="benefit-item">✓ 能耗监控100%覆盖</div>
              <div class="benefit-item">✓ 管理成本降低30%</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 系统演示 -->
    <div class="card">
      <div class="card-title">🎬 系统演示</div>
      <div class="demo-grid">
        <div class="demo-item">
          <img src="https://via.placeholder.com/800x500/43e97b/ffffff?text=Dashboard" alt="生产看板">
          <div class="demo-label">生产实时看板</div>
        </div>
        <div class="demo-item">
          <img src="https://via.placeholder.com/800x500/38f9d7/ffffff?text=Mold+Management" alt="模具管理">
          <div class="demo-label">模具管理系统</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.function-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.function-card {
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.function-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.function-icon {
  font-size: 40px;
  text-align: center;
  margin-bottom: 12px;
}

.function-name {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  text-align: center;
  margin-bottom: 15px;
}

.function-list {
  display: grid;
  gap: 8px;
}

.function-item {
  font-size: 13px;
  color: #666;
  padding: 5px 0;
}

.highlight-section {
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
  border-radius: 16px;
  padding: 25px 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(67, 233, 123, 0.3);
}

.highlight-list {
  display: grid;
  gap: 12px;
}

.highlight-item {
  display: flex;
  align-items: center;
  padding: 18px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.highlight-item:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateX(5px);
}

.highlight-icon {
  font-size: 36px;
  margin-right: 15px;
  flex-shrink: 0;
}

.highlight-content {
  flex: 1;
}

.highlight-title {
  font-size: 17px;
  font-weight: bold;
  margin-bottom: 5px;
}

.highlight-desc {
  font-size: 13px;
  opacity: 0.9;
  line-height: 1.6;
}

.indicator-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.indicator-card {
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
}

.indicator-icon {
  font-size: 32px;
  text-align: center;
  margin-bottom: 10px;
}

.indicator-name {
  font-size: 17px;
  font-weight: bold;
  color: #333;
  text-align: center;
  margin-bottom: 15px;
}

.indicator-items {
  display: grid;
  gap: 10px;
}

.status-badge {
  display: inline-block;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 500;
  margin-right: 8px;
}

.status-badge.running {
  background: #43e97b;
  color: white;
}

.status-badge.standby {
  background: #4facfe;
  color: white;
}

.status-badge.alarm {
  background: #f5576c;
  color: white;
}

.status-badge.offline {
  background: #999;
  color: white;
}

.data-item {
  display: flex;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px solid #e0e0e0;
}

.data-item:last-child {
  border-bottom: none;
}

.data-label {
  font-size: 13px;
  color: #666;
}

.data-value {
  font-size: 14px;
  font-weight: bold;
  color: #333;
}

.oee-chart {
  display: grid;
  gap: 12px;
}

.oee-item {
  display: grid;
  gap: 6px;
}

.oee-label {
  font-size: 12px;
  color: #666;
}

.oee-bar {
  position: relative;
  height: 24px;
  background: white;
  border-radius: 12px;
  overflow: hidden;
}

.oee-fill {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  border-radius: 12px;
  transition: width 0.3s ease;
}

.oee-value {
  position: absolute;
  right: 8px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 12px;
  font-weight: bold;
  color: #333;
}

.energy-display {
  text-align: center;
  padding: 20px;
  background: white;
  border-radius: 12px;
}

.energy-value {
  font-size: 36px;
  font-weight: bold;
  color: #43e97b;
}

.energy-unit {
  font-size: 16px;
  color: #666;
  margin-top: 5px;
}

.energy-label {
  font-size: 13px;
  color: #999;
  margin-top: 8px;
}

.value-section {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 16px;
  padding: 25px 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
}

.value-cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
}

.val-card {
  text-align: center;
  padding: 25px 15px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.val-card:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateY(-3px);
}

.val-icon {
  font-size: 32px;
  margin-bottom: 10px;
}

.val-number {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 8px;
}

.val-text {
  font-size: 14px;
  opacity: 0.9;
}

.case-grid {
  display: grid;
  gap: 20px;
  margin-top: 15px;
}

.case-card {
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.case-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.case-header {
  padding: 20px;
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
}

.case-badge {
  display: inline-block;
  padding: 4px 12px;
  background: rgba(255, 255, 255, 0.3);
  border-radius: 12px;
  font-size: 12px;
  font-weight: 500;
  margin-bottom: 10px;
}

.case-title {
  font-size: 20px;
  font-weight: bold;
}

.case-body {
  padding: 20px;
}

.case-stat {
  display: flex;
  justify-content: space-between;
  padding: 10px 0;
  font-size: 14px;
}

.stat-label {
  color: #999;
}

.stat-value {
  font-weight: bold;
  color: #333;
}

.case-benefits {
  margin-top: 15px;
}

.benefit-title {
  font-size: 15px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.benefit-item {
  font-size: 14px;
  color: #666;
  padding: 6px 0;
  display: flex;
  align-items: center;
}

.demo-grid {
  display: grid;
  gap: 20px;
  margin-top: 15px;
}

.demo-item {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.demo-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.demo-item img {
  width: 100%;
  height: auto;
  display: block;
}

.demo-label {
  padding: 15px;
  text-align: center;
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
  font-size: 15px;
  font-weight: 500;
}

@media (max-width: 480px) {
  .function-grid,
  .indicator-grid,
  .value-cards {
    grid-template-columns: 1fr;
  }
}
</style>

