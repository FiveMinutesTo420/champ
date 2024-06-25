let brands = document.getElementById('brands')

let userlist = document.getElementById('userlist');

function showUser(){
    shoes.classList.add('hidden')
    clothes.classList.add('hidden')

    if(userlist.classList.contains('hidden')){
        userlist.classList.remove('hidden')
    }else{
        userlist.classList.add('hidden')
    }
}

function showBrands(){
    shoes.classList.add('hidden')
    clothes.classList.add('hidden')

    if(brands.classList.contains('hidden')){
        brands.classList.remove('hidden')
    }else{
        brands.classList.add('hidden')
    }
}

function openS(id){
    document.getElementById('brands').classList.add('hidden');
    document.querySelectorAll('.category').forEach((element) => {
        element.classList.add('hidden');
    });
    document.getElementById(id).classList.remove('hidden');
 
}
document.getElementById('categories').addEventListener('mouseleave',function(event){
    document.getElementById('categories').classList.add('hidden')
    document.getElementById('tablets').classList.add('hidden')
    document.getElementById('headphones').classList.add('hidden')
    document.getElementById('myshy').classList.add('hidden')

})
function openC(){
    document.getElementById('categories').classList.remove('hidden')
}
function openCabinet(){
    document.getElementById('cabinet').classList.remove('hidden')
}
if(document.getElementById('cabinL') != null){
    document.getElementById('cabinL').addEventListener('mouseleave',function(event){
        document.getElementById('cabinet').classList.add('hidden')
    
    })
}
document.getElementById('amountCart').addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        document.getElementById('f').removeAttribute('name');
    }
})