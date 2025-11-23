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

const likeCount = ref(54)
const shareCount = ref(29)

// 设备TPM方案数据（后续从后台接口获取）
const solution = ref({
  name: '设备TPM全面维护管理系统',
  industry: '设备管理',
  date: '2024年6月',
  views: 3120,
  mainImage: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=设备TPM系统',
  overview: '康立数字设备TPM管理系统是一套专业的设备全生命周期管理解决方案。系统基于TPM（全面生产维护）理念，实现设备点检、保养、维修、备件、润滑等全方位管理。支持移动端作业，扫码点检、保养。通过预防性维护，减少设备故障，提升设备综合效率OEE，降低维护成本，助力企业实现设备的精益化管理。',
  painPoints: [
    '设备保养不规范，维护计划难以执行',
    '设备故障频发，停机时间长，影响生产',
    '设备维修记录靠纸质，查询困难，无法追溯',
    '备件管理混乱，关键备件缺货，影响维修效率',
    '设备润滑不及时，加速设备磨损',
    '设备数据分散，无法有效分析设备状态',
    'OEE等设备指标无法准确统计',
    '维护成本不清晰，无法有效控制'
  ],
  solutions: [
    {
      title: '设备台账管理',
      content: '建立完善的设备电子台账，记录设备基本信息、技术参数、使用部门等。设备二维码管理，扫码即可查看设备信息。设备档案管理，包括说明书、图纸、合格证等电子文档。设备履历自动记录，全生命周期可追溯。'
    },
    {
      title: '智能点检管理',
      content: '制定点检计划，自动提醒点检任务。移动端扫码点检，支持拍照、录音记录。点检异常自动生成维修工单。点检数据自动统计分析。支持日点检、周点检、月点检等多种频率。'
    },
    {
      title: '保养计划管理',
      content: '按设备类型制定保养计划模板。系统自动生成保养任务，提前提醒。保养内容标准化，确保保养质量。保养记录电子化，扫码确认保养完成。保养统计分析，保养及时率、完成率一目了然。'
    },
    {
      title: '维修工单管理',
      content: '故障报修，扫码快速报修。工单自动分配，维修人员及时响应。维修过程记录，包括故障原因、维修措施、备件更换等。维修完成验收，确保维修质量。维修统计分析，故障率、维修时间等指标可视化。'
    },
    {
      title: '备件库存管理',
      content: '建立备件库存台账，按设备建立备件清单。备件出入库管理，扫码领用、归还。库存预警，关键备件不足及时提醒。备件采购申请，审批流程可配置。备件消耗统计，优化库存结构。'
    },
    {
      title: '润滑管理',
      content: '制定润滑计划，自动提醒润滑任务。记录润滑点位、润滑油品、润滑周期等。润滑记录管理，确保按时润滑。润滑油库存管理，及时补充。'
    },
    {
      title: 'OEE分析',
      content: '自动计算设备综合效率OEE，包括时间开动率、性能开动率、合格品率。多维度统计分析，按设备、按时间段、按班组等。趋势分析，持续改进设备效率。'
    }
  ],
  advantages: [
    '预防为主：预防性维护，减少故障停机时间',
    '移动作业：支持手机端、平板端，随时随地作业',
    '扫码操作：扫设备二维码即可操作，简单高效',
    '自动提醒：保养、点检任务自动提醒，不会遗漏',
    '数据分析：强大的数据分析功能，辅助决策',
    '快速实施：标准化产品，最快2周上线'
  ],
  images: [
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=TPM系统PC端',
    'https://via.placeholder.com/750x500/0066CC/ffffff?text=TPM系统手机端'
  ],
  process: [
    { title: '设备梳理', desc: '梳理企业设备清单，建立设备台账' },
    { title: '制定计划', desc: '制定点检、保养计划和标准' },
    { title: '系统部署', desc: '服务器部署，数据导入' },
    { title: '设备赋码', desc: '为设备粘贴二维码标签' },
    { title: '人员培训', desc: '操作培训，确保熟练使用' },
    { title: '试运行', desc: '小范围试运行，优化流程' },
    { title: '正式上线', desc: '全面推广使用' }
  ],
  cases: [
    {
      company: '某制造企业',
      industry: '机械制造',
      description: '该企业拥有各类设备300多台，以前设备管理靠Excel，保养计划经常遗漏。上线TPM系统后，实现了设备的规范化管理。',
      result: '设备故障率下降45%，设备OEE从65%提升至82%，维护成本降低30%，年节约成本超100万'
    },
    {
      company: '某汽车零部件企业',
      industry: '汽车行业',
      description: '该企业对设备管理要求极高，需要详细的设备履历记录。TPM系统帮助企业建立了完善的设备管理体系。',
      result: '设备完好率达98%以上，通过IATF16949体系认证，获得客户优秀供应商评价'
    },
    {
      company: '某食品企业',
      industry: '食品行业',
      description: '该企业设备种类多，保养计划复杂。TPM系统的自动提醒功能确保了保养计划的执行。',
      result: '保养计划执行率从60%提升至98%，设备突发故障减少70%，生产稳定性大幅提升'
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

