      <!-- plugin js -->
      <script src="assets/js/vendor/dropzone.min.js"></script>
        <!-- init js -->
        <script src="assets/js/ui/component.fileupload.js"></script>
      <!-- bundle -->
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/js/app.min.js"></script>
      <!-- third party js -->
      <script src="assets/js/vendor/apexcharts.min.js"></script>
      <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
      <!-- third party js ends -->
      <!-- demo app -->
      <script src="assets/js/pages/demo.dashboard.js"></script>
      <!-- end demo js-->
      <script src="assets/js/custom.js"></script>
      <!-- plugin js -->
       <script src="assets/js/vendor/summernote-bs4.min.js"></script>
       <!-- Summernote demo -->
       <script src="assets/js/pages/demo.summernote.js"></script>
       <script>
            $(document).ready(function() {
            $('#summernote').summernote();
             });   
       </script>
       <!-- Select2 -->
       <script>
         $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
          });
       </script>
        <script>
               $(document).ready(function() {
            $('#category-dropdown').on('change', function() {
                  var category_id = this.value;
                  $.ajax({
                     url: "get-subcat.php",
                     type: "POST",
                     data: {
                        category_id: category_id
                     },
                     cache: false,
                     success: function(result){
                        $("#sub-category-dropdown").html(result);
                     }
                  });
            });
         });
        </script>
        

    <script>
       // Live Search for blog
     $("#searchblog").on("keyup",function(){
       var search_term = $(this).val();
       $.ajax({
         url: "ajax-search-blog.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data-blog").html(data);
         }
       });
     });
    </script>



    <script>
       // Live Search for cat
     $("#searchcat").on("keyup",function(){
       var search_term = $(this).val();
       $.ajax({
         url: "ajax-search-cat.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data-cat").html(data);
         }
       });
     });
    </script>
    <script>
       // Live Search for Subcat
     $("#searchsubcat").on("keyup",function(){
       var search_term = $(this).val();
       $.ajax({
         url: "ajax-search-subcat.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data-subcat").html(data);
         }
       });
     });
    </script>
    <script>
       // Live Search for tag
     $("#searchtag").on("keyup",function(){
       var search_term = $(this).val();
       $.ajax({
         url: "ajax-search-tag.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data-tag").html(data);
         }
       });
     });
    </script>
    <script>
       // Live Search for faq
     $("#searchfaq").on("keyup",function(){
       var search_term = $(this).val();
       $.ajax({
         url: "ajax-search-faq.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data-faq").html(data);
         }
       });
     });
    </script>

 