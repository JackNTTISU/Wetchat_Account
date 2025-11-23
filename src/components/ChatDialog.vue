<template>
  <!-- 聊天遮罩层 -->
  <transition name="chat-fade">
    <div v-if="show" class="chat-overlay" @click="handleClose">
      <!-- 聊天主容器 -->
      <div class="chat-container" @click.stop>
        <!-- 聊天头部 -->
        <div class="chat-header">
          <div class="header-left" @click="handleClose">
            <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
              <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z" fill="currentColor"/>
            </svg>
          </div>
          <div class="header-title">康立数字客服</div>
          <div class="header-right"></div>
        </div>

        <!-- 聊天消息区域 -->
        <div class="chat-messages" ref="messagesContainer">
          <div v-for="(msg, index) in messages" :key="index" class="message-wrapper">
            <!-- 用户消息 -->
            <div v-if="msg.type === 'user'" class="message-item user-message">
              <div class="message-bubble user-bubble">{{ msg.content }}</div>
              <div class="message-avatar user-avatar">
                <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path d="M512 512m-512 0a512 512 0 1 0 1024 0 512 512 0 1 0-1024 0Z" fill="#07C160"/>
                  <path d="M512 288c-70.4 0-128 57.6-128 128s57.6 128 128 128 128-57.6 128-128-57.6-128-128-128z m256 256c0 140.8-115.2 256-256 256s-256-115.2-256-256h512z" fill="white"/>
                </svg>
              </div>
            </div>

            <!-- 系统消息 -->
            <div v-else class="message-item system-message">
              <div class="message-avatar system-avatar">
                <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                      <stop offset="0%" style="stop-color:#0066CC;stop-opacity:1" />
                      <stop offset="100%" style="stop-color:#004999;stop-opacity:1" />
                    </linearGradient>
                  </defs>
                  <circle cx="512" cy="512" r="480" fill="url(#logoGradient)"/>
                  <text x="512" y="620" font-size="420" fill="white" text-anchor="middle" font-weight="bold" font-family="Arial">康</text>
                </svg>
              </div>
              <div class="message-bubble system-bubble">
                <div class="bubble-content">{{ msg.content }}</div>
                <div v-if="msg.hasAction" class="bubble-action" @click="showContactForm">
                  <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="action-icon">
                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" fill="#576B95"/>
                    <path d="M464 336h80v368h-80z" fill="#576B95"/>
                    <path d="M336 464h368v80H336z" fill="#576B95"/>
                  </svg>
                  点击填写留言表单
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 输入工具栏 -->
        <div class="chat-input-bar">
          <div class="input-tools">
            <button class="tool-btn">
              <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                <path d="M256 256h512v512H256z" fill="currentColor" opacity=".3"/>
                <path d="M896 256H128c-35.2 0-64 28.8-64 64v384c0 35.2 28.8 64 64 64h768c35.2 0 64-28.8 64-64V320c0-35.2-28.8-64-64-64zM192 576h-64v-64h64v64z m0-128h-64v-64h64v64z m192 128h-64v-64h64v64z m0-128h-64v-64h64v64z m192 128h-64v-64h64v64z m0-128h-64v-64h64v64z m192 128h-64v-64h64v64z m0-128h-64v-64h64v64z m192 128h-64v-64h64v64z m0-128h-64v-64h64v64z" fill="currentColor"/>
              </svg>
            </button>
            <button class="tool-btn">
              <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                <path d="M512 128c-211.2 0-384 172.8-384 384s172.8 384 384 384 384-172.8 384-384-172.8-384-384-384z" fill="currentColor" opacity=".3"/>
                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" fill="currentColor"/>
                <path d="M340 460c22.1 0 40-17.9 40-40s-17.9-40-40-40-40 17.9-40 40 17.9 40 40 40z m344 0c22.1 0 40-17.9 40-40s-17.9-40-40-40-40 17.9-40 40 17.9 40 40 40z" fill="currentColor"/>
                <path d="M512 704c-79.5 0-144-64.5-144-144h288c0 79.5-64.5 144-144 144z" fill="currentColor"/>
              </svg>
            </button>
          </div>
          
          <input 
            v-model="inputText" 
            type="text" 
            class="chat-input" 
            placeholder="请输入消息..."
            @keyup.enter="sendMessage"
          />
          
          <button class="send-btn" :disabled="!inputText.trim()" @click="sendMessage">
            发送
          </button>
        </div>
      </div>
    </div>
  </transition>

  <!-- 留言表单弹窗 -->
  <ContactFormDialog v-model:show="showFormDialog" />
</template>

<script setup>
import { ref, nextTick, watch } from 'vue'
import ContactFormDialog from './ContactFormDialog.vue'

const props = defineProps({
  show: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:show'])

const inputText = ref('')
const messages = ref([])
const messagesContainer = ref(null)
const showFormDialog = ref(false)

// 监听显示状态，初始化欢迎消息
watch(() => props.show, (newVal) => {
  if (newVal && messages.value.length === 0) {
    setTimeout(() => {
      addSystemMessage('您好！欢迎咨询康立数字，有什么可以帮您？', false)
    }, 300)
  }
})

// 发送消息
const sendMessage = () => {
  const text = inputText.value.trim()
  if (!text) return

  // 添加用户消息
  messages.value.push({
    type: 'user',
    content: text
  })
  
  inputText.value = ''
  scrollToBottom()

  // 系统自动回复（延迟500ms模拟真实对话）
  setTimeout(() => {
    addSystemMessage(
      '您好，已收到您的消息，您可填写我们的问题留言表单，以便我们能更快与您联系，为您答疑解惑！',
      true
    )
  }, 500)
}

// 添加系统消息
const addSystemMessage = (content, hasAction) => {
  messages.value.push({
    type: 'system',
    content,
    hasAction
  })
  scrollToBottom()
}

// 滚动到底部
const scrollToBottom = () => {
  nextTick(() => {
    if (messagesContainer.value) {
      messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight
    }
  })
}

// 显示联系表单
const showContactForm = () => {
  showFormDialog.value = true
}

// 关闭聊天
const handleClose = () => {
  emit('update:show', false)
}
</script>

<style scoped>
/* 聊天遮罩层 */
.chat-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  z-index: 2000;
  display: flex;
  align-items: center;
  justify-content: center;
}

.chat-container {
  width: 100%;
  height: 100%;
  background: #f5f5f5;
  display: flex;
  flex-direction: column;
}

/* 聊天头部 */
.chat-header {
  height: 56px;
  background: white;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 16px;
  border-bottom: 1px solid #e5e5e5;
}

.header-left {
  width: 24px;
  height: 24px;
  cursor: pointer;
  color: #333;
}

.header-left svg {
  width: 100%;
  height: 100%;
}

.header-title {
  font-size: 17px;
  font-weight: 500;
  color: #333;
}

.header-right {
  width: 24px;
}

/* 消息区域 */
.chat-messages {
  flex: 1;
  overflow-y: auto;
  padding: 16px;
}

.message-wrapper {
  margin-bottom: 16px;
}

.message-item {
  display: flex;
  align-items: flex-end;
  gap: 8px;
}

/* 用户消息（右侧） */
.user-message {
  flex-direction: row-reverse;
}

.user-bubble {
  background: #07C160;
  color: white;
  max-width: 70%;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 15px;
  line-height: 1.5;
  word-wrap: break-word;
}

.user-avatar {
  width: 40px;
  height: 40px;
  border-radius: 6px;
  overflow: hidden;
  flex-shrink: 0;
}

.user-avatar svg {
  width: 100%;
  height: 100%;
}

/* 系统消息（左侧） */
.system-message {
  flex-direction: row;
}

.system-bubble {
  background: white;
  max-width: 70%;
  padding: 10px 14px;
  border-radius: 8px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.bubble-content {
  font-size: 15px;
  line-height: 1.5;
  color: #333;
  word-wrap: break-word;
}

.bubble-action {
  margin-top: 8px;
  padding: 8px 12px;
  background: #f5f5f5;
  border-radius: 6px;
  color: #576B95;
  font-size: 14px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: background 0.2s;
}

.bubble-action:active {
  background: #e5e5e5;
}

.action-icon {
  width: 16px;
  height: 16px;
}

.system-avatar {
  width: 40px;
  height: 40px;
  border-radius: 6px;
  overflow: hidden;
  flex-shrink: 0;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
}

.system-avatar svg {
  width: 100%;
  height: 100%;
}

/* 输入工具栏 */
.chat-input-bar {
  background: white;
  padding: 8px 16px;
  border-top: 1px solid #e5e5e5;
  display: flex;
  align-items: center;
  gap: 8px;
  padding-bottom: calc(8px + env(safe-area-inset-bottom));
}

.input-tools {
  display: flex;
  gap: 8px;
}

.tool-btn {
  width: 32px;
  height: 32px;
  border: none;
  background: transparent;
  cursor: pointer;
  color: #666;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.tool-btn svg {
  width: 24px;
  height: 24px;
}

.chat-input {
  flex: 1;
  height: 36px;
  border: 1px solid #e5e5e5;
  border-radius: 6px;
  padding: 0 12px;
  font-size: 15px;
  outline: none;
}

.chat-input:focus {
  border-color: #0066CC;
}

.send-btn {
  height: 36px;
  padding: 0 20px;
  background: #0066CC;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 15px;
  cursor: pointer;
  transition: opacity 0.2s;
}

.send-btn:disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

.send-btn:not(:disabled):active {
  opacity: 0.8;
}

/* 动画 */
.chat-fade-enter-active,
.chat-fade-leave-active {
  transition: opacity 0.3s ease;
}

.chat-fade-enter-from,
.chat-fade-leave-to {
  opacity: 0;
}
</style>

