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
                url: "/goods/ajaxcategory",
                data:  {'searchinfo':searchinfo,'category_id':category_id,'category_s_id':category_s_id},
                success: function (data) {
                    console.log(data);
                    $('#goods-field').empty();
                    $('#goods-field').append(data['goodsfield']);
                    $('p#goodss-count-describe').text("There are << " + data['goodssCount']+ " >> goodss!!!!");
                }
            });
        });


    });
</script>