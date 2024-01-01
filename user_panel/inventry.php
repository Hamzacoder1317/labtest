<?php
require("shared/_nav.php")
?>
       
     
    </div>
  </nav>
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
            <tr>

  
              <th scope="col">Equipment_Name</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Serial</th>
              <th scope="col">Specification</th>
     
            </tr>
          </thead>
          <tbody class="p_mobile">
         
          </tbody>
        </table>

      </div>
    </div>

  
  
   
  </div>
</body>
<script>


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
            $("tbody").append(row);
        });
    }

   
    fetchData();




  })

</script>

</html>











