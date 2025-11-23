<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">解决方案</div>
      <div class="page-subtitle">智能制造全场景解决方案</div>
    </div>

    <!-- 解决方案列表 -->
    <div class="solution-list">
      <div 
        v-for="solution in solutions" 
        :key="solution.path"
        class="solution-item"
        @click="navigateTo(solution.path)"
      >
        <div class="solution-left">
          <div class="solution-icon">{{ solution.icon }}</div>
          <div class="solution-info">
            <div class="solution-name">{{ solution.name }}</div>
            <div class="solution-desc">{{ solution.desc }}</div>
          </div>
        </div>
        <div class="solution-arrow">›</div>
      </div>
    </div>

    <!-- 方案简介 -->
    <div class="card">
      <div class="card-title">方案简介</div>
      <div class="card-content">
        <p>康立数字深耕制造业多年，为客户提供从设备控制到行业应用的全套解决方案，帮助企业实现数字化转型和智能化升级。</p>
      </div>
    </div>

    <!-- 服务流程 -->
    <div class="card">
      <div class="card-title">服务流程</div>
      <div class="process-list">
        <div class="process-item">
          <div class="process-step">01</div>
          <div class="process-content">
            <div class="process-title">需求调研</div>
            <div class="process-desc">深入了解客户需求，现场考察分析</div>
          </div>
        </div>
        <div class="process-arrow">↓</div>
        <div class="process-item">
          <div class="process-step">02</div>
          <div class="process-content">
            <div class="process-title">方案设计</div>
            <div class="process-desc">定制化方案设计，技术选型评审</div>
          </div>
        </div>
        <div class="process-arrow">↓</div>
        <div class="process-item">
          <div class="process-step">03</div>
          <div class="process-content">
            <div class="process-title">项目实施</div>
            <div class="process-desc">系统开发部署，现场安装调试</div>
          </div>
        </div>
        <div class="process-arrow">↓</div>
        <div class="process-item">
          <div class="process-step">04</div>
          <div class="process-content">
            <div class="process-title">培训交付</div>
            <div class="process-desc">用户培训指导，系统验收交付</div>
          </div>
        </div>
        <div class="process-arrow">↓</div>
        <div class="process-item">
          <div class="process-step">05</div>
          <div class="process-content">
            <div class="process-title">持续服务</div>
            <div class="process-desc">7×24技术支持，系统优化升级</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const solutions = [
  {
    path: '/solutions/custom-control',
    name: '定制化控制系统',
    desc: 'PLC编程与上位机开发',
    icon: '⚙️'
  },
  {
    path: '/solutions/cloud-device',
    name: '设备上云解决方案',
    desc: '设备联网与远程监控',
    icon: '☁️'
  },
  {
    path: '/solutions/textile',
    name: '家纺服装系统方案',
    desc: '纺织服装行业数字化',
    icon: '👔'
  },
  {
    path: '/solutions/injection',
    name: '注塑机系统方案',
    desc: '注塑行业智能化管理',
    icon: '🏭'
  }
]

const navigateTo = (path) => {
  router.push(path)
}
</script>

<style scoped>
.solution-list {
  background: white;
  margin-bottom: 10px;
}

.solution-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 20px;
  cursor: pointer;
  transition: background 0.2s ease;
  border-bottom: 1px solid var(--border-color);
}

.solution-item:hover {
  background: var(--bg-gray);
}

.solution-item:active {
  background: #f0f0f0;
}

.solution-left {
  display: flex;
  align-items: center;
  flex: 1;
}

.solution-icon {
  width: 44px;
  height: 44px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  background: var(--bg-gray);
  border-radius: 4px;
  margin-right: 15px;
}

.solution-info {
  flex: 1;
}

.solution-name {
  font-size: 16px;
  font-weight: 500;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.solution-desc {
  font-size: 13px;
  color: var(--text-tertiary);
}

.solution-arrow {
  font-size: 16px;
  color: #d0d0d0;
  margin-left: 10px;
}

.process-list {
  margin-top: 20px;
}

.process-item {
  display: flex;
  align-items: center;
  padding: 16px;
  background: white;
  border-radius: 0;
  transition: none;
  border-bottom: 1px solid var(--border-color);
}

.process-step {
  width: 40px;
  height: 40px;
  background: var(--primary-color);
  color: white;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  font-weight: 600;
  margin-right: 15px;
  flex-shrink: 0;
}

.process-content {
  flex: 1;
}

.process-title {
  font-size: 15px;
  font-weight: 500;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.process-desc {
  font-size: 13px;
  color: var(--text-secondary);
}

.process-arrow {
  display: none;
}
</style>

