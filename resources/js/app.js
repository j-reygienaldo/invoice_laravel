require('./bootstrap');

//    $('#courier_dropdown').on('change', function(){
//        var price = $(this).children('option:selected').data('fee');
//        $('#cour_fee').val(price);
//    });
//
//    $(function() {
//    $('#courier_dropdown').on('change', function(){
//        var price = $(this).data('courier_fee');
//        $('#cour_fee').val(price);
//    });
// });
//
// $('#courier_dropdown').change(function() {
//          var id = $(this).val();
//          var url = '{{ route("invoice_detail", ":id") }}';
//          url = url.replace(':id', id);
//
//          $.ajax({
//              url: url,
//              type: 'get',
//              dataType: 'json',
//              success: function(response) {
//                  if (response != null) {
//                      $('#cour_fee').val(response.courier_fee);
//                  }
//              }
//          });
//      });
