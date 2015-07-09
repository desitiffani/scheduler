$(document).ready(function(){
  $(".user-role").change(function(){
    if($(this).is(":checked")){
      if($(this).val() == 'mhs'){
        $(".field-jurusan").show();
        $(".field-perguruan-tinggi").show();
        $(".field-jurusan").find('input').attr('required', 'required');
        $(".field-perguruan-tinggi").find('input, select').attr('required', 'required');
        $(".field-keterangan").hide();
      }else{
        $(".field-jurusan").hide();
        $(".field-perguruan-tinggi").hide();
        $(".field-jurusan").find('input').removeAttr('required');
        $(".field-perguruan-tinggi").find('input, select').removeAttr('required');
        $(".field-keterangan").show();
      }
    }
  });
});