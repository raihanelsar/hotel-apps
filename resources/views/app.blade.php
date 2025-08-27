<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'Management Hotel' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <!-- Favicons -->
    <link href="{{asset ('assets/img/favicon.png') }}" rel="icon">
    <link href="{{asset ('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset ('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset ('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!--- ==== Header ==== -->
    @include('inc.header')
    <!-- === Sidebar === -->
    @include('inc.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title ?? '' }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            @yield('content')
        </section>

    </main><!-- End #main -->

    <!-- === Footer === -->
    @include('inc.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset ('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset ('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{asset ('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{asset ('assets/vendor/quill/quill.js') }} "></script>
    <script src="{{asset ('assets/vendor/simple-datatables/simple-datatables.js') }} "></script>
    <script src="{{asset ('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset ('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset ('assets/js/main.js')}}"></script>
    <script>
        //variable
        // let, var, const

        const rupiahFormat = (value) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(value);
        }

        let category_id = document.getElementById('category_id');
        let roomId = document.getElementById('room_id');
        const roomRateText = document.getElementById('roomRate');
        const totalNightText = document.getElementById('totalNight');
        const subTotalText = document.getElementById('subtotal');
        const taxText = document.getElementById('tax');
        const totalAmountText = document.getElementById('totalAmount');

        let roomRate = 0;
        category_id.addEventListener('change', async function(){
            const id_category = this.value;
            roomId.innerHTML = "<option value=''>Pilih kamar..</option>"

                const res = await fetch(`/get-room-by-category/${id_category}`);

                const data = await res.json();
                data.data.forEach(room => {
                   const option = document.createElement('option');
                   option.value = room.id;
                   option.textContent = `${room.name}`;
                   option.setAttribute('data-price', room.price);
                   roomId.appendChild(option);
                });

                console.log("data", data);
        });

        roomId.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        roomRate = selectedOption.getAttribute('data-price')|| 0;
        roomRateText.textContent = rupiahFormat(roomRate);

        });

        const checkInInput = document.getElementById('checkin');
        const checkOutInput = document.getElementById('checkout');

        function calculateTotal()
        {
            const checkin = new Date(checkInInput.value);
            const checkout = new Date(checkOutInput.value);

            if(checkin && checkout && checkout > checkin){
                const timeDiff = checkout - checkin;
                const night = timeDiff / (1000 * 60 * 60 * 24); //86.400.000

                const subTotal = roomRate * night;
                const tax = subTotal * 0.1;
                const grandTotal = subTotal + tax; //22000

                totalNightText.textContent = night;
                subTotalText.textContent = rupiahFormat(subTotal);
                taxText.textContent = rupiahFormat(tax);
                totalAmountText.textContent = rupiahFormat(grandTotal);
            }
        }

        checkInInput.addEventListener('change', calculateTotal);
        checkOutInput.addEventListener('change', calculateTotal);

        document.getElementById('save').addEventListener('click', async function(){
            const guest_name = document.querySelector('input[name="guest_name"]').value;
            const guest_email = document.querySelector('input[name="guest_email"]').value;
            const guest_phone = document.querySelector('input[name="guest_phone"]').value;
            const room_id = document.querySelector('#room_id').value;
            const guest_room_number = document.querySelector('select[name=guest_room_number]').value;
            const guest_note = document.querySelector('textarea[name=guest_note]').value;
            const guest_qty = document.querySelector('select[name=guest_qty]').value;
            const guest_checkin = document.querySelector('input[name=guest_checkin]').value;
            const guest_checkout = document.querySelector('input[name=guest_checkout]').value;
            const payment_method = document.querySelector('select[name=payment_method]').value;
            const subtotal = document.querySelector('#subtotal').textContent;
            const nights = document.querySelector('#totalNight').textContent;
            const tax = document.querySelector('#tax').textContent;
            const totalAmount = document.querySelector('#totalAmount').textContent;
            const token = document.querySelector("meta[name='csrf-token']").getAttribute('content')
            const reservation_number = "RSV-270893-001";
            const data = {
                room_id: room_id,
                reservation_number: reservation_number,
                guest_name: guest_name,
                guest_email: guest_email,
                guest_phone: guest_phone,
                guest_room_number: guest_room_number,
                guest_note: guest_note,
                guest_qty: guest_qty,
                guest_checkin: guest_checkin,
                guest_checkout: guest_checkout,
                payment_method: payment_method,
                subtotal: subtotal.replace('/[^\d]/g', ''),
                nights: nights,
                tax: tax,
                totalAmount: totalAmount.replace('/[^\d]/g', ''),
            }
            try {
                const res = await fetch(`/reservation`, {
                    method: "POST",
                    headers: {
                        "Content-Type":"application/json",
                        "Accept":"application/json",
                        "X-CSRF-TOKEN": token
                    },
                    body:
                        JSON.stringify(data)

                }); //get
                const result = await res.json();
                if (res.ok) {
                    alert('Success');
                }
            } catch (error){
                console.log("error", error);
                alert('Ups reservasi gagal');
            }
        });
    </script>

</body>

</html>
