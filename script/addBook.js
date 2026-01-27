const input = document.getElementById('bookPicture');
input.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            const imgElement = document.getElementById('bookImage');
            imgElement.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('registerBook').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData();
    
    formData.append("title", document.getElementById('title').value)
    formData.append("author", document.getElementById('author').value)
    formData.append("description", document.getElementById('description').value)
    formData.append("availability", document.getElementById('availability').value)
    formData.append("image", document.getElementById('bookPicture').files[0])


    fetch('index.php?action=registerBook', {
        method: 'POST',
        body: formData,
    })
    .then(data => {
        window.location.href="index.php?action=showAccount"
    })
    .catch(error => {
        console.error("Erreur : ", error);
        alert("Une erreur est survenue lors du téléchargement de l'image");
    });

})
