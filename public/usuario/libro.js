// Definir la clave de la API de Google Books.
const apiKey = 'AIzaSyCRuInTp5qIhjWZx2zFXx3wtxO0ZGOE7hw';
const results = document.getElementById('results');
const listaLibros = document.getElementById('table_contenedor');
const buscador = document.getElementById('buscador');
let title, thumbnail, isbn, authors;

document.addEventListener('DOMContentLoaded', function () {

    buscador.addEventListener('click', searchBooks);

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
                    thumbnail = item.volumeInfo.imageLinks ? item.volumeInfo.imageLinks.thumbnail : 'Imagen no disponible';
                    isbn = item.volumeInfo.industryIdentifiers ? item.volumeInfo.industryIdentifiers[0].identifier : 'ISBN no disponible';
                    previewLink = item.volumeInfo.previewLink;

                    // Crear un fragmento de HTML con la información del libro.
                    const bookInfo = `
                        <div class="div_contenedor_libros">
                            <img src="${thumbnail}" alt="Portada del libro" class="libros_portadas">
                            <h2 class="libros_titulo">${title}</h2>
                            <p>
                                <a href="${previewLink}" target="_blank" class="libros_descargar">Leer libro</a>
                            </<p>
                        </div>`;

                    // Agregar el fragmento de HTML al contenedor de resultados.
                    results.innerHTML += bookInfo;

                });
            }).catch(error => console.error('Error:', error));
}})