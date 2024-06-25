@extends('layouts.layout')
@section('title','Интернет-магазин Чемпион')
@section('head')
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('content')
<div class="w-full">
    <div class="swiper mySwiper w-[70%]">
        <div class="swiper-wrapper flex items-center">
  
            <div class="swiper-slide flex justify-center items-center">
                <img src="{{url('images/site/image.png')}}" class="w-[65%] h-[50vh]" alt="">
            </div>
            <div class="swiper-slide flex justify-center">
                <img src="{{url('images/site/image2.png')}}" class="w-[65%] h-[50vh]" alt="">
            </div>
            <div class="swiper-slide flex justify-center">
                <img src="{{url('images/site/image3.png')}}" class="w-[65%] h-[50vh]" alt="">
            </div>

        </div>
        <div class="swiper-pagination">

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <h1 class="text-[5vh] ml-auto mr-auto w-[fit-content]">ТОВАРЫ</h1>
    <div class="w-[130vh] ml-auto mr-auto flex flex-wrap justify-between">
        @foreach($items as $item)
        <a href="{{route('product',[$item->category->slug,$item->slug])}}">
            <div class="w-[40vh] flex flex-col mb-20">
                <img src="{{url('images/products/'.$item->image)}}" class="w-[40vh] h-[36vh] p-2 border-4 border-[#9F2822]" alt="">

                <div class="text-2xl">
                    {{$item->name}}
                </div>
                {{$item->price}}
            </div>
        </a>
        @endforeach
    </div>
</div>



@endsection
@section('scripts')
    <script src="{{url('js/home.js')}}"></script>
@endsection
