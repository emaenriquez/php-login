// Definir la clave de la API de Google Books.
const apiKey = 'AIzaSyBJ51G3CUcSstF6HsrbAkbL89XKD6O-JK4';
const results = document.getElementById('results');
const listaLibros = document.getElementById('table_contenedor');
let addButtons; 
const buscador = document.getElementById('buscador');
let title, thumbnail, isbn, authors;

// Espera a que el DOM (Documento Object Model) esté completamente cargado antes de ejecutar el código.
document.addEventListener('DOMContentLoaded', function () {
    let data
     // Agregar un evento de clic a los botones "Añadir a mi lista".
     buscador.addEventListener('click', searchBooks);
     results.addEventListener('click', function (event) {
        const bookId = event.target.getAttribute('data-book-id');
            // Verifica si data está definida antes de usarla.
        if (data) {
            const selectedBook = data.items[bookId].volumeInfo;
            saveBookToDatabase(selectedBook);
        }
});

function searchBooks() {
    // Obtener el término de búsqueda ingresado por el usuario y codificarlo para usarlo en la URL.
    const searchTerm = encodeURIComponent(document.getElementById('searchInput').value);

    // Realizar una solicitud a la API de Google Books con la clave de la API y el término de búsqueda.
    fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchTerm}&key=${apiKey}`)
        .then(response => response.json())
        .then(respondeData => {
            data = respondeData
            // Agregar una clase CSS para formatear los resultados y limpiar los resultados anteriores.
            results.classList.add('libros_contenedor');
            results.innerHTML = ''; // Limpia los resultados anteriores.

            // Recorrer los resultados y mostrar la información de cada libro.
            data.items.forEach((item, index) => {
                title = item.volumeInfo.title;
                authors = item.volumeInfo.authors; 
                thumbnail = item.volumeInfo.imageLinks ? item.volumeInfo.imageLinks.thumbnail : 'Imagen no disponible';
                isbn = item.volumeInfo.industryIdentifiers ? item.volumeInfo.industryIdentifiers[0].identifier : 'ISBN no disponible';
                previewLink = item.volumeInfo.previewLink;

                // Crear un fragmento de HTML con la información del libro.
                const bookInfo = `
                    <div class="div_contenedor_libros">
                        <h2 class="libros_titulo">${title}</h2>
                        <p class="libros_isbn">ISBN: ${isbn}</p>
                        <p class="">${authors}</p>
                        <img src="${thumbnail}" alt="Portada del libro" class="libros_portadas">
                        <button class="anadir-libro" data-book-id="${index}">Añadir a mi lista</button>
                        <a href="${previewLink}" target="_blank" class="libros_descargar">Leer libro</a>
                    </div>`;

                // Agregar el fragmento de HTML al contenedor de resultados.
                results.innerHTML += bookInfo;

                const bookData = [title,authors,thumbnail,isbn];
                console.log(bookData[0])
                console.log(bookData[1])
                console.log(bookData[2])
                console.log(bookData[3])
                
            });
        })
        .catch(error => console.error('Error:', error));
}})

function saveBookToDatabase(bookData) {
    // Realiza una solicitud POST al servidor (PHP) con los datos del libro.
    fetch('guardar_libro.php', {
        method: 'POST',
        body: JSON.stringify(bookData),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Procesar la respuesta del servidor si es necesario.
        console.log('Libro guardado en la base de datos:', data);
    })
    .catch(error => console.error('Error al guardar el libro:', error));
}
