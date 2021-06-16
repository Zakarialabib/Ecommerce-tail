
<!-- Main JS -->
<script src="{{asset('assets/js/all.js')}}"></script>
<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@stack('scripts')

<script>
setTimeout(function(){
  $('.alert').slideUp();
},5000);
$(function() {
// ------------------------------------------------------- //
// Multi Level dropdowns
// ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");


    if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
    });

  });
});
</script>

