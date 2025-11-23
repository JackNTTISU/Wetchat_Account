<template>
  <div class="detail-page">
    <!-- 顶部导航 -->
    <div class="detail-header">
      <button class="close-btn" @click="goBack">✕</button>
      <div class="header-domain">app.kangli-digital.com</div>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 文章内容 -->
    <div class="article-container" v-if="article">
      <!-- 文章标题 -->
      <h1 class="article-title">{{ article.title }}</h1>

      <!-- 文章信息 -->
      <div class="article-meta">
        <span class="meta-author">康立数字</span>
        <span class="meta-date">{{ article.date }} {{ article.time }}</span>
        <span class="meta-location">📍 苏州</span>
        <span class="meta-views">🎧 {{ article.views }}人</span>
      </div>

      <!-- 文章来源 -->
      <div class="article-source">
        文章来源：康立数字科技有限公司
      </div>

      <!-- 文章配图 -->
      <div class="article-image">
        <img :src="article.cover" :alt="article.title" />
      </div>

      <!-- 文章正文 -->
      <div class="article-content" v-html="article.content"></div>
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
          <span class="btn-icon">❤️</span>
          <span class="btn-count">{{ collectCount }}</span>
        </button>
        <button class="interact-btn" @click="handleComment">
          <span class="btn-icon">💬</span>
          <span class="btn-count">{{ commentCount }}</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()

// 互动数据
const likeCount = ref(20)
const shareCount = ref(15)
const collectCount = ref(8)
const commentCount = ref(2)

// 文章数据（应该从上一页传递过来，这里先硬编码）
const articles = {
  1: {
    id: 1,
    title: '康立数字与某集团达成战略合作，共建智能制造平台',
    cover: 'https://via.placeholder.com/800x450/0066CC/ffffff?text=Strategic+Cooperation',
    date: '2025年1月15日',
    time: '10:30',
    views: 156,
    content: `
      <p>2025年1月15日，康立数字科技有限公司与某大型制造集团在苏州正式签署战略合作协议，双方高层领导出席了签约仪式。</p>
      
      <p>根据协议，双方将在智能制造、工业互联网、数字化转型等领域开展深度合作，共同打造行业领先的智能制造平台。该平台将整合康立数字在工业软件领域的技术优势和合作伙伴在制造领域的行业经验，为更多制造企业提供专业的数字化解决方案。</p>
      
      <p>康立数字将为该集团提供包括MES系统、设备管理TPM、数采网关等在内的全套智能制造解决方案，帮助企业实现生产过程的数字化、智能化管理。项目预计将在未来三年内完成部署，覆盖该集团旗下多个生产基地。</p>
      
      <p>康立数字CEO表示："此次合作是康立数字在智能制造领域的重要里程碑。我们将充分发挥双方优势，为客户创造更大价值，推动中国制造业的数字化转型。"</p>
    `
  },
  2: {
    id: 2,
    title: '康立MES系统助力某企业生产效率提升30%',
    cover: 'https://via.placeholder.com/800x450/0066CC/ffffff?text=MES+Success+Case',
    date: '2025年1月12日',
    time: '14:20',
    views: 234,
    content: `
      <p>某机械制造企业在导入康立MES系统后，生产效率提升30%，不良品率下降40%，取得了显著的管理成效。</p>
      
      <p>该企业负责人表示："康立MES系统帮助我们实现了生产过程的全面数字化管理，从订单接收到产品交付的全流程都清晰可见，管理效率大幅提升。特别是质量追溯功能，让我们能够快速定位问题，及时改进。"</p>
      
      <p>康立数字为该企业量身定制了MES解决方案，包括生产计划、工单管理、质量管理、设备管理等模块，实现了生产数据的实时采集和分析。系统上线后，企业的计划达成率从75%提升至95%，库存周转率提高了25%。</p>
      
      <p>项目负责人介绍："我们根据客户的实际需求，对系统进行了深度定制，确保系统能够完美适配客户的业务流程。同时，我们提供了全程技术支持和培训服务，帮助客户快速上手。"</p>
    `
  },
  3: {
    id: 3,
    title: '康立数字参展2025工业博览会，展示最新产品',
    cover: 'https://via.placeholder.com/800x450/0066CC/ffffff?text=Exhibition+2025',
    date: '2025年1月10日',
    time: '09:15',
    views: 189,
    content: `
      <p>2025年1月10日，康立数字携最新产品亮相上海工业博览会，现场展示了PLC系统、数采网关、MES系统、TPM系统、智能工具柜等全系列产品。</p>
      
      <p>展会现场，康立数字的展台吸引了众多客户驻足参观。工作人员为参观者提供产品演示和技术咨询服务，详细介绍了各产品的功能特点和应用案例。</p>
      
      <p>其中，康立智能工具柜系列产品受到了特别关注。该产品采用RFID识别技术，实现工具的智能存取、权限管理和使用追踪，有效防止工具遗失，提升管理效率。现场多家企业表达了合作意向。</p>
      
      <p>公司负责人表示："我们致力于为制造业客户提供一站式智能制造解决方案。通过本次展会，我们希望让更多企业了解康立数字的产品和服务，助力中国制造业的转型升级。"</p>
    `
  },
  4: {
    id: 4,
    title: '康立云平台正式上线，支持千台设备接入',
    cover: 'https://via.placeholder.com/800x450/0066CC/ffffff?text=Cloud+Platform',
    date: '2025年1月8日',
    time: '16:45',
    views: 312,
    content: `
      <p>经过半年的研发和测试，康立云平台正式上线，为企业提供设备云端管理、远程监控、数据分析等一站式服务。</p>
      
      <p>平台采用微服务架构，基于云原生技术构建，支持千台设备同时接入，具备高并发、高可用、易扩展等特点。系统采用分布式部署，确保7×24小时稳定运行。</p>
      
      <p>企业通过康立云平台，可以实现：1）设备状态实时监控，及时发现异常；2）生产数据自动采集和分析，为决策提供依据；3）预测性维护，提前预警设备故障；4）远程设备控制，降低运维成本。</p>
      
      <p>技术负责人介绍："我们提供灵活的接入方式，支持Modbus、OPC UA、MQTT等多种工业协议。企业可以通过网关快速接入现有设备，无需改造设备本身。"</p>
      
      <p>目前，已有50多家企业接入康立云平台，接入设备超过3000台，数据采集点位达10万个。平台将持续优化升级，为客户提供更优质的服务。</p>
    `
  },
  5: {
    id: 5,
    title: '康立数字荣获"智能制造优秀服务商"称号',
    cover: 'https://via.placeholder.com/800x450/0066CC/ffffff?text=Award+2025',
    date: '2025年1月5日',
    time: '11:00',
    views: 278,
    content: `
      <p>在近日举办的2025中国智能制造发展大会上，康立数字凭借在智能制造领域的突出贡献，荣获"智能制造优秀服务商"称号。</p>
      
      <p>这一荣誉是对康立数字多年来专注技术创新、服务客户的充分肯定。大会评审委员会认为，康立数字在工业软件领域具有深厚的技术积累，产品线完整，解决方案成熟，客户满意度高，为推动中国制造业数字化转型做出了积极贡献。</p>
      
      <p>自2015年成立以来，康立数字始终聚焦智能制造领域，累计服务客户超过500家，实施项目1000余个，涵盖汽车、机械、电子、纺织、注塑等多个行业。公司拥有自主知识产权的核心产品，形成了从设备控制、数据采集到生产管理的完整产品体系。</p>
      
      <p>展望未来，康立数字将继续加大研发投入，深化产品创新，拓展服务领域，为更多制造企业提供专业、优质的智能制造解决方案，助力中国制造业高质量发展。</p>
    `
  }
}

const article = ref(null)

onMounted(() => {
  const articleId = parseInt(route.params.id)
  article.value = articles[articleId]
})

const goBack = () => {
  router.back()
}

const handleLike = () => {
  likeCount.value++
}

const handleShare = () => {
  alert('分享功能')
}

const handleCollect = () => {
  collectCount.value++
}

const handleComment = () => {
  alert('评论功能')
}
</script>

<style scoped>
.detail-page {
  min-height: 100vh;
  background: #f5f5f5;
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

.header-domain {
  flex: 1;
  text-align: center;
  font-size: 12px;
  color: var(--text-tertiary);
}

/* 文章容器 */
.article-container {
  background: white;
  margin-bottom: 10px;
  padding: 20px;
}

/* 文章标题 */
.article-title {
  font-size: 22px;
  font-weight: 600;
  color: var(--text-primary);
  line-height: 1.4;
  margin: 0 0 16px 0;
}

/* 文章信息 */
.article-meta {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 12px;
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 12px;
}

.meta-author {
  color: var(--text-primary);
  font-weight: 500;
}

/* 文章来源 */
.article-source {
  font-size: 12px;
  color: var(--text-tertiary);
  text-align: center;
  margin-bottom: 20px;
}

/* 文章配图 */
.article-image {
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 20px;
}

.article-image img {
  width: 100%;
  height: auto;
  display: block;
}

/* 文章正文 */
.article-content {
  font-size: 16px;
  color: var(--text-primary);
  line-height: 1.8;
}

.article-content p {
  margin: 0 0 16px 0;
  text-indent: 2em;
}

.article-content p:last-child {
  margin-bottom: 0;
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
</style>

