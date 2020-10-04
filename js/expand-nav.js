function f($item) {
    return document.querySelector($item)
}

let isExpanded = false
window.onload = e => {
    const navExpand = f('#nav-expand')
    navExpand.addEventListener('click', e => {
        if(!isExpanded) {
            f('#nav').style.display = 'flex'
            isExpanded = true;
        } else {
            f('#nav').style.display = 'none'
            isExpanded = false;

        }
    })   
}