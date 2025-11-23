<template>
  <div class="contact-page">
    <!-- 顶部导航 -->
    <div class="contact-header">
      <button class="close-btn" @click="goBack">✕</button>
      <h1 class="header-title">联系我们</h1>
      <button class="more-btn">⋯</button>
    </div>

    <!-- 联系点列表 -->
    <div class="contact-list">
      <div class="contact-item" v-for="(contact, index) in contacts" :key="contact.id">
        <!-- Part标题 -->
        <div class="part-header">
          <div class="part-label">PART{{ index + 1 }}</div>
          <div class="part-title">{{ contact.title }}</div>
        </div>

        <!-- 公司图片 -->
        <div class="company-image">
          <img :src="contact.image" :alt="contact.title" />
        </div>

        <!-- 联系信息 -->
        <div class="contact-info">
          <!-- 地址 -->
          <div class="info-section">
            <div class="info-label">地址：</div>
            <div class="info-content">{{ contact.address }}</div>
          </div>

          <!-- 邮编 -->
          <div class="info-section" v-if="contact.postcode">
            <div class="info-label">邮编：</div>
            <div class="info-content">{{ contact.postcode }}</div>
          </div>

          <!-- 公司电话 -->
          <div class="info-section" v-if="contact.phone">
            <div class="info-label">公司电话：</div>
            <div class="info-content clickable" @click="callPhone(contact.phone)">
              {{ contact.phone }}
            </div>
          </div>

          <!-- 联系方式 -->
          <div class="info-section" v-if="contact.contacts && contact.contacts.length">
            <div class="info-label">联系方式：</div>
            <div class="info-content">
              <div 
                class="contact-person" 
                v-for="person in contact.contacts" 
                :key="person.name"
                @click="callPhone(person.phone)"
              >
                {{ person.name }}：{{ person.phone }}
              </div>
            </div>
          </div>

          <!-- 邮箱 -->
          <div class="info-section" v-if="contact.email">
            <div class="info-label">邮箱：</div>
            <div class="info-content clickable" @click="sendEmail(contact.email)">
              {{ contact.email }}
            </div>
          </div>

          <!-- 工作时间 -->
          <div class="info-section" v-if="contact.workTime">
            <div class="info-label">工作时间：</div>
            <div class="info-content">{{ contact.workTime }}</div>
          </div>
        </div>

        <!-- 地图按钮 -->
        <div class="map-button" v-if="contact.latitude && contact.longitude">
          <button class="btn-map" @click="openMap(contact)">
            📍 查看地图
          </button>
        </div>
      </div>
    </div>

    <!-- 在线留言入口 -->
    <div class="message-section">
      <div class="message-card">
        <h3 class="message-title">在线留言</h3>
        <p class="message-desc">如果您有任何问题或需求，欢迎给我们留言</p>
        <button class="btn-message" @click="showMessageForm">立即留言</button>
      </div>
    </div>

    <!-- 留言表单弹窗 -->
    <div class="message-modal" v-if="isMessageFormVisible" @click="closeMessageForm">
      <div class="modal-content" @click.stop>
        <div class="modal-header">
          <h3>在线留言</h3>
          <button class="close-modal" @click="closeMessageForm">✕</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>姓名 *</label>
            <input type="text" v-model="messageForm.name" placeholder="请输入您的姓名" />
          </div>
          <div class="form-group">
            <label>联系电话 *</label>
            <input type="tel" v-model="messageForm.phone" placeholder="请输入您的联系电话" />
          </div>
          <div class="form-group">
            <label>公司名称</label>
            <input type="text" v-model="messageForm.company" placeholder="请输入公司名称" />
          </div>
          <div class="form-group">
            <label>留言内容 *</label>
            <textarea v-model="messageForm.message" placeholder="请输入留言内容" rows="5"></textarea>
          </div>
          <button class="btn-submit" @click="submitMessage">提交留言</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const isMessageFormVisible = ref(false)
const messageForm = ref({
  name: '',
  phone: '',
  company: '',
  message: ''
})

// 联系点列表数据（后续从后台接口获取）
const contacts = ref([
  {
    id: 1,
    title: '苏州总公司',
    image: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=康立数字+苏州总部',
    address: '江苏省苏州市工业园区XX路XX号康立数字大厦',
    postcode: '215000',
    phone: '400-8888-888',
    email: 'info@kangli.com',
    workTime: '周一至周五 9:00-18:00',
    contacts: [
      { name: '张经理', phone: '138-0000-0000' },
      { name: '李经理', phone: '139-0000-0000' }
    ],
    latitude: 31.2989,
    longitude: 120.5853
  },
  {
    id: 2,
    title: '上海分公司',
    image: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=康立数字+上海分公司',
    address: '上海市浦东新区XX路XX号XX大厦XX层',
    postcode: '200000',
    phone: '021-8888-8888',
    email: 'shanghai@kangli.com',
    workTime: '周一至周五 9:00-18:00',
    contacts: [
      { name: '王经理', phone: '136-0000-0000' }
    ],
    latitude: 31.2304,
    longitude: 121.4737
  },
  {
    id: 3,
    title: '深圳办事处',
    image: 'https://via.placeholder.com/750x400/0066CC/ffffff?text=康立数字+深圳办事处',
    address: '广东省深圳市南山区XX路XX号',
    postcode: '518000',
    phone: '0755-8888-8888',
    email: 'shenzhen@kangli.com',
    workTime: '周一至周五 9:00-18:00',
    contacts: [
      { name: '陈经理', phone: '135-0000-0000' }
    ],
    latitude: 22.5431,
    longitude: 114.0579
  }
])

const goBack = () => {
  router.back()
}

const callPhone = (phone) => {
  // 在真实微信环境中会拨打电话
  window.location.href = `tel:${phone}`
}

const sendEmail = (email) => {
  window.location.href = `mailto:${email}`
}

const openMap = (contact) => {
  // 在真实环境中打开地图应用
  // 微信环境可以使用 wx.openLocation
  alert(`打开地图：${contact.title}\n${contact.address}`)
}

const showMessageForm = () => {
  isMessageFormVisible.value = true
}

const closeMessageForm = () => {
  isMessageFormVisible.value = false
}

const submitMessage = () => {
  if (!messageForm.value.name || !messageForm.value.phone || !messageForm.value.message) {
    alert('请填写必填项')
    return
  }
  
  // 提交到后台
  console.log('提交留言：', messageForm.value)
  alert('留言提交成功，我们会尽快与您联系！')
  
  // 重置表单
  messageForm.value = {
    name: '',
    phone: '',
    company: '',
    message: ''
  }
  closeMessageForm()
}
</script>

<style scoped>
.contact-page {
  min-height: 100vh;
  background: #f5f5f5;
  padding-bottom: 20px;
}

/* 顶部导航 */
.contact-header {
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

.header-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0;
}

/* 联系点列表 */
.contact-list {
  padding: 16px;
}

.contact-item {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Part标题 */
.part-header {
  display: flex;
  align-items: center;
  padding: 16px 20px;
  background: white;
}

.part-label {
  padding: 6px 16px;
  background: #dc3545;
  color: white;
  font-size: 14px;
  font-weight: 600;
  margin-right: 16px;
  letter-spacing: 1px;
}

.part-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  border: 2px solid #e0e0e0;
  padding: 4px 16px;
}

/* 公司图片 */
.company-image {
  width: 100%;
  height: auto;
}

.company-image img {
  width: 100%;
  height: auto;
  display: block;
}

/* 联系信息 */
.contact-info {
  padding: 24px 20px;
}

.info-section {
  margin-bottom: 20px;
}

.info-section:last-child {
  margin-bottom: 0;
}

.info-label {
  font-size: 15px;
  font-weight: 600;
  color: #dc3545;
  margin-bottom: 8px;
}

.info-content {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.8;
}

.info-content.clickable {
  color: var(--primary-color);
  cursor: pointer;
  text-decoration: underline;
}

.contact-person {
  padding: 4px 0;
  color: var(--text-secondary);
  cursor: pointer;
}

.contact-person:active {
  color: var(--primary-color);
}

/* 地图按钮 */
.map-button {
  padding: 16px 20px;
  border-top: 1px solid var(--border-color);
}

.btn-map {
  width: 100%;
  padding: 12px;
  background: white;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  border-radius: 6px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-map:active {
  background: var(--primary-color);
  color: white;
}

/* 在线留言 */
.message-section {
  padding: 0 16px;
  margin-top: 20px;
}

.message-card {
  background: linear-gradient(135deg, #0066CC 0%, #004999 100%);
  border-radius: 12px;
  padding: 32px 24px;
  text-align: center;
  color: white;
}

.message-title {
  font-size: 22px;
  font-weight: 600;
  margin: 0 0 12px 0;
}

.message-desc {
  font-size: 14px;
  margin: 0 0 24px 0;
  opacity: 0.9;
}

.btn-message {
  padding: 12px 48px;
  background: white;
  color: var(--primary-color);
  border: none;
  border-radius: 24px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-message:active {
  transform: scale(0.95);
}

/* 留言表单弹窗 */
.message-modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  padding: 20px;
}

.modal-content {
  background: white;
  border-radius: 12px;
  width: 100%;
  max-width: 500px;
  max-height: 80vh;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid var(--border-color);
}

.modal-header h3 {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin: 0;
}

.close-modal {
  width: 32px;
  height: 32px;
  background: transparent;
  border: none;
  font-size: 24px;
  color: var(--text-secondary);
  cursor: pointer;
}

.modal-body {
  padding: 20px;
  overflow-y: auto;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-primary);
  margin-bottom: 8px;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid var(--border-color);
  border-radius: 6px;
  font-size: 14px;
  color: var(--text-primary);
  outline: none;
  transition: border-color 0.3s;
  box-sizing: border-box;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: var(--primary-color);
}

.form-group textarea {
  resize: vertical;
  font-family: inherit;
}

.btn-submit {
  width: 100%;
  padding: 14px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-submit:active {
  transform: scale(0.98);
  background: #0052a3;
}
</style>


