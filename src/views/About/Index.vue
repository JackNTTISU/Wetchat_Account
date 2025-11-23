<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">关于康立</div>
      <div class="page-subtitle">康立数字 · 智能制造软件服务商</div>
    </div>

    <div class="menu-list">
      <div 
        v-for="item in menuItems" 
        :key="item.path"
        class="list-item"
        @click="navigateTo(item.path)"
      >
        <div class="list-item-icon">
          {{ item.icon }}
        </div>
        <div class="list-item-content">
          <div class="list-item-title">{{ item.title }}</div>
          <div class="list-item-desc">{{ item.desc }}</div>
        </div>
        <div class="list-item-arrow">›</div>
      </div>
    </div>

    <!-- 企业简介 -->
    <div class="card">
      <div class="card-title">企业简介</div>
      <div class="card-content">
        <p>康立数字科技有限公司是一家专注于工业软件和智能制造解决方案的高新技术企业。公司致力于为制造业客户提供全方位的数字化转型服务，帮助企业实现智能化、数字化升级。</p>
      </div>
    </div>

    <!-- 核心数据 -->
    <div class="stats-section">
      <div class="stat-item">
        <div class="stat-number">500+</div>
        <div class="stat-label">服务客户</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">10年</div>
        <div class="stat-label">行业经验</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">50+</div>
        <div class="stat-label">研发团队</div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const menuItems = [
  {
    path: '/about/intro',
    title: '康立数字简介',
    desc: '了解康立数字的发展历程与企业文化',
    icon: '📄'
  },
  {
    path: '/about/website',
    title: '康立官网',
    desc: '访问康立数字官方网站',
    icon: '🌐'
  },
  {
    path: '/about/cloud',
    title: '康立云平台',
    desc: '进入康立智能制造云平台',
    icon: '☁️'
  },
  {
    path: '/about/contact',
    title: '联系我们',
    desc: '获取联系方式与在线咨询',
    icon: '📞'
  }
]

const navigateTo = (path) => {
  router.push(path)
}
</script>

<style scoped>
.menu-list {
  background: white;
}

.stats-section {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  background: white;
  margin-bottom: 10px;
}

.stat-item {
  text-align: center;
  padding: 24px 15px;
  border-right: 1px solid var(--border-color);
}

.stat-item:last-child {
  border-right: none;
}

.stat-number {
  font-size: 28px;
  font-weight: 600;
  color: var(--primary-color);
  margin-bottom: 6px;
}

.stat-label {
  font-size: 13px;
  color: var(--text-secondary);
}
</style>

