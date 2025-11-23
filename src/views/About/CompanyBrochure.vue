<template>
  <div class="brochure-page">
    <!-- 顶部导航 -->
    <div class="brochure-header">
      <button class="close-btn" @click="goBack">✕</button>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 文章容器 -->
    <div class="article-container">
      <!-- 标题 -->
      <h1 class="article-title">康立数字公司宣传册</h1>

      <!-- 标签 -->
      <div class="article-tags">
        <span class="tag">原创</span>
        <span class="tag">康立数字</span>
        <span class="tag">智能制造</span>
      </div>

      <!-- 文章信息 -->
      <div class="article-meta">
        <span class="meta-date">{{ currentDate }}</span>
        <span class="meta-location">📍 苏州</span>
        <span class="meta-audio">🎧 听全文</span>
      </div>

      <!-- 宣传册图片（支持多张） -->
      <div class="brochure-images">
        <div class="image-item" v-for="(image, index) in brochureImages" :key="index">
          <img :src="image.url" :alt="image.alt" />
        </div>
        <div class="images-tip">* 以上图片为占位图，请提供真实的企业宣传册设计图（可多张）</div>
      </div>

      <!-- 文字版企业介绍（可选） -->
      <div class="company-intro">
        <div class="intro-section">
          <h2 class="section-title">企业介绍</h2>
          <p class="section-content">
            康立数字科技有限公司，成立于2015年，是一家专注于工业软件和智能制造解决方案的高新技术企业。公司总部位于江苏省苏州市，在多个城市设有分支机构。公司致力于为制造业客户提供全方位的数字化转型服务，帮助企业实现智能化、数字化升级。
          </p>
        </div>

        <div class="intro-section">
          <h2 class="section-title">专业化团队</h2>
          <p class="section-content">
            康立数字拥有一支由技术专家和行业资深人士组成的专业团队。研发团队成员来自国内外知名企业和科研机构，具备丰富的项目实施经验。团队深耕制造业多年，了解行业痛点，能够为客户提供量身定制的解决方案。
          </p>
        </div>

        <div class="intro-section">
          <h2 class="section-title">客户导向</h2>
          <p class="section-content">
            秉承"客户至上"的服务理念，康立数字始终以客户需求为导向。我们深入了解客户的实际需求，提供最适合的产品和服务。项目实施过程中，我们注重与客户的沟通协作，确保项目顺利交付。售后服务团队7×24小时待命，及时响应客户需求。
          </p>
        </div>

        <div class="intro-section">
          <h2 class="section-title">技术创新</h2>
          <p class="section-content">
            康立数字不断进行技术创新，紧跟技术发展趋势。公司持续投入研发，不断优化产品功能，提升系统性能。我们积极探索新技术在工业领域的应用，为客户提供具有竞争力的产品和服务。技术创新是康立数字持续发展的核心驱动力。
          </p>
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
        <button class="interact-btn">
          <span class="btn-text">推荐</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const likeCount = ref(15)
const shareCount = ref(8)

// 宣传册图片列表（可以添加多张）
const brochureImages = ref([
  {
    url: 'https://via.placeholder.com/750x1000/0066CC/ffffff?text=康立数字宣传册+第1页%0A%0A企业介绍',
    alt: '康立数字企业介绍'
  },
  {
    url: 'https://via.placeholder.com/750x1000/0066CC/ffffff?text=康立数字宣传册+第2页%0A%0A专业团队',
    alt: '康立数字专业团队'
  },
  {
    url: 'https://via.placeholder.com/750x1000/0066CC/ffffff?text=康立数字宣传册+第3页%0A%0A客户导向',
    alt: '康立数字客户导向'
  },
  {
    url: 'https://via.placeholder.com/750x1000/0066CC/ffffff?text=康立数字宣传册+第4页%0A%0A技术创新',
    alt: '康立数字技术创新'
  }
])

const currentDate = computed(() => {
  const now = new Date()
  const year = now.getFullYear()
  const month = now.getMonth() + 1
  const day = now.getDate()
  const hours = now.getHours()
  const minutes = now.getMinutes()
  return `${year}年${month}月${day}日 ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`
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
</script>

<style scoped>
.brochure-page {
  min-height: 100vh;
  background: white;
  padding-bottom: 70px;
}

/* 顶部导航 */
.brochure-header {
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

/* 文章容器 */
.article-container {
  padding: 20px;
}

/* 标题 */
.article-title {
  font-size: 24px;
  font-weight: 600;
  color: var(--text-primary);
  line-height: 1.4;
  margin: 0 0 16px 0;
}

/* 标签 */
.article-tags {
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

/* 文章信息 */
.article-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 24px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--border-color);
}

/* 宣传册图片（支持多张） */
.brochure-images {
  margin-bottom: 24px;
}

.image-item {
  margin-bottom: 16px;
}

.image-item img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 8px;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
}

.images-tip {
  margin-top: 12px;
  padding: 12px;
  background: #fff3cd;
  border: 1px solid #ffc107;
  border-radius: 4px;
  font-size: 13px;
  color: #856404;
  text-align: center;
}

/* 文字版介绍 */
.company-intro {
  margin-top: 32px;
}

.intro-section {
  margin-bottom: 24px;
}

.section-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 12px 0;
  padding-left: 12px;
  border-left: 3px solid var(--primary-color);
}

.section-content {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
  text-indent: 2em;
  margin: 0;
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
  font-size: 14px;
  color: var(--text-secondary);
}
</style>

