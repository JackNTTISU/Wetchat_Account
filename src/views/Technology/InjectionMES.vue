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
        <span class="tag">前瞻技术</span>
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
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const likeCount = ref(72)
const shareCount = ref(41)

// 注塑MES方案数据（后续从后台接口获取）
const solution = ref({
  name: '注塑MES制造执行系统',
  industry: '注塑行业',
  date: '2024年6月',
  views: 4150,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=注塑MES系统',
  overview: '康立数字注塑MES系统是专为注塑行业打造的智能制造执行系统。系统深度对接注塑机设备，实时采集生产数据，实现注塑车间的数字化、透明化管理。涵盖订单管理、模具管理、工艺参数管理、生产监控、质量管理、设备维护等全流程。帮助注塑企业提升设备利用率，降低次品率，优化生产管理，实现智能制造。',
  painPoints: [
    '设备数量多，无法集中监控，设备状态不透明',
    '设备故障响应慢，影响生产进度和交期',
    '模具管理混乱，找模具耗时，模具寿命难以追踪',
    '工艺参数靠经验设置，缺乏数据支持，次品率高',
    '生产数据靠人工记录，效率低且容易出错',
    '质量问题难以追溯，找不到问题批次和原因',
    '设备保养不及时，设备故障率高，维修成本大',
    '能耗数据不清晰，无法有效控制成本'
  ],
  solutions: [
    {
      title: '设备集中监控',
      content: '实时采集所有注塑机运行数据，包括状态、产量、报警等。大屏集中展示，设备状态一目了然。支持远程监控，手机随时查看。异常自动报警，及时处理。'
    },
    {
      title: '模具全生命周期管理',
      content: '建立模具电子档案，记录模具规格、用途、供应商等信息。模具使用记录自动统计，模具寿命预警。模具维修保养计划管理。模具位置实时追踪，快速找模。'
    },
    {
      title: '工艺参数管理',
      content: '建立标准工艺参数库，不同产品自动调用对应参数。工艺参数自动下发到注塑机，避免人为设置错误。实际参数与标准参数对比，偏差预警。优化工艺参数，降低次品率。'
    },
    {
      title: '生产数据自动采集',
      content: '自动采集生产数据，包括产量、周期时间、注射压力、温度等。数据实时上传，无需人工记录。生成生产日报、月报，数据准确可靠。支持多维度数据分析。'
    },
    {
      title: '质量追溯管理',
      content: '每个批次自动生成追溯码，记录生产时间、设备、模具、工艺参数、操作员等信息。质量问题快速追溯，定位问题原因。质量统计分析，持续改进。'
    },
    {
      title: '设备TPM管理',
      content: '设备点检、保养计划自动提醒。保养记录电子化管理。设备故障统计分析。备件库存管理，缺件预警。提升设备综合效率OEE。'
    }
  ],
  advantages: [
    '行业专注：专注注塑行业10年，服务200+注塑企业',
    '设备兼容：支持主流注塑机品牌（海天、震雄、力劲、东芝等）',
    '快速对接：标准化接口，快速对接注塑机，最快1天完成',
    '实时监控：设备状态实时展示，异常及时预警',
    '数据准确：自动采集，数据准确率99.9%',
    '投资回报：平均8-12个月收回投资成本'
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=注塑MES监控大屏',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=注塑MES手机端'
  ],
  process: [
    { title: '现场调研', desc: '了解设备型号、网络环境、管理需求' },
    { title: '方案设计', desc: '制定对接方案和实施计划' },
    { title: '设备对接', desc: '安装数据采集器，对接注塑机' },
    { title: '系统部署', desc: '服务器部署，基础数据录入' },
    { title: '测试调试', desc: '数据采集测试，功能验证' },
    { title: '培训上线', desc: '人员培训，正式上线' },
    { title: '售后服务', desc: '持续技术支持和系统优化' }
  ],
  cases: [
    {
      company: '某大型注塑企业',
      industry: '注塑行业',
      description: '该企业拥有120台注塑机，以前设备管理靠人工巡检，效率低。上线康立注塑MES后，实现了所有设备的集中监控和数据自动采集。',
      result: '设备利用率提升15%，故障响应时间缩短60%，次品率降低30%，年节约成本超200万'
    },
    {
      company: '某汽车配件企业',
      industry: '注塑行业',
      description: '该企业为汽车主机厂供货，质量要求极高。MES系统帮助企业建立了完善的质量追溯体系，每个批次都有完整的生产记录。',
      result: '质量合格率提升至99.5%，客户投诉减少90%，获得主机厂优秀供应商称号'
    },
    {
      company: '某家电配件企业',
      industry: '注塑行业',
      description: '该企业有80台注塑机，模具超过500套。以前找模具要花很长时间。MES系统的模具管理功能让模具位置一目了然。',
      result: '找模具时间从30分钟缩短到3分钟，模具利用率提升25%，模具损坏率降低40%'
    }
  ]
})

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
  router.push('/contact')
}
</script>

<style scoped>
@import '@/styles/solution-detail.css';
</style>

