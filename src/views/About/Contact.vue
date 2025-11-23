<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">联系我们</div>
      <div class="page-subtitle">We're Here to Help</div>
    </div>

    <!-- 联系方式 -->
    <div class="card">
      <div class="card-title">📞 联系方式</div>
      <div class="contact-list">
        <div class="contact-item">
          <div class="contact-icon">📱</div>
          <div class="contact-content">
            <div class="contact-label">客服热线</div>
            <div class="contact-value">400-888-8888</div>
            <div class="contact-tip">工作日 9:00-18:00</div>
          </div>
          <a href="tel:4008888888" class="contact-action">拨打</a>
        </div>

        <div class="contact-item">
          <div class="contact-icon">📧</div>
          <div class="contact-content">
            <div class="contact-label">企业邮箱</div>
            <div class="contact-value">service@kangli-digital.com</div>
            <div class="contact-tip">24小时内回复</div>
          </div>
          <a href="mailto:service@kangli-digital.com" class="contact-action">发送</a>
        </div>

        <div class="contact-item">
          <div class="contact-icon">💬</div>
          <div class="contact-content">
            <div class="contact-label">在线客服</div>
            <div class="contact-value">微信客服</div>
            <div class="contact-tip">7×24小时在线</div>
          </div>
          <button class="contact-action" @click="openChat">咨询</button>
        </div>

        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div class="contact-content">
            <div class="contact-label">公司地址</div>
            <div class="contact-value">江苏省苏州市工业园区创意产业园</div>
            <div class="contact-tip">欢迎实地考察</div>
          </div>
          <button class="contact-action" @click="openMap">导航</button>
        </div>
      </div>
    </div>

    <!-- 销售团队 -->
    <div class="card">
      <div class="card-title">👥 销售团队</div>
      <div class="sales-grid">
        <div class="sales-item">
          <div class="sales-avatar">👨‍💼</div>
          <div class="sales-info">
            <div class="sales-name">华东区 - 张经理</div>
            <div class="sales-phone">139-****-8888</div>
          </div>
        </div>
        <div class="sales-item">
          <div class="sales-avatar">👩‍💼</div>
          <div class="sales-info">
            <div class="sales-name">华北区 - 李经理</div>
            <div class="sales-phone">138-****-6666</div>
          </div>
        </div>
        <div class="sales-item">
          <div class="sales-avatar">👨‍💼</div>
          <div class="sales-info">
            <div class="sales-name">华南区 - 王经理</div>
            <div class="sales-phone">137-****-9999</div>
          </div>
        </div>
        <div class="sales-item">
          <div class="sales-avatar">👩‍💼</div>
          <div class="sales-info">
            <div class="sales-name">西南区 - 刘经理</div>
            <div class="sales-phone">136-****-7777</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 二维码 -->
    <div class="card">
      <div class="card-title">📱 扫码关注</div>
      <div class="qrcode-grid">
        <div class="qrcode-item">
          <img src="https://via.placeholder.com/200x200/667eea/ffffff?text=WeChat" alt="微信公众号">
          <div class="qrcode-label">微信公众号</div>
        </div>
        <div class="qrcode-item">
          <img src="https://via.placeholder.com/200x200/764ba2/ffffff?text=Service" alt="企业微信">
          <div class="qrcode-label">企业微信</div>
        </div>
      </div>
    </div>

    <!-- 在线留言 -->
    <div class="card">
      <div class="card-title">✍️ 在线留言</div>
      <form class="message-form" @submit.prevent="submitMessage">
        <div class="form-group">
          <label class="form-label">姓名 *</label>
          <input type="text" class="form-input" v-model="form.name" placeholder="请输入您的姓名" required>
        </div>

        <div class="form-group">
          <label class="form-label">联系电话 *</label>
          <input type="tel" class="form-input" v-model="form.phone" placeholder="请输入您的联系电话" required>
        </div>

        <div class="form-group">
          <label class="form-label">公司名称</label>
          <input type="text" class="form-input" v-model="form.company" placeholder="请输入公司名称">
        </div>

        <div class="form-group">
          <label class="form-label">需求类型</label>
          <select class="form-input" v-model="form.type">
            <option value="">请选择需求类型</option>
            <option value="product">产品咨询</option>
            <option value="solution">解决方案</option>
            <option value="technical">技术支持</option>
            <option value="cooperation">商务合作</option>
            <option value="other">其他</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">留言内容 *</label>
          <textarea class="form-textarea" v-model="form.message" placeholder="请详细描述您的需求..." rows="5" required></textarea>
        </div>

        <button type="submit" class="btn submit-btn">
          📨 提交留言
        </button>
      </form>
    </div>

    <!-- 工作时间 -->
    <div class="card work-hours">
      <div class="card-title" style="color: white;">⏰ 服务时间</div>
      <div class="hours-content">
        <div class="hours-item">
          <div class="hours-icon">🕐</div>
          <div class="hours-text">
            <div class="hours-label">工作日</div>
            <div class="hours-time">9:00 - 18:00</div>
          </div>
        </div>
        <div class="hours-item">
          <div class="hours-icon">📞</div>
          <div class="hours-text">
            <div class="hours-label">技术支持</div>
            <div class="hours-time">7×24小时</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
  name: '',
  phone: '',
  company: '',
  type: '',
  message: ''
})

const openChat = () => {
  console.log('打开在线客服')
  alert('正在连接客服...')
}

const openMap = () => {
  console.log('打开地图导航')
  // 实际应用中打开地图应用
}

const submitMessage = () => {
  console.log('提交留言', form)
  alert('留言提交成功！我们会尽快与您联系。')
  // 重置表单
  Object.keys(form).forEach(key => form[key] = '')
}
</script>

<style scoped>
.contact-list {
  margin-top: 15px;
}

.contact-item {
  display: flex;
  align-items: center;
  padding: 20px;
  margin-bottom: 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.contact-item:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.contact-icon {
  font-size: 32px;
  margin-right: 15px;
}

.contact-content {
  flex: 1;
}

.contact-label {
  font-size: 13px;
  color: #999;
  margin-bottom: 5px;
}

.contact-value {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 3px;
}

.contact-tip {
  font-size: 12px;
  color: #666;
}

.contact-action {
  padding: 8px 20px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  border-radius: 20px;
  font-size: 14px;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
}

.contact-action:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.sales-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.sales-item {
  display: flex;
  align-items: center;
  padding: 15px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
}

.sales-avatar {
  font-size: 40px;
  margin-right: 12px;
}

.sales-info {
  flex: 1;
}

.sales-name {
  font-size: 14px;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.sales-phone {
  font-size: 13px;
  color: #667eea;
}

.qrcode-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-top: 20px;
  text-align: center;
}

.qrcode-item img {
  width: 100%;
  max-width: 200px;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  margin-bottom: 10px;
}

.qrcode-label {
  font-size: 14px;
  color: #666;
}

.message-form {
  margin-top: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  display: block;
  font-size: 14px;
  font-weight: 500;
  color: #333;
  margin-bottom: 8px;
}

.form-input,
.form-textarea {
  width: 100%;
  padding: 12px 15px;
  border: 2px solid #e8e8e8;
  border-radius: 8px;
  font-size: 14px;
  transition: all 0.3s ease;
  font-family: inherit;
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-textarea {
  resize: vertical;
  min-height: 100px;
}

.submit-btn {
  width: 100%;
  padding: 15px;
  font-size: 16px;
  margin-top: 10px;
}

.work-hours {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
}

.hours-content {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 20px;
}

.hours-item {
  display: flex;
  align-items: center;
  padding: 20px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  backdrop-filter: blur(10px);
}

.hours-icon {
  font-size: 32px;
  margin-right: 12px;
}

.hours-label {
  font-size: 13px;
  opacity: 0.9;
  margin-bottom: 5px;
}

.hours-time {
  font-size: 18px;
  font-weight: bold;
}

@media (max-width: 480px) {
  .sales-grid,
  .qrcode-grid,
  .hours-content {
    grid-template-columns: 1fr;
  }
}
</style>

