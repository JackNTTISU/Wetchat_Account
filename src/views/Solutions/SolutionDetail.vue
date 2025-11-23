<template>
  <div class="solution-detail-page">
    <!-- 顶部导航 -->
    <div class="detail-header">
      <button class="close-btn" @click="goBack">✕</button>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 方案容器 -->
    <div class="solution-container">
      <!-- 方案名称 -->
      <h1 class="solution-title">{{ solution.name }}</h1>

      <!-- 标签 -->
      <div class="solution-tags">
        <span class="tag">{{ solution.industry }}</span>
        <span class="tag">康立数字</span>
        <span class="tag">{{ solution.cases }}个成功案例</span>
      </div>

      <!-- 方案信息 -->
      <div class="solution-meta">
        <span class="meta-date">更新时间：{{ solution.date }}</span>
        <span class="meta-location">📍 苏州</span>
        <span class="meta-views">👁 {{ solution.views }} 次查看</span>
      </div>

      <!-- 方案主图 -->
      <div class="solution-main-image">
        <img :src="solution.mainImage" :alt="solution.name" />
      </div>

      <!-- 方案内容 -->
      <div class="solution-content">
        <section class="content-section">
          <h2 class="section-title">方案概述</h2>
          <p class="section-text">{{ solution.overview }}</p>
        </section>

        <section class="content-section">
          <h2 class="section-title">行业痛点</h2>
          <ul class="pain-list">
            <li v-for="(pain, index) in solution.painPoints" :key="index">
              {{ pain }}
            </li>
          </ul>
        </section>

        <section class="content-section">
          <h2 class="section-title">解决方案</h2>
          <div class="solution-detail">
            <div class="solution-block" v-for="(item, index) in solution.solutions" :key="index">
              <div class="block-title">{{ item.title }}</div>
              <div class="block-content">{{ item.content }}</div>
            </div>
          </div>
        </section>

        <section class="content-section">
          <h2 class="section-title">核心优势</h2>
          <ul class="advantage-list">
            <li v-for="(advantage, index) in solution.advantages" :key="index">
              {{ advantage }}
            </li>
          </ul>
        </section>

        <!-- 方案图片展示 -->
        <section class="content-section" v-if="solution.images && solution.images.length">
          <h2 class="section-title">方案展示</h2>
          <div class="solution-images">
            <img v-for="(image, index) in solution.images" :key="index" :src="image" :alt="`方案图${index + 1}`" />
          </div>
        </section>

        <section class="content-section">
          <h2 class="section-title">实施流程</h2>
          <div class="process-list">
            <div class="process-item" v-for="(step, index) in solution.process" :key="index">
              <div class="process-number">{{ index + 1 }}</div>
              <div class="process-content">
                <div class="process-title">{{ step.title }}</div>
                <div class="process-desc">{{ step.desc }}</div>
              </div>
            </div>
          </div>
        </section>

        <section class="content-section">
          <h2 class="section-title">成功案例</h2>
          <div class="case-list">
            <div class="case-item" v-for="(caseItem, index) in solution.cases" :key="index">
              <div class="case-header">
                <div class="case-company">{{ caseItem.company }}</div>
                <div class="case-industry">{{ caseItem.industry }}</div>
              </div>
              <div class="case-desc">{{ caseItem.description }}</div>
              <div class="case-result">
                <span class="result-label">实施效果：</span>
                <span class="result-content">{{ caseItem.result }}</span>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- 联系咨询 -->
      <div class="contact-section">
        <div class="contact-card">
          <h3 class="contact-title">咨询该方案</h3>
          <p class="contact-desc">如需了解更多方案详情或定制化服务，请联系我们的技术团队</p>
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

const likeCount = ref(45)
const shareCount = ref(23)

// 方案详情数据（后续从后台接口获取）
const solution = ref({
  id: 1,
  name: '定制化控制系统解决方案',
  industry: '多行业适用',
  date: '2024年5月',
  views: 2340,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=定制化控制系统主图',
  overview: '康立数字定制化控制系统解决方案，专注于解决特殊工艺和复杂控制需求。我们拥有资深的控制系统开发团队，从方案设计、软硬件开发、现场调试到售后服务，提供全流程定制化服务。支持多机联动、复杂运动控制、视觉检测、机器人集成等高级应用，已成功应用于注塑、纺织、包装、新能源等多个行业。',
  painPoints: [
    '标准产品无法满足特殊工艺需求',
    '多设备联动控制复杂，协调困难',
    '系统集成度低，需要对接多个供应商',
    '现场调试周期长，影响生产进度',
    '后期维护困难，技术支持不及时'
  ],
  solutions: [
    {
      title: '需求分析',
      content: '深入了解客户工艺流程和控制需求，制定详细的技术方案。我们的技术团队会到现场进行实地考察，与客户充分沟通，确保方案可行性。'
    },
    {
      title: '方案设计',
      content: '根据需求分析结果，设计控制系统架构，选择合适的硬件平台和软件架构。提供详细的方案文档和系统设计说明。'
    },
    {
      title: '软硬件开发',
      content: '进行PLC程序开发、HMI界面设计、上位机软件开发。采用模块化开发方式，便于后期维护和功能扩展。'
    },
    {
      title: '现场实施',
      content: '派遣工程师到现场进行设备安装、系统调试、人员培训。确保系统稳定运行，操作人员熟练掌握。'
    }
  ],
  advantages: [
    '资深团队：10年以上控制系统开发经验',
    '快速响应：从需求分析到方案设计，最快3天出方案',
    '灵活定制：完全按照客户需求定制开发',
    '全程服务：从设计、开发、调试到售后，一站式服务',
    '技术保障：7×24小时技术支持，快速解决问题',
    '成本优化：合理选型，降低系统成本'
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=控制系统界面1',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=控制系统界面2'
  ],
  process: [
    {
      title: '需求调研',
      desc: '实地考察，深入了解客户需求和现场环境'
    },
    {
      title: '方案设计',
      desc: '制定技术方案，确定系统架构和实施计划'
    },
    {
      title: '合同签订',
      desc: '确认方案细节，签订项目合同'
    },
    {
      title: '系统开发',
      desc: '进行软硬件开发，定期汇报项目进度'
    },
    {
      title: '现场调试',
      desc: '设备安装、系统调试、功能验证'
    },
    {
      title: '培训交付',
      desc: '操作培训、文档交付、项目验收'
    },
    {
      title: '售后服务',
      desc: '提供长期技术支持和系统维护服务'
    }
  ],
  cases: [
    {
      company: '某大型注塑企业',
      industry: '注塑行业',
      description: '该企业拥有100多台注塑机，需要实现集中监控和数据采集。我们为其开发了定制化的集中监控系统，实现了所有设备的实时监控、数据采集、报警管理、报表统计等功能。',
      result: '设备故障响应时间缩短60%，生产效率提升25%，能耗降低15%'
    },
    {
      company: '某纺织机械企业',
      industry: '纺织行业',
      description: '该企业新研发的纺织设备需要复杂的多轴运动控制。我们采用EtherCAT总线技术，实现了16轴高速同步运动控制，并集成了张力控制、色差检测等功能。',
      result: '设备运行速度提升40%，产品合格率提升至98%以上'
    },
    {
      company: '某新能源企业',
      industry: '新能源',
      description: '该企业的锂电池生产线需要高精度的涂布控制系统。我们开发了定制化的涂布控制系统，实现了涂布厚度的精确控制和实时监测。',
      result: '涂布精度达到±2μm，产品一致性大幅提升，不良品率降低80%'
    }
  ]
})

onMounted(() => {
  // 根据路由参数加载方案详情
  const solutionId = route.params.id
  loadSolutionDetail(solutionId)
})

const loadSolutionDetail = (id) => {
  // 后续从后台API获取数据
  console.log('加载方案详情:', id)
  
  // 根据不同ID加载不同方案（示例）
  const solutionsData = {
    '2': {
      name: '设备上云解决方案',
      industry: '智能制造',
      mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=设备上云主图',
      overview: '帮助企业实现设备数据上云，远程监控设备运行状态...'
    },
    '3': {
      name: '家纺服装系统解决方案',
      industry: '家纺服装',
      mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=家纺方案主图',
      overview: '专为家纺服装行业打造的一体化解决方案...'
    },
    '4': {
      name: '注塑机系统解决方案',
      industry: '注塑行业',
      mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=注塑方案主图',
      overview: '针对注塑行业的专业解决方案...'
    }
  }
  
  if (solutionsData[id]) {
    Object.assign(solution.value, solutionsData[id])
  }
}

const goBack = () => {
  router.back()
}

const handleLike = () => {
  likeCount.value++
}

const handleShare = () => {
  alert('分享方案')
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
.solution-detail-page {
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

/* 方案容器 */
.solution-container {
  padding: 20px;
}

/* 方案标题 */
.solution-title {
  font-size: 24px;
  font-weight: 600;
  color: var(--text-primary);
  line-height: 1.4;
  margin: 0 0 16px 0;
}

/* 标签 */
.solution-tags {
  display: flex;
  gap: 8px;
  margin-bottom: 12px;
  flex-wrap: wrap;
}

.tag {
  padding: 4px 12px;
  background: #f0f0f0;
  border-radius: 4px;
  font-size: 13px;
  color: var(--text-secondary);
}

/* 方案信息 */
.solution-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 24px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--border-color);
}

/* 方案主图 */
.solution-main-image {
  margin-bottom: 24px;
  border-radius: 8px;
  overflow: hidden;
}

.solution-main-image img {
  width: 100%;
  height: auto;
  display: block;
}

/* 方案内容 */
.solution-content {
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

/* 痛点列表 */
.pain-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.pain-list li {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
  padding: 8px 0 8px 24px;
  position: relative;
}

.pain-list li::before {
  content: '✗';
  position: absolute;
  left: 0;
  color: #dc3545;
  font-weight: bold;
}

/* 解决方案详情 */
.solution-detail {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.solution-block {
  background: #f8f9fa;
  border-radius: 8px;
  padding: 16px;
}

.block-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 8px;
}

.block-content {
  font-size: 14px;
  color: var(--text-secondary);
  line-height: 1.6;
}

/* 优势列表 */
.advantage-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.advantage-list li {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
  padding: 8px 0 8px 24px;
  position: relative;
}

.advantage-list li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--primary-color);
  font-weight: bold;
}

/* 方案图片展示 */
.solution-images {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.solution-images img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* 实施流程 */
.process-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.process-item {
  display: flex;
  align-items: flex-start;
  gap: 16px;
}

.process-number {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: var(--primary-color);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  font-weight: 600;
  flex-shrink: 0;
}

.process-content {
  flex: 1;
}

.process-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.process-desc {
  font-size: 14px;
  color: var(--text-secondary);
  line-height: 1.6;
}

/* 案例列表 */
.case-list {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.case-item {
  background: #f8f9fa;
  border-radius: 8px;
  padding: 16px;
  border-left: 3px solid var(--primary-color);
}

.case-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}

.case-company {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-primary);
}

.case-industry {
  font-size: 13px;
  color: white;
  background: var(--primary-color);
  padding: 4px 12px;
  border-radius: 12px;
}

.case-desc {
  font-size: 14px;
  color: var(--text-secondary);
  line-height: 1.6;
  margin-bottom: 12px;
}

.case-result {
  padding: 12px;
  background: white;
  border-radius: 6px;
  font-size: 14px;
}

.result-label {
  font-weight: 600;
  color: var(--text-primary);
  margin-right: 8px;
}

.result-content {
  color: #28a745;
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


