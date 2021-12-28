$(document).ready(function () {
  $("#example").DataTable({
    dom: "Bfrtip",
    lengthChange: false,
    lengthMenu: [
      [10, 25, 50, -1],
      ["10", "25", "50", "All"],
    ],
    buttons: ["pageLength", "copy", "csv", "excel", "pdf", "print"],

    pagingType: "numbers",

    initComplete: function () {
      this.api()
        .columns()
        .every(function () {
          var column = this;
          var select = $('<select><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());

              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });
    },
  });
});

function ubahstatus(value) {
  if (value == true) value = "ON";
  else value = "OFF";

  document.getElementById("status").innerHTML = value;

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //ambil respon web
      document.getElementById("status").innerHTML = xmlhttp.responseText;
    }
  };
  //jalankan file php rubah nilai
  xmlhttp.open("GET", "relay.php?stat=" + value, true);
  xmlhttp.send();
}
