<!-- LATEST NEWS WIDGET -->
<div class="card">
    <div class="card-body">
                                        
        <h4 class="header-title mb-3">Latest News</h4>
                                        
        <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <p>Check out some latest news about the Organization.</p>
                </div>
                <?php foreach($latest_news_data as $news_datum):?>
                <div class="carousel-item">
                    <img src="<?=$news_datum['news_image']?>" alt="..." class="d-block img-fluid">
                    <strong><p class="news-title"><?=$news_datum['news_title']?></p></strong>
                    <a href="<?=base_url('AptmController/view_news')?>" class="btn btn-primary btn-sm mini-news-button">Read More</a>
                </div>
                <?php endforeach;?>
            </div>
             <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>

         </div>


     </div> <!-- end card-body-->
</div> <!-- end card-->