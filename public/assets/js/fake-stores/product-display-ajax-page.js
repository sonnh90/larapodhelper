/*** Action when clicking to "a" element - OK */
/***
  $(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        const url = $(this).attr('href');

        // Fetch the new page via AJAX
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#product-list').html(data); // Update the product list
            },
            error: function () {
                alert('Failed to load products.');
            }
        });
    });
});

**/


/** Action when clicking to "li" item */
$(document).ready( function(){

    // Select pagination item
    const paginationItemSelector = 'ul.pagination li.page-item';

    $(document).on('click', paginationItemSelector, function (e){
        e.preventDefault();

        let attrItem = $(this).children('a.page-link');
        let url = attrItem.attr('href');

        // Fetch the new page via AJAX
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#product-list').html(data); // Update the product list
            },
            error: function () {
                alert('Failed to load products.');
            }
        });
    } );
});
 