<template>
  <div class="tabbar">
    <!-- 子菜单面板 -->
    <transition name="menu-slide">
      <div v-if="activeMenu" class="menu-panel" @click="closeMenu">
        <div class="menu-content" @click.stop>
          <div 
            v-for="item in activeMenu.items" 
            :key="item.path"
            class="menu-item"
            @click="navigateTo(item.path)"
          >
            {{ item.label }}
          </div>
        </div>
      </div>
    </transition>

    <!-- 底部菜单栏 -->
    <div class="tabbar-wrapper">
      <!-- 左侧：键盘图标（对话模式） -->
      <div class="tabbar-item" @click="openChat">
        <div class="tabbar-icon">
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            <path d="M896 256H128c-35.2 0-64 28.8-64 64v384c0 35.2 28.8 64 64 64h768c35.2 0 64-28.8 64-64V320c0-35.2-28.8-64-64-64z" fill="currentColor" opacity=".3"/>
            <path d="M896 192H128c-70.4 0-128 57.6-128 128v384c0 70.4 57.6 128 128 128h768c70.4 0 128-57.6 128-128V320c0-70.4-57.6-128-128-128zM960 704c0 35.2-28.8 64-64 64H128c-35.2 0-64-28.8-64-64V320c0-35.2 28.8-64 64-64h768c35.2 0 64 28.8 64 64v384z" fill="currentColor"/>
          </svg>
        </div>
      </div>

      <!-- 中间：了解康立 -->
      <div 
        class="tabbar-item" 
        :class="{ active: activeMenu === menus[0] }"
        @click="toggleMenu(menus[0])"
      >
        <div class="tabbar-label">了解康立</div>
      </div>

      <!-- 右侧：前瞻技术 -->
      <div 
        class="tabbar-item" 
        :class="{ active: activeMenu === menus[1] }"
        @click="toggleMenu(menus[1])"
      >
        <div class="tabbar-label">前瞻技术</div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const activeMenu = ref(null)

const emit = defineEmits(['open-chat'])

const menus = [
  {
    label: '了解康立',
    items: [
      { label: '最新资讯', path: '/news' },
      { label: '关于康立', path: '/about/brochure' },
      { label: '产品中心', path: '/products/list' },
      { label: '技术方案', path: '/solutions/list' },
      { label: '联系我们', path: '/contact' }
    ]
  },
  {
    label: '前瞻技术',
    items: [
      { label: '家纺MES', path: '/technology/textile-mes' },
      { label: '注塑MES', path: '/technology/injection-mes' },
      { label: '智能仓储', path: '/technology/smart-warehouse' },
      { label: '设备管理TPM', path: '/technology/equipment-tpm' }
    ]
  }
]

const toggleMenu = (menu) => {
  if (activeMenu.value === menu) {
    activeMenu.value = null
  } else {
    activeMenu.value = menu
  }
}

const closeMenu = () => {
  activeMenu.value = null
}

const navigateTo = (path) => {
  router.push(path)
  closeMenu()
}

const openChat = () => {
  emit('open-chat')
}
</script>

<style scoped>
.tabbar {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}

/* 子菜单面板 */
.menu-panel {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 56px;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: flex-end;
  z-index: 999;
}

.menu-content {
  width: 100%;
  background: white;
  border-radius: 12px 12px 0 0;
  padding: 8px 0;
  box-shadow: 0 -2px 12px rgba(0, 0, 0, 0.1);
}

.menu-item {
  padding: 16px 24px;
  font-size: 15px;
  color: #333;
  cursor: pointer;
  transition: background 0.2s ease;
  border-bottom: 1px solid #f5f5f5;
}

.menu-item:last-child {
  border-bottom: none;
}

.menu-item:active {
  background: #f5f5f5;
}

/* 动画 */
.menu-slide-enter-active,
.menu-slide-leave-active {
  transition: opacity 0.25s ease;
}

.menu-slide-enter-active .menu-content,
.menu-slide-leave-active .menu-content {
  transition: transform 0.25s ease;
}

.menu-slide-enter-from,
.menu-slide-leave-to {
  opacity: 0;
}

.menu-slide-enter-from .menu-content,
.menu-slide-leave-to .menu-content {
  transform: translateY(100%);
}

/* 底部菜单栏 */
.tabbar-wrapper {
  height: 56px;
  background: white;
  display: flex;
  align-items: center;
  box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.1);
  border-top: 1px solid #e5e5e5;
  padding-bottom: env(safe-area-inset-bottom);
}

.tabbar-item {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background 0.2s ease;
  height: 100%;
  position: relative;
}

.tabbar-item:active {
  background: #f5f5f5;
}

.tabbar-item.active .tabbar-label {
  color: #0066CC;
  font-weight: 500;
}

.tabbar-icon {
  width: 24px;
  height: 24px;
  color: #666;
  transition: color 0.2s ease;
}

.tabbar-icon svg {
  width: 100%;
  height: 100%;
}

.tabbar-label {
  font-size: 14px;
  color: #333;
  transition: color 0.2s ease;
  font-weight: 400;
}

/* 分隔线 */
.tabbar-item:not(:last-child)::after {
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 1px;
  height: 20px;
  background: #e5e5e5;
}
</style>

