$ = jQuery.noConflict();

$(document).ready( function(){

    $('.js-save-question').hide();
    $('#added-answers').hide();
    $('[data-parsley-question]').parsley();
    $('[data-parsley-answer]').parsley();

});

$(window).load( function() {

    $('.js-add-answer-row').click( function( e ){
        e.preventDefault();

        if( ! $('[data-parsley-answer]').parsley().validate() ) return;

        addAnswer( $('#new-answer').val() );
        if( $('.current-answers li').length > 0 ) $('#added-answers').show();

        if( $('.current-answers li').length > 1 ) $('.js-save-question').show();

        $('#new-answer').val('').focus();
    });

});



function addAnswer( answer ){
    var currentAnswer = $('.current-answers li').length + 1;
    var inputHTML = '<input type="hidden" name="answers[]" value="' + answer + '">'
    $('#added-answers form').append( inputHTML );
    $('.current-answers').append('<li>' + answer + '</li>');
}
