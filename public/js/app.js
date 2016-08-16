$( document ).ready(function() {

  $(".form-toggle").click(function(){

    var id = $(this).attr("id");

    $("form#" + id).show();

    $(this).find('i').toggleClass('fa-chevron-circle-down fa-chevron-circle-up');

    $(".fa.fa-chevron-circle-up").click(function(){

      var id = $(this).attr("id");
      $("form#" + id).hide("fast");
      $(this).find('i').toggleClass('fa-chevron-circle-up fa-chevron-circle-down');
    });


  });

});
