<template>
  <div class="solution-list-page">
    <!-- 顶部搜索栏 -->
    <div class="search-bar">
      <div class="search-input">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="搜索解决方案" v-model="searchKeyword" />
      </div>
    </div>

    <!-- Banner区域 -->
    <div class="banner-section">
      <div class="banner-content">
        <h1 class="banner-title">康立数字 技术方案</h1>
        <p class="banner-subtitle">Solutions</p>
      </div>
    </div>

    <!-- 方案列表 -->
    <div class="solution-list">
      <div 
        class="solution-item" 
        v-for="solution in filteredSolutions" 
        :key="solution.id"
        @click="goToDetail(solution.id)"
      >
        <img :src="solution.image" :alt="solution.name" class="solution-image" />
        <div class="solution-info">
          <h3 class="solution-name">{{ solution.name }}</h3>
          <p class="solution-desc">{{ solution.description }}</p>
          <div class="solution-meta">
            <span class="meta-item">{{ solution.industry }}</span>
            <span class="meta-item">{{ solution.cases }} 个案例</span>
          </div>
        </div>
      </div>
    </div>

    <!-- 加载更多提示 -->
    <div class="load-more">
      <span class="load-text">已加载全部方案</span>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const searchKeyword = ref('')

// 解决方案列表数据（后续从后台接口获取）
const solutions = ref([
  {
    id: 1,
    name: '定制化控制系统解决方案',
    description: '针对特殊工艺和复杂控制需求，提供从方案设计、软硬件开发到现场调试的全流程定制服务。支持多机联动、复杂运动控制、视觉检测等高级应用。',
    industry: '多行业适用',
    cases: 35,
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=定制控制系统'
  },
  {
    id: 2,
    name: '设备上云解决方案',
    description: '帮助企业实现设备数据上云，远程监控设备运行状态，实时掌握生产情况。支持PC端、手机端多终端访问，随时随地查看设备数据和报表。',
    industry: '智能制造',
    cases: 68,
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=设备上云'
  },
  {
    id: 3,
    name: '家纺服装系统解决方案',
    description: '专为家纺服装行业打造的一体化解决方案，涵盖订单管理、生产排程、工序流转、质量追溯、成本核算等全流程管理，助力企业数字化转型。',
    industry: '家纺服装',
    cases: 42,
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=家纺服装方案'
  },
  {
    id: 4,
    name: '注塑机系统解决方案',
    description: '针对注塑行业的专业解决方案，实现注塑机集中监控、模具管理、工艺参数管理、质量追溯等功能。提升设备利用率，降低次品率，优化生产管理。',
    industry: '注塑行业',
    cases: 56,
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=注塑机方案'
  }
])

// 搜索过滤
const filteredSolutions = computed(() => {
  if (!searchKeyword.value) {
    return solutions.value
  }
  const keyword = searchKeyword.value.toLowerCase()
  return solutions.value.filter(solution => 
    solution.name.toLowerCase().includes(keyword) ||
    solution.description.toLowerCase().includes(keyword) ||
    solution.industry.toLowerCase().includes(keyword)
  )
})

const goToDetail = (id) => {
  router.push(`/solutions/detail/${id}`)
}
</script>

<style scoped>
.solution-list-page {
  min-height: 100vh;
  background: #f5f5f5;
  padding-bottom: 20px;
}

/* 搜索栏 */
.search-bar {
  position: sticky;
  top: 0;
  z-index: 100;
  padding: 12px 16px;
  background: white;
  border-bottom: 1px solid var(--border-color);
}

.search-input {
  display: flex;
  align-items: center;
  padding: 8px 12px;
  background: #f5f5f5;
  border-radius: 20px;
}

.search-icon {
  margin-right: 8px;
  font-size: 16px;
}

.search-input input {
  flex: 1;
  border: none;
  background: transparent;
  font-size: 14px;
  outline: none;
}

/* Banner区域 */
.banner-section {
  height: 180px;
  background: linear-gradient(135deg, #0066CC 0%, #004999 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  position: relative;
  overflow: hidden;
}

.banner-section::before {
  content: '';
  position: absolute;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
  background-size: 20px 20px;
  animation: bannerMove 20s linear infinite;
}

@keyframes bannerMove {
  0% { transform: translate(0, 0); }
  100% { transform: translate(20px, 20px); }
}

.banner-content {
  position: relative;
  z-index: 1;
  text-align: center;
}

.banner-title {
  font-size: 28px;
  font-weight: 600;
  margin: 0 0 8px 0;
  letter-spacing: 2px;
}

.banner-subtitle {
  font-size: 14px;
  margin: 0;
  opacity: 0.9;
  letter-spacing: 1px;
}

/* 方案列表 */
.solution-list {
  padding: 0 16px;
  margin-top: 16px;
}

.solution-item {
  display: flex;
  background: white;
  border-radius: 8px;
  padding: 16px;
  margin-bottom: 12px;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.solution-item:active {
  transform: scale(0.98);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.solution-image {
  width: 120px;
  height: 90px;
  border-radius: 6px;
  object-fit: cover;
  flex-shrink: 0;
  margin-right: 16px;
}

.solution-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.solution-name {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 8px 0;
  line-height: 1.3;
}

.solution-desc {
  font-size: 13px;
  color: var(--text-secondary);
  line-height: 1.5;
  margin: 0 0 8px 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.solution-meta {
  display: flex;
  gap: 12px;
  font-size: 12px;
  color: var(--text-tertiary);
}

.meta-item {
  display: flex;
  align-items: center;
}

/* 加载更多 */
.load-more {
  padding: 20px;
  text-align: center;
}

.load-text {
  font-size: 13px;
  color: var(--text-tertiary);
}
</style>


