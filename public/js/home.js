var swiper = new Swiper(".mySwiper",{
    spaceBetween:30,
    navigation:{
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev"
    },
    pagination:{
        el:".swiper-pagination"
    },
    autoplay:{
        delay:5000
    },
    loop:true,
    
})
var swiper2 = new Swiper(".mySwiper2",{
    slidesPerView:6,
    loop:true,
    autoplay:{
        delay:5000
    },
    mousewheel:true,
    
})