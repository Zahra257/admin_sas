 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable({
             "paging": true,
             "scrollY": 'auto', // Enable auto vertical scrolling
             "scrollCollapse": true, // Collapse the table to fit content
             "searching": true,
             "pageLength": 6, // Set pagination to display 10 rows per page
             "lengthChange": false // Hide the "Entries per page" dropdown
         });

     });
 </script>
