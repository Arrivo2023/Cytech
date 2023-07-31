//let content = null;
  console.log("ajax state");


  $('.group').change(() => {

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "GET",
    url: "/ajax_index",
    dataType: "json"
  }).done(function(data) {
    console.log("sucsses", data);
    //content = data;
    //console.log(data.result);

   /* const group = $('.group').val();
    console.log("select group", group);
    const lists = data[group]
    console.log("select member", lists);
    listLength = lists.length-1;
    console.log(listLength);
    console.log(JSON.stringify(lists.name));

    Object.entries(lists).forEach(([key, value]) => {
      console.log(`${key}: ${value}`);
    });*/

    
  }).fail(function(data) {
    console.log("fail", error.status, error.statusText, error);
    //const errorMessage = `${error.status} ${error.statusText}`
    //$('#error').text(errorMessage);
  })
  .always(() => {
    console.log("ajax complete");
  });

});


  /*const group = $('.group').val();
  console.log("select group", group);
  const list = content[group]
  console.log("select member", list);

  list.map(member => {
    $('#member-list').append('<li/>').text(`名前: ${member.name} 年齢: ${member.age}`);
  });*/

  // Ajaxリクエストの送信
  /*$.ajax({
    url: "/ajax_index",
    method: "GET",
    data: {
        // リクエストに含めるデータを指定する（必要に応じて）
        key: "value"
    },
    dataType: "json",
    success: function(response) {
        // 成功時の処理
        console.log("成功！！");
    },
    error: function(xhr, status, error) {
        // エラー時の処理
        console.log("失敗");
    }
});*/