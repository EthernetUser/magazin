function f($item) {
    return document.querySelector($item)
}

let isExpanded = false

window.addEventListener('load', e => {
    const navExpand = f('#nav-expand')
    navExpand.addEventListener('click', e => {
        if(!isExpanded) {
            document.querySelector('nav').querySelectorAll('.menu').forEach(el => {
                el.style.display = 'flex'
            })
            isExpanded = true;
        } else {
            document.querySelector('nav').querySelectorAll('.menu').forEach(el => {
                el.style.display = 'none'
            })
            isExpanded = false;

        }
    })  

    window.addEventListener('resize', e => {
        if(e.target.innerWidth > 600) 
            document.querySelector('nav').querySelectorAll('.menu').forEach(el => el.style.display = 'flex')
        else 
            document.querySelector('nav').querySelectorAll('.menu').forEach(el => el.style.display = 'none')
        
    }) 
})
