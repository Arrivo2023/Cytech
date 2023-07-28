//let content = null;
  console.log("ajax state");


  $('.group').change(() => {

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "storage/table_data.json"
  })
  .done((data) => {
    console.log("sucsses", data);
    //content = data;

    const group = $('.group').val();
    console.log("select group", group);
    const list = data[group]
    console.log("select member", list);

    list.map(member => {
      $('#member-list').append('<li/>').text(`名前: ${member.name} 年齢: ${member.age}`);
    });
    //$('#testjson').text(JSON.stringify(data));
    //console.log("testjson", $('#testjson'))
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