$(document).ready(function(){
  $(".view-schedule").click(function(){
    $("#nama-dosen1").text($(this).data('name'));
    var id = $(this).data('id');

    $.get(base_url + "teachers/get_schedule_detail/" + id, function(res){
      var parent = $("#list-jadwal");
      var str = "";

      for(var i=0; i < res.length; i++){
        str += '<li class="list-group-item col-md-12">' + res[i].judul;
        str += ' (<em>Jam: <b>'+ res[i].jam_mulai +' - ' + res[i].jam_selesai + '</b>';
        str += ' di <b>' + res[i].tempat + '</b></em>)</li>';
      }
      parent.html(str);
    }, 'json');
  });

  $(".view-detail").click(function(){
    $("#nama-dosen2").text($(this).data('name'));
    var id = $(this).data('id');

    $.get(base_url + "teachers/get_detail/" + id, function(res){
      var parent = $("#detail-dosen");
      var str = "";

      str += '<div class="form-group"><label>Keterangan</label> <label class="form-control">' + res.keterangan + '</div>';
      str += '<div class="form-group"><label>Email</label> <label class="form-control">' + res.email + '</div>';
      str += '<div class="form-group"><label>No. Telp</label> <label class="form-control">' + res.no_telp + '</div>';
      str += '<div class="form-group"><label>Alamat</label> <label class="form-control">' + res.alamat + '</div>';
      str += '<div class="form-group"><label>Facebook</label> <label class="form-control">' + res.facebook + '</div>';
      str += '<div class="form-group"><label>Twitter</label> <label class="form-control">' + res.twitter + '</div>';
      parent.html(str);
    }, 'json');
  });
});