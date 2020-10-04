function DeleteGoods(){
    let result = confirm("Товар будет безвозвратно удален!")
    if(result){
        const id = document.querySelector('#id').value
        document.location.href = `php/deletegoods-script.php?id=${id}`
    }
}

function DeleteNews(){
    let result = confirm("Новость будет безвозвратно удалена!")
    if(result){
        const id = document.querySelector('#id').value
        document.location.href = `php/deletenews-script.php?id=${id}`
    }
}