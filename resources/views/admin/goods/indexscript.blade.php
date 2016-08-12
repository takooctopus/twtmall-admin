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
                url: "/goods/ajaxIndex",
                data:  {'searchinfo':searchinfo},
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