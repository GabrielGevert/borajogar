const modalOverlay = document.querySelector('.modal-overlay');
const profiles = document.querySelectorAll('.invite')

for (let invite of profiles) {
    invite.addEventListener("click", function(){
        modalOverlay.classList.add('active')
    })
}

document.querySelector('.close-modal').addEventListener("click", function(){
    modalOverlay.classList.remove('active')
})



