document.getElementById("searchForm").addEventListener("submit", function (e) {

    e.preventDefault()

    let searchWords = document.getElementById('searchWords').value
    window.location.href = 'index.php?action=showBookExchange&searchWords=' + searchWords
    
}); 
