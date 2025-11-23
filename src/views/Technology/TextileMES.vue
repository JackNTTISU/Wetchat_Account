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

const likeCount = ref(58)
const shareCount = ref(32)

// 家纺MES方案数据（后续从后台接口获取）
const solution = ref({
  name: '家纺MES制造执行系统',
  industry: '家纺服装',
  date: '2024年6月',
  views: 3280,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=家纺MES系统',
  overview: '康立数字家纺MES系统是专为家纺服装行业打造的制造执行管理系统。系统深度结合家纺行业特点，涵盖订单管理、生产排程、工序流转、质量追溯、成本核算等全流程管理。通过数字化手段，帮助企业实现从接单到交付的全流程可视化管理，提升生产效率，降低运营成本，助力企业数字化转型。',
  painPoints: [
    '订单多、批次多、交期紧，生产计划难以协调',
    '工序复杂，多道工序流转管理困难',
    '原材料种类多，库存管理混乱，经常缺料或积压',
    '生产进度不透明，客户催单时无法准确答复',
    '质量问题难以追溯，出现问题找不到责任人',
    '人工统计工时和计件，效率低且容易出错',
    '成本核算不准确，利润情况不清晰'
  ],
  solutions: [
    {
      title: '智能订单管理',
      content: '支持多种订单类型录入，自动拆分生产任务，智能排程。系统根据交期、设备负荷、原料库存等因素，自动生成最优生产计划。实时跟踪订单进度，客户可随时查询订单状态。'
    },
    {
      title: '工序流转管理',
      content: '支持家纺行业复杂工序流转，包括裁剪、缝制、绣花、印染、整烫、包装等。每道工序扫码报工，实时记录工序完成情况。支持工序外发管理，自动结算外协费用。'
    },
    {
      title: '质量追溯管理',
      content: '建立完善的质量追溯体系，从原料到成品全程可追溯。支持首检、巡检、终检等多种质量检验方式。质量问题自动预警，快速定位问题批次和责任人。'
    },
    {
      title: '智能仓储管理',
      content: '原材料、半成品、成品分类管理。支持批次管理、先进先出。库存预警，缺料提醒。扫码出入库，账实相符。自动生成采购建议。'
    },
    {
      title: '成本核算分析',
      content: '自动核算订单成本，包括原料成本、人工成本、制造费用等。实时统计各项费用，生成成本分析报表。支持多维度利润分析，为经营决策提供数据支持。'
    }
  ],
  advantages: [
    '行业深耕：10年家纺行业信息化经验，深刻理解行业需求',
    '快速实施：标准化产品，快速部署，最快2周上线',
    '灵活配置：模块化设计，根据企业实际情况灵活配置',
    '移动应用：支持手机端操作，随时随地查看生产情况',
    '数据分析：强大的数据分析功能，为决策提供支持',
    '持续升级：产品持续迭代升级，永久免费升级'
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=家纺MES系统界面1',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=家纺MES系统界面2'
  ],
  process: [
    { title: '需求调研', desc: '深入了解企业生产流程和管理需求' },
    { title: '方案设计', desc: '制定实施方案，确定系统配置' },
    { title: '系统部署', desc: '服务器部署，基础数据录入' },
    { title: '人员培训', desc: '操作培训，确保员工熟练使用' },
    { title: '试运行', desc: '小范围试运行，发现问题及时调整' },
    { title: '正式上线', desc: '全面上线，现场指导' },
    { title: '售后服务', desc: '7×24小时技术支持' }
  ],
  cases: [
    {
      company: '某大型家纺企业',
      industry: '家纺行业',
      description: '该企业拥有500多名员工，年产值2亿元。生产订单多、品种杂、交期紧。上线康立家纺MES系统后，实现了从接单到交付的全流程数字化管理。',
      result: '生产效率提升30%，交货准时率提升至95%，库存周转率提高40%，客户满意度大幅提升'
    },
    {
      company: '某床上用品企业',
      industry: '家纺行业',
      description: '该企业主要生产四件套、被芯等床上用品。以前生产进度全靠人工统计，经常出错。使用MES系统后，生产进度一目了然。',
      result: '人工统计工作量减少80%，生产进度透明度100%，质量合格率提升至98%'
    },
    {
      company: '某窗帘定制企业',
      industry: '家纺行业',
      description: '该企业专注高端窗帘定制，订单小批量、个性化强。MES系统帮助企业实现了小批量订单的高效管理。',
      result: '订单管理效率提升50%，客户投诉率下降70%，复购率提升35%'
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

