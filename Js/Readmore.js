let noOfCharec = 250;
let contents = document.querySelectorAll(".content");

contents.forEach(content => {
    if(content.textContent.length < noOfCharec){
         content.nextElementSibling.style.display ="none";
    }
    else{
        let displayText = content.textContent.slice(0,noOfCharec);
        let moreText = content.textContent.slice(noOfCharec);
        content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide more">${moreText}</span>`;
       
    }
});
function readMore(btn){
    let post  = btn.parentElement;
    post.querySelector(".dots").classList.toggle("hide");
    post.querySelector(".more").classList.toggle("hide");
    btn.textContent == "Read Less" ? btn. textContent = "Read More": btn.textContent = "Read Less"; 
}