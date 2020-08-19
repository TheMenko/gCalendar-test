<!-- scripts -->
<script src="{{ url('assets/js/jQuery.js')}}"></script>
<script src="{{ url('assets/js/bootstrap.js')}}"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://kit.fontawesome.com/853245d3d7.js" crossorigin="anonymous"></script>

@push('gcalendar')
    <script>

        function basic_validation() {

            $(".alert").hide();
            $("#success").hide();
            $("#error").hide();

            if (!$("#name").val()) {
                $("#name_error").show();
                return false;
            }
            if (!(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test($("#phone").val()))) {
                $("#phone_error").show();
                return false;
            }
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val()))) {
                $("#email_error").show();
                return false;
            }
            if (!$("#time").val()) {
                $("#time_error").show();
                return false;
            }

            let input_date = new Date($("#date").val());
            let current_date = new Date();

            if (!$("#date").val()) {
                $("#date_error").show();
                return false;
            } else if (input_date < current_date) {
                $("#date_error").show();
            }

            return true;
        }

        $(function () {
            $("#btn_add").click(function () {
                if (basic_validation()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    let name = $("#name").val();
                    let phone = $("#phone").val();
                    let email = $("#email").val();
                    let time = $("#time").val();
                    let date = $("#date").val();
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "/register_event",
                        type: "POST",
                        data: {
                            name: name,
                            email: email,
                            phone: phone,
                            time: time,
                            date: date,
                            _token: _token
                        },
                        success: function (response) {
                            console.log(response);
                            if (response) {
                                $('#success').show();
                            } else {
                                $('#error').show();
                            }
                        },
                    });
                }
            });
        });
    </script>
@endpush
