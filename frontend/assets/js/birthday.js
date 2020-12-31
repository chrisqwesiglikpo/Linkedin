$(function(){

        for (i = new Date().getFullYear(); i > 1900; i--) {
            //    2019,2018, 2017,2016.....1901
            $("#birthday-year").append($('<option/>').val(i).html(i));

        }
        for (i = 1; i < 13; i++) {
            $('#birthday-month').append($('<option/>').val(i).html(i));
        }
        updateNumberOfDays();

        function updateNumberOfDays() {
            // $('#birthday-day').html('');
            month = $('#birthday-month').val();
            year = $('#birthday-year').val();
            days = daysInMonth(month, year);
            for (i = 1; i < days + 1; i++) {
                $('#birthday-day').append($('<option/>').val(i).html(i));
            }

        }
        $('#birthday-year, #birthday-month').on('change', function() {
            updateNumberOfDays();
        })

        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();

        }

   
})

  