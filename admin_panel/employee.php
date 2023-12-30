<?php
require("shared/_nav.php")
?>
  <div class="login_background ">



    <div class="pt-5">
      <div class="container_serch">
        <div class="search-container">
          <input class="input" id="searchrecord" placeholder="Enter Search Name" type="text">
          <svg viewBox="0 0 24 24" class="search__icon">
            <g>
              <path
                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
              </path>
            </g>
          </svg>
        </div>
      </div>
    </div>
    <div class="containerscroll">
      <div class="table-responsive">
        <table class="table table-striped table-success table-hover">
          <thead>
            <tr>

              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Position</th>
              <th scope="col">Department</th>
              <th scope="col">Cnic</th>
              <th scope="col">Email</th>
              <th scope="col">Number</th>
              <th scope="col">Home_Address</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center"><i class="bi bi-trash3-fill text-danger"></i></td>
            </tr>
            <tr>
          </tbody>
        </table>

      </div>
    </div>
    <div class="p-4">
      <button class="btn-add" onclick="openPopup()" id="POPUP">
        <i class="bi bi-pencil-square fw-bold fs-5"></i>
      </button>
    </div>

    <div id="overlay"></div>
    <div id="employeeForm">
      <form class="form" id="employeeForm1">
        <div class="flex">
          <h3 class="ps-2">Insert Record</h3>
          <button class="POPUPCLOSE ms-5" onclick="closePopup()">
            <span class="X"></span>
            <span class="Y"></span>
            <div class="close">Close</div>
          </button>
        </div>

        <div class="flex">
          <label>
            <input required="" placeholder="" type="text" class="input" name="Emp_Id">
            <span>Employee_ID</span>
          </label>
          <label>
            <input required="" placeholder="" type="text" class="input" name="Emp_Name">
            <span>Name</span>
          </label>
        </div>
        <div class="flex">
          <label>
            <input required="" placeholder="" type="text" class="input" name="Emp_Department">
            <span>Department</span>
          </label>
          <label>
            <input required="" type="text" placeholder="" class="input" name="Emp_Position">
            <span>Position</span>
          </label>
        </div>
        <label>
          <input required="" type="number" placeholder="" class="input" name="Emp_Number">
          <span>Number</span>
        </label>
        <label>
          <input required="" type="number" placeholder="" class="input" name="Emp_Cnic_No">
          <span>Cnic</span>
        </label>
        <label>
          <input required="" type="email" placeholder="" class="input" name="Emp_Email">
          <span>Email</span>
        </label>
        <label>
          <input required="" type="text" placeholder="" class="input" name="Emp_Address">
          <span>Address</span>
        </label>

        <button class="fancy" id="submitBtn" type="button">
          <span class="top-key"></span>
          <span class="text">submit</span>
          <span class="bottom-key-1"></span>
          <span class="bottom-key-2"></span>
        </button>
        <p class="text-center text-info fw-bold" id="empmsg"></p>
      </form>
    </div>
  </div>
</body>
<script>
  function openPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("employeeForm").style.display = "block";
  }

  function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("employeeForm").style.display = "none";
  }

  $(document).ready(function () {



 // Function to fetch and display data
 function fetchData() {
        $.ajax({
            url: "emp/fetch_emp.php", // Replace with the actual path to your PHP file
            method: "GET",
            dataType: "json",
            success: function (data) {
                // Update the table with fetched data
                updateTable(data);
            }
        });
    }
    $("#searchrecord").keyup(function(){
                // let name =$("#searchName").val()
                let name =$(this).val()
                $.ajax({
                    url: "emp/searchName.php",
                    method: "post",
            dataType: "json",
                    data: { name:name },
                    success: function(data){
                      updateTable(data);
                    }
                })
            })

    // Function to update the table with data
    function updateTable(data) {
        // Clear existing table rows
        $("tbody").empty();

        // Loop through the data and append rows to the table
        $.each(data, function (index, item) {
            var row = $("<tr>")
                .append($("<td>").text(item.Emp_Id))
                .append($("<td>").text(item.Emp_Name))
                .append($("<td>").text(item.Emp_Position))
                .append($("<td>").text(item.Emp_Department))
                .append($("<td>").text(item.Emp_Cnic_No))
                .append($("<td>").text(item.Emp_Email))
                .append($("<td>").text(item.Emp_Number))
                .append($("<td>").text(item.Emp_Address))
                .append($("<td>").addClass("text-center delete-btn").attr("data-emp-id", item.id).html('<i class="bi bi-trash3-fill text-danger"></i>'));

            $("tbody").append(row);
        });
    }




   


    // Attach a click event to the delete button
    $(document).on("click", ".delete-btn", function () {
        var empId = $(this).data("emp-id");

        // Confirm before deleting
        if (confirm("Are you sure you want to delete this record?")) {
            // Call the delete API
            $.ajax({
                url: "emp/delete_emp.php",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({ Emp_Id: empId }),
                success: function (data) {
                    // Display the response message
                    alert(data);

                    // Fetch and display updated data
                    fetchData();
                },
                error: function (xhr, status, error) {
                    console.error("Error deleting record:", error);
                }
            });
        }
    });

    // Fetch and display data when the page loads
    fetchData();


    $("#submitBtn").click(function (e) {
      e.preventDefault();

      // Get form data
      let empId = $("input[name='Emp_Id']").val();
      let empName = $("input[name='Emp_Name']").val();
      let empDepartment = $("input[name='Emp_Department']").val();
      let empPosition = $("input[name='Emp_Position']").val();
      let empNumber = $("input[name='Emp_Number']").val();
      let empCnicNo = $("input[name='Emp_Cnic_No']").val();
      let empEmail = $("input[name='Emp_Email']").val();
      let empAddress = $("input[name='Emp_Address']").val();

      let employeeData = {
        Emp_Id: empId,
        Emp_Name: empName,
        Emp_Department: empDepartment,
        Emp_Position: empPosition,
        Emp_Number: empNumber,
        Emp_Cnic_No: empCnicNo,
        Emp_Email: empEmail,
        Emp_Address: empAddress
      };

      $.ajax({
        url: "emp/insert_emp.php",
        method: "POST",
        contentType: "application/json",  // Set the content type
        data: JSON.stringify(employeeData),
        success: function (data) {
          // Handle the response from the server
          let msg = data;
          fetchData();
          $("#empmsg").html(msg);
          $("#employeeForm1")[0].reset();
          // You may want to update the function name based on your needs

        }
      });

    });
    // Fetch and display data when the page loads
    fetchData();




  })

</script>

</html>

