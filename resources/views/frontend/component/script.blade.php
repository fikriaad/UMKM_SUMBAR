
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/owlcarousel/dist/owl.carousel.min.js')}}"></script>


<!-- SLIDER -->
<script>
    $('.owl-slider').owlCarousel({
        loop:true,
        margin:10,
        nav: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
</script>

<!-- KATEGORI -->
<script>
    $('.owl-kategory').owlCarousel({
        center: false,
        items:2,
        loop:false,
        margin:20,
        responsive:{
            600:{
                items:7
            }
        }
    })
</script>