//let content = null;
  console.log("ajax state");


  $('.group').change(() => {

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/cytech/public/sarch_index"
  })
  .done((data) => {
    console.log("sucsses", data);
    //content = data;
    console.log(data.result);

    const group = $('.group').val();
    console.log("select group", group);
    const lists = data[group]
    console.log("select member", lists);
    listLength = lists.length-1;
    console.log(listLength);
    console.log(JSON.stringify(lists.name));

    Object.entries(lists).forEach(([key, value]) => {
      console.log(`${key}: ${value}`);
    });

    
  })
  .fail((error) => {
    console.log("fail", error.status, error.statusText, error);
    const errorMessage = `${error.status} ${error.statusText}`
    $('#error').text(errorMessage);
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