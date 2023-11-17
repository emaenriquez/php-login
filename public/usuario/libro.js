// Definir la clave de la API de Google Books.
const apiKey = 'AIzaSyCRuInTp5qIhjWZx2zFXx3wtxO0ZGOE7hw';
const results = document.getElementById('results');
const listaLibros = document.getElementById('table_contenedor');
const buscador = document.getElementById('buscador');
let title, thumbnail, isbn, authors;

document.addEventListener('DOMContentLoaded', function () {
    // Agregar un evento de clic a los botones "Añadir a mi lista".
    buscador.addEventListener('click', searchBooks);

    results.addEventListener('click', function (event) {
        if (event.target.classList.contains('anadir-libro')) {
            const bookId = event.target.getAttribute('data-book-id');
            const libro = data.items[bookId];

            // Obtener los datos del libro
            const title = libro.volumeInfo.title;
            const isbn = libro.volumeInfo.industryIdentifiers ? libro.volumeInfo.industryIdentifiers[0].identifier : 'ISBN no disponible';
            const authors = libro.volumeInfo.authors ? libro.volumeInfo.authors.join(', ') : 'Autor no disponible';
            const thumbnail = libro.volumeInfo.imageLinks ? libro.volumeInfo.imageLinks.thumbnail : 'Imagen no disponible';

            // Crear un objeto con los datos del libro
            const libroData = {
                titulo: title,
                isbn: isbn,
                autor: authors,
                portada: thumbnail
            };

            // Enviar los datos al servidor mediante una solicitud POST
            fetch('mis_libros.php', {
                method: 'POST',
                body: JSON.stringify(libroData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('La solicitud no se pudo completar');
                }
                return response.text(); // Leer la respuesta como texto en lugar de JSON
            })
            .then(data => {
                // Procesar la respuesta del servidor si es necesario
                console.log('Datos guardados en el servidor:', data);
            })
            .catch(error => console.error('Error al guardar datos:', error));
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
                            <p class="libros_autor">${authors}</p>
                            <img src="${thumbnail}" alt="Portada del libro" class="libros_portadas">
                            <button class="anadir-libro" data-book-id="${index}">Añadir a mi lista</button>
                            <a href="${previewLink}" target="_blank" class="libros_descargar">Leer libro</a>
                        </div>`;

                    // Agregar el fragmento de HTML al contenedor de resultados.
                    results.innerHTML += bookInfo;

                });
            }).catch(error => console.error('Error:', error));
}})