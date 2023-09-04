const semester = document.getElementById("semester");
const ipk = document.getElementById("ipk");
const beasiswa = document.getElementById("beasiswa");
const reset = document.getElementById("reset");
const submit = document.getElementById("submit");
const berkas = document.getElementById("berkas");

// Selected semester tampilkan ipk
if (semester != null && semester != "") {
  // pilih semester
  semester.addEventListener("change", function () {
    // untuk aktikan input html ipk
    ipk.removeAttribute("disabled");
    ipk.focus();
  });
}

// // Saat pilih semester
$(document).ready(function () {
  $("#semester").change(function () {
    // Buat random ipk
    var min = 2.02,
      max = 4.0,
      highlightedNumber = Math.random() * (max - min) + min;
    // Parse float nomor menjadi 2 digit dibelakang koma
    $("#ipk").val(Number.parseFloat(highlightedNumber).toFixed(2));
    // Jika ipk diatas 3 dan dibawah atau sama dengan 4
    if ($("#ipk").val() >= "3" && $("#ipk").val() <= "4") {
      // tampilkan beasiswa, berkas dan aktifkan tombol submit
      $("#beasiswa").removeAttr("disabled");
      $("#berkas").removeAttr("disabled");
      $("#submit").removeAttr("disabled");
    }
  });
});

// tombol reset / batal untuk menonaktifkan pilihan beasiswa,
// ipk, berkas dan tombol submit
reset.addEventListener("click", function () {
  beasiswa.setAttribute("disabled", true);
  ipk.setAttribute("disabled", true);
  berkas.setAttribute("disabled", true);
  submit.setAttribute("disabled", true);
});
