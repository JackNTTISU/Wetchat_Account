import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    redirect: '/news'
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About/Index.vue'),
    meta: { title: '关于康立' }
  },
  {
    path: '/about/intro',
    name: 'CompanyIntro',
    component: () => import('../views/About/CompanyIntro.vue'),
    meta: { title: '康立数字简介' }
  },
  {
    path: '/about/website',
    name: 'Website',
    component: () => import('../views/About/Website.vue'),
    meta: { title: '康立官网' }
  },
  {
    path: '/about/cloud',
    name: 'CloudPlatform',
    component: () => import('../views/About/CloudPlatform.vue'),
    meta: { title: '康立云平台' }
  },
  {
    path: '/about/contact',
    name: 'Contact',
    component: () => import('../views/About/Contact.vue'),
    meta: { title: '联系我们' }
  },
  {
    path: '/products',
    name: 'Products',
    component: () => import('../views/Products/Index.vue'),
    meta: { title: '产品系列' }
  },
  {
    path: '/products/plc',
    name: 'PLC',
    component: () => import('../views/Products/PLC.vue'),
    meta: { title: 'PLC系统' }
  },
  {
    path: '/products/gateway',
    name: 'Gateway',
    component: () => import('../views/Products/Gateway.vue'),
    meta: { title: '数采网关系统' }
  },
  {
    path: '/products/mes',
    name: 'MES',
    component: () => import('../views/Products/MES.vue'),
    meta: { title: '标品MES系列' }
  },
  {
    path: '/products/tpm',
    name: 'TPM',
    component: () => import('../views/Products/TPM.vue'),
    meta: { title: '设备TPM系统' }
  },
  {
    path: '/products/cabinet',
    name: 'Cabinet',
    component: () => import('../views/Products/Cabinet.vue'),
    meta: { title: '智能工具柜系列' }
  },
  {
    path: '/solutions',
    name: 'Solutions',
    component: () => import('../views/Solutions/Index.vue'),
    meta: { title: '解决方案' }
  },
  {
    path: '/solutions/custom-control',
    name: 'CustomControl',
    component: () => import('../views/Solutions/CustomControl.vue'),
    meta: { title: '定制化控制系统' }
  },
  {
    path: '/solutions/cloud-device',
    name: 'CloudDevice',
    component: () => import('../views/Solutions/CloudDevice.vue'),
    meta: { title: '设备上云解决方案' }
  },
  {
    path: '/solutions/textile',
    name: 'Textile',
    component: () => import('../views/Solutions/Textile.vue'),
    meta: { title: '家纺服装系统方案' }
  },
  {
    path: '/solutions/injection',
    name: 'Injection',
    component: () => import('../views/Solutions/Injection.vue'),
    meta: { title: '注塑机系统方案' }
  },
  {
    path: '/news',
    name: 'News',
    component: () => import('../views/News/Index.vue'),
    meta: { title: '最新资讯' }
  },
  {
    path: '/news/detail/:id',
    name: 'NewsDetail',
    component: () => import('../views/News/Detail.vue'),
    meta: { title: '资讯详情' }
  },
  {
    path: '/about/brochure',
    name: 'CompanyBrochure',
    component: () => import('../views/About/CompanyBrochure.vue'),
    meta: { title: '关于康立' }
  },
  {
    path: '/products/list',
    name: 'ProductList',
    component: () => import('../views/Products/ProductList.vue'),
    meta: { title: '产品中心' }
  },
  {
    path: '/products/detail/:id',
    name: 'ProductDetail',
    component: () => import('../views/Products/ProductDetail.vue'),
    meta: { title: '产品详情' }
  },
  {
    path: '/solutions/list',
    name: 'SolutionList',
    component: () => import('../views/Solutions/SolutionList.vue'),
    meta: { title: '技术方案' }
  },
  {
    path: '/solutions/detail/:id',
    name: 'SolutionDetail',
    component: () => import('../views/Solutions/SolutionDetail.vue'),
    meta: { title: '方案详情' }
  },
  {
    path: '/contact',
    name: 'Contact',
    component: () => import('../views/Contact/Index.vue'),
    meta: { title: '联系我们' }
  },
  {
    path: '/technology/textile-mes',
    name: 'TextileMES',
    component: () => import('../views/Technology/TextileMES.vue'),
    meta: { title: '家纺MES' }
  },
  {
    path: '/technology/injection-mes',
    name: 'InjectionMES',
    component: () => import('../views/Technology/InjectionMES.vue'),
    meta: { title: '注塑MES' }
  },
  {
    path: '/technology/smart-warehouse',
    name: 'SmartWarehouse',
    component: () => import('../views/Technology/SmartWarehouse.vue'),
    meta: { title: '智能仓储' }
  },
  {
    path: '/technology/equipment-tpm',
    name: 'EquipmentTPM',
    component: () => import('../views/Technology/EquipmentTPM.vue'),
    meta: { title: '设备TPM管理' }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title ? `${to.meta.title} - 康立数字` : '康立数字'
  next()
})

export default router

