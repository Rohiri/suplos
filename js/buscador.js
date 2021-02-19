
$(document).ready(function () {

        $("#submitButton").click(() => {

        	$("#div_results_search").html('');
        	$("#length_results").html('');

        	$.ajax({
                url: './data/index',
                type: 'get',
                dataType: 'json',
                data: {
                	city: $('#selectCiudad').val(),
                	type: $('#selecTipo').val()
                }
            })
            .done(function(data, textStatus, jqXHR) {
            	$("#length_results").html(data.total_real_states);

            	const resultados = Object.entries(data.real_states);
            	resultados.forEach(result => render(result, "#div_results_search"))
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
            })
            .always(function(data, textStatus, jqXHR) {
            });

    });

    const render = (result, div) => {

    	$(div).append(`
	    <div class="div_resultado">
	        <div class="div_resultado_img">
	            <img width="100%" src="img/home.jpg" alt="Result">
	        </div>
	        <div class="div_resultado_informacion">
	            <ul class="ul_info_result">
	                <li>Dirección: <span>${result[1].Direccion}</span></li>
	                <li>Ciudad: <span>${result[1].Ciudad}</span></li>
	                <li>Teléfono: <span>${result[1].Telefono}</span></li>
	                <li>Código Postal: <span>${result[1].Codigo_Postal}</span></li>
	                <li>Tipo: <span>${result[1].Tipo}</span></li>
	                <li>Precio: <span>${result[1].Precio}</span></li>
	            </ul>
	            <button class="btn-green btn_delete" data-real="${result[1].Id}">
	                    GUARDAR
	            </button>
	        </div>
	    </div>
	    `);
	}

});