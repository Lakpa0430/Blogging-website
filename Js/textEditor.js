const buttons =document.querySelectorAll('button');
textField.document.designMode = "On";
for(let i=0; i<buttons.length;i++){
    buttons[i].addEventListener('click',()=>{
        let cmd = buttons[i].getAttribute('data-cmd');
        if(buttons[i].name === " active"){
            buttons[i].classList.toggle('active');
        }
        else{
            textField.document.execCommand(cmd, false, null);
        }
        if(cmd === "showCode"){
            const textBody = textField.document.querySelector('body');
            if(show){
                textBody.innerHTML = textBody.texContent;
                show = false;
            }else{
                textBody.texContent = textBody.innerHTML;
                show = true;
            }
        }
    })
}