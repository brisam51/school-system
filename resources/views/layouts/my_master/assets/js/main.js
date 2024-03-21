//add hover to selected list
let list=document.querySelectorAll(".navigation li");

function activlink(){

    list.forEach(
       (item)=>{
        item.classList.remove("hovered");
       }
    );
    thia.classList.add('hovered')
}
list.forEach(item=>item.addEventListener("mouseover",activlink));
