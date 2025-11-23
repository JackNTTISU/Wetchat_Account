<template>
  <div id="app" class="app-container">
    <div class="main-content">
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
    </div>
    <TabBar @open-chat="showChatDialog = true" />
    <ChatDialog v-model:show="showChatDialog" />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import TabBar from './components/TabBar.vue'
import ChatDialog from './components/ChatDialog.vue'

const showChatDialog = ref(false)
</script>

<style scoped>
.app-container {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  background: #f5f5f5;
}

.main-content {
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
  padding-bottom: 56px;
  -webkit-overflow-scrolling: touch;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

