$(document).ready(function(){

/********** ADD BOOK FORM ***************/
    $("#closeao").click(function(){
        $("#bookform").modal('hide');
    });
    $("#addbook").click(function(){
        $("#bookform").modal('show');
    });

/*********** BOOK INFO ***********************/
    $("#closebi").click(function(){
        $("#bookinfo").modal('hide');
    });
    $("#bookinf").click(function(){
        $("#bookinfo").modal('show');
    });

/*********** UPDATE BOOK INFO ***********************/
    $("#editbook").click(function(){
        $("#updatebookinfo").modal('show');
    });

    $("#closeubi").click(function(){
        $("#updatebookinfo").modal('hide');
    });
});

