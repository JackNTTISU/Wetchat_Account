<template>
  <div class="page-container">
    <div class="page-header">
      <div class="page-title">康立数字简介</div>
      <div class="page-subtitle">Digital Intelligence · Smart Manufacturing</div>
    </div>

    <!-- 公司介绍 -->
    <div class="card">
      <div class="card-title">🏢 公司概况</div>
      <div class="card-content">
        <p>康立数字科技有限公司成立于2015年，是一家专注于工业软件和智能制造解决方案的高新技术企业。公司致力于为制造业客户提供全方位的数字化转型服务，帮助企业实现智能化、数字化升级。</p>
      </div>
    </div>

    <!-- 企业图片 -->
    <div class="media-container">
      <img src="https://via.placeholder.com/800x400/667eea/ffffff?text=Kangli+Digital+Company" alt="康立数字公司">
    </div>

    <!-- 发展历程 -->
    <div class="card">
      <div class="card-title">📈 发展历程</div>
      <div class="timeline">
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-year">2015</div>
            <div class="timeline-desc">公司成立，专注工业自动化软件开发</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-year">2017</div>
            <div class="timeline-desc">推出首款MES制造执行系统，服务100+企业</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-year">2019</div>
            <div class="timeline-desc">获得高新技术企业认证，研发团队扩展至50人</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-year">2021</div>
            <div class="timeline-desc">推出康立云平台，实现设备云端管理</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-year">2023</div>
            <div class="timeline-desc">服务客户突破500家，业务覆盖全国</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot active"></div>
          <div class="timeline-content">
            <div class="timeline-year">2025</div>
            <div class="timeline-desc">持续创新，引领智能制造新未来</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 核心团队 -->
    <div class="card">
      <div class="card-title">👥 核心团队</div>
      <div class="team-grid">
        <div class="team-member">
          <div class="member-avatar">👨‍💼</div>
          <div class="member-name">研发团队</div>
          <div class="member-desc">50+ 资深工程师</div>
        </div>
        <div class="team-member">
          <div class="member-avatar">👩‍💻</div>
          <div class="member-name">技术支持</div>
          <div class="member-desc">7×24小时服务</div>
        </div>
        <div class="team-member">
          <div class="member-avatar">👨‍🔧</div>
          <div class="member-name">实施团队</div>
          <div class="member-desc">专业现场服务</div>
        </div>
        <div class="team-member">
          <div class="member-avatar">👩‍💼</div>
          <div class="member-name">销售团队</div>
          <div class="member-desc">全国布局</div>
        </div>
      </div>
    </div>

    <!-- 企业视频 -->
    <div class="card">
      <div class="card-title">🎬 企业宣传片</div>
      <div class="media-container">
        <video controls poster="https://via.placeholder.com/800x450/667eea/ffffff?text=Company+Video">
          <source src="" type="video/mp4">
          您的浏览器不支持视频标签。
        </video>
      </div>
      <div class="card-content" style="margin-top: 15px;">
        <p style="color: #999; font-size: 13px;">📹 点击播放，了解康立数字的创新之路</p>
      </div>
    </div>

    <!-- 统计数据 -->
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-number">500+</div>
        <div class="stat-label">服务客户</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">1000+</div>
        <div class="stat-label">项目案例</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">50+</div>
        <div class="stat-label">研发团队</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">10年</div>
        <div class="stat-label">行业经验</div>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.timeline {
  position: relative;
  padding-left: 30px;
  margin-top: 20px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 9px;
  top: 0;
  bottom: 0;
  width: 2px;
  background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
}

.timeline-item {
  position: relative;
  margin-bottom: 25px;
}

.timeline-dot {
  position: absolute;
  left: -25px;
  top: 5px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: white;
  border: 3px solid #667eea;
  z-index: 1;
}

.timeline-dot.active {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% {
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
  }
  50% {
    box-shadow: 0 0 0 8px rgba(102, 126, 234, 0.1);
  }
}

.timeline-year {
  font-size: 18px;
  font-weight: bold;
  color: #667eea;
  margin-bottom: 5px;
}

.timeline-desc {
  font-size: 14px;
  color: #666;
  line-height: 1.6;
}

.team-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 15px;
}

.team-member {
  text-align: center;
  padding: 20px;
  background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f0 100%);
  border-radius: 12px;
  transition: all 0.3s ease;
}

.team-member:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.member-avatar {
  font-size: 40px;
  margin-bottom: 10px;
}

.member-name {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.member-desc {
  font-size: 13px;
  color: #666;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-top: 20px;
}

.stat-item {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  text-align: center;
  padding: 25px 15px;
  border-radius: 16px;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.stat-number {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 8px;
}

.stat-label {
  font-size: 14px;
  opacity: 0.9;
}

@media (max-width: 480px) {
  .team-grid,
  .stats-grid {
    grid-template-columns: 1fr;
  }
}
</style>

