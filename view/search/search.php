<?php
include BASE_PATH . '/view/navigation/navigation.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <?php if (!empty($query)): ?>
                <h2 class="mb-4">
                    <i class="fas fa-search"></i>
                    Kết quả tìm kiếm cho: "<span class="text-primary"><?php echo htmlspecialchars($query); ?></span>"
                </h2>

                <?php if (!empty($books) && count($books) > 0): ?>
                    <p class="text-muted mb-4">Tìm thấy <?php echo count($books); ?> kết quả</p>

                    <div class="row">
                        <?php foreach ($books as $book): ?>
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card book-card h-100 shadow-sm"
                                    onclick="window.location.href='/DoAn_BookStore/view/detail/detail.php?id=<?php echo $book['id']; ?>'"
                                    style="cursor: pointer;">
                                    <div class="book-image-container">
                                        <img src="images/books/<?php echo htmlspecialchars($book['image']) ? htmlspecialchars($book['image']) : '/DoAn_BookStore/images/book-placeholder.jpg'; ?>"
                                            class="card-img-top book-image" alt="<?php echo htmlspecialchars($book['title']); ?>">
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                                        <p class="book-author text-muted">
                                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($book['author']); ?>
                                        </p>
                                        <!-- Publisher -->
                                        <?php if (!empty($book['publisher'])): ?>
                                            <p class="text-muted mb-1 book-meta">
                                                <i class="fas fa-building"></i>
                                                <?php echo htmlspecialchars(substr($book['publisher'], 0, 20)) . (strlen($book['publisher']) > 20 ? '...' : ''); ?>
                                            </p>
                                        <?php endif; ?>
                                        <p class="book-description flex-grow-1">
                                            <?php echo strlen($book['description']) > 100 ? substr(htmlspecialchars($book['description']), 0, 100) . '...' : htmlspecialchars($book['description']); ?>
                                        </p>
                                        <div class="mt-auto">
                                            <div class="price-container text-center mb-2">
                                                <p class="book-price mb-0">
                                                    <i class="fas fa-tag price-icon"></i>
                                                    <?php echo number_format($book['price'] * 1000, 0, ',', '.'); ?>
                                                    <span class="currency">đ</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Không tìm thấy kết quả nào</h4>
                        <p class="text-muted">Hãy thử tìm kiếm với từ khóa khác</p>
                        <a href="/DoAn_BookStore/" class="btn btn-primary">
                            <i class="fas fa-home"></i> Về trang chủ
                        </a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Nhập từ khóa để tìm kiếm</h4>
                    <p class="text-muted">Tìm kiếm theo tên sách, tác giả hoặc mô tả</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/DoAn_BookStore/view/search/search.css">

<?php include BASE_PATH . '/view/footer/footer.php'; ?>