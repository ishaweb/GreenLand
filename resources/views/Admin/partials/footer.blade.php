             <footer class="footer">
                 <div class="container-fluid">
                     <div class="row text-body-secondary">
                         <div class="col-6 text-start">
                             <a href="" class="text-body-secondary">
                                 <strong>Green Heaven LandScape</strong>
                             </a>
                         </div>
                     </div>
                 </div>
             </footer>
             </div>
             </div>
             </body>
             <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                 crossorigin="anonymous"></script>
             <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
                 integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
             </script>

             @yield('ChartJs')

             <script>
                 // loader 
                 $(window).on('load', function() {
                     $(".loader").fadeOut(1000);
                 });

                 // On any form submission
                 $('form').on('submit', function() {
                     $(".loader").fadeIn();
                 });
             </script>

             <script src="{{ asset('Admin/Js/index.js') }}"></script>

             </html>
