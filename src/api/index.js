/**
 * API 服务层
 * 统一管理所有后台API调用
 */

// API 基础配置
const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || '/api'

// 通用请求方法
async function request(url, options = {}) {
  const defaultOptions = {
    headers: {
      'Content-Type': 'application/json',
      ...options.headers
    }
  }

  try {
    const response = await fetch(`${API_BASE_URL}${url}`, {
      ...defaultOptions,
      ...options
    })

    const data = await response.json()

    if (data.code !== 200) {
      throw new Error(data.message || '请求失败')
    }

    return data
  } catch (error) {
    console.error('API请求错误:', error)
    throw error
  }
}

// ==================== 资讯相关 ====================

/**
 * 获取资讯列表
 * @param {Object} params - 查询参数
 * @param {string} params.keyword - 搜索关键词
 * @param {number} params.page - 页码
 * @param {number} params.limit - 每页数量
 */
export const getNewsList = (params = {}) => {
  const query = new URLSearchParams({
    page: params.page || 1,
    limit: params.limit || 10,
    ...(params.keyword && { keyword: params.keyword })
  })
  return request(`/news?${query}`)
}

/**
 * 获取资讯详情
 * @param {number} id - 资讯ID
 */
export const getNewsDetail = (id) => {
  return request(`/news/${id}`)
}

/**
 * 增加资讯浏览量
 * @param {number} id - 资讯ID
 */
export const incrementNewsViews = (id) => {
  return request(`/news/${id}/view`, { method: 'POST' })
}

// ==================== 视频相关 ====================

/**
 * 获取视频列表
 * @param {Object} params - 查询参数
 * @param {string} params.category - 分类：product/case/tech/company
 * @param {string} params.keyword - 搜索关键词
 * @param {boolean} params.is_featured - 是否只获取推荐视频
 * @param {number} params.page - 页码
 * @param {number} params.limit - 每页数量
 */
export const getVideosList = (params = {}) => {
  const query = new URLSearchParams({
    page: params.page || 1,
    limit: params.limit || 20,
    ...(params.category && params.category !== 'all' && { category: params.category }),
    ...(params.keyword && { keyword: params.keyword }),
    ...(params.is_featured !== undefined && { is_featured: params.is_featured ? 1 : 0 })
  })
  return request(`/videos?${query}`)
}

/**
 * 获取视频详情
 * @param {number} id - 视频ID
 */
export const getVideoDetail = (id) => {
  return request(`/videos/${id}`)
}

/**
 * 记录视频播放
 * @param {number} id - 视频ID
 */
export const recordVideoPlay = (id) => {
  return request(`/videos/${id}/play`, { method: 'POST' })
}

// ==================== 产品相关 ====================

/**
 * 获取产品列表
 * @param {Object} params - 查询参数
 */
export const getProductsList = (params = {}) => {
  const query = new URLSearchParams({
    page: params.page || 1,
    limit: params.limit || 10,
    ...(params.keyword && { keyword: params.keyword })
  })
  return request(`/products?${query}`)
}

/**
 * 获取产品详情
 * @param {number} id - 产品ID
 */
export const getProductDetail = (id) => {
  return request(`/products/${id}`)
}

// ==================== 技术方案相关 ====================

/**
 * 获取技术方案列表
 * @param {Object} params - 查询参数
 */
export const getSolutionsList = (params = {}) => {
  const query = new URLSearchParams({
    page: params.page || 1,
    limit: params.limit || 10,
    ...(params.keyword && { keyword: params.keyword })
  })
  return request(`/solutions?${query}`)
}

/**
 * 获取技术方案详情
 * @param {number} id - 方案ID
 */
export const getSolutionDetail = (id) => {
  return request(`/solutions/${id}`)
}

// ==================== 前瞻技术相关 ====================

/**
 * 获取前瞻技术页面内容
 * @param {string} type - 类型：textile-mes/injection-mes/smart-warehouse/equipment-tpm
 */
export const getTechnologyContent = (type) => {
  return request(`/technology/${type}`)
}

// ==================== 公司信息相关 ====================

/**
 * 获取公司宣传册图片列表
 */
export const getCompanyBrochure = () => {
  return request('/company/brochure')
}

/**
 * 获取联系我们信息
 */
export const getContactInfo = () => {
  return request('/company/contact')
}

// ==================== 留言相关 ====================

/**
 * 提交留言表单
 * @param {Object} data - 留言数据
 * @param {string} data.name - 姓名
 * @param {string} data.phone - 手机号
 * @param {string} data.email - 邮箱
 * @param {string} data.company - 公司名称
 * @param {string} data.message - 留言内容
 */
export const submitContactForm = (data) => {
  return request('/contact/submit', {
    method: 'POST',
    body: JSON.stringify(data)
  })
}

// ==================== Banner相关 ====================

/**
 * 获取首页Banner列表
 */
export const getBannerList = () => {
  return request('/banners')
}

// ==================== 系统配置相关 ====================

/**
 * 获取系统配置
 */
export const getSystemConfig = () => {
  return request('/system/config')
}

