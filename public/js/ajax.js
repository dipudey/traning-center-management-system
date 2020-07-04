$(document).ready(function() {

  //Cource Details Show

  $('body').on('click','#cource-view',function() {
    var id = $(this).data('id')
    // alert(id)
    $.ajax({
      url : "/view/cource/"+id,
      method: 'get',
      dataType: 'json',
      success: function(data){
        if (data) {
          // console.log(data.data)
          $("#cource-show").modal('show')
          $("#cource_name").text(data.data.cource_name)
          $("#cource_duration").text(data.data.cource_duration)
          $("#cource_amount").text(data.data.cource_amount)
          $("#cource_details").text(data.data.cource_details)
        }
      }
    })
  })

  // Batch Edit

  $('body').on('click',"#batch-edit",function(){
    var id = $(this).data('id')
    // alert(id)
    $.ajax({
      url : "/batch/edit/"+id,
      method : 'get',
      dataType: 'json',
      success: function(response){
        $("#batch-modal").modal('show');
        $("#id").val(response.data.id)
        $("#batch_name").val(response.data.batch_name)
        // console.log(response.cources[1].cource_name);
        var html = ''
        for (var i = 0; i < response.cources.length; i++) {
          html += `<option value="${response.cources[i].id}">${response.cources[i].cource_name}</option>`
        }
        $("#cource").html(html)
        $("#editCource > select > option[value=" + response.data.cource_id + "]").prop("selected",true);
      }
    })
  })

  //Cource Select
  $('#cource-select').on('change',function(){
    var id = $(this).val()
    // alert(id)
    $.ajax({
      url: '/find/batch/'+id,
      method: 'get',
      dataType: 'json',
      success: function(response){
        // console.log(response.data)
        if (response.data) {
          var html = ''
          for (var i = 0; i < response.data.length; i++) {
            html += `<option value="${response.data[i].id}">${response.data[i].batch_name}</option>`
          }
          $("#batch-select").html(html)
        }
        else {
          $("#batch-select").html(`<option value="">Select</option>`)
        }
      }
    })
  })

  // getPayment Modal Show
  $("body").on('click',"#getPayment",function(){
    var id = $(this).data('id')
    var cource_id = $(this).data('cource_id')
    var amount = $(this).data('amount')
    // alert(amount)
    $("#addStd").val(id)
    $("#amount").val(amount)
    $("#cource_id").val(cource_id)
    $("#payment-modal").modal('show')
  })

  //Expense edit
  $("body").on('click','#expense_edit',function() {
    var id = $(this).data('id')
    // alert(id)
    $.ajax({
      url : '/expense/show/'+id,
      method: 'get',
      dataType: 'json',
      success: function (response){
        $("#expense-modal").modal('show')
        $("#id").val(response.data.id)
        $("#amount").val(response.data.amount)
        $("#expense_details").val(response.data.expense_details)
      }
    })
  })

//User Details Show

  $("body").on('click','#user-show',function() {
    var id = $(this).data('id')
    // alert(id)
    $.ajax({
      url : '/user/show/'+id,
      method: 'get',
      dataType: 'json',
      success: function(response) {
        $("#user-modal").modal('show')
        $("#user-name").text(response.data.name)
        $("#user-email").text(response.data.email)
        // console.log(response.role)
        $("#user-role").text(response.role)
      }
    })
  })

//Delete item
  $(document).on("click","#delete",function(e){
    e.preventDefault();
    var link = $(this).attr("href");
      swal({
        title: "Are you Want to Delete?",
        text: "Once Delete, This will be permanently Delete!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete)=> {
        if(willDelete) {
          window.location.href = link;
          event.preventDefault();
        }
        else{
          swal("Cancelled", "Your Data Is Safe :)", "error");
        }
      });
    });


})
