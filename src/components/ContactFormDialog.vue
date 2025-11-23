<template>
  <!-- 表单弹窗 -->
  <transition name="form-fade">
    <div v-if="show" class="form-overlay" @click="handleClose">
      <div class="form-container" @click.stop>
        <!-- 表单头部 -->
        <div class="form-header">
          <div class="form-title">留言表单</div>
          <div class="close-btn" @click="handleClose">
            <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 0 1-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z" fill="currentColor"/>
            </svg>
          </div>
        </div>

        <!-- 表单内容 -->
        <div class="form-body">
          <div class="form-desc">
            请填写以下信息，我们会尽快与您联系
          </div>

          <form @submit.prevent="handleSubmit">
            <div class="form-group">
              <label class="form-label">姓名 <span class="required">*</span></label>
              <input 
                v-model="formData.name" 
                type="text" 
                class="form-input" 
                placeholder="请输入您的姓名"
                required
              />
            </div>

            <div class="form-group">
              <label class="form-label">手机号 <span class="required">*</span></label>
              <input 
                v-model="formData.phone" 
                type="tel" 
                class="form-input" 
                placeholder="请输入您的手机号"
                pattern="^1[3-9]\d{9}$"
                required
              />
            </div>

            <div class="form-group">
              <label class="form-label">邮箱</label>
              <input 
                v-model="formData.email" 
                type="email" 
                class="form-input" 
                placeholder="请输入您的邮箱（选填）"
              />
            </div>

            <div class="form-group">
              <label class="form-label">公司名称</label>
              <input 
                v-model="formData.company" 
                type="text" 
                class="form-input" 
                placeholder="请输入公司名称（选填）"
              />
            </div>

            <div class="form-group">
              <label class="form-label">留言内容 <span class="required">*</span></label>
              <textarea 
                v-model="formData.message" 
                class="form-textarea" 
                placeholder="请简要描述您的需求或问题"
                rows="4"
                required
              ></textarea>
            </div>

            <button type="submit" class="submit-btn">
              提交留言
            </button>
          </form>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
  show: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:show'])

const formData = ref({
  name: '',
  phone: '',
  email: '',
  company: '',
  message: ''
})

// 监听显示状态，重置表单
watch(() => props.show, (newVal) => {
  if (!newVal) {
    resetForm()
  }
})

// 提交表单
const handleSubmit = () => {
  // TODO: 实际项目中这里应该调用API提交数据
  console.log('提交留言表单:', formData.value)
  
  // 模拟提交成功
  alert('感谢您的留言！我们会尽快与您联系。')
  handleClose()
}

// 重置表单
const resetForm = () => {
  formData.value = {
    name: '',
    phone: '',
    email: '',
    company: '',
    message: ''
  }
}

// 关闭弹窗
const handleClose = () => {
  emit('update:show', false)
}
</script>

<style scoped>
.form-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  z-index: 2100;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.form-container {
  width: 100%;
  max-width: 500px;
  max-height: 90vh;
  background: white;
  border-radius: 12px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

/* 表单头部 */
.form-header {
  height: 54px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  border-bottom: 1px solid #e5e5e5;
}

.form-title {
  font-size: 17px;
  font-weight: 500;
  color: #333;
}

.close-btn {
  width: 28px;
  height: 28px;
  cursor: pointer;
  color: #999;
  transition: color 0.2s;
}

.close-btn:hover {
  color: #333;
}

.close-btn svg {
  width: 100%;
  height: 100%;
}

/* 表单内容 */
.form-body {
  flex: 1;
  overflow-y: auto;
  padding: 24px;
}

.form-desc {
  font-size: 14px;
  color: #666;
  margin-bottom: 24px;
  line-height: 1.6;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  display: block;
  font-size: 14px;
  color: #333;
  margin-bottom: 8px;
  font-weight: 500;
}

.required {
  color: #ff4d4f;
}

.form-input,
.form-textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #d9d9d9;
  border-radius: 6px;
  font-size: 15px;
  outline: none;
  transition: border-color 0.2s;
  box-sizing: border-box;
}

.form-input:focus,
.form-textarea:focus {
  border-color: #0066CC;
}

.form-textarea {
  resize: vertical;
  min-height: 80px;
  font-family: inherit;
  line-height: 1.5;
}

.submit-btn {
  width: 100%;
  height: 44px;
  background: #0066CC;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  transition: opacity 0.2s;
  margin-top: 8px;
}

.submit-btn:active {
  opacity: 0.8;
}

/* 动画 */
.form-fade-enter-active,
.form-fade-leave-active {
  transition: opacity 0.3s ease;
}

.form-fade-enter-from,
.form-fade-leave-to {
  opacity: 0;
}

.form-fade-enter-active .form-container,
.form-fade-leave-active .form-container {
  transition: transform 0.3s ease;
}

.form-fade-enter-from .form-container,
.form-fade-leave-to .form-container {
  transform: scale(0.9);
}

/* 移动端适配 */
@media (max-width: 640px) {
  .form-overlay {
    padding: 0;
    align-items: flex-end;
  }

  .form-container {
    max-width: 100%;
    max-height: 85vh;
    border-radius: 12px 12px 0 0;
  }

  .form-fade-enter-from .form-container,
  .form-fade-leave-to .form-container {
    transform: translateY(100%);
  }
}
</style>

