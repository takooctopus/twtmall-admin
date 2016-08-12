<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){


        $("#searchinfo").change(function(){
            var searchinfo = $("#searchinfo").val();
            $.ajax({
                type: "GET",
                url: "/needs/ajaxIndex",
                data:  {'searchinfo':searchinfo},
                success: function (data) {
                    console.log(data);
                    $('#needs-field').empty();
                    $('#needs-field').append(data['needsfield']);
                    $('p#needss-count-describe').text("There are << " + data['needssCount']+ " >> needss!!!!");
                }
            });
        });


    });
</script>