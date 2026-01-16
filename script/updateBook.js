function uploadFile(file, action, id="") {
    const formData = new FormData();
    formData.append('image', file);

    let url = `index.php?action=${action}`
    if (id !="")
        url += `&id=${id}`

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .catch(error => {
        console.error("Erreur : ", error);
        alert("Une erreur est survenue lors du téléchargement de l'image");
    });
}

document.getElementById("bookPicture").addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file)
        return;

    let bookId = document.getElementById("bookId").value
    uploadFile(file, "uploadBookPicture", bookId);
});

