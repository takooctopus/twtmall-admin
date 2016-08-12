<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){


        $("#searchinfo").change(function(){
            var searchinfo = $("#searchinfo").val();
            var category_id = $('#category_id').text();
            var category_s_id = $('#category_s_id').text();
            $.ajax({
                type: "GET",
                url: "/needs/ajaxcategory",
                data:  {'searchinfo':searchinfo,'category_id':category_id,'category_s_id':category_s_id},
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