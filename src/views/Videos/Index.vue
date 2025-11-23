<template>
  <div class="videos-page">
    <!-- 头部 -->
    <div class="page-header">
      <div class="header-title">视频中心</div>
    </div>

    <!-- 搜索栏 -->
    <div class="search-bar">
      <div class="search-input-wrapper">
        <svg class="search-icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
          <path d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z" fill="currentColor"/>
        </svg>
        <input 
          v-model="searchQuery" 
          type="text" 
          class="search-input" 
          placeholder="搜索视频..."
          @input="handleSearch"
        />
      </div>
    </div>

    <!-- 分类标签 -->
    <div class="category-tabs">
      <div 
        v-for="cat in categories" 
        :key="cat.id"
        class="category-tab"
        :class="{ active: currentCategory === cat.id }"
        @click="changeCategory(cat.id)"
      >
        {{ cat.name }}
      </div>
    </div>

    <!-- 视频列表 -->
    <div class="videos-container">
      <div class="videos-grid">
        <div 
          v-for="video in filteredVideos" 
          :key="video.id"
          class="video-card"
          @click="playVideo(video.id)"
        >
          <div class="video-thumbnail">
            <img :src="video.thumbnail" :alt="video.title" />
            <div class="play-overlay">
              <svg class="play-icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                <circle cx="512" cy="512" r="448" fill="rgba(0,0,0,0.6)"/>
                <path d="M406.4 332.8l307.2 179.2-307.2 179.2V332.8z" fill="white"/>
              </svg>
            </div>
            <div class="video-duration">{{ video.duration }}</div>
          </div>
          <div class="video-info">
            <div class="video-title">{{ video.title }}</div>
            <div class="video-meta">
              <span class="meta-item">
                <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path d="M512 128C300.8 128 128 300.8 128 512s172.8 384 384 384 384-172.8 384-384S723.2 128 512 128z m0 704c-176.8 0-320-143.2-320-320s143.2-320 320-320 320 143.2 320 320-143.2 320-320 320z" fill="currentColor"/>
                  <path d="M512 288c-17.6 0-32 14.4-32 32v192c0 17.6 14.4 32 32 32s32-14.4 32-32V320c0-17.6-14.4-32-32-32z" fill="currentColor"/>
                  <path d="M512 640c-17.6 0-32 14.4-32 32v32c0 17.6 14.4 32 32 32s32-14.4 32-32v-32c0-17.6-14.4-32-32-32z" fill="currentColor"/>
                </svg>
                {{ video.views }}次观看
              </span>
              <span class="meta-item">{{ video.date }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 空状态 -->
      <div v-if="filteredVideos.length === 0" class="empty-state">
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
          <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32z m-40 632H136V232h752v560z" fill="#d9d9d9"/>
          <path d="M716.3 528.1L420.8 310.4c-3.2-2.4-7.3-3.7-11.6-3.7-10.5 0-19 8.5-19 19v435.5c0 4.3 1.3 8.4 3.7 11.6 5.8 7.8 16.9 9.4 24.7 3.6l295.5-217.7c3.2-2.4 5.6-5.7 6.9-9.5 3.3-9.8-1.9-20.5-11.7-23.8-2.3-.8-4.7-1.1-7-1.3z" fill="#d9d9d9"/>
        </svg>
        <p>暂无视频</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const searchQuery = ref('')
const currentCategory = ref('all')

// 分类数据
const categories = [
  { id: 'all', name: '全部' },
  { id: 'product', name: '产品演示' },
  { id: 'case', name: '案例分享' },
  { id: 'tech', name: '技术讲解' },
  { id: 'company', name: '企业介绍' }
]

// 视频数据（示例数据，实际应从后台API获取）
const videos = ref([
  {
    id: 1,
    title: '康立智能MES系统产品演示',
    thumbnail: 'https://via.placeholder.com/400x225/0066CC/ffffff?text=MES系统演示',
    duration: '05:32',
    views: '1.2万',
    date: '2024-01-15',
    category: 'product',
    url: 'https://your-server.com/videos/mes-demo.mp4' // 您的服务器视频地址
  },
  {
    id: 2,
    title: '家纺行业智能化改造成功案例',
    thumbnail: 'https://via.placeholder.com/400x225/00A85A/ffffff?text=家纺案例',
    duration: '08:15',
    views: '8.5千',
    date: '2024-01-10',
    category: 'case',
    url: 'https://your-server.com/videos/textile-case.mp4'
  },
  {
    id: 3,
    title: '注塑机数据采集与分析技术详解',
    thumbnail: 'https://via.placeholder.com/400x225/FF6B00/ffffff?text=技术讲解',
    duration: '12:48',
    views: '6.3千',
    date: '2024-01-08',
    category: 'tech',
    url: 'https://your-server.com/videos/injection-tech.mp4'
  },
  {
    id: 4,
    title: '康立数字企业宣传片',
    thumbnail: 'https://via.placeholder.com/400x225/0066CC/ffffff?text=企业宣传',
    duration: '03:25',
    views: '2.1万',
    date: '2024-01-05',
    category: 'company',
    url: 'https://your-server.com/videos/company-intro.mp4'
  },
  {
    id: 5,
    title: '智能工具柜系统安装与使用指南',
    thumbnail: 'https://via.placeholder.com/400x225/7C4DFF/ffffff?text=工具柜指南',
    duration: '06:20',
    views: '4.7千',
    date: '2024-01-03',
    category: 'product',
    url: 'https://your-server.com/videos/tool-cabinet.mp4'
  },
  {
    id: 6,
    title: '设备TPM管理系统实战应用',
    thumbnail: 'https://via.placeholder.com/400x225/E91E63/ffffff?text=TPM应用',
    duration: '10:05',
    views: '5.2千',
    date: '2023-12-28',
    category: 'case',
    url: 'https://your-server.com/videos/tpm-application.mp4'
  }
])

// 筛选视频
const filteredVideos = computed(() => {
  let result = videos.value

  // 分类筛选
  if (currentCategory.value !== 'all') {
    result = result.filter(v => v.category === currentCategory.value)
  }

  // 搜索筛选
  if (searchQuery.value.trim()) {
    const query = searchQuery.value.toLowerCase()
    result = result.filter(v => v.title.toLowerCase().includes(query))
  }

  return result
})

// 切换分类
const changeCategory = (categoryId) => {
  currentCategory.value = categoryId
}

// 搜索
const handleSearch = () => {
  // 搜索逻辑已在computed中处理
}

// 播放视频
const playVideo = (videoId) => {
  router.push(`/videos/player/${videoId}`)
}
</script>

<style scoped>
.videos-page {
  min-height: 100vh;
  background: #f5f5f5;
}

/* 头部 */
.page-header {
  height: 56px;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid #e5e5e5;
  position: sticky;
  top: 0;
  z-index: 100;
}

.header-title {
  font-size: 17px;
  font-weight: 500;
  color: #333;
}

/* 搜索栏 */
.search-bar {
  padding: 12px 16px;
  background: white;
}

.search-input-wrapper {
  display: flex;
  align-items: center;
  background: #f5f5f5;
  border-radius: 8px;
  padding: 8px 12px;
}

.search-icon {
  width: 18px;
  height: 18px;
  color: #999;
  margin-right: 8px;
  flex-shrink: 0;
}

.search-input {
  flex: 1;
  border: none;
  background: transparent;
  font-size: 14px;
  outline: none;
  color: #333;
}

.search-input::placeholder {
  color: #999;
}

/* 分类标签 */
.category-tabs {
  display: flex;
  background: white;
  padding: 12px 16px;
  gap: 12px;
  overflow-x: auto;
  border-bottom: 1px solid #e5e5e5;
  -webkit-overflow-scrolling: touch;
}

.category-tabs::-webkit-scrollbar {
  display: none;
}

.category-tab {
  padding: 6px 16px;
  border-radius: 20px;
  font-size: 14px;
  color: #666;
  background: #f5f5f5;
  white-space: nowrap;
  cursor: pointer;
  transition: all 0.2s;
}

.category-tab.active {
  background: #0066CC;
  color: white;
  font-weight: 500;
}

/* 视频容器 */
.videos-container {
  padding: 16px;
}

.videos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 16px;
}

/* 视频卡片 */
.video-card {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.2s, box-shadow 0.2s;
}

.video-card:active {
  transform: scale(0.98);
}

.video-thumbnail {
  position: relative;
  width: 100%;
  padding-top: 56.25%; /* 16:9 */
  background: #f0f0f0;
  overflow: hidden;
}

.video-thumbnail img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.play-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0);
  transition: background 0.2s;
}

.video-card:hover .play-overlay {
  background: rgba(0, 0, 0, 0.1);
}

.play-icon {
  width: 48px;
  height: 48px;
  transition: transform 0.2s;
}

.video-card:hover .play-icon {
  transform: scale(1.1);
}

.video-duration {
  position: absolute;
  bottom: 8px;
  right: 8px;
  background: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 2px 6px;
  border-radius: 4px;
  font-size: 12px;
}

.video-info {
  padding: 12px;
}

.video-title {
  font-size: 15px;
  color: #333;
  font-weight: 500;
  line-height: 1.4;
  margin-bottom: 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.video-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 12px;
  color: #999;
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 4px;
}

.meta-item svg {
  width: 14px;
  height: 14px;
}

/* 空状态 */
.empty-state {
  text-align: center;
  padding: 60px 20px;
  color: #999;
}

.empty-state svg {
  width: 120px;
  height: 120px;
  margin-bottom: 16px;
}

.empty-state p {
  font-size: 14px;
}

/* 移动端适配 */
@media (max-width: 640px) {
  .videos-grid {
    grid-template-columns: 1fr;
  }
}
</style>

