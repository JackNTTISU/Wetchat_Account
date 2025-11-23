<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">设备TPM系统</div>
      <div class="page-subtitle">Total Productive Maintenance</div>
    </div>

    <!-- 产品介绍 -->
    <div class="card">
      <div class="card-title">🔧 系统概述</div>
      <div class="card-content">
        <p>康立设备TPM系统是基于全员生产维护理念设计的设备管理系统，通过预防性维护、状态监测、故障管理等功能，提升设备综合效率(OEE)，降低停机时间和维护成本。</p>
      </div>
    </div>

    <!-- 产品图片 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x400/43e97b/ffffff?text=TPM+System" alt="TPM系统">
    </div>

    <!-- 核心功能 -->
    <div class="card">
      <div class="card-title">⚙️ 核心功能</div>
      <div class="function-grid">
        <div class="function-card">
          <div class="function-icon">📋</div>
          <div class="function-title">设备台账</div>
          <div class="function-desc">完整的设备档案和生命周期管理</div>
        </div>
        <div class="function-card">
          <div class="function-icon">📅</div>
          <div class="function-title">保养计划</div>
          <div class="function-desc">自动生成保养任务，定期提醒</div>
        </div>
        <div class="function-card">
          <div class="function-icon">🔔</div>
          <div class="function-title">故障管理</div>
          <div class="function-desc">故障报修、维修记录、原因分析</div>
        </div>
        <div class="function-card">
          <div class="function-icon">📊</div>
          <div class="function-title">状态监测</div>
          <div class="function-desc">实时监控设备运行状态和参数</div>
        </div>
        <div class="function-card">
          <div class="function-icon">💡</div>
          <div class="function-title">预测维护</div>
          <div class="function-desc">AI算法预测设备故障风险</div>
        </div>
        <div class="function-card">
          <div class="function-icon">📈</div>
          <div class="function-title">OEE分析</div>
          <div class="function-desc">设备综合效率统计分析</div>
        </div>
      </div>
    </div>

    <!-- 管理模块 -->
    <div class="card">
      <div class="card-title">📦 管理模块</div>
      <div class="module-list">
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">🏷️</div>
            <div class="module-name">设备台账管理</div>
          </div>
          <div class="module-content">
            设备档案、分类管理、参数配置、备件关联
          </div>
        </div>
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">🔧</div>
            <div class="module-name">维保管理</div>
          </div>
          <div class="module-content">
            保养计划、点检任务、润滑管理、维修工单
          </div>
        </div>
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">⚠️</div>
            <div class="module-name">故障管理</div>
          </div>
          <div class="module-content">
            故障报修、抢修流程、停机统计、原因分析
          </div>
        </div>
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">📦</div>
            <div class="module-name">备件管理</div>
          </div>
          <div class="module-content">
            备件库存、领用归还、采购管理、预警设置
          </div>
        </div>
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">📊</div>
            <div class="module-name">统计分析</div>
          </div>
          <div class="module-content">
            OEE分析、故障统计、成本分析、效率对比
          </div>
        </div>
        <div class="module-item">
          <div class="module-header">
            <div class="module-icon">📱</div>
            <div class="module-name">移动应用</div>
          </div>
          <div class="module-content">
            移动点检、移动报修、任务推送、扫码操作
          </div>
        </div>
      </div>
    </div>

    <!-- 系统优势 -->
    <div class="advantage-section">
      <div class="card-title" style="color: white; margin-bottom: 20px;">💪 系统优势</div>
      <div class="advantage-list">
        <div class="advantage-box">
          <div class="advantage-number">1</div>
          <div class="advantage-info">
            <div class="advantage-title">降低停机时间</div>
            <div class="advantage-desc">预防性维护减少计划外停机40%以上</div>
          </div>
        </div>
        <div class="advantage-box">
          <div class="advantage-number">2</div>
          <div class="advantage-info">
            <div class="advantage-title">延长设备寿命</div>
            <div class="advantage-desc">科学保养维护延长设备使用年限30%</div>
          </div>
        </div>
        <div class="advantage-box">
          <div class="advantage-number">3</div>
          <div class="advantage-info">
            <div class="advantage-title">降低维护成本</div>
            <div class="advantage-desc">优化备件库存和维修流程节省成本25%</div>
          </div>
        </div>
        <div class="advantage-box">
          <div class="advantage-number">4</div>
          <div class="advantage-info">
            <div class="advantage-title">提升OEE</div>
            <div class="advantage-desc">全面提升设备综合效率10-15个百分点</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 应用案例 -->
    <div class="card">
      <div class="card-title">🏭 应用案例</div>
      <div class="case-list">
        <div class="case-card">
          <div class="case-image">
            <img src="https://via.placeholder.com/400x250/43e97b/ffffff?text=Case+1" alt="案例1">
          </div>
          <div class="case-info">
            <div class="case-company">某汽车零部件企业</div>
            <div class="case-result">
              <span class="result-tag">✓ OEE提升12%</span>
              <span class="result-tag">✓ 停机减少45%</span>
              <span class="result-tag">✓ 成本降低30%</span>
            </div>
          </div>
        </div>
        <div class="case-card">
          <div class="case-image">
            <img src="https://via.placeholder.com/400x250/38f9d7/ffffff?text=Case+2" alt="案例2">
          </div>
          <div class="case-info">
            <div class="case-company">某电子制造工厂</div>
            <div class="case-result">
              <span class="result-tag">✓ 设备利用率↑20%</span>
              <span class="result-tag">✓ 维护效率↑50%</span>
              <span class="result-tag">✓ 备件成本↓35%</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 效益分析 -->
    <div class="card">
      <div class="card-title">📊 效益分析</div>
      <div class="benefit-grid">
        <div class="benefit-item">
          <div class="benefit-icon">⏱️</div>
          <div class="benefit-value">40%</div>
          <div class="benefit-label">停机时间减少</div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon">💰</div>
          <div class="benefit-value">25%</div>
          <div class="benefit-label">维护成本降低</div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon">⚙️</div>
          <div class="benefit-value">30%</div>
          <div class="benefit-label">寿命延长</div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon">📈</div>
          <div class="benefit-value">15%</div>
          <div class="benefit-label">OEE提升</div>
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
  text-align: center;
  padding: 20px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.function-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
}

.function-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.function-title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 8px;
}

.function-desc {
  font-size: 12px;
  opacity: 0.8;
}

.module-list {
  display: grid;
  gap: 12px;
  margin-top: 15px;
}

.module-item {
  padding: 18px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.module-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.module-header {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.module-icon {
  font-size: 24px;
  margin-right: 10px;
}

.module-name {
  font-size: 16px;
  font-weight: bold;
  color: #333;
}

.module-content {
  font-size: 13px;
  color: #666;
  line-height: 1.6;
  padding-left: 34px;
}

.advantage-section {
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
  border-radius: 16px;
  padding: 25px 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(67, 233, 123, 0.3);
}

.advantage-list {
  display: grid;
  gap: 15px;
}

.advantage-box {
  display: flex;
  align-items: center;
  padding: 20px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.advantage-box:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateX(5px);
}

.advantage-number {
  width: 48px;
  height: 48px;
  background: rgba(255, 255, 255, 0.3);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  font-weight: bold;
  margin-right: 15px;
  flex-shrink: 0;
}

.advantage-info {
  flex: 1;
}

.advantage-title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.advantage-desc {
  font-size: 13px;
  opacity: 0.9;
}

.case-list {
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

.case-company {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.case-result {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.result-tag {
  display: inline-block;
  font-size: 12px;
  color: #43e97b;
  font-weight: 500;
}

.benefit-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.benefit-item {
  text-align: center;
  padding: 25px 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.benefit-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.benefit-icon {
  font-size: 36px;
  margin-bottom: 10px;
}

.benefit-value {
  font-size: 32px;
  font-weight: bold;
  color: #43e97b;
  margin-bottom: 8px;
}

.benefit-label {
  font-size: 14px;
  color: #666;
}

@media (max-width: 480px) {
  .function-grid,
  .case-list,
  .benefit-grid {
    grid-template-columns: 1fr;
  }
}
</style>

