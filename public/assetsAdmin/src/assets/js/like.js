
var like = 1;
var value = document.getElementById('#userLike');
$('#add').submit(function (e){
    e.preventDefault();
    value = like++;
    $.ajax({
        url:"{{url('admin/posts/like')}}",
        type:'POST',
        data:value,
        contentType: false,
        processData: false,
        success:function (data){
            console.log(data);
        },
        error:function (e){
            console.log(data)
        }
    });
})

