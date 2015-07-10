$(document).ready(function(){
  $(".reject-appointment").click(function(){
    $("#id-mhs").val($(this).data('id-mhs'));
    $("#id-dosen").val($(this).data('id-dosen'));
  });
});