<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<footer style="background-color: #fce4ec;" class="text-dark pt-5 border-top">
  <div class="container">
    <div class="row gy-4">
      <!-- Logo và mô tả -->
      <div class="col-md-3">
        <h5 class="fw-bold mb-3">FlowerShop</h5>
        <p class="text-muted">Chuyên cung cấp các loại hoa tươi chất lượng, giao hàng nhanh chóng, phục vụ tận tâm.</p>
        <div class="d-flex gap-3 mt-3">
          <a href="https://facebook.com" target="_blank" class="text-dark"><i class="bi bi-facebook fs-5"></i></a>
          <a href="https://instagram.com" target="_blank" class="text-dark"><i class="bi bi-instagram fs-5"></i></a>
          <a href="https://twitter.com" target="_blank" class="text-dark"><i class="bi bi-twitter fs-5"></i></a>
        </div>
      </div>

      <!-- Thông tin -->
      <div class="col-md-2 col-6">
        <h6 class="fw-bold mb-3">Về Chúng Tôi</h6>
        <ul class="list-unstyled">
          <li><a href="/about.php" class="text-muted text-decoration-none">Giới thiệu</a></li>
          <li><a href="/news.php" class="text-muted text-decoration-none">Tin tức</a></li>
          <li><a href="/privacy-policy.php" class="text-muted text-decoration-none">Chính sách bảo mật</a></li>
          <li><a href="/terms-of-service.php" class="text-muted text-decoration-none">Điều khoản dịch vụ</a></li>
        </ul>
      </div>

      <!-- Hỗ trợ khách hàng -->
      <div class="col-md-2 col-6">
        <h6 class="fw-bold mb-3">Hỗ Trợ</h6>
        <ul class="list-unstyled">
          <li><a href="/guide.php" class="text-muted text-decoration-none">Hướng dẫn mua hàng</a></li>
          <li><a href="/return-policy.php" class="text-muted text-decoration-none">Chính sách đổi trả</a></li>
          <li><a href="/shipping-payment.php" class="text-muted text-decoration-none">Giao hàng & Thanh toán</a></li>
          <li><a href="/faq.php" class="text-muted text-decoration-none">Câu hỏi thường gặp</a></li>
        </ul>
      </div>

      <!-- Liên hệ -->
      <div class="col-md-2">
        <h6 class="fw-bold mb-3">Liên Hệ</h6>
        <ul class="list-unstyled text-muted">
          <li><i class="bi bi-geo-alt-fill me-2"></i>53 Phố Hội An, Hạ Long</li>
          <li><a href="tel:0976665232" class="text-muted text-decoration-none"><i class="bi bi-telephone-fill me-2"></i>0976 665 232</a></li>
          <li><a href="mailto:Duong58@gmail.com" class="text-muted text-decoration-none"><i class="bi bi-envelope-fill me-2"></i>Duong58@gmail.com</a></li>
        </ul>
      </div>

      <!-- Đăng ký nhận tin -->
      <div class="col-md-3">
        <h6 class="fw-bold mb-3">Đăng ký nhận tin</h6>
        <p class="text-muted small">Cập nhật ưu đãi và sản phẩm hot mỗi tuần.</p>
        <form class="d-flex flex-column flex-sm-row gap-2" action="/newsletter.php" method="POST">
          <input type="email" name="email" class="form-control form-control-sm rounded-pill px-3" placeholder="Email của bạn">
          <button class="btn btn-sm px-4 rounded-pill text-white" style="background-color:rgb(236, 82, 133);" type="submit">Đăng ký</button>
        </form>
      </div>

    </div>
  </div>
</footer>
