@extends('layouts.layout')
@section('title','О нас')
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('content')
   <div class="w-[93%] mx-auto space-y-4 pb-6">
    <p class="bg-red-900 text-white p-4 mt-4">Чемпион – На пути к победе, каждый оборот - шаг к успеху!</p>
    <div>
        <p class="text-xl">16 сентября 2002 года мы открыли интернет – магазин по продаже велосипедов по городу Якутск.</p> 
    </div>
    <div class="space-y-3">
    Добро пожаловать в мир велосипедов с магазином "Чемпион"! Мы - пристанище для всех любителей двухколесной свободы и активного образа жизни. 
    С горными тропами, асфальтовыми джунглями и пересеченными дорогами в нашем сердце, мы предлагаем не только самый широкий выбор велосипедов, но и экспертные знания, чтобы помочь вам выбрать идеальный вариант для ваших приключений. 
    Наша страсть к качеству, инновациям и забота о каждом клиенте делают нас вашим идеальным партнером в мире велосипедов. 
    Добро пожаловать в магазин "Чемпион" - вашему верному спутнику на дороге к новым подвигам и победам!
    </div>
    <p class="text-2xl">Новинки компании</p>
    <div class="swiper mySwiper w-full flex justify-center">

        <div class="swiper-wrapper flex items-center">
            @foreach($items as $item)
                <div class="swiper-slide flex items-center justify-center">
                    
                    <a href="{{route('product',[$item->category->slug,$item->slug])}}" class="flex  flex-col space-y-3  items-center  ">
                    <p>{{$item->name}}</p>
                        <img src="{{url('images/products/'.$item->image)}}" class="rounded-t w-[500px] h-[350px]"  alt="">
                    </a>
                </div>
            @endforeach
            
        </div>
        <div class="swiper-pagination">

        </div>
        <div class="swiper-button-prev "></div>

        <div class="swiper-button-next "></div>
        </div>
   </div>
@endsection
@section('scripts')
<script>
        var swiper = new Swiper(".mySwiper",{
    spaceBetween:20,
    slidesPerView:1,
    navigation:{
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev"
    },
    loop:true,
    pagination:{
        el:".swiper-pagination"
    },
    autoplay:{
        delay:5000
    },
    
})
</script>
@endsection