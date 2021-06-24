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

$("#from_date").change(function () {
   var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });
  
  $("#to_date").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });

  $("#name_dropdown").change(function () {
   var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });

  $("#number_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });

  $("#agent_dropdown").change(function () {
   var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });

  $("#status_dropdown").change(function () {
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_agent = $("#agent_dropdown").val();
    var selected_status = $("#status_dropdown").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_name: selected_name,
      selected_number: selected_number,
      selected_agent: selected_agent,
      selected_status: selected_status,
      from_date: from_date,
      to_date: to_date,
    });
  });

  $("#refresh").click(function () {
    $("#ajaxdata").load("allrecords.php");
  });
});
