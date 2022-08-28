console.log('hola');

function selectChange(){

    const select = document.querySelector('#categoria');

        const container_nombreRevista = document.querySelector('#container_nombreRevista');
        const container_edicion = document.querySelector('#container_edicion');
        const container_autores = document.querySelector('#container_autores');
        const container_issn = document.querySelector('#container_issn');

    if(select.value == 'revista'){

        console.log('Es Revista');

        // Crear hijos


        // nombre de la Revista -- label - input
        let label_nombreRevista = document.createElement("label");
        label_nombreRevista.classList.add('font-weight-bold');
        label_nombreRevista.innerHTML = 'Nombre de la Revista';
        label_nombreRevista.htmlFor = 'nombre_revista';


        let input_nombreRevista = document.createElement("input");
        input_nombreRevista.type = 'text';
        input_nombreRevista.classList.add('form-control');
        input_nombreRevista.id = 'nombre_revista';
        input_nombreRevista.name = 'nombre_revista';
        input_nombreRevista.required = true;

        container_nombreRevista.appendChild(label_nombreRevista);
        container_nombreRevista.appendChild(input_nombreRevista);

        // Edicion -- label - input
        let label_edicion = document.createElement("label");
        label_edicion.classList.add('font-weight-bold');
        label_edicion.innerHTML = 'Edición';
        label_edicion.htmlFor = 'edicion';


        let input_edicion = document.createElement("input");
        input_edicion.type = 'text';
        input_edicion.classList.add('form-control');
        input_edicion.id = 'edicion';
        input_edicion.name = 'edicion';
        input_edicion.required = true;

        container_edicion.appendChild(label_edicion);
        container_edicion.appendChild(input_edicion);

        // autores -- label - input
        let label_autores = document.createElement("label");
        label_autores.classList.add('font-weight-bold');
        label_autores.innerHTML = 'Autores';
        label_autores.htmlFor = 'autores';


        let input_autores = document.createElement("input");
        input_autores.type = 'text';
        input_autores.classList.add('form-control');
        input_autores.id = 'autores';
        input_autores.name = 'autores';
        input_autores.required = true;

        container_autores.appendChild(label_autores);
        container_autores.appendChild(input_autores);

        // ISSN -- label - input
        let label_issn = document.createElement("label");
        label_issn.classList.add('font-weight-bold');
        label_issn.innerHTML = 'ISSN';
        label_issn.htmlFor = 'issn';

        let input_issn = document.createElement("input");
        input_issn.type = 'text';
        input_issn.classList.add('form-control');
        input_issn.id = 'issn';
        input_issn.name = 'issn';
        input_issn.required = true;

        container_issn.appendChild(label_issn);
        container_issn.appendChild(input_issn);



    }else if(select.value == 'publicacion'){

        console.log('Es Publicacion');

        // Eliminar hijos

        deleteAllChild(container_nombreRevista);
        deleteAllChild(container_edicion);
        deleteAllChild(container_autores);
        deleteAllChild(container_issn);

    }

}



function deleteAllChild(parent){
    while (parent.lastChild) {
        parent.removeChild(parent.lastChild);
    }
};
