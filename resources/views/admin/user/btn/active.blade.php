  
<div id="app"> 
   <input type="checkbox" value="{{$id }}" id="test" {{ ($status == "active") ? 'checked' : ''  }}>   
</div>
   

<script>  
 

      $("#test").change(function(){   
     
        var id = $(this).val();
          $.ajax({ 
              type: 'POST',
              url: '/admin/activation/',
              data:{ 
                'id' : id,
                '_token': "{{ csrf_token() }}"
              },
              success: function (data) { 
                    console.log(event);
              } 
          }); 
      }); 
  
</script>          















































  {{-- $(document).ready(function(){
    $("input:checkbox").change(function() {
      var user_id = $(this).closest('tr').attr('id');
  
      $.ajax({
              type:'POST',
              url:'/activation',
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: { "user_id" : user_id },
              success: function(data){
                if(data.data.success){
                  //do something
                }
              }
          });
      });
  }); --}}




  



      {{-- <form >
      {{ csrf_field() }}
  <td class="text-center">
      <input type="checkbox" name="avtive" 
          onChange="this.form.submit()" {{($record->is_active ==1) ? 'checked' : ''}}>
  </td> 
  </form> --}}


      {{-- <a onclick="edit('{{$order->id}}')" target="_blank">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                title="Edit"><i class="fa fa-pencil-alt"></i></button>
    </a> --}}
 