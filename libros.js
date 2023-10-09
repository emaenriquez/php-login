
// Definir la clave de la API de Google Books.
const apiKey = 'AIzaSyBJ51G3CUcSstF6HsrbAkbL89XKD6O-JK4'

// Obtener una referencia al elemento con el ID 'results' en el HTML.
const results = document.getElementById('results')

// Obtener una referencia al elemento con el ID 'table_contenedor' en el HTML.
const listaLibros = document.getElementById('table_contenedor')

// Declarar variables para almacenar información de libros.
let title, thumbnail, isbn, authors

// Espera a que el DOM (Documento Object Model) esté completamente cargado antes de ejecutar el código.
document.addEventListener('DOMContentLoaded', function () {
    // Obtener una referencia al elemento con el ID 'buscador' en el HTML.
    const buscador = document.getElementById('buscador')

    // Agregar un evento de escucha para cuando se haga clic en el botón de búsqueda.
    buscador.addEventListener('click', searchBooks)
})

// Función para realizar una búsqueda de libros en la API de Google Books.
function searchBooks() {
    // Obtener el término de búsqueda ingresado por el usuario y codificarlo para usarlo en la URL.
    const searchTerm = encodeURIComponent(document.getElementById('searchInput').value);

    // Realizar una solicitud a la API de Google Books con la clave de la API y el término de búsqueda.
    fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchTerm}&key=${apiKey}`)
        .then(response => response.json())
        .then(data => {
            // Agregar una clase CSS para formatear los resultados y limpiar los resultados anteriores.
            results.classList.add('libros_contenedor')
            results.innerHTML = ''; // Limpia los resultados anteriores.

            // Recorrer los resultados y mostrar la información de cada libro.
            data.items.forEach((item, index) => {
                title = item.volumeInfo.title;
                authors = item.volumeInfo.author;  // Puede que esto necesite ser corregido a 'authors = item.volumeInfo.authors'.
                thumbnail = item.volumeInfo.imageLinks ? item.volumeInfo.imageLinks.thumbnail : 'Imagen no disponible';
                isbn = item.volumeInfo.industryIdentifiers ? item.volumeInfo.industryIdentifiers[0].identifier : 'ISBN no disponible';

                // Crear un fragmento de HTML con la información del libro.
                const bookInfo = `
                    <div class="div_contenedor_libros">
                        <h2 class="libros_titulo">${title}</h2>
                        <p class="libros_isbn">ISBN: ${isbn}</p>
                        <p class="">${authors}</p>
                        <button id="button_anadir_lista_${index}">Añadir a mi lista</button>
                        <img src="${thumbnail}" alt="Portada del libro" class="libros_portadas">
                    </div>`;

                // Agregar el fragmento de HTML al contenedor de resultados.
                results.innerHTML += bookInfo;
            });
        })
        .catch(error => console.error('Error:', error));
}
