<div class="carousel-full-width">
    <div class="image">
        <img src="https://static.pexels.com/photos/60006/spring-tree-flowers-meadow-60006.jpeg" />
    </div>
    <div class="image">
        <img src="http://images.all-free-download.com/images/graphiclarge/canoe_water_nature_221611.jpg" />
    </div>
    <div class="image">
        <img src="https://media02.hongkiat.com/nature-photography/The-best-nature-photography-collection.jpg" />
    </div>
</div>
<style>
    .carousel-full-width .image {
        height: 600px;
        overflow:hidden;
    }
    .carousel-full-width .image img {
        width: 100%;
    }
    button.slick-prev,
    button.slick-next {
        position: absolute;
        top: 50%;
        z-index: 2;
    }
    button.slick-prev {
        left: 10px;
    }
    button.slick-next {
        right: 10px;
    }
    /* Arrows */
    .slick-prev,
    .slick-next
    {
        font-size: 0;
        line-height: 0;

        position: absolute;
        top: 50%;

        display: block;

        width: 20px;
        height: 20px;
        margin-top: -10px;
        padding: 0;

        cursor: pointer;

        color: transparent;
        border: none;
        outline: none;
        background: rgba(255,255,255,.4);
    }
    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus
    {
        color: transparent;
        outline: none;
        background: transparent;
    }
    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before
    {
        opacity: 1;
    }
    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before
    {
        opacity: .25;
    }

    .slick-prev:before,
    .slick-next:before
    {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;

        opacity: .75;
        color: white;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-prev
    {
        left: -25px;
    }
    [dir='rtl'] .slick-prev
    {
        right: -25px;
        left: auto;
    }
    .slick-prev:before
    {
        content: '←';
    }
    [dir='rtl'] .slick-prev:before
    {
        content: '→';
    }

    .slick-next
    {
        right: -25px;
    }
    [dir='rtl'] .slick-next
    {
        right: auto;
        left: -25px;
    }
    .slick-next:before
    {
        content: '→';
    }
    [dir='rtl'] .slick-next:before
    {
        content: '←';
    }

    /* Dots */
    .slick-slider
    {
        margin-bottom: 30px;
        height: 600px;
    }

    .slick-dots
    {
        position: absolute;
        bottom: 0px;

        display: block;

        width: 100%;
        padding: 0;

        list-style: none;

        text-align: center;
    }
    .slick-dots li
    {
        position: relative;

        display: inline-block;

        width: 20px;
        height: 20px;
        margin: 0 5px;
        padding: 0;

        cursor: pointer;
    }
    .slick-dots li button
    {
        font-size: 0;
        line-height: 0;

        display: block;

        width: 20px;
        height: 20px;
        padding: 5px;

        cursor: pointer;

        color: transparent;
        border: 0;
        outline: none;
        background: rgba(255,255,255,.5);
    }
    .slick-dots li button:hover,
    .slick-dots li button:focus
    {
        outline: none;
    }
    .slick-dots li button:hover:before,
    .slick-dots li button:focus:before
    {
        opacity: 1;
    }
    .slick-dots li button:before
    {
        font-family: 'slick';
        font-size: 6px;
        line-height: 20px;

        position: absolute;
        top: 0;
        left: 0;

        width: 20px;
        height: 20px;

        content: '•';
        text-align: center;

        opacity: .25;
        color: black;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .slick-dots li.slick-active button:before
    {
        opacity: .75;
        color: black;
    }

</style>
@push('scripts')
<script>
    $('.carousel-full-width').slick({
        infinite: true,
        dots: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><</button>',
        nextArrow: '<button type="button" class="slick-next">></button>'
    });
</script>
@endpush