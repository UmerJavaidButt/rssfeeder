
function submitForm(id){
	$("#"+id).submit();
}

$(function() {

  $('#datefilter').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
      $('#from_date').val(picker.startDate.format('YYYY-MM-DD'));
      $('#to_date').val(picker.endDate.format('YYYY-MM-DD'));
      $('#filterForm').submit();
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
// $( ".sidenav_link" ).click(function() {
//   $( ".form" ).submit();
// });