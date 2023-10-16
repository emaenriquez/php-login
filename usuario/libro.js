
// Definir la clave de la API de Google Books.
const apiKey = 'AIzaSyBJ51G3CUcSstF6HsrbAkbL89XKD6O-JK4'
const results = document.getElementById('results')
const listaLibros = document.getElementById('table_contenedor')
let title, thumbnail, isbn, authors

// Espera a que el DOM (Documento Object Model) esté completamente cargado antes de ejecutar el código.
document.addEventListener('DOMContentLoaded', function () {
    const buscador = document.getElementById('buscador')
    // Agregar un evento de escucha para cuando se haga clic en el botón de búsqueda.
    buscador.addEventListener('click', searchBooks)

    results.addEventListener('click', function (event) {
        if (event.target && event.target.id.startsWith('button_anadir_lista_')) {
            const index = event.target.id.split('_')[4]; // Extraer el índice del botón.
            addBookToMyList(index);
        }
    });
})

function searchBooks() {
    // Obtener el término de búsqueda ingresado por el usuario y codificarlo para usarlo en la URL.
    const searchTerm = encodeURIComponent(document.getElementById('searchInput').value);

    // Realizar una solicitud a la API de Google Books con la clave de la API y el término de búsqueda.
    fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchTerm}&key=${apiKey}`)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            // Agregar una clase CSS para formatear los resultados y limpiar los resultados anteriores.
            results.classList.add('libros_contenedor')
            results.innerHTML = ''; // Limpia los resultados anteriores.

            // Recorrer los resultados y mostrar la información de cada libro.
            data.items.forEach((item, index) => {
                title = item.volumeInfo.title;
                authors = item.volumeInfo.authors;  // Puede que esto necesite ser corregido a 'authors = item.volumeInfo.authors'.
                thumbnail = item.volumeInfo.imageLinks ? item.volumeInfo.imageLinks.thumbnail : 'Imagen no disponible';
                isbn = item.volumeInfo.industryIdentifiers ? item.volumeInfo.industryIdentifiers[0].identifier : 'ISBN no disponible';
                previewLink = item.volumeInfo.previewLink; // Agregar enlace de vista previa

                // Crear un fragmento de HTML con la información del libro.
                const bookInfo = `
                    <div class="div_contenedor_libros">
                        <h2 class="libros_titulo">${title}</h2>
                        <p class="libros_isbn">ISBN: ${isbn}</p>
                        <p class="">${authors}</p>
                        <img src="${thumbnail}" alt="Portada del libro" class="libros_portadas">
                        <button id="button_anadir_lista_${index}">Añadir a mi lista</button>
                        <a href="${previewLink}" target="_blank" class="libros_descargar">Descargar</a>
                    </div>`;

                // Agregar el fragmento de HTML al contenedor de resultados.
                results.innerHTML += bookInfo;
            });
        })
        .catch(error => console.error('Error:', error));

}



function addBookToMyList(index) {
    const idLibro = index; // Puedes usar el índice como ID del libro de manera simplificada.

    fetch('agregar_libro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id_libro: idLibro }),
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta del servidor, si es necesario.
        console.log(data);

        if (data.success) {
            // Si la inserción fue exitosa, puedes redirigir al usuario a la página "mis_libros.php"
            window.location.href = 'mis_libros.php';
        } else {
            alert("Error al agregar el libro a tu lista.");
        }
    })
    .catch(error => console.error('Error:', error));
}
