<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eBUPF</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/BU-logo.png') }}" type="image/x-icon">


    {{-- DATA TABLE .NET --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>

<body class="p-0 m-0 border-0 overflow-x-hidden">


    {{---------------------------------------
        MAke sure that this two components have identical links and assets being used.
     -------------------------------------}}
    @include('member-components.member-layout-offcanvas')
    @include('member-components.member-layout-inPageSidebar')


        <!-- MAIN CONTENT GOES HERE -->
        <div class="col m-0 scrollable-content">

            @yield('content')
        </div>

    </div>

<script>
    var modal = document.getElementById("profileMyModal");
    var link = document.getElementById("profileOpenModalLink");

    link.onclick = function () {
        modal.style.display = "block";
    };

    var closeBtn = document.getElementsByClassName("profile-close")[0];
    var modalCloseBtn = document.getElementsByClassName("modal-profile-close")[0];

    closeBtn.onclick = function () {
        modal.style.display = "none";
    };
    modalCloseBtn.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

</script>
</body>

</html>
