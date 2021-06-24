$(document).ready(function () {
  // 			$("#ajaxdata").load("allrecords.php");
  $("#ajaxdata").load("filter.php?page=1");
  $(".page-link").click(function () {
    var id = $(this).attr("data-id");
    var select_id = $(this).parent().attr("id");
    $.ajax({
      url: "filter.php",
      type: "GET",
      data: {
        page: id,
      },
      cache: false,
      success: function (dataResult) {
        $("#ajaxdata").html(dataResult);
        $(".pageitem").removeClass("active");
        $("#" + select_id).addClass("active");
      },
    });
  });

  $("#name_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var selected_pending = $("#pending_dropdown").val();

    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_status: selected_status,
      selected_pending: selected_pending,
    });
  });

  $("#number_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var selected_pending = $("#pending_dropdown").val();

    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_status: selected_status,
      selected_pending: selected_pending,
    });
  });

  $("#status_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var selected_pending = $("#pending_dropdown").val();

    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_status: selected_status,
      selected_pending: selected_pending,
    });
  });

  $("#pending_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var selected_pending = $("#pending_dropdown").val();

    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_status: selected_status,
      selected_pending: selected_pending,
    });
  });

  $("#refresh").click(function () {
    $("#ajaxdata").load("allrecords.php");
  });
});
