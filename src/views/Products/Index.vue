<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">产品系列</div>
      <div class="page-subtitle">智能制造核心产品 · 助力企业数字化转型</div>
    </div>

    <!-- 产品分类 -->
    <div class="product-list">
      <div 
        v-for="product in products" 
        :key="product.path"
        class="product-item"
        @click="navigateTo(product.path)"
      >
        <div class="product-left">
          <div class="product-icon">{{ product.icon }}</div>
          <div class="product-info">
            <div class="product-name">{{ product.name }}</div>
            <div class="product-desc">{{ product.desc }}</div>
          </div>
        </div>
        <div class="product-arrow">›</div>
      </div>
    </div>

    <!-- 产品简介 -->
    <div class="card">
      <div class="card-title">产品简介</div>
      <div class="card-content">
        <p>康立数字专注于工业软件产品研发，为制造企业提供从设备控制、数据采集到生产管理的全套软件产品，助力企业实现数字化转型。</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const products = [
  {
    path: '/products/plc',
    name: 'PLC系统',
    desc: '工业可编程逻辑控制器',
    icon: '⚙️'
  },
  {
    path: '/products/gateway',
    name: '数采网关系统',
    desc: '工业数据采集与传输',
    icon: '📡'
  },
  {
    path: '/products/mes',
    name: '标品MES系列',
    desc: '制造执行系统',
    icon: '📊'
  },
  {
    path: '/products/tpm',
    name: '设备TPM系统',
    desc: '全员生产维护管理',
    icon: '🔧'
  },
  {
    path: '/products/cabinet',
    name: '智能工具柜系列',
    desc: '智能工具存储管理',
    icon: '🗄️'
  }
]

const navigateTo = (path) => {
  router.push(path)
}
</script>

<style scoped>
.product-list {
  background: white;
}

.product-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 20px;
  cursor: pointer;
  transition: background 0.2s ease;
  border-bottom: 1px solid var(--border-color);
}

.product-item:hover {
  background: var(--bg-gray);
}

.product-item:active {
  background: #f0f0f0;
}

.product-left {
  display: flex;
  align-items: center;
  flex: 1;
}

.product-icon {
  width: 44px;
  height: 44px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  background: var(--bg-gray);
  border-radius: 4px;
  margin-right: 15px;
}

.product-info {
  flex: 1;
}

.product-name {
  font-size: 16px;
  font-weight: 500;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.product-desc {
  font-size: 13px;
  color: var(--text-tertiary);
}

.product-arrow {
  font-size: 16px;
  color: #d0d0d0;
  margin-left: 10px;
}

</style>

