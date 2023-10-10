$(document).ready(function () {
  $(function () {
    $("#inputNgaySinh").datepicker({
      dateFormat: "dd-mm-yy"
    });
  });

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  HienThiSoHocVienDuocChon();
  HienThiSoLopHocDuocChon();
  toggleDKLopHocButton();

  // Kiểm tra checkbox master của học viên
  $("#chbChonTatCaHocVien").change(function () {
    if ($(this).prop('checked') == true) {
      $(".hocvien-check-input").prop('checked', true);
    }
    else {
      $(".hocvien-check-input").prop('checked', false);
    }

    setDSMaHocVien();
  });

  // Kiểm tra checkbox master của lớp học
  $("#chbChonTatCaLopHoc").change(function () {
    if ($(this).prop('checked') == true) {
      $(".lophoc-check-input").prop('checked', true);
    }
    else {
      $(".lophoc-check-input").prop('checked', false);
    }

    TinhTongHocPhi();
    setDSMaLopHoc();
  });

  // Kiểm tra sự kiện "check" của các lớp checkbox học viên
  $(".hocvien-check-input").change(function () {
    let checkedAll = true;
    let countHocVien = 0;
    $(".hocvien-check-input").each(function () {
      if (checkedAll == true && checkedAll != $(this).prop('checked')) {
        checkedAll = false;
      }

      if ($(this).prop('checked') == true) {
        countHocVien++;
      }
    });

    $("#chbChonTatCaHocVien").prop('checked', checkedAll);

    //Tính số học viên được chọn
    setDSMaHocVien();
  });
  
  // Kiểm tra sự kiện "check" của các lớp checkbox lớp học
  $(".lophoc-check-input").change(function () {
    let checkedAll = true;
    let countLopHoc = 0;

    $(".lophoc-check-input").each(function () {
      if (checkedAll == true && checkedAll != $(this).prop('checked')) {
        checkedAll = false;
      }

      if ($(this).prop('checked') == true) {
        countLopHoc++;
      }
    });

    $("#chbChonTatCaLopHoc").prop('checked', checkedAll);

    //Tính số lop học được chọn
    TinhTongHocPhi();
    setDSMaLopHoc();
  });
  



  $('.custom-list-item').on('mouseenter', function(){
      $(this).find('.delete-button').css('visibility', 'visible');
  }).on('mouseleave', function(){
    $(this).find('.delete-button').css('visibility', 'hidden');
  });


  //Lớp học
  $("#inputHinhAnh").change(function(){
    let file = this.files[0];

    if (file) {
      let reader = new FileReader();

      reader.onload = function (e) {
          $('#HinhAnh').attr('src', e.target.result);
      }

      reader.readAsDataURL(file);
  }

  });

  $("form").on("submit", function(){
    toggleLoadingScreen(true);
  });

});

function setDSMaHocVien(){
    let dsMaHocVien = [];
    let dsMaHocVienKhongDK = [];

    $(".hocvien-check-input").each(function(){
      if($(this).prop('checked')){
        dsMaHocVien.push($(this).val()); 
      }else{
        dsMaHocVienKhongDK.push($(this).val()); 
      }
    });
    
    $("#inputDSMaHocVien").val(dsMaHocVien);
    $("#inputDSMaHocVienKhongDK").val(dsMaHocVienKhongDK);

    HienThiSoHocVienDuocChon();
    toggleDKLopHocButton();
}

function setDSMaLopHoc(){
  let dsMaLopHoc = [];
  let dsMaLopHocKhongDK = [];

  $(".lophoc-check-input").each(function(){
    if($(this).prop('checked')){
      dsMaLopHoc.push($(this).val()); 
    }else{
      dsMaLopHocKhongDK.push($(this).val()); 
    }
  });
  
  $("#inputDSMaLopHoc").val(dsMaLopHoc);
  $("#inputDSMaLopHocKhongDK").val(dsMaLopHocKhongDK);
  HienThiSoLopHocDuocChon();
  toggleDKLopHocButton();
}

function toggleDKLopHocButton(){
  // if($("#inputDSMaHocVien").val() != "" && $("#inputDSMaLopHoc").val() != ""){
  //   $("#btnDKLopHoc").prop('disabled', false)
  // }else{
  //   $("#btnDKLopHoc").prop('disabled', true)
  // }
}

function HienThiSoHocVienDuocChon() {
  let checked = $(".hocvien-check-input:checked").length;
  let total = $(".hocvien-check-input").length;
  $("#tongSoHocVienChon").text(checked + "/" + total);
}

function HienThiSoLopHocDuocChon() {
  let checked = $(".lophoc-check-input:checked").length;
  let total = $(".lophoc-check-input").length;
  $("#tongSoLopHocChon").text(checked + "/" + total);
}

function TinhTongHocPhi() {
  let tongHocPhi = 0;

  $(".lophoc-check-input").each(function () {
    if ($(this).prop('checked') == true) {
      tongHocPhi += parseInt($(this).attr("hocphi-lophoc"));
    }

    $("#TongHocPhi").text(formatVND(tongHocPhi));
  });
}

function formatVND(number) {
  let vnd = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
  });

  return vnd.format(number)
}


function showToast(headerMsg, message, isError = false, delay = 5000) {
  var type = "toast-header-success";
  if (isError == true) {
    type = "toast-header-error";
  }

  var toast = $("<div id='customToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-animation='true' data-bs-autohide='true' data-bs-delay='" + delay + "'><div class='toast-header " + type + "'><strong class='me-auto'>" + headerMsg + "</strong><small class='text-muted'></small><button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button></div><div class='toast-body'>" + message + "</div></div>");
  $(".toast-container").append(toast);    

  var myAlert = document.getElementById('customToast'); 
  var bsAlert = new bootstrap.Toast(myAlert);
  bsAlert.show();
}

function confirmBeforeRedirect(href, message){
  if (confirm(message) == true) {
    toggleLoadingScreen();
    window.location.assign(href);
    
  }
}

function toggleLoadingScreen(show=true){
  if(show==true){
    $("#loading-div").removeClass("d-none").addClass("d-flex");
    $("body").addClass("stop-scrolling");
  }
  else{
    $("#loading-div").removeClass("d-flex").addClass("d-none");
    $("body").removeClass("stop-scrolling");
  }
}


