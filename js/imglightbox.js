f('.goods__img img').addEventListener('click', OpenLightBox)

function OpenLightBox(){
    let elem = document.createElement('div')
    elem.classList.add('imglightbox')
    
    let cloneImg = this.cloneNode(false)
    elem.append(cloneImg)

    let close = document.createElement('div')
    close.classList.add('imglightbox__close')
    
    let closeImg = document.createElement('img')
    closeImg.src = 'img/site/close.png'

    close.append(closeImg)
    close.addEventListener('click', CloseLightBox)
    elem.append(close)

    cloneImg.removeEventListener('click', OpenLightBox)
    elem.addEventListener('wheel', e => {
        e.preventDefault()
    })

    document.body.append(elem)
}

function CloseLightBox(event){
    if(event.target.tagName === "IMG" && event.target.parentNode.classList.contains('imglightbox__close')){
        event.target.removeEventListener('click', CloseLightBox)
        event.target.parentNode.parentNode.remove()
    }
}
