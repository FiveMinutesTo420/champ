function priceFilter(){
    let from = document.getElementById('from_price').value;
    let to = document.getElementById('to_price').value;
    if(parseInt(to) > parseInt(from)){
        let absUrl = location.protocol + '//' + location.host + location.pathname + location.search;
        var url = new URL(absUrl);
        url.searchParams.set('from_price',from)
        url.searchParams.set('to_price',to)
        window.location.replace(url);
    }
}

function brandChanged(el,url){
    if(el.checked == true){
        window.location.replace(url);
    }else{
        var url = new URL(url);
        url.searchParams.delete('brand');
        window.location.replace(url);

    }
}
function sortByPrice(el,surl){
    let absUrl = location.protocol + '//' + location.host + location.pathname + location.search;
    var url = new URL(absUrl);
    if(url.searchParams.has('price')){
        if(url.searchParams.get('price') == "cheap"){
            url.searchParams.set('price','expensive') 
        }else{
            url.searchParams.set('price','cheap') 

        }
    }else{
        var url = new URL(surl);
    }

    window.location.replace(url);
}
function sortByNew(el,surl){
    let absUrl = location.protocol + '//' + location.host + location.pathname + location.search;
    var url = new URL(absUrl);
    if(url.searchParams.has('new')){
        if(url.searchParams.get('new') == "new"){
            url.searchParams.set('new','old') 
        }else{
            url.searchParams.set('new','new') 

        }
    }else{
        var url = new URL(surl);
    }

    window.location.replace(url);
}
function categoryChanged(el,url){
    if(el.checked == true){
        window.location.replace(url);
    }else{
        var url = new URL(url);
        url.searchParams.delete('category');
        window.location.replace(url);

    }
}