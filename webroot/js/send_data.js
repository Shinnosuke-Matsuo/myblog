console.log('hohoho');
$(document).on('click','.add_item', function() {
    console.log($post_id);
    console.log('hohgoehgeog');
    var post_id = $post_id;
    var content = $('.textdata').text();
    $.ajax(
        {
            type: "POST",
            url: "/items/add",
            data: {
                "post_id": post_id,
                "content": content
            },
            dataType: "text",
            success: function (dom)
            {
                //保存完了
                //ここで、返り値（dom）を描画する
                // content.show();
                console.log(dom);

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) //通信失敗
            {
                alert('処理できませんでした');
            }
        });
});
