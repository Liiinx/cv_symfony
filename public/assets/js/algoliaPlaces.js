(function() {
    let placesAutocomplete = places({
        appId: 'plQ1BX7SHJR4',
        apiKey: '9241b4c7a2a45e02268e191071cf6969',
        container: document.querySelector('#about_address'),
    //     templates: {
    //         value: function (suggestion) {
    //             return suggestion.name;
    //         }
    //     }
    // }).configure({
    //     type: 'address'
    });
    placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#about_lat').value = e.suggestion.latlng.lat || '';
        document.querySelector('#about_lng').value = e.suggestion.latlng.lng || '';
    });
})();