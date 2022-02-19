window.addEventListener('load', function(){
    

    const boton = document.querySelector("#button");

    boton.addEventListener('click', function(){
        const form = document.querySelector("#formulario");
        const formulario = new FormData(form);

        let data  = {
            body: formulario,
            method: 'POST'
        };

        fetch("http://localhost/api_proyecto/api.php", data);
           
            form.reset();
    })
})