if (location.pathname === "/") {
    document.querySelectorAll(".accordion").forEach((button) => {
        button.addEventListener("click", () => {
            const isActive = button.nextElementSibling.classList.contains("panelActive");

            document.querySelectorAll(".panelActive").forEach((panel) => {
                panel.classList.remove("panelActive");
            });
            document.querySelectorAll(".buttonActive").forEach((activeButton) => {
                activeButton.classList.remove("buttonActive");
            });

            if (!isActive) {
                button.nextElementSibling.classList.add("panelActive");
                button.classList.add("buttonActive");
            }
        });
    });


    document.querySelector("#destiny").addEventListener("focus", () => {
        document.querySelector(".Content__port--filters-dropdown").classList.add("dropDownActive");
    });
    
    document.querySelector("#destiny").addEventListener("focusout", () => {
        document.querySelector(".Content__port--filters-dropdown").classList.remove("dropDownActive");
    });


    const monedaEl_one = document.getElementById('moneda-uno');
    const monedaEl_two = document.getElementById('moneda-dos');
    const cantidadEl_one = document.getElementById('cantidad-uno');
    const cantidadEl_two = document.getElementById('cantidad-dos');
    const cambioEl = document.getElementById('cambio');
    const tazaEl = document.getElementById('taza');


    // Fetch Exchange Rate and Update the DOM
    function calculate(){
        const moneda_one = monedaEl_one.value;
        const moneda_two = monedaEl_two.value;

    fetch(`https://api.exchangerate-api.com/v4/latest/${moneda_one}`)
    .then(res => res.json() )
    .then(data => {
        const taza = data.rates[moneda_two];
        
        cambioEl.innerText = `1 ${moneda_one} = ${taza} ${moneda_two}`;

        cantidadEl_two.innerHTML = (cantidadEl_one.value * taza).toFixed(2);

        var indiceSeleccionado = monedaEl_one.selectedIndex;

        // Obtener el texto de la opción seleccionada
        var textoSeleccionado = monedaEl_one.options[indiceSeleccionado].textContent;

        document.querySelector(".cantidadIngresada").innerText = cantidadEl_one.value + " " + textoSeleccionado

        var indiceSeleccionadoCurrency2 = monedaEl_two.selectedIndex;

        // Obtener el texto de la opción seleccionada
        var textoSeleccionadoCurrency2 = monedaEl_two.options[indiceSeleccionadoCurrency2].textContent;

        cantidadEl_two.innerHTML = (cantidadEl_one.value * taza).toFixed(2) + " " + textoSeleccionadoCurrency2;

        } );
        
    }

    //Event listeners
    monedaEl_one.addEventListener('change', calculate);
    cantidadEl_one.addEventListener('input', calculate);
    monedaEl_two.addEventListener('change', calculate);
    cantidadEl_two.addEventListener('input', calculate);



    calculate();

}


document.querySelector(".actions__account--nav-arrowDown").addEventListener("click", () => {
    document.querySelector(".Header__actions--account-dropdown").classList.toggle("activeDropdown");
});

document.querySelector(".actions__account--nav-arrowDown").addEventListener("focusout", () => {
    document.querySelector(".Header__actions--account-dropdown").classList.remove("activeDropdown");
});
    if (location.pathname === "/blogs" || location.pathname === "/FilterBlogs" || location.pathname.includes('indexblogs')) {
        // Js del rango de precios
        var priceSlider = document.getElementById('range');
        var selectedMinOutput = document.getElementById('Minprice');
        var selectedMaxOutput = document.getElementById('Maxprice');
        var minPriceInput = document.getElementById('min-price');
        var maxPriceInput = document.getElementById('max-price');

        noUiSlider.create(priceSlider, {
            start: [minPriceInput.value, maxPriceInput.value],
            connect: true,
            range: {
                'min': 0,
                'max': 10000
            },
            step: 10
        });

        priceSlider.noUiSlider.on('update', function (values, handle) {
            if (handle === 0) {
                selectedMinOutput.textContent = parseInt(values[0]);
                minPriceInput.value = parseInt(values[0]);
            } else {
                selectedMaxOutput.textContent = parseInt(values[1]);
                maxPriceInput.value = parseInt(values[1]);
            }
        });

        // Js para cargar contenido especifico en la pagina

        document.querySelector('#establecimientoSelect').addEventListener('change', function(){
            var Selectvalue = document.getElementById('establecimientoSelect').value;
            var PriceRange = document.getElementById('PriceRange');
            var CategorySite = document.getElementById('CategorySite');
            var CategoryBusiness = document.getElementById('CategoryBusiness');
            
            if(Selectvalue == 'Alojamientos'){
                PriceRange.style.display = 'flex';
            }else{
                PriceRange.style.display = 'none';
            }

            if(Selectvalue == 'Sitios'){
                CategorySite.style.display = 'flex';
            }else{
                CategorySite.style.display = 'none';
            }

            if(Selectvalue == 'Negocios'){
                CategoryBusiness.style.display = 'flex';
            }else{
                CategoryBusiness.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function(){
            var Selectvalue = document.getElementById('establecimientoSelect').value;
            var PriceRange = document.getElementById('PriceRange');
            var CategorySite = document.getElementById('CategorySite');
            var CategoryBusiness = document.getElementById('CategoryBusiness');
            
            if(Selectvalue == 'Alojamientos'){
                PriceRange.style.display = 'flex';
            }else{
                PriceRange.style.display = 'none';
            }
            
            if(Selectvalue == 'Sitios'){
                CategorySite.style.display = 'flex';
            }else{
                CategorySite.style.display = 'none';
            }

            if(Selectvalue == 'Negocios'){
                CategoryBusiness.style.display = 'flex';
            }else{
                CategoryBusiness.style.display = 'none';
            }
        });

        // Js para enviar la data de blogs a site details

        document.addEventListener('DOMContentLoaded', function() {
            // Js Para cargar la ubicacion al mapa.
            if (document.querySelector('.SiteCard')) {
                var sitios = document.querySelectorAll('.SiteCard');
        
                function handleMouseEnter(event) {
                    var lat = event.currentTarget.dataset.latitud;
                    var lon = event.currentTarget.dataset.longitud;
                    var mapa = document.getElementById('mapa');
        
                    var coordenadas = lat + "," + lon;
                    mapa.src = "https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&q=" + coordenadas + "&t=k&z=16&ie=UTF8&&iwloc=B&output=embed&ll=" + coordenadas;
                }
        
                Array.from(sitios).forEach(sitio => sitio.addEventListener('mouseenter', handleMouseEnter));
            }

            if (document.querySelector('.AlojaCard')) {
                var sitios = document.querySelectorAll('.AlojaCard');
        
                function handleMouseEnter(event) {
                    var lat = event.currentTarget.dataset.latitud;
                    var lon = event.currentTarget.dataset.longitud;
                    var mapa = document.getElementById('mapa');
        
                    var coordenadas = lat + "," + lon;
                    mapa.src = "https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&q=" + coordenadas + "&t=k&z=16&ie=UTF8&&iwloc=B&output=embed&ll=" + coordenadas;
                }
        
                Array.from(sitios).forEach(sitio => sitio.addEventListener('mouseenter', handleMouseEnter));
            }

            if (document.querySelector('.NegoCard')) {
                var sitios = document.querySelectorAll('.NegoCard');

                function handleMouseEnter(event) {
                    var lat = event.currentTarget.dataset.latitud;
                    var lon = event.currentTarget.dataset.longitud;
                    var mapa = document.getElementById('mapa');
        
                    var coordenadas = lat + "," + lon;
                    mapa.src = "https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&q=" + coordenadas + "&t=k&z=16&ie=UTF8&&iwloc=B&output=embed&ll=" + coordenadas;
                }
                Array.from(sitios).forEach(sitio => sitio.addEventListener('mouseenter', handleMouseEnter));
            }

            // Js para redirigir a site details

            // Encuentra el enlace y el formulario por sus identificadores
            var SiteEnviar = document.querySelectorAll('.SiteData');

            // Agrega un escuchador de eventos al enlace
            if(SiteEnviar != null){
                SiteEnviar.forEach((enviar)=>{
                    enviar.addEventListener('click', function() {
                        // Envía el formulario cuando se hace clic en el enlace
                        // Siteform.submit();
                        enviar.parentElement.submit();
                    });
                });
            }
            

            var AlojaEnviar = document.querySelectorAll('.AlojaData');
        
            // Agrega un escuchador de eventos al enlace
            if(AlojaEnviar != null){
                    AlojaEnviar.forEach((enviar)=>{
                        enviar.addEventListener('click', function() {
                            // Envía el formulario cuando se hace clic en el enlace
                            enviar.parentElement.submit();
                    });
                });
            } 
            
            var NegEnviar = document.querySelectorAll('.NegData');
        
            // Agrega un escuchador de eventos al enlace
            if(NegEnviar != null){
                    NegEnviar.forEach((enviar)=>{
                        enviar.addEventListener('click', function() {
                            // Envía el formulario cuando se hace clic en el enlace
                            enviar.parentElement.submit();
                    });
                });
            }
        });
        
    }

if (location.pathname === "/site-details") {

    document.querySelectorAll(".siteDetails__portada--images-image").forEach((showModal)=>{
        showModal.addEventListener("click", ()=>{
            document.querySelector(".Content__siteDetails--portada-allImages").classList.add("allImagesActive");
            document.querySelector("body").style.overflow = "hidden";
        })
    })

    document.querySelector(".Content__siteDetails--portada-mainImage").addEventListener("click", ()=>{
        document.querySelector(".Content__siteDetails--portada-allImages").classList.add("allImagesActive");
        document.querySelector("body").style.overflow = "hidden";
    })

    document.querySelector(".closeAllImages").addEventListener("click", ()=>{
        document.querySelector(".Content__siteDetails--portada-allImages").classList.remove("allImagesActive");
        document.querySelector("body").style.overflow = "initial";
    })

    document.querySelector(".Content__siteDetails--propertyAbout-button button").addEventListener("click", ()=>{
        document.querySelector(".Content__siteDetails--propertyAbout-body").classList.toggle("showText")
        document.querySelector(".Content__siteDetails--propertyAbout-button button")
        if (document.querySelector(".Content__siteDetails--propertyAbout-button button").innerText == "Mostrar más") {
            document.querySelector(".Content__siteDetails--propertyAbout-button button").innerText = "Mostrar menos";
        } else {
            document.querySelector(".Content__siteDetails--propertyAbout-button button").innerText = "Mostrar más";
        }
    })
    
    document.querySelector(".Content__siteDetails--placeEquipment-button button").addEventListener("click", ()=>{
        document.querySelector(".Content__siteDetails--placeEquipment-modal").classList.add("allEquipmentModalActive")
        document.querySelector("body").style.overflow = "hidden";
    })
    document.querySelector(".siteDetails__placeEquipment--allEquipments-title svg").addEventListener("click", ()=>{
        document.querySelector(".Content__siteDetails--placeEquipment-modal").classList.remove("allEquipmentModalActive")
        document.querySelector("body").style.overflow = "initial";
    })

}

if(location.pathname == "/page_events"){

}

if(location.pathname == "/faqs"){

    document.querySelectorAll(".accordion").forEach((button) => {
        button.addEventListener("click", () => {
            const isActive = button.nextElementSibling.classList.contains("panelActive");


            if (!isActive) {
                button.nextElementSibling.classList.add("panelActive");
                button.classList.add("buttonActive");
            } else {
                button.nextElementSibling.classList.remove("panelActive");
                button.classList.remove("buttonActive");
            }
        });
    });
}
    
    

    










