  $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#row'+i).html(
                        "<td><div class='form-group'><select class='form-control' id='sel1' name='item'>" + @foreach($items as $item) + "<option>" + {{ $item->product }} + "</option>" + @endforeach + "</select></div></td><td><div class='form-group'><input name='quantity' class='form-control'></div></td><td><div class='form-group'><input name='item_cost' class='form-control'></div></td><td><div class='form-group'><input name='unit_cost' class='form-control'></div></td><td><div class='form-group'><input name='total_cost' class='form-control'></div></td><td><div class='form-group'><select class='form-control' id='sel1'><option>ok</option><option>no</option></select></div></td>"
                        );

      $('#orderlines').append('<tr id="row'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
       if(i>1){
     $("#row"+(i-1)).html('');
     i--;
     }
   });

});