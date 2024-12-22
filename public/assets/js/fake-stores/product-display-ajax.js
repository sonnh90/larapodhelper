$(document).ready(function (){
   let page = 1;

   // 1. Display the first set of products when the page loads
    $('div#loading-spinner').show();
    $('button#load-more').prop('disabled', true);
    $('button#load-more').attr('style','background-color:#808080;');

   $.ajax({
        url: 'fake-store-products-display/fetch',
        type: 'GET',
        data: {page: 1 },
        success: function (data){
            if( data.length > 0 ){
                data.forEach( function (product) {
                    const productHtml = `
                        <div class="col-md-4 product-item">
                            <div class="card h-100 shadow-sm">
                                <img src="${product.image || 'https://via.placeholder.com/150' }" class="card-img-top" alt="${product.title}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.title}</h5>
                                    <h6 class="card-text">Category: ${product.category}</h6>
                                    <p class="card-text text-muted">${product.description || 'No description available'}</p>
                                    <h6 class="text-primary">$${product.price.toFixed(2)}</h6>
                                    <button class="buy-item btn btn-primary mt-3">Buy Now</button>
                                </div>
                            </div>
                        </div>    
                    `;

                    // Append new product item HTML Data to #product-list container
                    // $('#product-list').append( productHtml );
                    const $newProduct = $(productHtml).appendTo('#product-list');
                    // Fade in effect for product item display
                    // $('div.product-item:last').fadeIn(500);
                    setTimeout( ()=> $newProduct.addClass('fade-in'), 10 );
                });
            } 
        },
        error: function () {
            alert( 'Failed to load products' );
        },
        complete : function () {
            // Hide spinner when complete loading the 1st data set
            $('div#loading-spinner').hide();
            // Re-enable the "load more" button for further loading
            $('button#load-more').prop('disabled', false);
            $('button#load-more').attr('style','background-color:#007bff;');
        }
   });//End of first AJAX call for loading initial set of products
   
   // 2. Load more products on button click
   $('button#load-more').on('click', function(){
    page++;

    $('div#loading-spinner').show();
    $('button#load-more').prop('disabled', true);
    $('button#load-more').attr('style','background-color:#808080;');

    $.ajax({
        url: 'fake-store-products-display/fetch',
        type: 'GET',
        data: {page:page},
        success: function (data){
            if( data.length > 0 ){
                data.forEach( function (product) {
                    const productHtml = `
                        <div class="col-md-4 product-item">
                            <div class="card h-100 shadow-sm">
                                <img src="${product.image || 'https://via.placeholder.com/150' }" class="card-img-top" alt="${product.title}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.title}</h5>
                                    <h6 class="card-text">Category: ${product.category}</h6>
                                    <p class="card-text text-muted">${product.description || 'No description available'}</p>
                                    <h6 class="text-primary">$${product.price.toFixed(2)}</h6>
                                    <button class="buy-item btn btn-primary mt-3">Buy Now</button>
                                </div>
                            </div>
                        </div>    
                    `;

                    // Append new product item HTML Data to #product-list container
                    // $('#product-list').append( productHtml );
                    const $newProduct = $(productHtml).appendTo('#product-list');
                    // Fade in effect for product item display
                    // $('div.product-item:last').fadeIn(500);
                    setTimeout( ()=> $newProduct.addClass('fade-in'), 10 );
                });

                // Re-enable the "load more" button for further loading
                $('button#load-more').prop('disabled', false);
                $('button#load-more').attr('style','background-color:#007bff;');
            } 
            else {
                // Hide the button if no more products are available
                // $('button#load-more').hide();                

                // Disable the button if no more data to be loaded
                $('button#load-more').text('No more data');
                $('button#load-more').prop('disabled', true);
                $('button#load-more').attr('style','background-color:#808080;');
            }
        },
        error: function () {
            alert( 'Failed to load products .' );
        }, 
        complete: function() {
            // Hide spinner when complete loading current requested data set
            $('div#loading-spinner').hide();
        }
    });//End of AJAX call

    });// End of "click" event handling for "load more" button
});