@extends('layouts.layout')
@section('title','Контакты')
@section('content')
    <div class="w-4/5 mx-auto justify-between py-4 flex  space-y-4">
        <div class="flex flex-col space-y-2">
        <div class="text-2xl">Адрес: </div>
            <div class="">
                677005, г.Якутск, ул. Петра Алексеева, 73
            </div>
            <div class="text-2xl">Как связаться: </div>
            <div class="">
                Наш многоканальный телефон: 8 (495) 775-89-10
                <br>
                Email: champion736688@mail.ru
            </div>
            <div class="text-2xl">Часы работы: </div>
            <div class="">
                Ежедневно с 10-00 до 18-00 
              
            </div>
            <div class="text-2xl">Реквизиты: </div>
            <div class="">
                ООО "ЯН ЛЭЙ ИП" <br>
                ИНН/КПП 7720859529/772001001 <br>
                Код по ОГРН 1227700008205; <br>
                Код по ОКПО 97105237 <br>
                Юр. адрес: 677005, г. Якутск, Улица Петра Алексеева, 73<br>
                Факт. адрес: 677005, гор. Якутск, Улица Петра Алексеева, 73 
              
            </div>
        </div>
        <img src="{{url('images/site/fsdfs.png')}}" class="w-[20%]" alt="">
        <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/74/yakutsk/?ll=129.684576%2C62.045244&utm_medium=mapframe&utm_source=maps&z=10" style="color:#eee;font-size:12px;position:absolute;top:0px;">Якутск</a><a href="https://yandex.ru/maps/?um=constructor%3A0c39c14185506d961674fadae20f89056baef7abd14ce0560a778792be9f424e&source=constructorLink" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0c39c14185506d961674fadae20f89056baef7abd14ce0560a778792be9f424e&amp;source=constructor" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
    </div>

@endsection