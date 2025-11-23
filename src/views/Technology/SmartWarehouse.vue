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

const likeCount = ref(65)
const shareCount = ref(38)

// 智能仓储方案数据（后续从后台接口获取）
const solution = ref({
  name: '智能仓储管理系统',
  industry: '物流仓储',
  date: '2024年6月',
  views: 3650,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=智能仓储系统',
  overview: '康立数字智能仓储管理系统（WMS）是一套专业的仓库管理解决方案。系统采用条码、RFID等物联网技术，实现仓库作业的数字化、智能化管理。涵盖入库管理、出库管理、库存管理、盘点管理、拣货管理等全流程。支持多仓库、多货主管理，帮助企业提升仓储效率，降低库存成本，实现仓库精细化管理。',
  painPoints: [
    '库存数据不准确，账实不符，经常出现差异',
    '入库、出库效率低，高峰期容易出错',
    '货物摆放混乱，找货耗时，影响发货速度',
    '先进先出难以执行，造成货物积压或过期',
    '盘点耗时长，需要停工盘点，影响正常作业',
    '多仓库管理困难，库存调拨不及时',
    '人工记录出入库，效率低且容易出错',
    '仓库空间利用率低，存储成本高'
  ],
  solutions: [
    {
      title: '智能入库管理',
      content: '扫码快速入库，自动生成入库单。系统自动分配库位，优化存储空间。支持批次管理、保质期管理。入库数据实时更新，库存账实同步。支持多种入库类型（采购入库、生产入库、退货入库等）。'
    },
    {
      title: '智能出库管理',
      content: '订单自动生成拣货任务，优化拣货路径。扫码出库，防止发错货。支持先进先出（FIFO）策略。出库复核，确保准确性。出库数据实时更新。支持多种出库类型（销售出库、生产领料、调拨出库等）。'
    },
    {
      title: '精准库存管理',
      content: '实时库存查询，库存数据准确可靠。多维度库存统计（按仓库、按货品、按批次等）。库存预警，库存不足或超储及时提醒。呆滞库存分析，优化库存结构。支持虚拟仓、在途库存管理。'
    },
    {
      title: '智能盘点管理',
      content: '支持动态盘点，无需停工。PDA盘点，快速准确。盈亏自动生成，差异分析。盘点报告自动生成。支持循环盘点、抽样盘点等多种盘点方式。'
    },
    {
      title: '多仓库协同管理',
      content: '支持多仓库、多货主管理。仓库间调拨管理，审批流程可配置。各仓库库存实时查看。支持按仓库设置不同管理策略。总部可集中监控各仓库运营情况。'
    },
    {
      title: '数据分析决策',
      content: '出入库报表自动生成。库存周转率分析。仓库作业效率分析。ABC分类管理。为库存优化提供数据支持。'
    }
  ],
  advantages: [
    '快速实施：标准化产品，最快1周上线',
    '易于使用：界面友好，操作简单，培训1天即可上手',
    '灵活配置：支持自定义字段、自定义流程',
    '移动作业：支持PDA、手机端，随时随地作业',
    '硬件兼容：支持市面主流PDA、扫码枪、打印机',
    '性价比高：功能强大，价格合理，投资回报快'
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=智能仓储PC端',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=智能仓储PDA端'
  ],
  process: [
    { title: '需求调研', desc: '了解仓库规模、货品类型、作业流程' },
    { title: '方案设计', desc: '设计仓库布局、制定实施方案' },
    { title: '系统部署', desc: '服务器部署，基础数据导入' },
    { title: '硬件配置', desc: '配置PDA、扫码枪、打印机等硬件' },
    { title: '人员培训', desc: '操作培训，确保员工熟练使用' },
    { title: '试运行', desc: '小范围试运行，发现问题及时调整' },
    { title: '正式上线', desc: '全面上线，现场指导' }
  ],
  cases: [
    {
      company: '某电商企业',
      industry: '电商物流',
      description: '该企业有3个仓库，日发货量5000单以上。以前仓库管理靠Excel，经常出错。上线智能仓储系统后，实现了全流程数字化管理。',
      result: '出库效率提升50%，发货准确率提升至99.8%，库存准确率提升至99.5%，客户满意度大幅提升'
    },
    {
      company: '某制造企业',
      industry: '制造业',
      description: '该企业原材料和成品种类多，库存管理复杂。WMS系统帮助企业实现了精准的库存管理和先进先出。',
      result: '库存周转率提升35%，库存资金占用减少30%，盘点时间从3天缩短到4小时'
    },
    {
      company: '某医药企业',
      industry: '医药行业',
      description: '该企业需要严格的批次和保质期管理。WMS系统帮助企业建立了完善的追溯体系，确保药品安全。',
      result: '批次管理准确率100%，过期药品零出库，通过GSP认证检查'
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

