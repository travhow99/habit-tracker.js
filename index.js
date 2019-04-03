$(document).ready(function(){
  $('.tracker-toggle').change(function(){
      // see if checked
      let $checkedLength = $(this).is(':checked');
      if ($checkedLength){
          //alert('checked');
      } else {
          //alert('unchecked');
      }

      let $habit = $(this).siblings('.habit-title').text();
      console.log($habit);

      let data = {
        // week in php
        // User id in php
        goal: $habit,
        day: $(this).attr('for'),
        checked: $checkedLength,
        category: 'default',
      }


      console.log($checkedLength);



      $.post('habit-form.php', data, function(data){


        // show the response
        $('#response').html(data);
          console.log(`${$checkedLength}`);
        }).fail(function() {

            // just in case posting your form failed
            alert( "Posting failed." );

        });
      });
  });
