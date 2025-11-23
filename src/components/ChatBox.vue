<template>
  <div class="chat-container">
    <!-- 浮动按钮 -->
    <div v-if="!isOpen" class="chat-button" @click="openChat">
      <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
        <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" fill="currentColor"/>
        <path d="M464 336a48 48 0 1096 0 48 48 0 10-96 0zm72 112h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V456c0-4.4-3.6-8-8-8z" fill="currentColor"/>
      </svg>
      <span class="chat-text">咨询</span>
    </div>

    <!-- 对话框 -->
    <transition name="slide-up">
      <div v-if="isOpen" class="chat-box">
        <!-- 头部 -->
        <div class="chat-header">
          <div class="header-left">
            <div class="avatar">客</div>
            <div class="header-info">
              <div class="header-title">在线客服</div>
              <div class="header-status">
                <span class="status-dot"></span>
                在线
              </div>
            </div>
          </div>
          <div class="header-actions">
            <button class="minimize-btn" @click="closeChat">
              <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                <path d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9c-4.4 5.2-.7 13.1 6.1 13.1h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z" fill="currentColor"/>
              </svg>
            </button>
          </div>
        </div>

        <!-- 消息列表 -->
        <div class="chat-messages" ref="messagesContainer">
          <div class="welcome-message">
            <div class="system-time">{{ currentTime }}</div>
            <div class="welcome-text">
              <div class="welcome-icon">👋</div>
              <div>您好！欢迎咨询康立数字</div>
              <div class="welcome-desc">我们将尽快为您解答</div>
            </div>
          </div>

          <div 
            v-for="(msg, index) in messages" 
            :key="index"
            class="message-item"
            :class="{ 'message-self': msg.isSelf }"
          >
            <div v-if="!msg.isSelf" class="message-avatar">客</div>
            <div class="message-content">
              <div class="message-bubble">{{ msg.content }}</div>
              <div class="message-time">{{ msg.time }}</div>
            </div>
            <div v-if="msg.isSelf" class="message-avatar self">我</div>
          </div>
        </div>

        <!-- 快捷回复 -->
        <div v-if="showQuickReplies" class="quick-replies">
          <div 
            v-for="(reply, index) in quickReplies" 
            :key="index"
            class="quick-reply-item"
            @click="sendQuickReply(reply)"
          >
            {{ reply }}
          </div>
        </div>

        <!-- 输入框 -->
        <div class="chat-input">
          <input 
            v-model="inputText"
            type="text" 
            placeholder="请输入您的问题..."
            @keyup.enter="sendMessage"
            class="input-field"
          />
          <button 
            class="send-btn" 
            :disabled="!inputText.trim()"
            @click="sendMessage"
          >
            发送
          </button>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref, nextTick } from 'vue'

const isOpen = ref(false)
const inputText = ref('')
const messages = ref([])
const messagesContainer = ref(null)
const showQuickReplies = ref(true)

const currentTime = ref(new Date().toLocaleTimeString('zh-CN', { 
  hour: '2-digit', 
  minute: '2-digit' 
}))

const quickReplies = [
  '产品价格咨询',
  '技术支持',
  '商务合作',
  '预约演示'
]

const openChat = () => {
  isOpen.value = true
}

const closeChat = () => {
  isOpen.value = false
}

const sendMessage = () => {
  if (!inputText.value.trim()) return
  
  const userMessage = {
    content: inputText.value,
    time: new Date().toLocaleTimeString('zh-CN', { 
      hour: '2-digit', 
      minute: '2-digit' 
    }),
    isSelf: true
  }
  
  messages.value.push(userMessage)
  inputText.value = ''
  showQuickReplies.value = false
  
  // 滚动到底部
  nextTick(() => {
    if (messagesContainer.value) {
      messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight
    }
  })
  
  // 模拟客服回复
  setTimeout(() => {
    const replyMessage = {
      content: '收到您的消息，客服人员将尽快回复您。您也可以拨打客服热线：400-888-8888',
      time: new Date().toLocaleTimeString('zh-CN', { 
        hour: '2-digit', 
        minute: '2-digit' 
      }),
      isSelf: false
    }
    messages.value.push(replyMessage)
    
    nextTick(() => {
      if (messagesContainer.value) {
        messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight
      }
    })
  }, 1000)
}

const sendQuickReply = (reply) => {
  inputText.value = reply
  sendMessage()
}
</script>

<style scoped>
.chat-container {
  position: fixed;
  z-index: 9999;
}

/* 浮动按钮 */
.chat-button {
  position: fixed;
  right: 20px;
  bottom: 80px;
  width: 56px;
  height: 56px;
  background: var(--primary-color);
  border-radius: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 2px 12px rgba(0, 102, 204, 0.3);
  transition: all 0.3s ease;
  color: white;
}

.chat-button:hover {
  transform: scale(1.1);
  box-shadow: 0 4px 20px rgba(0, 102, 204, 0.4);
}

.chat-button:active {
  transform: scale(0.95);
}

.chat-button svg {
  width: 24px;
  height: 24px;
  margin-bottom: 2px;
}

.chat-text {
  font-size: 11px;
  font-weight: 500;
}

/* 对话框 */
.chat-box {
  position: fixed;
  right: 20px;
  bottom: 80px;
  width: 360px;
  height: 500px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* 头部 */
.chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 16px;
  background: var(--primary-color);
  color: white;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.header-left {
  display: flex;
  align-items: center;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: white;
  color: var(--primary-color);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  font-size: 14px;
  margin-right: 12px;
}

.header-info {
  display: flex;
  flex-direction: column;
}

.header-title {
  font-size: 15px;
  font-weight: 600;
  margin-bottom: 4px;
}

.header-status {
  font-size: 12px;
  display: flex;
  align-items: center;
  opacity: 0.9;
}

.status-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #4cd964;
  margin-right: 4px;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

.minimize-btn {
  background: transparent;
  border: none;
  color: white;
  cursor: pointer;
  padding: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0.8;
  transition: opacity 0.2s;
}

.minimize-btn:hover {
  opacity: 1;
}

/* 消息列表 */
.chat-messages {
  flex: 1;
  padding: 16px;
  overflow-y: auto;
  background: #f5f5f5;
}

.welcome-message {
  text-align: center;
  margin-bottom: 20px;
}

.system-time {
  font-size: 12px;
  color: var(--text-tertiary);
  margin-bottom: 12px;
}

.welcome-text {
  background: white;
  padding: 16px;
  border-radius: 8px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
}

.welcome-icon {
  font-size: 32px;
  margin-bottom: 8px;
}

.welcome-text > div {
  font-size: 14px;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.welcome-desc {
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 0;
}

.message-item {
  display: flex;
  margin-bottom: 16px;
  align-items: flex-start;
}

.message-item.message-self {
  flex-direction: row-reverse;
}

.message-avatar {
  width: 36px;
  height: 36px;
  border-radius: 4px;
  background: var(--primary-color);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 13px;
  font-weight: 600;
  flex-shrink: 0;
}

.message-avatar.self {
  background: #07c160;
}

.message-content {
  max-width: 70%;
  margin: 0 8px;
}

.message-self .message-content {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
}

.message-bubble {
  padding: 10px 14px;
  background: white;
  border-radius: 4px;
  font-size: 14px;
  color: var(--text-primary);
  line-height: 1.6;
  word-break: break-word;
}

.message-self .message-bubble {
  background: var(--primary-color);
  color: white;
}

.message-time {
  font-size: 11px;
  color: var(--text-tertiary);
  margin-top: 4px;
}

/* 快捷回复 */
.quick-replies {
  padding: 12px 16px;
  background: white;
  border-top: 1px solid var(--border-color);
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.quick-reply-item {
  padding: 6px 12px;
  background: var(--bg-gray);
  border: 1px solid var(--border-color);
  border-radius: 16px;
  font-size: 13px;
  color: var(--text-primary);
  cursor: pointer;
  transition: all 0.2s;
}

.quick-reply-item:hover {
  background: var(--primary-color);
  color: white;
  border-color: var(--primary-color);
}

/* 输入框 */
.chat-input {
  display: flex;
  padding: 12px 16px;
  background: white;
  border-top: 1px solid var(--border-color);
}

.input-field {
  flex: 1;
  border: 1px solid var(--border-color);
  border-radius: 4px;
  padding: 8px 12px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.2s;
}

.input-field:focus {
  border-color: var(--primary-color);
}

.send-btn {
  margin-left: 8px;
  padding: 8px 20px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.2s;
  font-weight: 500;
}

.send-btn:hover:not(:disabled) {
  background: var(--primary-dark);
}

.send-btn:disabled {
  background: #e5e5e5;
  color: #999;
  cursor: not-allowed;
}

/* 动画 */
.slide-up-enter-active,
.slide-up-leave-active {
  transition: all 0.3s ease;
}

.slide-up-enter-from {
  opacity: 0;
  transform: translateY(20px);
}

.slide-up-leave-to {
  opacity: 0;
  transform: translateY(20px);
}

/* 移动端适配 */
@media (max-width: 480px) {
  .chat-box {
    right: 10px;
    bottom: 70px;
    width: calc(100vw - 20px);
    max-width: 360px;
  }
  
  .chat-button {
    right: 10px;
    bottom: 70px;
  }
}
</style>

