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
  
 

  $("#location_dropdown").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
  $("#from_date").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
  
   $("#to_date").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
  $("#created_by_dropdown").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    var selected_created_by_dropdown = $("#created_by_dropdown").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date,
      selected_created_by_dropdown:selected_created_by_dropdown
    });
  });

  $("#experience_dropdown").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });

  $("#task_dropdown").change(function () {
   var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });

  $("#name_dropdown").change(function () {
   var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });

  $("#number_dropdown").change(function () {
   var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });

  $("#call_status_dropdown").change(function () {
   var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
  
    $("#age_dropdown").change(function () {
   var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
  
   $("#religion_dropdown").change(function () {
    var selected_location = $("#location_dropdown").val();
    var selected_experience = $("#experience_dropdown").val();
    var selected_task = $("#task_dropdown").val();
    var selected_name = $("#name_dropdown").val();
    var selected_number = $("#number_dropdown").val();
    var selected_call_status = $("#call_status_dropdown").val();
    var selected_age = $("#age_dropdown").val();
    var selected_religion = $("#religion_dropdown").val();
    var selected_from_date = $("#from_date").val();
    var selected_to_date = $("#to_date").val();
    $("#ajaxdata").load("filter.php", {
      selected_experience: selected_experience,
      selected_location: selected_location,
      selected_task: selected_task,
      selected_name: selected_name,
      selected_number: selected_number,
      selected_call_status: selected_call_status,
      selected_age:selected_age,
      selected_religion:selected_religion,
      selected_from_date:selected_from_date,
      selected_to_date:selected_to_date
    });
  });
  
//     $("#inc").change(function () {
//     var selected_location = $("#location_dropdown").val();
//     var selected_experience = $("#experience_dropdown").val();
//     var selected_task = $("#task_dropdown").val();
//     var selected_name = $("#name_dropdown").val();
//     var selected_number = $("#number_dropdown").val();
//     var button_inc = $("#inc").val();
//     $("#ajaxdata").load("filter.php", {
//       selected_experience: selected_experience,
//       selected_location: selected_location,
//       selected_task: selected_task,
//       selected_name: selected_name,
//       selected_number: selected_number,
//       button_inc: button_inc,
//     });
//   });

  $("#refresh").click(function () {
    $("#ajaxdata").load("allrecords.php");
  });
});
