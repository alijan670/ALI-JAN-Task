jQuery(document).ready(function($) {
    $.ajax({
        url: syncData.apiUrl,
        method: 'GET',
        success: function(response) {
            response.forEach(product => {
                $.ajax({
                    url: '/wp-json/wc/v3/products',
                    method: 'POST',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-WP-Nonce', syncData.nonce);
                    },
                    data: {
                        name: product.name,
                        stock_quantity: product.quantity
                    },
                    success: function() {
                        console.log('Stock updated for ' + product.name);
                    }
                });
            });
        },
        error: function(error) {
            console.error('Error fetching stock levels from Laravel:', error);
        }
    });
});
