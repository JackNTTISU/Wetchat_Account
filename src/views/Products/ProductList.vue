<template>
  <div class="product-list-page">
    <!-- 顶部搜索栏 -->
    <div class="search-bar">
      <div class="search-input">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="搜索产品" v-model="searchKeyword" />
      </div>
    </div>

    <!-- Banner区域 -->
    <div class="banner-section">
      <div class="banner-content">
        <h1 class="banner-title">康立数字 产品中心</h1>
        <p class="banner-subtitle">Products</p>
      </div>
    </div>

    <!-- 产品列表 -->
    <div class="product-list">
      <div 
        class="product-item" 
        v-for="product in filteredProducts" 
        :key="product.id"
        @click="goToDetail(product.id)"
      >
        <img :src="product.image" :alt="product.name" class="product-image" />
        <div class="product-info">
          <h3 class="product-name">{{ product.name }}</h3>
          <p class="product-desc">{{ product.description }}</p>
          <div class="product-meta">
            <span class="meta-item">{{ product.category }}</span>
            <span class="meta-item">{{ product.date }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- 加载更多提示 -->
    <div class="load-more">
      <span class="load-text">已加载全部产品</span>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const searchKeyword = ref('')

// 产品列表数据（后续从后台接口获取）
const products = ref([
  {
    id: 1,
    name: 'PLC控制系统',
    description: '专业的工业自动化控制系统，支持多种通讯协议，稳定可靠，广泛应用于各类生产线。提供完整的编程、调试、监控解决方案。',
    category: '控制系统',
    date: '2024-01',
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=PLC系统'
  },
  {
    id: 2,
    name: '数据采集网关系统',
    description: '工业级数据采集网关，支持多种工业协议转换，实时采集设备运行数据，为企业数字化转型提供数据基础。',
    category: '数据采集',
    date: '2024-02',
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=数采网关'
  },
  {
    id: 3,
    name: '标品MES系统',
    description: '制造执行系统标准化产品，覆盖生产计划、生产执行、质量管理、仓储物流等全流程，快速部署，灵活配置。',
    category: '生产管理',
    date: '2024-03',
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=MES系统'
  },
  {
    id: 4,
    name: '设备TPM管理系统',
    description: '全面的设备维护管理系统，实现设备点检、保养、维修、备件管理的数字化，提升设备综合效率OEE。',
    category: '设备管理',
    date: '2024-04',
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=TPM系统'
  },
  {
    id: 5,
    name: '智能工具柜系列',
    description: '智能化工具管理解决方案，RFID自动识别，实现工具的借还、盘点、追溯全流程管理，防止工具遗失。',
    category: '智能硬件',
    date: '2024-05',
    image: 'https://via.placeholder.com/200x150/0066CC/ffffff?text=智能工具柜'
  }
])

// 搜索过滤
const filteredProducts = computed(() => {
  if (!searchKeyword.value) {
    return products.value
  }
  const keyword = searchKeyword.value.toLowerCase()
  return products.value.filter(product => 
    product.name.toLowerCase().includes(keyword) ||
    product.description.toLowerCase().includes(keyword) ||
    product.category.toLowerCase().includes(keyword)
  )
})

const goToDetail = (id) => {
  router.push(`/products/detail/${id}`)
}
</script>

<style scoped>
.product-list-page {
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

/* 产品列表 */
.product-list {
  padding: 0 16px;
  margin-top: 16px;
}

.product-item {
  display: flex;
  background: white;
  border-radius: 8px;
  padding: 16px;
  margin-bottom: 12px;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.product-item:active {
  transform: scale(0.98);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-image {
  width: 120px;
  height: 90px;
  border-radius: 6px;
  object-fit: cover;
  flex-shrink: 0;
  margin-right: 16px;
}

.product-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.product-name {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 8px 0;
  line-height: 1.3;
}

.product-desc {
  font-size: 13px;
  color: var(--text-secondary);
  line-height: 1.5;
  margin: 0 0 8px 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.product-meta {
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


