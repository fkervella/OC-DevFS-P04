const mediaQuery = window.matchMedia('(max-width :1000px)')

function handleMediaChange(mediaQuery) {

    if (mediaQuery.matches) {
        document.getElementById('back').addEventListener('click', function() {
    
            document.getElementById('column1').style.display = "flex"
            document.getElementById('column2').style.display = "none"
        });
    
    
        window.addEventListener('load', function() {
        
            if(document.getElementById('chatId')) {
                document.getElementById('column1').style.display = "none"
                document.getElementById('column2').style.display = "flex"
            }
        });
    }
}

mediaQuery.addEventListener('change', handleMediaChange)

handleMediaChange(mediaQuery)
