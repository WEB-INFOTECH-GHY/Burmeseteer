    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/project.init.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<script>

document.addEventListener("DOMContentLoaded", function(){

    if(window.innerWidth > 992){

        let saved = localStorage.getItem("sidebar_size") || "default";
        document.body.setAttribute("data-sidebar-size", saved);

    }

});

document.getElementById("togglemenu")?.addEventListener("click", function(){

    setTimeout(function(){

        localStorage.setItem(
            "sidebar_size",
            document.body.getAttribute("data-sidebar-size")
        );

    }, 300);

});

</script>

</body>
<!--end body-->

</html>
