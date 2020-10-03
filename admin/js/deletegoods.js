function DeleteGoods(){
    let result = confirm("Товар будет безвозвратно удален!")
    if(result){
        const id = document.querySelector('#id').value
        document.location.href = `php/deletegoods-script.php?id=${id}`
    }
}