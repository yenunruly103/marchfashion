            
<section id="slider">
    <section class="bannerimg">
        <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <div class="indicators-bg">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
            </div>
            <div class="carousel-inner">
                <div class="item">
                    <a href="#"><img src="{{ asset('img/Banner01.jpg') }}" alt="Carousel slider 1"></a>
                </div>
                <div class="item">
                    <a href="#"><img src="{{ asset('img/Banner02.jpg') }}" alt="Carousel slider 1"></a>
                </div>
                <div class="item active">
                    <a href="#"><img src="{{ asset('img/Banner03.jpg') }}" alt="Carousel slider 1"></a>
                </div>
            </div>
        </div>
    </section>
<!--                <img src="img/Banner01.jpg" alt="" class="bannerimg"/>-->
    @include('layouts.menu')
    <div class="clear"></div>
</section>