  $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#row'+i).html(
                        "<td><div class='form-group'><select class='form-control' id='sel1' name='item[]'>"+ products +"</select></div></td><td><div class='form-group'><input name='quantity[]' class='form-control'></div></td><td><div class='form-group'><input name='item_cost[]' class='form-control'></div></td><td><div class='form-group'><input name='unit_cost[]' class='form-control'></div></td><td><div class='form-group'><input name='total_cost[]' class='form-control'></div></td><td><div class='form-group'><select class='form-control' id='sel1' name='reorder[]'><option>ok</option><option>no</option></select></div></td><td><input class='btn btn-default' type='button' value='Delete' onclick='deleteRow(this)'></td>"
                        );

      $('#orderlines').append('<tr id="row'+(i+1)+'"></tr>');
      i++; 
  });
});