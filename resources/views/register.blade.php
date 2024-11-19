<!DOCTYPE html>
<html>
<head>
    <title>Manzilni tanlang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1>Manzilni tanlang</h1>

<form id="address-form">
    <select id="address" name="address">
        <option value="Toshkent">Toshkent</option>
        <option value="Samarqand">Samarqand</option>
        <option value="Buxoro">Buxoro</option>
    </select>
    <button type="submit">Saqlash</button>
</form>

<div id="address-table">
    @include('addresses.index', ['addresses' => $addresses ?? []])
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#address-form').on('submit', function (e) {
            e.preventDefault();

            var address = $('#address').val();
            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('auth.register') }}",
                type: "POST",
                data: {
                    _token: token,
                    address: address
                },
                success: function (response) {
                    if (response.success) {
                        $('#address-table').html(response.data);
                    } else {
                        alert('Xatolik yuz berdi!');
                    }
                },
                error: function () {
                    alert('AJAX xatosi!');
                }
            });
        });
    });
</script>
</body>
</html>
