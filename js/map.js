document.addEventListener('DOMContentLoaded', () => {
    // Inicializa o mapa com uma localização genérica e nível de zoom
    const map = L.map('map').setView([-13.0025, -38.5267], 13);

    // Adiciona o tile layer do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Verifica se a geolocalização é suportada pelo navegador
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLat = position.coords.latitude; // Latitude
                const userLng = position.coords.longitude; // Longitude
                const accuracy = position.coords.accuracy; // Precisão em metros

                // Move o mapa para a localização precisa do usuário
                map.setView([userLat, userLng], 13);

                // Adiciona o marcador da localização do usuário
                L.marker([userLat, userLng])
                    .addTo(map)
                    .bindPopup(`Você está aqui! <br> Precisão: ${Math.round(accuracy)} metros.`)
                    .openPopup();
            },
            (error) => {
                console.error('Erro ao obter localização: ', error);
                alert('Erro ao obter sua localização. Verifique suas permissões ou configuração do navegador.');
            },
            { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 } // Configurações para maior precisão
        );
    } else {
        alert('Geolocalização não é suportada pelo seu navegador.');
    }
});
