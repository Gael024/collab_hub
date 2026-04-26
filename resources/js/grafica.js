//const { data } = require("alpinejs");
import Chart from 'chart.js/auto';

function graficoUsuariosEdad(usuariosPorEdad){
    const labels_edad = usuariosPorEdad.map(item => item.rango_edad);
    const data_edad = usuariosPorEdad.map(item => item.total);

        new Chart(document.getElementById('grafica_usuarios_edad'), {
          type: 'pie',
          data: {
            labels: labels_edad,
            datasets: [{
                data: data_edad

            }]
        
        }
    });
}

function graficoUsuariosTipo(usuariosPorTipo){
    const labels_tipo = usuariosPorTipo.map(item => item.tipo);
    const data_tipo = usuariosPorTipo.map(item => item.total_usuarios_tipo);

        new Chart(document.getElementById('grafica_usuarios_tipo'), {
            type: 'pie',
            data: {
                labels: labels_tipo,
                datasets: [{
                    data: data_tipo
                }]
            }
        })
}

function graficoUsuarioSector(usuariosPorSector){
    const label_sector = usuariosPorSector.map(item => item.sector);
    const data_sector = usuariosPorSector.map(item => item.total_usuarios_sector);
    
    new Chart(document.getElementById('grafica_usuarios_sector'), {
        type: 'bar',
        data: {
            labels: label_sector,
            datasets: [{
                label: 'Usuarios por sector',
                data: data_sector
            }]
        }
    });
}

function graficoUsuarioProcedencia(usuariosPorProcedencia){
    const label_procedencia = usuariosPorProcedencia.map(item => item.procedencia);
    const data_procedencia = usuariosPorProcedencia.map(item => item.total_usuarios_procedencia);

    new Chart(document.getElementById('grafica_usuarios_procedencia'), {
        type: 'bar',
        data: {
            labels: label_procedencia,
            datasets: [{
                label: 'Procedencia de los usuarios',
                data: data_procedencia
            }]
        }
    });
}

function graficoUsuarioPais(usuariosPorPais){
    const label_pais = usuariosPorPais.map(item => item.pais);
    const data_pais = usuariosPorPais.map(item => item.total_usuarios_pais);

    new Chart(document.getElementById('grafica_usuarios_pais'), {
        type: 'doughnut',
        data: {
            labels: label_pais,
            datasets: [{
                data: data_pais
            }]
        }
    });
}

function graficoUsuarioReferencia(usuariosPorReferencia){
    const label_referencia = usuariosPorReferencia.map(item => item.referencia);
    const data_referencia = usuariosPorReferencia.map(item => item.total_usuarios_referencia);

    new Chart(document.getElementById('grafica_usuarios_referencia'), {
        type: 'bar',
        data: {
            labels: label_referencia,
            datasets: [{
                label: 'Medio por el que nos conocieron',
                data: data_referencia
            }]
        }
    });
}

function graficoUsuarioCaracteristicas(usuariosPorCaracteristica){
    const label_caracteristica = usuariosPorCaracteristica.map(item => item.carac_principal);
    const data_caracteristicas = usuariosPorCaracteristica.map(item => item.total_usuarios_caracteristica);

    new Chart(document.getElementById('grafica_usuarios_caracteristicas'), {
        type: 'doughnut',
        data: {
            labels: label_caracteristica,
            datasets: [{
                data: data_caracteristicas
            }]
        }
    });
}

function graficoTipoCaracteristica(radarCaracteristicas){
    new Chart(document.getElementById('grafica_tipo_contra_caracteristica'), {
        type: 'radar',
        data: radarCaracteristicas
    })

}

function graficoTipoReferencia(radarReferencias){
    new Chart(document.getElementById('grafica_tipo_contra_referencias'), {
        type: 'radar',
        data: radarReferencias
    });
}

//Inicializar graficos

window.iniciarGrafico = function(data) {
    if(data.usuariosPorEdad && data.usuariosPorEdad.length > 0){
        graficoUsuariosEdad(data.usuariosPorEdad);
    }
    
    if(data.usuariosPorTipo && data.usuariosPorTipo.length > 0){
        graficoUsuariosTipo(data.usuariosPorTipo);
    }

    if(data.usuariosPorSector && data.usuariosPorSector.length > 0){
        graficoUsuarioSector(data.usuariosPorSector);
    }
    
    if(data.usuariosPorProcedencia && data.usuariosPorProcedencia.length > 0){
        graficoUsuarioProcedencia(data.usuariosPorProcedencia);
    }

    if(data.usuariosPorPais && data.usuariosPorPais.length > 0){
        graficoUsuarioPais(data.usuariosPorPais);
    }

    if(data.usuariosPorReferencia && data.usuariosPorReferencia.length > 0){
        graficoUsuarioReferencia(data.usuariosPorReferencia);
    }

    if(data.usuariosPorCaracteristica && data.usuariosPorCaracteristica.length > 0){
        graficoUsuarioCaracteristicas(data.usuariosPorCaracteristica);
    }

    if(data.radarCaracteristicas && data.radarCaracteristicas.datasets && data.radarCaracteristicas.datasets.length > 0){
        graficoTipoCaracteristica(data.radarCaracteristicas);
    }

    if(data.radarReferencias && data.radarReferencias.datasets && data.radarReferencias.datasets.length > 0){
        graficoTipoReferencia(data.radarReferencias);
    }
    
}


document.addEventListener('DOMContentLoaded', () => {
    if (window.graficoData){
        window.iniciarGrafico(window.graficoData);
    }
});