<div class="form-group row">
     {!! Form::label('atribut_barang_id', 'Nama Poduk',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::label('atribut_barang_id', $produkHasAtributBarang->nama ,null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Atribut Barang Id Field -->
<div class="form-group row">
    {!! Form::label('atribut_barang_id', 'Tambahan Extra',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-4">
        {!! Form::select('atribut_barang_id', $atributs,null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('value', 'Kuantitas',['class' => 'label-control']) !!}
    <div class="col-md-2">
        {!! Form::text('value', null, ['class' => 'col-md- form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('produkHasAtributBarangs.index') !!}" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
<script type="text/javascript">

    $(document).ready(function(){      

      var postURL = "<?php echo url('addmore'); ?>";

      var i=1;  


      $('#add').click(function(){  

           i++;  

           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

      });  


      $(document).on('click', '.btn_remove', function(){  

           var button_id = $(this).attr("id");   

           $('#row'+button_id+'').remove();  

      });  


      $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });


      $('#submit').click(function(){            

           $.ajax({  

                url:postURL,  

                method:"POST",  

                data:$('#add_name').serialize(),

                type:'json',

                success:function(data)  

                {

                    if(data.error){

                        printErrorMsg(data.error);

                    }else{

                        i=1;

                        $('.dynamic-added').remove();

                        $('#add_name')[0].reset();

                        $(".print-success-msg").find("ul").html('');

                        $(".print-success-msg").css('display','block');

                        $(".print-error-msg").css('display','none');

                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                    }

                }  

           });  

      });  


      function printErrorMsg (msg) {

         $(".print-error-msg").find("ul").html('');

         $(".print-error-msg").css('display','block');

         $(".print-success-msg").css('display','none');

         $.each( msg, function( key, value ) {

            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

         });

      }

    });  

</script>
