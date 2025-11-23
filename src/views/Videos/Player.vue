<template>
  <div class="video-player-page">
    <!-- 头部导航 -->
    <div class="player-header">
      <div class="back-btn" @click="goBack">
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
          <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z" fill="currentColor"/>
        </svg>
      </div>
      <div class="header-title">{{ currentVideo?.title || '视频播放' }}</div>
      <div class="header-right"></div>
    </div>

    <!-- 视频播放器 -->
    <div class="video-player-container">
      <video 
        ref="videoPlayer"
        class="video-player" 
        :src="currentVideo?.url"
        controls
        controlsList="nodownload"
        preload="metadata"
        :poster="currentVideo?.thumbnail"
        @play="handlePlay"
        @pause="handlePause"
        @ended="handleEnded"
      >
        您的浏览器不支持视频播放
      </video>
    </div>

    <!-- 视频信息 -->
    <div class="video-details">
      <div class="video-title">{{ currentVideo?.title }}</div>
      <div class="video-stats">
        <span class="stat-item">
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            <path d="M512 128C300.8 128 128 300.8 128 512s172.8 384 384 384 384-172.8 384-384S723.2 128 512 128z m0 704c-176.8 0-320-143.2-320-320s143.2-320 320-320 320 143.2 320 320-143.2 320-320 320z" fill="currentColor"/>
          </svg>
          {{ currentVideo?.views }}次观看
        </span>
        <span class="stat-item">{{ currentVideo?.date }}</span>
      </div>
      
      <div class="video-description" v-if="currentVideo?.description">
        <div class="description-title">视频简介</div>
        <div class="description-content" :class="{ expanded: descExpanded }">
          {{ currentVideo.description }}
        </div>
        <div class="expand-btn" @click="descExpanded = !descExpanded" v-if="currentVideo.description.length > 100">
          {{ descExpanded ? '收起' : '展开' }}
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" :class="{ rotate: descExpanded }">
            <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- 相关推荐 -->
    <div class="related-videos" v-if="relatedVideos.length > 0">
      <div class="section-title">相关推荐</div>
      <div class="related-list">
        <div 
          v-for="video in relatedVideos" 
          :key="video.id"
          class="related-item"
          @click="playRelated(video.id)"
        >
          <div class="related-thumbnail">
            <img :src="video.thumbnail" :alt="video.title" />
            <div class="related-duration">{{ video.duration }}</div>
          </div>
          <div class="related-info">
            <div class="related-title">{{ video.title }}</div>
            <div class="related-meta">{{ video.views }}次观看</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()
const videoPlayer = ref(null)
const descExpanded = ref(false)

// 视频数据（实际应从后台API获取）
const allVideos = [
  {
    id: 1,
    title: '康立智能MES系统产品演示',
    thumbnail: 'https://via.placeholder.com/400x225/0066CC/ffffff?text=MES系统演示',
    duration: '05:32',
    views: '1.2万',
    date: '2024-01-15',
    category: 'product',
    url: 'https://your-server.com/videos/mes-demo.mp4',
    description: '本视频详细演示了康立智能MES系统的核心功能，包括生产计划管理、实时监控、质量追溯、数据分析等模块。通过实际操作展示，帮助您快速了解系统的强大功能和便捷操作。'
  },
  {
    id: 2,
    title: '家纺行业智能化改造成功案例',
    thumbnail: 'https://via.placeholder.com/400x225/00A85A/ffffff?text=家纺案例',
    duration: '08:15',
    views: '8.5千',
    date: '2024-01-10',
    category: 'case',
    url: 'https://your-server.com/videos/textile-case.mp4',
    description: '本案例分享了某家纺企业通过引入康立数字化解决方案，实现生产效率提升30%，质量追溯100%覆盖的成功经验。'
  },
  {
    id: 3,
    title: '注塑机数据采集与分析技术详解',
    thumbnail: 'https://via.placeholder.com/400x225/FF6B00/ffffff?text=技术讲解',
    duration: '12:48',
    views: '6.3千',
    date: '2024-01-08',
    category: 'tech',
    url: 'https://your-server.com/videos/injection-tech.mp4',
    description: '深入讲解注塑机数据采集的技术原理、实施方案以及数据分析方法，帮助企业实现设备智能化管理。'
  },
  {
    id: 4,
    title: '康立数字企业宣传片',
    thumbnail: 'https://via.placeholder.com/400x225/0066CC/ffffff?text=企业宣传',
    duration: '03:25',
    views: '2.1万',
    date: '2024-01-05',
    category: 'company',
    url: 'https://your-server.com/videos/company-intro.mp4',
    description: '康立数字科技有限公司专注于工业软件和智能制造解决方案，为制造业数字化转型提供全方位服务。'
  },
  {
    id: 5,
    title: '智能工具柜系统安装与使用指南',
    thumbnail: 'https://via.placeholder.com/400x225/7C4DFF/ffffff?text=工具柜指南',
    duration: '06:20',
    views: '4.7千',
    date: '2024-01-03',
    category: 'product',
    url: 'https://your-server.com/videos/tool-cabinet.mp4',
    description: '详细介绍智能工具柜的安装步骤、系统配置和日常使用方法，帮助您快速上手。'
  },
  {
    id: 6,
    title: '设备TPM管理系统实战应用',
    thumbnail: 'https://via.placeholder.com/400x225/E91E63/ffffff?text=TPM应用',
    duration: '10:05',
    views: '5.2千',
    date: '2023-12-28',
    category: 'case',
    url: 'https://your-server.com/videos/tpm-application.mp4',
    description: '通过实际案例展示TPM管理系统如何帮助企业提升设备综合效率，降低维护成本。'
  }
]

// 当前视频
const currentVideo = computed(() => {
  const videoId = parseInt(route.params.id)
  return allVideos.find(v => v.id === videoId)
})

// 相关推荐（排除当前视频）
const relatedVideos = computed(() => {
  const videoId = parseInt(route.params.id)
  return allVideos
    .filter(v => v.id !== videoId)
    .slice(0, 4)
})

// 返回
const goBack = () => {
  router.back()
}

// 播放相关视频
const playRelated = (videoId) => {
  router.push(`/videos/player/${videoId}`)
  // 滚动到顶部
  window.scrollTo(0, 0)
  // 重新播放
  if (videoPlayer.value) {
    videoPlayer.value.load()
  }
}

// 视频事件
const handlePlay = () => {
  console.log('视频开始播放')
  // TODO: 记录播放日志到后台
}

const handlePause = () => {
  console.log('视频暂停')
}

const handleEnded = () => {
  console.log('视频播放结束')
  // TODO: 记录观看完成到后台
}

onMounted(() => {
  // 页面加载时，如果找不到视频，返回列表页
  if (!currentVideo.value) {
    router.push('/videos')
  }
})
</script>

<style scoped>
.video-player-page {
  min-height: 100vh;
  background: #000;
}

/* 头部 */
.player-header {
  height: 56px;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 16px;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  backdrop-filter: blur(10px);
}

.back-btn {
  width: 24px;
  height: 24px;
  cursor: pointer;
  color: white;
}

.back-btn svg {
  width: 100%;
  height: 100%;
}

.header-title {
  flex: 1;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 0 16px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.header-right {
  width: 24px;
}

/* 视频播放器 */
.video-player-container {
  width: 100%;
  background: #000;
  padding-top: 56px; /* 头部高度 */
}

.video-player {
  width: 100%;
  max-height: 70vh;
  background: #000;
  display: block;
}

/* 视频信息 */
.video-details {
  background: white;
  padding: 16px;
}

.video-title {
  font-size: 17px;
  font-weight: 500;
  color: #333;
  line-height: 1.5;
  margin-bottom: 12px;
}

.video-stats {
  display: flex;
  align-items: center;
  gap: 16px;
  padding-bottom: 16px;
  border-bottom: 1px solid #e5e5e5;
}

.stat-item {
  display: flex;
  align-items: center;
  gap: 4px;
  font-size: 13px;
  color: #999;
}

.stat-item svg {
  width: 16px;
  height: 16px;
}

.video-description {
  margin-top: 16px;
}

.description-title {
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin-bottom: 8px;
}

.description-content {
  font-size: 14px;
  color: #666;
  line-height: 1.6;
  max-height: 3.2em;
  overflow: hidden;
  transition: max-height 0.3s;
}

.description-content.expanded {
  max-height: none;
}

.expand-btn {
  display: flex;
  align-items: center;
  gap: 4px;
  color: #0066CC;
  font-size: 14px;
  margin-top: 8px;
  cursor: pointer;
}

.expand-btn svg {
  width: 12px;
  height: 12px;
  transition: transform 0.3s;
}

.expand-btn svg.rotate {
  transform: rotate(180deg);
}

/* 相关推荐 */
.related-videos {
  background: white;
  margin-top: 8px;
  padding: 16px;
}

.section-title {
  font-size: 16px;
  font-weight: 500;
  color: #333;
  margin-bottom: 16px;
}

.related-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.related-item {
  display: flex;
  gap: 12px;
  cursor: pointer;
  transition: opacity 0.2s;
}

.related-item:active {
  opacity: 0.7;
}

.related-thumbnail {
  position: relative;
  width: 140px;
  height: 78px;
  border-radius: 6px;
  overflow: hidden;
  flex-shrink: 0;
  background: #f0f0f0;
}

.related-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.related-duration {
  position: absolute;
  bottom: 4px;
  right: 4px;
  background: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 2px 4px;
  border-radius: 3px;
  font-size: 11px;
}

.related-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.related-title {
  font-size: 14px;
  color: #333;
  line-height: 1.4;
  margin-bottom: 6px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.related-meta {
  font-size: 12px;
  color: #999;
}
</style>


