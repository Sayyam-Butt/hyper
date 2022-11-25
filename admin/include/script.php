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