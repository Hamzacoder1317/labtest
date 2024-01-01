<?php
require("shared/_nav.php");

?>
       
  <div class="login_background ">



    <div class="pt-5">
      <div class="container_serch">
        <div class="search-container">
          <input class="input" id="searchrecord" placeholder="Enter Search Equipment_Name" class="p_mobile" type="text">
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
          <thead class="p_mobile">
            <tr >

  
              <th scope="col">Equipment_Name</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Serial</th>
              <th scope="col">Specification</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody class="p_mobile">
         
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
    <div id="inventryForm">
      <form class="form" id="inventryForm1">
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
            <input required="" placeholder="" type="text" class="input" name="Equipment_Name">
            <span>Equipment_Name</span>
          </label>
          <label>
            <input required="" placeholder="" type="text" class="input" name="Make">
            <span>Make</span>
          </label>
        </div>
        <div class="flex">
          <label>
            <input required="" placeholder="" type="text" class="input" name="Model">
            <span>Model</span>
          </label>
          <label>
            <input required="" type="text" placeholder="" class="input" name="Serial">
            <span>Serial</span>
          </label>
        </div>
        <label>
          <input required="" type="text" placeholder="" class="input" name="Specification">
          <span>Specification</span>
        </label>

        <button class="fancy" id="submitBtn" type="button">
          <span class="top-key"></span>
          <span class="text">submit</span>
          <span class="bottom-key-1"></span>
          <span class="bottom-key-2"></span>
        </button>
        <p class="text-center text-info fw-bold" id="invmsg"></p>
      </form>
    </div>
  </div>
</body>
<script>
  function openPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("inventryForm").style.display = "block";
  }

  function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("inventryForm").style.display = "none";
  }

  $(document).ready(function () {



 // Function to fetch and display data
 function fetchData() {
        $.ajax({
            url: "inv/fetch_inv.php", // Replace with the actual path to your PHP file
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
                    url: "inv/searchName.php",
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
                .append($("<td>").text(item.inv_Equipment_Name))
                .append($("<td>").text(item.inv_Make))
                .append($("<td>").text(item.inv_Model))
                .append($("<td>").text(item.inv_Serial))
                .append($("<td>").text(item.inv_Specification))


                .append($("<td>").addClass("text-center delete-btn").attr("data-inv-id", item.id).html('<i class="bi bi-trash3-fill text-danger"></i>'));

            $("tbody").append(row);
        });
    }




   


    // Attach a click event to the delete button
    $(document).on("click", ".delete-btn", function () {
        var invId = $(this).data("inv-id");

        // Confirm before deleting
        if (confirm("Are you sure you want to delete this record?")) {
            // Call the delete API
            $.ajax({
                url: "inv/delete_inv.php",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({ inv_Id: invId }),
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
      let inv_Equipment_Name = $("input[name='Equipment_Name']").val();
      let inv_Make = $("input[name='Make']").val();
      let inv_Model = $("input[name='Model']").val();
      let inv_Serial = $("input[name='Serial']").val();
      let inv_Specification = $("input[name='Specification']").val();
     

      let inventryData = {
        inv_Equipment_Name: inv_Equipment_Name,
        inv_Make: inv_Make,
        inv_Model: inv_Model,
        inv_Serial: inv_Serial,
        inv_Specification: inv_Specification,
      
      };

      $.ajax({
        url: "inv/insert_inv.php",
        method: "POST",
        contentType: "application/json",  // Set the content type
        data: JSON.stringify(inventryData),
        success: function (data) {
          // Handle the response from the server
          let msg = data;
          fetchData();
          $("#invmsg").html(msg);
          $("#inventryForm1")[0].reset();
          // You may want to update the function name based on your needs

        }
      });

    });
    // Fetch and display data when the page loads
    fetchData();




  })

</script>

</html>











