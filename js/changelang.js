document.querySelectorAll('.menu__item a[data-lang]').forEach(el => {
    el.style.cursor = 'pointer'
    el.addEventListener('click', () => {
        if(el.getAttribute('data-lang') === 'ru' || el.getAttribute('data-lang') === 'en'){
            let date = new Date()
            date.setDate(date.getDate() + 30)
            document.cookie = `lang=${el.getAttribute('data-lang')};expires=${date};path=/`
            document.location = el.getAttribute('data-href')
        }
    })

})

async function ChangeURL() {
    if(document.cookie.match(/lang=../gi) !== null){
        history.replaceState(null, null, document.URL.split(document.domain + '/')[1].replace(/lang=../gi, `${document.cookie.match(/lang=../gi)}`));
    }
}

window.addEventListener('load', () => {
    ChangeURL()
})
