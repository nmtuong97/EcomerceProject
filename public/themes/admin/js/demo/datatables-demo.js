// Call the dataTables jQuery plugin
$(document).ready(function() {
//  $('#dataTable').DataTable();
   var table = $('#dataTable').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  
});
