<template>
  <div class="product-detail-page">
    <!-- 顶部导航 -->
    <div class="detail-header">
      <button class="close-btn" @click="goBack">✕</button>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 产品容器 -->
    <div class="product-container">
      <!-- 产品名称 -->
      <h1 class="product-title">{{ product.name }}</h1>

      <!-- 标签 -->
      <div class="product-tags">
        <span class="tag">{{ product.category }}</span>
        <span class="tag">康立数字</span>
      </div>

      <!-- 产品信息 -->
      <div class="product-meta">
        <span class="meta-date">发布时间：{{ product.date }}</span>
        <span class="meta-location">📍 苏州</span>
        <span class="meta-views">👁 {{ product.views }} 次查看</span>
      </div>

      <!-- 产品主图 -->
      <div class="product-main-image">
        <img :src="product.mainImage" :alt="product.name" />
      </div>

      <!-- 产品介绍 -->
      <div class="product-content">
        <section class="content-section">
          <h2 class="section-title">产品概述</h2>
          <p class="section-text">{{ product.overview }}</p>
        </section>

        <section class="content-section">
          <h2 class="section-title">核心功能</h2>
          <ul class="feature-list">
            <li v-for="(feature, index) in product.features" :key="index">
              {{ feature }}
            </li>
          </ul>
        </section>

        <section class="content-section">
          <h2 class="section-title">技术参数</h2>
          <div class="spec-table">
            <div class="spec-row" v-for="(spec, index) in product.specifications" :key="index">
              <div class="spec-label">{{ spec.label }}</div>
              <div class="spec-value">{{ spec.value }}</div>
            </div>
          </div>
        </section>

        <!-- 产品图片展示 -->
        <section class="content-section" v-if="product.images && product.images.length">
          <h2 class="section-title">产品展示</h2>
          <div class="product-images">
            <img v-for="(image, index) in product.images" :key="index" :src="image" :alt="`产品图${index + 1}`" />
          </div>
        </section>

        <section class="content-section">
          <h2 class="section-title">应用场景</h2>
          <p class="section-text">{{ product.application }}</p>
        </section>

        <section class="content-section">
          <h2 class="section-title">客户案例</h2>
          <p class="section-text">{{ product.cases }}</p>
        </section>
      </div>

      <!-- 联系咨询 -->
      <div class="contact-section">
        <div class="contact-card">
          <h3 class="contact-title">咨询该产品</h3>
          <p class="contact-desc">如需了解更多产品信息，请联系我们的销售团队</p>
          <button class="contact-btn" @click="handleContact">立即咨询</button>
        </div>
      </div>
    </div>

    <!-- 底部互动栏 -->
    <div class="interaction-bar">
      <div class="company-info">
        <div class="company-logo">康</div>
        <div class="company-name">
          康立数字
          <span class="verified-badge">✓</span>
        </div>
      </div>
      <div class="interaction-buttons">
        <button class="interact-btn" @click="handleLike">
          <span class="btn-icon">👍</span>
          <span class="btn-count">{{ likeCount }}</span>
        </button>
        <button class="interact-btn" @click="handleShare">
          <span class="btn-icon">📤</span>
          <span class="btn-count">{{ shareCount }}</span>
        </button>
        <button class="interact-btn" @click="handleCollect">
          <span class="btn-icon">⭐</span>
          <span class="btn-text">收藏</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()

const likeCount = ref(28)
const shareCount = ref(12)

// 产品详情数据（后续从后台接口获取）
const product = ref({
  id: 1,
  name: 'PLC控制系统',
  category: '控制系统',
  date: '2024年1月',
  views: 1580,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=PLC控制系统主图',
  overview: '康立数字PLC控制系统是一套专业的工业自动化控制解决方案。系统采用模块化设计，支持多种主流PLC品牌（西门子、三菱、欧姆龙等），提供完整的编程、调试、监控功能。系统稳定可靠，响应速度快，广泛应用于各类生产线、自动化设备中。',
  features: [
    '支持多种PLC品牌和型号，兼容性强',
    '可视化编程界面，降低开发难度',
    '实时监控设备运行状态，及时发现异常',
    '支持远程诊断和程序下载',
    '完善的报警机制和日志记录',
    '模块化设计，易于扩展和维护'
  ],
  specifications: [
    { label: '支持品牌', value: '西门子/三菱/欧姆龙/施耐德' },
    { label: '通讯协议', value: 'ModbusTCP/Profinet/Ethernet/IP' },
    { label: '响应时间', value: '< 10ms' },
    { label: '编程语言', value: 'Ladder/STL/FBD/SCL' },
    { label: '运行环境', value: 'Windows/Linux' },
    { label: '授权方式', value: '永久授权/年度订阅' }
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=PLC系统界面1',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=PLC系统界面2'
  ],
  application: '康立PLC控制系统广泛应用于注塑机、纺织机械、包装设备、物流分拣、装配生产线等场景。系统可根据客户实际需求进行定制开发，满足不同行业的特殊控制要求。',
  cases: '已服务超过200家制造企业，包括多家上市公司和行业龙头企业。典型案例包括：某大型注塑企业100台设备集中控制项目、某纺织企业全自动化生产线改造项目等。客户满意度达98%以上。'
})

onMounted(() => {
  // 根据路由参数加载产品详情
  const productId = route.params.id
  loadProductDetail(productId)
})

const loadProductDetail = (id) => {
  // 后续从后台API获取数据
  console.log('加载产品详情:', id)
  
  // 根据不同ID加载不同产品（示例）
  const productsData = {
    '2': {
      name: '数据采集网关系统',
      category: '数据采集',
      mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=数采网关系统主图',
      overview: '工业级数据采集网关，支持多种工业协议转换，实时采集设备运行数据...'
    },
    '3': {
      name: '标品MES系统',
      category: '生产管理',
      mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=MES系统主图',
      overview: '制造执行系统标准化产品，覆盖生产计划、生产执行、质量管理...'
    }
  }
  
  if (productsData[id]) {
    Object.assign(product.value, productsData[id])
  }
}

const goBack = () => {
  router.back()
}

const handleLike = () => {
  likeCount.value++
}

const handleShare = () => {
  alert('分享产品')
}

const handleCollect = () => {
  alert('已收藏')
}

const handleContact = () => {
  alert('跳转到联系我们页面')
  // router.push('/contact')
}
</script>

<style scoped>
.product-detail-page {
  min-height: 100vh;
  background: white;
  padding-bottom: 70px;
}

/* 顶部导航 */
.detail-header {
  position: sticky;
  top: 0;
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  background: white;
  border-bottom: 1px solid var(--border-color);
}

.close-btn,
.more-btn {
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  font-size: 24px;
  color: var(--text-primary);
  cursor: pointer;
}

/* 产品容器 */
.product-container {
  padding: 20px;
}

/* 产品标题 */
.product-title {
  font-size: 24px;
  font-weight: 600;
  color: var(--text-primary);
  line-height: 1.4;
  margin: 0 0 16px 0;
}

/* 标签 */
.product-tags {
  display: flex;
  gap: 8px;
  margin-bottom: 12px;
}

.tag {
  padding: 4px 12px;
  background: #f0f0f0;
  border-radius: 4px;
  font-size: 13px;
  color: var(--text-secondary);
}

/* 产品信息 */
.product-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 24px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--border-color);
}

/* 产品主图 */
.product-main-image {
  margin-bottom: 24px;
  border-radius: 8px;
  overflow: hidden;
}

.product-main-image img {
  width: 100%;
  height: auto;
  display: block;
}

/* 产品内容 */
.product-content {
  margin-bottom: 24px;
}

.content-section {
  margin-bottom: 32px;
}

.section-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 16px 0;
  padding-left: 12px;
  border-left: 3px solid var(--primary-color);
}

.section-text {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
  margin: 0;
}

/* 功能列表 */
.feature-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.feature-list li {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
  padding: 8px 0 8px 24px;
  position: relative;
}

.feature-list li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--primary-color);
  font-weight: bold;
}

/* 技术参数表格 */
.spec-table {
  border: 1px solid var(--border-color);
  border-radius: 8px;
  overflow: hidden;
}

.spec-row {
  display: flex;
  border-bottom: 1px solid var(--border-color);
}

.spec-row:last-child {
  border-bottom: none;
}

.spec-label {
  width: 120px;
  padding: 12px 16px;
  background: #f8f8f8;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-primary);
  border-right: 1px solid var(--border-color);
}

.spec-value {
  flex: 1;
  padding: 12px 16px;
  font-size: 14px;
  color: var(--text-secondary);
}

/* 产品图片展示 */
.product-images {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.product-images img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* 联系咨询 */
.contact-section {
  margin-top: 32px;
}

.contact-card {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-radius: 12px;
  padding: 24px;
  text-align: center;
}

.contact-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 8px 0;
}

.contact-desc {
  font-size: 14px;
  color: var(--text-secondary);
  margin: 0 0 20px 0;
}

.contact-btn {
  padding: 12px 32px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 24px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s;
}

.contact-btn:active {
  transform: scale(0.95);
  background: #0052a3;
}

/* 底部互动栏 */
.interaction-bar {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 20px;
  background: white;
  border-top: 1px solid var(--border-color);
  z-index: 100;
}

.company-info {
  display: flex;
  align-items: center;
}

.company-logo {
  width: 36px;
  height: 36px;
  border-radius: 4px;
  background: var(--primary-color);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  font-weight: 600;
  margin-right: 8px;
}

.company-name {
  font-size: 14px;
  font-weight: 500;
  color: var(--text-primary);
}

.verified-badge {
  color: var(--primary-color);
  font-size: 12px;
  margin-left: 4px;
}

.interaction-buttons {
  display: flex;
  gap: 20px;
}

.interact-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: transparent;
  border: none;
  cursor: pointer;
  transition: transform 0.2s;
}

.interact-btn:active {
  transform: scale(0.95);
}

.btn-icon {
  font-size: 20px;
  margin-bottom: 2px;
}

.btn-count {
  font-size: 12px;
  color: var(--text-secondary);
}

.btn-text {
  font-size: 12px;
  color: var(--text-secondary);
}
</style>


