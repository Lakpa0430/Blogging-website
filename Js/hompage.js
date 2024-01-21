const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}

$(document).ready(function () {

    $nav = $('.navigation');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

   
  
});

const button=document.getElementById('btn-blog');
const box=document.querySelector('.bg-modal');
const lakpa=document.querySelector('.close');
button.addEventListener('click', function () {
    box.style.display="flex";
});

lakpa.addEventListener('click', function () {
    box.style.display="none";
});



const image_input=document.querySelector('#c_f');
var upload_image = "";
const hide_img_icon=document.querySelector('#hide');
const display_img= document.querySelector("#display_img");
const ok=document.querySelector('#ok');
const box1= document.querySelector("#box");
console.log(box);
image_input.addEventListener('change', function () {
   const reader = new FileReader();
   reader.addEventListener('load', () => {
           upload_image=reader.result;

        display_img.style.backgroundImage=`url(${upload_image})`;
       hide_img_icon.style.display="none";
       box1.style.height="350px";
       box1.style.width="450px";
       display_img.style.height="290px";
       ok.style.display="flex";
   });
   reader.readAsDataURL(this.files[0])

});