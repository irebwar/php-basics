<?php
require_once 'includes/header.php';
?>


    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4 border-bottom pb-2">دوواین بابەتەکان</h2>

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card post-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                                فێربوونی PHP لە ٢٠٢٦!
                            </h5>
                            <p class="card-text text-muted">
                                لەو ماوەیەی کە PHP هەبووە، زۆر گۆڕانکاری و پێشکەوتن لەسەر ئەم زمانەی بەرنامەنووسی ڕوویدا. لە ٢٠٢٦، PHP بە شێوەیەکی زۆر باشتر و خێراتر بوو، بە تایبەت لە بەکاربردنی فریمۆرکەکان و لایبرارییەکان.
                            </p>
                            <a href="#" class="btn btn-outline-primary btn-sm">زیاتر بخوێنەوە</a>
                        </div>
                        <div class="card-footer bg-white text-muted small">
                            <i class="bi bi-clock">
                                ١٠ خولەک لەمەوپێش
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-body">
                    <h5>گەڕانەوە</h5>
                    <form action="search.php" method="GET" class="d-flex">
                        <input type="search" class="form-control me-2" name="q" placeholder="گەڕان بۆ..." required>
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm border-0 border-top border-warning border-4">
                <div class="card-body">
                    <h5 class="card-title text-warning">
                        <i class="bi bi-currency-exchange"></i>
                        نرخی دراوەکان
                    </h5>
                    <p class="small text-muted">
                        ڕاوستەوخۆ لە بازاڕەکانی کوردستان
                    </p>
                    <div class="texct-center py-3" id="currency-widget">
                        <div class="spinner-border text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 mb-0">لەبارکردندایە...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




















<?php
require_once 'includes/footer.php';
?>