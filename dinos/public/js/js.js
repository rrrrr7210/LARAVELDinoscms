// const item = document.querySelector(".list-group-item");
//
// item.addEventListener ("mouseenter", mouseDown);
//
//
// function mouseDown(e){
//
//     e.target.className = 'list-group-item active';
//
// }

$(document).ready(function () {
    fetch_customer_data();
    function fetch_customer_data(query = '') {
        $.ajax({
            url:'/home/action',
            method:'GET',
            data:{query:query},
            dataType:'json',

            success:function (data) {
                $('#eredmeny').html(data.table_data);
                // $('#total_records').text(data.total_data);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});

