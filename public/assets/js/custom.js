// pre-loader js code
$(window).on('load', function(){
    $('#preloader').fadeOut('slow');
});


// textbox will accept letters and space only
var input;
// function keypress, letters only
var let_keypress = function(input){
     $(input).each(
        function(){
            $(this).keypress(function (e){
                var regex = new RegExp(/^[a-zA-Z\s\uFEFF\xA0]+|[a-zA-Z\s\uFEFF\xA0]+$/g, '');
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if(regex.test(str)){
                    return input;
                }else{
                    e.preventDefault();
                    return input;
                }
            });
        }
    );
    $(document).ready(function(){
        $(input).bind("cut copy paste",function(e){
            e.preventDefault();
        });
    });
};

// call the function
$(document).ready(function(){
    let_keypress('#txtFname');
});
// x



