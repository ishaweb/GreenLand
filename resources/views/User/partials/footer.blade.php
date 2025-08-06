<footer>
  <div class="container-fluid footer-wrapper">
    
    <div id="footer-col">
      <h3>Company</h3>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Our Services</a></li>
        <li><a href="#">Our Team</a></li>
      </ul>
    </div>

    <div id="footer-col">
      <h3>Get Help</h3>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Join Us</a></li>
      </ul>
    </div>

    <div id="footer-col">
      <h3>Follow Us</h3>
      <div class="social-interact">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class="bx bxl-twitter"></i></a>
        <a href="#"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

  </div>
</footer>

    <!-- index js -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/JS/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    @yield('Cart-scripts')
    @yield("project_scripts")
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
    <script src="{{ asset('assets/JS/index.js') }}"></script>
    </body>
    </html>
