$( document ).on( "click", "form.ajax :submit", function(event) {
    alert( "Goodbye!" );
    event.preventDefault();
});