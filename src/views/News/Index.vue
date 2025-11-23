<template>
  <div class="news-page">
    <!-- 顶部导航 -->
    <div class="news-header">
      <button class="close-btn" @click="goBack">✕</button>
      <div class="header-title">
        <div class="title-text">最新资讯</div>
        <div class="title-domain">app.kangli-digital.com</div>
      </div>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 搜索框 -->
    <div class="search-box">
      <input 
        type="text" 
        placeholder="请输入搜索内容"
        class="search-input"
        readonly
      />
      <span class="search-icon">🔍</span>
    </div>

    <!-- Banner -->
    <div class="news-banner">
      <div class="banner-overlay">
        <div class="banner-title-cn">康立数字</div>
        <div class="banner-title-en">最新资讯 Latest News</div>
      </div>
    </div>

    <!-- 精选视频 -->
    <div class="featured-videos-section">
      <div class="section-header">
        <div class="section-title">
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="title-icon">
            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" fill="currentColor"/>
            <path d="M719.4 499.1l-296.1-215A15.9 15.9 0 0 0 398 297v430c0 13.1 14.8 20.5 25.3 12.9l296.1-215a15.9 15.9 0 0 0 0-25.8z" fill="currentColor"/>
          </svg>
          精选视频
        </div>
        <div class="view-more" @click="goToVideos">
          更多
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            <path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z" fill="currentColor"/>
          </svg>
        </div>
      </div>
      
      <div class="videos-scroll-container">
        <div 
          v-for="video in featuredVideos" 
          :key="video.id"
          class="video-card-h"
          @click="playVideo(video.id)"
        >
          <div class="video-thumbnail-h">
            <img :src="video.thumbnail" :alt="video.title" />
            <div class="play-btn-overlay">
              <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="play-icon">
                <circle cx="512" cy="512" r="400" fill="rgba(0,0,0,0.6)"/>
                <path d="M406.4 332.8l307.2 179.2-307.2 179.2V332.8z" fill="white"/>
              </svg>
            </div>
            <div class="video-duration-h">{{ video.duration }}</div>
          </div>
          <div class="video-title-h">{{ video.title }}</div>
        </div>
      </div>
    </div>

    <!-- 文章列表 -->
    <div class="news-list">
      <div 
        v-for="article in articles" 
        :key="article.id"
        class="news-item"
        @click="goToDetail(article.id)"
      >
        <div class="news-image">
          <img :src="article.cover" :alt="article.title" />
        </div>
        <div class="news-content">
          <h3 class="news-title">{{ article.title }}</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

// 精选视频数据（3-4个推荐视频）
const featuredVideos = ref([
  {
    id: 1,
    title: '康立智能MES系统产品演示',
    thumbnail: 'https://via.placeholder.com/300x169/0066CC/ffffff?text=MES系统演示',
    duration: '05:32'
  },
  {
    id: 4,
    title: '康立数字企业宣传片',
    thumbnail: 'https://via.placeholder.com/300x169/0066CC/ffffff?text=企业宣传',
    duration: '03:25'
  },
  {
    id: 2,
    title: '家纺行业智能化改造案例',
    thumbnail: 'https://via.placeholder.com/300x169/00A85A/ffffff?text=家纺案例',
    duration: '08:15'
  },
  {
    id: 5,
    title: '智能工具柜使用指南',
    thumbnail: 'https://via.placeholder.com/300x169/7C4DFF/ffffff?text=工具柜指南',
    duration: '06:20'
  }
])

// 示例文章数据
const articles = ref([
  {
    id: 1,
    title: '康立数字与某集团达成战略合作，共建智能制造平台',
    cover: 'https://via.placeholder.com/200x200/0066CC/ffffff?text=News+1',
    date: '2025-01-15',
    views: 156,
    summary: '双方将在智能制造、工业互联网等领域开展深度合作',
    content: `
      <p>2025年1月15日，康立数字科技有限公司与某大型制造集团正式签署战略合作协议。</p>
      <p>根据协议，双方将在智能制造、工业互联网、数字化转型等领域开展深度合作，共同打造行业领先的智能制造平台。</p>
      <p>康立数字将为该集团提供包括MES系统、设备管理TPM、数采网关等在内的全套智能制造解决方案，帮助企业实现生产过程的数字化、智能化管理。</p>
    `
  },
  {
    id: 2,
    title: '康立MES系统助力某企业生产效率提升30%',
    cover: 'https://via.placeholder.com/200x200/0066CC/ffffff?text=News+2',
    date: '2025-01-12',
    views: 234,
    summary: '客户案例分享：从传统管理到数字化转型的成功之路',
    content: `
      <p>某机械制造企业在导入康立MES系统后，生产效率提升30%，不良品率下降40%。</p>
      <p>该企业负责人表示："康立MES系统帮助我们实现了生产过程的全面数字化管理，从订单接收到产品交付的全流程都清晰可见，管理效率大幅提升。"</p>
      <p>康立数字为该企业量身定制了MES解决方案，包括生产计划、质量管理、设备管理等模块，实现了生产数据的实时采集和分析。</p>
    `
  },
  {
    id: 3,
    title: '康立数字参展2025工业博览会，展示最新产品',
    cover: 'https://via.placeholder.com/200x200/0066CC/ffffff?text=News+3',
    date: '2025-01-10',
    views: 189,
    summary: '现场展示PLC系统、MES系统、智能工具柜等明星产品',
    content: `
      <p>2025年1月10日，康立数字携最新产品亮相工业博览会，吸引众多客户驻足参观。</p>
      <p>展会现场，康立数字展示了PLC系统、数采网关、MES系统、TPM系统、智能工具柜等全系列产品，并提供现场演示和技术咨询服务。</p>
      <p>公司负责人表示："我们致力于为制造业客户提供一站式智能制造解决方案，帮助企业实现数字化转型升级。"</p>
    `
  },
  {
    id: 4,
    title: '康立云平台正式上线，支持千台设备接入',
    cover: 'https://via.placeholder.com/200x200/0066CC/ffffff?text=News+4',
    date: '2025-01-08',
    views: 312,
    summary: '云端管理、远程监控、数据分析，一站式设备管理解决方案',
    content: `
      <p>康立云平台正式上线，为企业提供设备云端管理、远程监控、数据分析等服务。</p>
      <p>平台采用微服务架构，支持千台设备同时接入，具备高并发、高可用、易扩展等特点。</p>
      <p>企业通过康立云平台，可以实现设备状态实时监控、生产数据分析、预测性维护等功能，大幅提升设备管理效率。</p>
    `
  },
  {
    id: 5,
    title: '康立数字荣获"智能制造优秀服务商"称号',
    cover: 'https://via.placeholder.com/200x200/0066CC/ffffff?text=News+5',
    date: '2025-01-05',
    views: 278,
    summary: '行业认可，持续创新，为客户创造价值',
    content: `
      <p>康立数字凭借在智能制造领域的突出贡献，荣获"智能制造优秀服务商"称号。</p>
      <p>这一荣誉是对康立数字多年来专注技术创新、服务客户的充分肯定。</p>
      <p>未来，康立数字将继续深耕智能制造领域，为更多制造企业提供专业、优质的软件产品和技术服务。</p>
    `
  }
])

const goBack = () => {
  router.back()
}

const goToDetail = (id) => {
  router.push(`/news/detail/${id}`)
}

const goToVideos = () => {
  router.push('/videos')
}

const playVideo = (id) => {
  router.push(`/videos/player/${id}`)
}
</script>

<style scoped>
.news-page {
  min-height: 100vh;
  background: #f5f5f5;
}

/* 顶部导航 */
.news-header {
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
  display: flex;
  align-items: center;
  justify-content: center;
}

.header-title {
  flex: 1;
  text-align: center;
}

.title-text {
  font-size: 17px;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 2px;
}

.title-domain {
  font-size: 12px;
  color: var(--text-tertiary);
}

/* 搜索框 */
.search-box {
  position: relative;
  padding: 12px 16px;
  background: white;
  border-bottom: 1px solid var(--border-color);
}

.search-input {
  width: 100%;
  padding: 10px 40px 10px 16px;
  background: #f5f5f5;
  border: 1px solid #e5e5e5;
  border-radius: 4px;
  font-size: 14px;
  color: var(--text-secondary);
}

.search-input::placeholder {
  color: #999;
}

.search-icon {
  position: absolute;
  right: 28px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 16px;
}

/* Banner */
.news-banner {
  position: relative;
  height: 200px;
  background: linear-gradient(135deg, #0066CC 0%, #004C99 100%);
  overflow: hidden;
  margin-bottom: 10px;
}

.news-banner::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: 
    radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
  animation: pulse 4s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.8;
  }
}

.banner-overlay {
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 0 24px;
  color: white;
}

.banner-title-cn {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 12px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.banner-title-en {
  font-size: 20px;
  font-weight: 400;
  opacity: 0.95;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

/* 精选视频区域 */
.featured-videos-section {
  background: white;
  padding: 16px 0;
  margin-bottom: 10px;
}

.section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 16px 12px;
}

.section-title {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 17px;
  font-weight: 500;
  color: #333;
}

.title-icon {
  width: 20px;
  height: 20px;
  color: #0066CC;
}

.view-more {
  display: flex;
  align-items: center;
  gap: 4px;
  font-size: 14px;
  color: #666;
  cursor: pointer;
  transition: color 0.2s;
}

.view-more:active {
  color: #0066CC;
}

.view-more svg {
  width: 12px;
  height: 12px;
}

.videos-scroll-container {
  display: flex;
  gap: 12px;
  padding: 0 16px;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none; /* Firefox */
}

.videos-scroll-container::-webkit-scrollbar {
  display: none; /* Chrome, Safari */
}

.video-card-h {
  flex-shrink: 0;
  width: 260px;
  cursor: pointer;
  transition: transform 0.2s;
}

.video-card-h:active {
  transform: scale(0.97);
}

.video-thumbnail-h {
  position: relative;
  width: 100%;
  height: 146px;
  border-radius: 8px;
  overflow: hidden;
  background: #f0f0f0;
  margin-bottom: 8px;
}

.video-thumbnail-h img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.play-btn-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.1);
  transition: background 0.2s;
}

.video-card-h:hover .play-btn-overlay {
  background: rgba(0, 0, 0, 0.2);
}

.play-icon {
  width: 48px;
  height: 48px;
  transition: transform 0.2s;
}

.video-card-h:hover .play-icon {
  transform: scale(1.1);
}

.video-duration-h {
  position: absolute;
  bottom: 8px;
  right: 8px;
  background: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 3px 6px;
  border-radius: 4px;
  font-size: 12px;
  font-weight: 500;
}

.video-title-h {
  font-size: 14px;
  color: #333;
  line-height: 1.4;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* 文章列表 */
.news-list {
  background: white;
}

.news-item {
  display: flex;
  padding: 16px;
  border-bottom: 1px solid var(--border-color);
  cursor: pointer;
  transition: background 0.2s;
}

.news-item:hover {
  background: var(--bg-gray);
}

.news-item:active {
  background: #f0f0f0;
}

.news-image {
  width: 120px;
  height: 90px;
  flex-shrink: 0;
  margin-right: 12px;
  border-radius: 4px;
  overflow: hidden;
  background: #f0f0f0;
}

.news-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.news-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.news-title {
  font-size: 16px;
  font-weight: 500;
  color: var(--text-primary);
  line-height: 1.5;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  margin: 0;
}
</style>

